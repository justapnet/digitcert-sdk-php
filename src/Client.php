<?php

namespace DigitCert\Sdk;

use DigitCert\Sdk\Exceptions\DoNotHavePrivilegeException;
use DigitCert\Sdk\Exceptions\InsufficientBalanceException;
use DigitCert\Sdk\Exceptions\RequestException;
use DigitCert\Sdk\Resources\Certificate;
use DigitCert\Sdk\Resources\Order;
use DigitCert\Sdk\Resources\Product;
use DigitCert\Sdk\Response\Interfaces\BaseResponse;
use DigitCert\Sdk\Traits\SignTrait;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use function GuzzleHttp\json_decode;

/**
 * @method mixed get($uri, $parameters = [])
 * @method mixed post($uri, $parameters = [])
 */
class Client
{
    use SignTrait;

    const ORIGIN_API = 'https://www.digitcert.com.cn';
    const ORIGIN_API_STAGING = 'https://www.digitcert.com.cn';
    const ORIGIN_API_DEV = 'http://dev.digitalcert.test';

    const CODE_EXCEPTION_MAP = [
        'INSUFFICIENT_BALANCE' => InsufficientBalanceException::class,
        'DO_NOT_HAVE_RIVILEGE' => DoNotHavePrivilegeException::class,
    ];

    const ENV_DEV = 'dev';
    const ENV_STG = 'stg';
    const ENV_PROD = 'prod';

    /**
     * @var Product
     */
    public $product;

    /**
     * @var Certificate $certificate
     */
    public $certificate;

    /**
     * @var Order
     */
    public $order;

    /**
     * @var string
     */
    protected $accessKeyId;

    /**
     * @var string
     */
    protected $accessKeySecret;

    /**
     * @var string
     */
    protected $apiOrigin;

    /**
     * @var int
     */
    protected $connectTimeout;

    /**
     * @var int
     */
    protected $readTimeout;

    public function __construct($accessKeyId, $accessKeySecret, $env = self::ENV_PROD, $connectTimeout = 5, $readTimeout = 15, $option = [])
    {
        switch ($env) {
            case self::ENV_DEV:
                $apiOrigin = $option[self::ENV_DEV] ?? self::ORIGIN_API_DEV;
                break;

            case self::ENV_STG:
                $apiOrigin = $option[self::ENV_STG] ?? self::ORIGIN_API_STAGING;
                break;

            default:
                $apiOrigin = $option[self::ENV_PROD] ?? self::ORIGIN_API;
        }

        $this->accessKeyId = $accessKeyId;
        $this->accessKeySecret = $accessKeySecret;
        $this->apiOrigin = $apiOrigin;

        $this->product = new Product($this);
        $this->order = new Order($this);
        $this->certificate = new Certificate($this);

        $this->connectTimeout = $connectTimeout;
        $this->readTimeout = $readTimeout;

        //$this->callback = new Callback($this);
    }

    /**
     * 魔术
     *
     * @param string $method GET、POST
     * @param array $arguments 第一个参数为API的路径，第二个参数为业务参数
     * @return BaseResponse
     * @throws RequestException
     * @throws ValidationException
     */
    public function __call($method, $arguments = [])
    {
        try {
            $http = new GuzzleHttpClient([
                RequestOptions::CONNECT_TIMEOUT => $this->connectTimeout,
                RequestOptions::READ_TIMEOUT => $this->readTimeout,
            ]);

            $api = $arguments[0];
            $resource = '/' . $api;

            $parameters = isset($arguments[1]) ? $arguments[1] : [];
            $parameters = $this->sign($resource, $parameters, $this->accessKeyId, $this->accessKeySecret);

            $uri = $this->apiOrigin . $resource;

            /** @var Response $response */
            $response = $http->{$method}($uri, [
                ($method == 'get' ? 'query' : RequestOptions::JSON) => $parameters,
            ]);

            if ($response->getStatusCode() != 200) {
                throw new RequestException('服务器错误');
            }

            $content = $response->getBody()->getContents();
            Log::info('response', [
                $uri,
                $response->getStatusCode(),
                $method,
                [
                    ($method == 'get' ? 'query' : RequestOptions::JSON) => $parameters,
                ],
                $content
            ]);

            try {
                $response = \json_decode($content);
                if (!$response)
                    throw new RequestException('返回内容错误');

                return $response;
            } catch (\Throwable $e) {
                Log::error('请求上游服务器出错了', [
                    $uri, $method, [
                        ($method == 'get' ? 'query' : RequestOptions::JSON) => $parameters,
                    ], $content
                ]);

                throw $e;
            }
        } catch (ClientException $e) {
            // 若不存在 Laravel's ValidationException 类，或者版本太低没有 withMessages 方法，抛出Guzzle的异常
            if (!class_exists(ValidationException::class) || !method_exists(ValidationException::class, 'withMessages')) {
                throw $e;
            }

            $response = $e->getResponse();
            if ($response->getStatusCode() !== 412) {
                throw $e;
            }

            $data = json_decode($response->getBody()->__toString(), true);
            if (JSON_ERROR_NONE !== json_last_error() || !isset($data['message'])) {
                throw new ClientException('JSON DECODE ERROR', $e->getRequest(), $e->getResponse(), $e);
            }

            throw ValidationException::withMessages($data['message']);
        } catch (\Throwable $e) {
            throw $e;
        }
    }
}

<?php

namespace DigitCert\Sdk\Resources;

use DigitCert\Sdk\Client;
use DigitCert\Sdk\Requests\AbstractRequest;

abstract class AbstractResource
{
    protected $version = 'v1';
    protected $prefix = 'api';

    /**
     * @var Client
     */
    protected $client = null;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    protected function buildApiPath(string $path)
    {
        $s = '%s/%s/%s';
        return sprintf($s, $this->prefix, $this->version, ltrim($path, '/'));
    }

    protected function callApi($path, AbstractRequest $request, $method = 'get')
    {
        \Log::info('$this->buildApiPath($path)', [
            $this->buildApiPath($path),
            $request->toArray()
        ]);

        return $this->client->{$method}($this->buildApiPath($path), $request->toArray());
    }
}

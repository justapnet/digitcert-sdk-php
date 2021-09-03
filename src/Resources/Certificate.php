<?php


namespace DigitCert\Sdk\Resources;


use DigitCert\Sdk\Requests\Certificate\AddSanRequest;
use DigitCert\Sdk\Requests\Certificate\CertCreateRequest;
use DigitCert\Sdk\Requests\Certificate\ReissueCertRequest;
use DigitCert\Sdk\Requests\Certificate\ReValidationRequest;
use DigitCert\Sdk\Requests\Certificate\UpdateDcvRequest;
use DigitCert\Sdk\Requests\Certificate\CertDetailRequest;
use DigitCert\Sdk\Requests\Certificate\CertListRequest;

class Certificate extends AbstractResource
{
    /**
     * @param CertListRequest $request
     * @return mixed
     */
    public function list(CertListRequest $request)
    {
        return $this->callApi('/certs', $request, 'get');
    }

    /**
     * @param int $orderNo
     * @param CertDetailRequest $request
     * @return mixed
     */
    public function detail(int $orderNo, CertDetailRequest $request)
    {
        return $this->callApi(sprintf('/order/%d/cert', $orderNo), $request, 'get');
    }

    /**
     * @param int $orderNo
     * @param CertCreateRequest $request
     * @return mixed
     */
    public function creation(int $orderNo, CertCreateRequest $request)
    {
        return $this->callApi(sprintf('/order/%d/cert', $orderNo), $request, 'post');
    }

    /**
     * @param int $orderNo
     * @param ReissueCertRequest $request
     * @return mixed
     */
    public function reissue(int $orderNo, ReissueCertRequest $request)
    {
        return $this->callApi(sprintf('/order/%d/cert/reissue', $orderNo), $request, 'post');
    }

    /**
     * @param int $orderNo
     * @param UpdateDcvRequest $request
     * @return mixed
     */
    public function updateDcv(int $orderNo, UpdateDcvRequest $request)
    {
        return $this->callApi(sprintf('/order/%d/cert/update-dcv', $orderNo), $request, 'post');
    }

    /**
     * @param int $orderNo
     * @param ReValidationRequest $request
     * @return mixed
     */
    public function reValidation(int $orderNo, ReValidationRequest $request)
    {
        return $this->callApi(sprintf('/order/%d/cert/revalidation', $orderNo), $request, 'post');
    }

    /**
     * @param int $orderNo
     * @param AddSanRequest $request
     * @return mixed
     */
    public function addSan(int $orderNo, AddSanRequest $request)
    {
        return $this->callApi(sprintf('/order/%d/cert/add-san', $orderNo), $request, 'post');
    }
}

<?php


namespace DigitCert\Sdk\Resources;


use DigitCert\Sdk\Requests\Certificate\CertCreateRequest;
use DigitCert\Sdk\Requests\Certificate\CertReissueRequest;
use DigitCert\Sdk\Requests\Certificate\ReValidationRequest;
use DigitCert\Sdk\Requests\Certificate\UpdateDcvRequest;
use DigitCert\Sdk\Requests\Order\CertDetailRequest;
use DigitCert\Sdk\Requests\Order\CertListRequest;

class Certificate extends AbstractResource
{
    public function list(CertListRequest $request)
    {
        return $this->callApi('/certs', $request, 'get');
    }

    public function detail(int $orderNo, CertDetailRequest $request)
    {
        return $this->callApi(sprintf('/order/%d/cert', $orderNo), $request, 'get');
    }

    public function creation(int $orderNo, CertCreateRequest $request)
    {
        return $this->callApi(sprintf('/order/%d/cert', $orderNo), $request, 'post');
    }

    public function reissue(int $orderNo, CertReissueRequest $request)
    {
        return $this->callApi(sprintf('/order/%d/cert/reissue', $orderNo), $request, 'post');
    }

    public function updateDcv(int $orderNo, UpdateDcvRequest $request)
    {
        return $this->callApi(sprintf('/order/%d/cert/update-dcv', $orderNo), $request, 'post');
    }

    public function reValidation(int $orderNo, ReValidationRequest $request)
    {
        return $this->callApi(sprintf('/order/%d/cert/revalidation', $orderNo), $request, 'post');
    }

    public function addSan(int $orderNo, ReValidationRequest $request)
    {
        return $this->callApi(sprintf('/order/%d/cert/add-san', $orderNo), $request, 'post');
    }
}

<?php


namespace DigitCert\Resources;


use DigitCert\Requests\Certificate\CertReissueRequest;
use DigitCert\Requests\Certificate\ReValidationRequest;
use DigitCert\Requests\Certificate\UpdateDcvRequest;
use DigitCert\Requests\Order\CertDetailRequest;
use DigitCert\Requests\Order\CertListRequest;

class Certificate extends AbstractResource
{
    public function certList(CertListRequest $request)
    {
        return $this->callApi('/certs', $request, 'get');
    }

    public function certDetail(int $orderNo, CertDetailRequest $request)
    {
        return $this->callApi(sprintf('/order/%d/cert', $orderNo), $request, 'post');
    }

    public function certReIssue(int $orderNo, CertReissueRequest $request)
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

<?php


namespace DigitCert\Sdk\Requests\Certificate;


use DigitCert\Sdk\Requests\AbstractRequest;

class CertListRequest extends AbstractRequest
{
    /** @var int $page */
    public $page = 1;

    /** @var int $size */
    public $size = 20;
}

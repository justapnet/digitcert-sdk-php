<?php


namespace DigitCert\Sdk\Requests\Certificate;


use DigitCert\Sdk\Requests\AbstractRequest;

/**
 * Class CertListRequest
 *
 * @property int $size 每页数据，默认20
 * @property int $page 页码，默认1
 *
 * @package DigitCert\Sdk\Requests\Certificate
 */
class CertListRequest extends AbstractRequest
{
    /** @var int $page */
    public $page = 1;

    /** @var int $size */
    public $size = 20;
}

<?php


namespace DigitCert\Sdk\Schemes\Certificate;
use ArrayAccess;
use DigitCert\Sdk\Schemes\Certificate\Dcv\DnsDcv;
use DigitCert\Sdk\Schemes\Certificate\Dcv\EmailDcv;
use DigitCert\Sdk\Schemes\Certificate\Dcv\HttpDcv;
use DigitCert\Sdk\Schemes\Certificate\Dcv\HttpsDcv;
use DigitCert\Sdk\Traits\arrayAccessTrait;


/**
 * Class UpdateDcvSchema
 *
 * @property string[] $valid_method
 * @property string[] $dcv_email_set
 *
 * @property DnsDcv[]|HttpDcv[]|HttpsDcv[]|EmailDcv[] $dcv
 *
 * @package DigitCert\Sdk\Schemes\Certificate
 */
class UpdateDcvSchema implements ArrayAccess
{
    use arrayAccessTrait;
}

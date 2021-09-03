<?php


namespace DigitCert\Sdk\Schemes\Certificate\Dcv;


use DigitCert\Sdk\Traits\arrayAccessTrait;

/**
 * Class EmailDcvDetail
 *
 * @property string $address
 * @property string[] $available
 *
 * @package DigitCert\Sdk\Schemes\Certificate\Dcv
 */
class EmailDcvDetail implements \ArrayAccess
{
    use arrayAccessTrait;
}

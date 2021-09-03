<?php


namespace DigitCert\Sdk\Schemes\Certificate\Dcv;


use DigitCert\Sdk\Traits\arrayAccessTrait;

/**
 * Class DnsDcvDetail
 *
 * @property string $type
 * @property string $hostname
 * @property string $fullname
 * @property string $value
 *
 * @package DigitCert\Sdk\Schemes\Certificate\Dcv
 */
class DnsDcvDetail implements \ArrayAccess
{
    use arrayAccessTrait;
}

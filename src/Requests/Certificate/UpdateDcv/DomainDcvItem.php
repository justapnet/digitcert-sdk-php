<?php


namespace DigitCert\Sdk\Requests\Certificate\UpdateDcv;


use DigitCert\Sdk\Traits\arrayAccessTrait;
use ArrayAccess;
use ArrayObject;

/**
 * Class DomainDcvItem
 *
 * @property string $domain
 * @property string $type
 * @property string $value
 *
 * @package DigitCert\Sdk\Requests\Certificate\UpdateDcv
 */
class DomainDcvItem implements ArrayAccess
{
    use arrayAccessTrait;
}

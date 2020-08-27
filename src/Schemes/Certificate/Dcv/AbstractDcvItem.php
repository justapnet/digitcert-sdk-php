<?php


namespace DigitCert\Sdk\Schemes\Certificate\Dcv;

use DigitCert\Sdk\Traits\arrayAccessTrait;

/**
 * Class DcvItem
 *
 * @property string $type
 * @property string $domain
 * @property string $status
 *
 * @package DigitCert\Sdk\Schemes\Certificate\Dcv
 */
abstract class AbstractDcvItem implements \ArrayAccess
{
    use arrayAccessTrait;
}

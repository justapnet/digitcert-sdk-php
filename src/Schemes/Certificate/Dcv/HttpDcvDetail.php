<?php


namespace DigitCert\Sdk\Schemes\Certificate\Dcv;


use DigitCert\Sdk\Traits\arrayAccessTrait;

/**
 * Class HttpDcvDetail
 *
 * @property string $filename
 * @property string $content
 * @property string $filepath
 * @property string $fullpath
 * @property string $link
 *
 * @package DigitCert\Sdk\Schemes\Certificate\Dcv
 */
class HttpDcvDetail implements \ArrayAccess
{
    use arrayAccessTrait;
}

<?php

namespace DigitCert\Sdk\Requests;

use ArrayAccess;
use ArrayObject;
use DigitCert\Sdk\Traits\arrayAccessTrait;

abstract class AbstractRequest implements ArrayAccess
{
    use arrayAccessTrait;
}

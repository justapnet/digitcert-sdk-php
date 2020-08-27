<?php

namespace DigitCert\Sdk\Schemes;

use ArrayAccess;
use ArrayObject;
use DigitCert\Sdk\Traits\arrayAccessTrait;

abstract class AbstractScheme implements ArrayAccess {
    use arrayAccessTrait;
}

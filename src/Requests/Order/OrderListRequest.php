<?php


namespace DigitCert\Sdk\Requests\Order;


use DigitCert\Sdk\Requests\AbstractRequest;

class OrderListRequest extends AbstractRequest
{
    /** @var int $page */
    public $page = 1;

    /** @var int $size */
    public $size = 20;
}

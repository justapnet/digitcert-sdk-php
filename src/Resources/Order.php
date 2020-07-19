<?php


namespace DigitCert\Resources;


use DigitCert\Requests\Order\AddSanOrderRequest;
use DigitCert\Requests\Order\NewOrderRequest;
use DigitCert\Requests\Order\OrderDetailRequest;
use DigitCert\Requests\Order\OrderListRequest;
use DigitCert\Requests\Order\OrderRefundRequest;

class Order extends AbstractResource
{
    public function newOrder(NewOrderRequest $request)
    {
        return $this->callApi('order', $request, 'post');
    }

    public function orderList(OrderListRequest $request)
    {
        return $this->callApi('orders', $request, 'get');
    }

    public function refund(int $orderNo, OrderRefundRequest $request)
    {
        return $this->callApi(sprintf('order/%d/refund', $orderNo), $request, 'post');
    }

    public function orderDetail(int $orderNo, OrderDetailRequest $request)
    {
        return $this->callApi(sprintf('order/%d', $orderNo), $request, 'get');
    }

    public function addSan(int $orderNo, AddSanOrderRequest $request)
    {
        return $this->callApi(sprintf('order/%d/add-san', $orderNo), $request, 'post');
    }
}

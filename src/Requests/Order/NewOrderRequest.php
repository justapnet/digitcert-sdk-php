<?php


namespace DigitCert\Sdk\Requests\Order;


use DigitCert\Sdk\Requests\AbstractRequest;

/**
 * Class NewOrderRequest
 *
 * @property int $product_id 必传，产品id
 * @property int $san 可选，购买的san数量
 * @property int $period 必传，购买周期，单位月
 * @property string $unique_id 可选，外部系统订单号或唯一序列号
 * @property string $source 可选，订单来源
 *
 * @package DigitCert\Sdk\Requests\Order
 */
class NewOrderRequest extends AbstractRequest
{

}

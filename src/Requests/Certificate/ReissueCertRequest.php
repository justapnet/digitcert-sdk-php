<?php


namespace DigitCert\Sdk\Requests\Certificate;


use DigitCert\Sdk\Requests\AbstractRequest;

/**
 * Class ReissueCertRequest
 *
 * @property string $main_domain    必填。
 * @property string[] $san_domains  选填。
 * @property string[] $valid_method 必填，域名的验证方式
 * @property string[] $dcv_email_set 域名、邮箱键值对，当验证方式为email时必填
 *
 * @package DigitCert\Sdk\Requests\Certificate
 */
class ReissueCertRequest extends AbstractRequest
{

}

<?php


namespace DigitCert\Sdk\Requests\Certificate;


use DigitCert\Sdk\Requests\AbstractRequest;

/**
 * Class CertCreateRequest
 *
 * @property string country 必填，国家
 * @property string $city   必填，城市
 * @property string $contact_email  必填，联系邮箱
 * @property string $contact_first_name 必填，联系人姓名
 * @property string $contact_last_name  必填，联系人姓名
 * @property string $contact_phone  必填，联系电话
 * @property string $contact_title  必填，联系人职位
 * @property string $date_of_incorporation  成立时间
 * @property string $department 部门
 * @property array $domain_dcv 必填，域名验证方式，e.g.: ['domain' => 'dcv']
 * @property string $main_domain    EV/OV必填，必填，主域名
 * @property string $organization   EV/OV必填，组织名称
 * @property string $organization_phone EV/OV必填，组织联系方式
 * @property string $postal_code    EV/OV必填，邮编
 * @property string $province   EV/OV必填，省份
 * @property string $registered_address EV/OV必填，详细地址
 * @property string $serial_no  EV/OV必填，执照编号
 *
 * @package DigitCert\Sdk\Requests\Certificate
 */
class CertCreateRequest extends AbstractRequest
{

}

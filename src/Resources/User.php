<?php


namespace DigitCert\Sdk\Resources;


use DigitCert\Sdk\Requests\User\UserInfoRequest;

class User extends AbstractResource
{
    public function userInfo(UserInfoRequest $request)
    {
        return $this->callApi('user', $request, 'get');
    }
}

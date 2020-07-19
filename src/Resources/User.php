<?php


namespace DigitCert\Resources;


use DigitCert\Requests\User\UserInfoRequest;

class User extends AbstractResource
{
    public function userInfo(UserInfoRequest $request)
    {
        return $this->callApi('user', $request, 'get');
    }
}

<?php
namespace App\Request\Users;

use App\Request\BaseRequestFromApi;


class LoginUserValidation extends BaseRequestFromApi
{
    public function rules() :array
    {
        return [
            'email'=>'required|email',
            'password'=>'required|min:6|max:50',
        ];
    }


    public function authorized() :bool
    {
        return true;
    }
}


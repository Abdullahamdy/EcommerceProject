<?php
namespace App\Request\Users;

use App\Request\BaseRequestFromApi;


class CreateUserVaidation extends BaseRequestFromApi
{
    public function rules() :array
    {
        return [
            'first_name'=>'required|min:5|max:50',
            'last_name'=>'required|min:5|max:50',
            'username'=>'required|min:5|max:50|unique:users,username',
            'mobile'=>'required|min:5|max:50|unique:users,mobile',
            'email'=>'required|email|unique:users,email|min:5|max:30',
            'password'=>'required|min:6|max:50|confirmed',
        ];
    }


    public function authorized() :bool
    {
        return true;
    }
}


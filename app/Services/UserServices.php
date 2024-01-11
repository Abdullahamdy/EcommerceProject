<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserServices
{
    public function createUser(array $data)
    {
        $data['password']= Hash::make($data['password']);
        return User::create($data);
    }
}
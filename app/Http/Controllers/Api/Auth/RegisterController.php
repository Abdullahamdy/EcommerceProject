<?php

namespace App\Http\Controllers\Api\Auth;

use App\Services\UserServices;
use App\Request\Users\CreateUserVaidation;
use App\Http\Controllers\Api\BaseController;
use App\Request\Users\LoginUserValidation;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\NewAccessToken;

class RegisterController extends BaseController
{
    public $userService;

    public function __construct(UserServices $userService)
    {
        $this->userService = $userService;
    }

    public function register(CreateUserVaidation $userValidation)
    {
        if (!empty($userValidation->getErrors())) {
            return response()->json($userValidation->getErrors(), 406);
        }

        $user = $this->userService->createUser($userValidation->request()->all());
        $message['user'] = $user;
        $message['token'] = $user->createToken('Ecommerce-toke')->plainTextToken;
        return $this->sendResponse($message);
    }

    public function login(LoginUserValidation $loginUserValidation)
    {
        if (!empty($loginUserValidation->getErrors())) {
            return response()->json($loginUserValidation->getErrors(), 406);
        }
        $request = $loginUserValidation->request();
           if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $user = Auth::user();
                $success['token'] = $user->createToken('Ecommerce-toke')->plainTextToken;
                $success['name'] = $user->username;
                return $this->sendResponse($success,'User Login Successfully');
           }else{
            return $this->sendResponse(['Unauthorized.','fail',401]);
           }

    }

    public function getUser(){
        dd(1);
    }
}

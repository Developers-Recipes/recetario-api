<?php

namespace App\Http\Controllers;

use App\Http\Controllers\RequestController;
use App\Http\Requests\AuthSignUpRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends RequestController
{

    public function signup(AuthSignUpRequest $request)
    {
        $params = $request->all();
        $params['password'] = bcrypt($request->password);
        unset($params['password_confirmation']);

        $user = User::create($params);

        return $this->showOne($user);
    }

    public function login()
    {
        $email = request('email');
        $password = request('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
        }
    }

    public function logout()
    {
    }

    public function user()
    {
    }
}
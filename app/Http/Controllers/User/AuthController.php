<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\RequestController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends RequestController
{

    public function login()
    {
        $email = request('email');
        $password = request('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
        }
    }

    public function signup(Request $request)
    {
        $rules = [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ];

        $this->validate($request, $rules);

        $params = $request->all();

        $params['password'] = bcrypt($request->password);
        unset($params['password_confirmation']);

        $user = User::create($params);

        return $this->showOne($user);
    }
}
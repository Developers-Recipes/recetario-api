<?php

namespace App\Http\Controllers;

use App\Http\Controllers\RequestController;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthSignUpRequest;
use App\Models\User;
use Carbon\Carbon;
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

        return $this->showOne($user, 201);
    }

    public function login(AuthLoginRequest $request)
    {
        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return $this->errorResponse('Credenciales incorrectas', 401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addMonth(1);
        }
        $token->save();

        $data = [
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse($tokenResult->token->expires_at)
                ->toDateTimeString()
        ];

        return response()->json($data);
    }

    public function logout()
    {
    }

    public function user()
    {
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\RequestController;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthSignUpRequest;
use App\Http\Resources\LoginResource;
use App\Http\Resources\MessageResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends RequestController
{

    public function signup(AuthSignUpRequest $request)
    {
        $params = $request->all();

        $user = User::create($params);

        $data = [
            'status' => 'success',
            'code' => 201,
            'message' => 'The user ' . $user->name . ' has been created correctly'
        ];

        return new MessageResource($data);
    }

    public function login(AuthLoginRequest $request)
    {

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {

            $error = [
                'status' => 'error',
                'code' => 401,
                'message' => 'The credentials are incorrect'
            ];

            return new MessageResource($error);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if (!$request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();

        $data = [
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse($tokenResult->token->expires_at)
                ->toDateTimeString()
        ];

        return new LoginResource($data);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        $data = [
            'status' => 'success',
            'code' => 200,
            'message' => 'Session closed successfully'
        ];
        return new MessageResource($data);
    }

    public function user(Request $request)
    {
        return new UserResource($request->user());
    }
}
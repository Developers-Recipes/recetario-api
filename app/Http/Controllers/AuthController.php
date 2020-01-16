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
        $user = new User([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);        
        $user->save();        
        return $this->showOne($user, 201);
    }
    public function login(AuthLoginRequest $request)
    {      
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }        
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;        
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }        
        $token->save();        
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
        ]);
    }
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();        
        return response()->json(['message' => 'Sesión cerrada correctamentet']);
    }
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}

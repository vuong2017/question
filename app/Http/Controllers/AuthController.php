<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\Auth\LoginRequest; 
use App\Http\Requests\Auth\RegisterRequest; 
use App\Http\Resources\AuthResource; 
use App\User; 
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(RegisterRequest $request) {
        $request['password'] = bcrypt($request->password);
        $user = new User($request->all());
        $user->save();
        $accessToken = $user->createToken('authToken')->accessToken;
        $user['access_token'] = $accessToken;
        return response([
            'data' => new AuthResource($user)
        ],Response::HTTP_CREATED);
    }

    public function login(LoginRequest $request) {
        if(!auth()->attempt($request->all())) {
            return response([
                'errors' => 'Account or password is incorrect'
            ],Response::HTTP_UNAUTHORIZED); 
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        auth()->user()['access_token'] = $accessToken;
        return response([
            'data' => new AuthResource(auth()->user())
        ],Response::HTTP_CREATED);
    }

    public function logout(Request $request) {
        dd("chua viet");
    }
}

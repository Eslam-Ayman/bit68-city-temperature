<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Auth\LoginResource;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!auth()->attempt($credentials))
        	return response([ 'status'=>'error', 'message'=>'Unauthenticated'], 401);

        return new LoginResource(auth()->user());
    }
}

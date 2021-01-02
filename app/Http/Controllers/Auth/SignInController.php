<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;

class SignInController extends Controller
{
    public function store(LoginFormRequest $request)
    {
    	if(!$token = auth()->attempt($request->only('email', 'password'))) {
    		return response()->json([
    			'errors' => [
    				'email' => ['Could not sign you in with those details']
    			]
    		], 422);
    	}

    	return response()->json([
    		'data' => compact('token')
    	]);
    }
}

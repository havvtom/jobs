<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Http\Resources\JobResourceCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth:api'])->except('store');
	}

    public function index(Request $request)
    {
    	return new JobResourceCollection($request->user()->jobs->sortBy(['created_at', 'desc']));
    }

    public function store(UserFormRequest $request)
    {
    	$user = User::create([
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => Hash::make($request->password)
    	]);

    	return new UserResource($user);
    }
}

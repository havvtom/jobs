<?php

use App\Http\Controllers\Auth\MeController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\SignOutController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
	Route::post('/login', [SignInController::class, 'store']);
	Route::get('/user', [MeController::class, 'store']);
	Route::post('/logout', [SignOutController::class, 'destroy']);
});

Route::get('jobs', [JobController::class, 'index']);
Route::get('jobs/{job}', [JobController::class, 'show']);
Route::post('jobs', [JobController::class, 'store']);
Route::patch('jobs/{job}', [JobController::class, 'update']);

Route::get('tags', [TagController::class, 'index']);
Route::post('tags', [TagController::class, 'store']);
Route::get('tags/{tag}', [TagController::class, 'show']);

Route::post('user', [UserController::class, 'store']);
Route::get('user/jobs', [UserController::class, 'index']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


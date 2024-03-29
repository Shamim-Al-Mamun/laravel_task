<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware(['api.auth'])->group(function () {
    // Your protected routes here
});

// Authentication routes
Route::post('/login', 'Auth\LoginController@login');
Route::post('/register', 'Auth\RegisterController@register');

// User Management routes
Route::middleware(['api.auth'])->group(function () {
    Route::get('/users', 'UserController@index');
    Route::post('/users', 'UserController@store');
    Route::get('/users/{user}', 'UserController@show');
    Route::put('/users/{user}', 'UserController@update');
    Route::delete('/users/{user}', 'UserController@destroy');
});

// User Role Permission routes
Route::middleware('auth:api')->get('/articles', 'ArticleController@index');
Route::middleware('auth:api')->post('/articles', 'ArticleController@store');
Route::middleware('auth:api')->put('/articles/{article}', 'ArticleController@update');
Route::middleware('auth:api')->delete('/articles/{article}', 'ArticleController@destroy');
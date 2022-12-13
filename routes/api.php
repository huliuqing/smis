<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function (){
    Route::post("/register", 'Api\\UserController@register');
    Route::post("/login", 'Api\\UserController@login');

    //这里使用passport中间件验证token
    Route::middleware('auth:api')->group(function (){
        Route::post("/user", 'Api\\UserController@info');
        Route::post("/logout", 'Api\\UserController@logout');
    });
});

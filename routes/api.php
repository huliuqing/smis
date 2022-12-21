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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('v1')->group(function () {
    Route::prefix("/auth")->group(function () {
        Route::post('/student/login', 'Api\\Student\\AuthController@login');
        Route::post('/login', 'Api\\Teacher\\AuthController@login');

        Route::middleware('auth:api')->group(function (){
            Route::post('/logout', 'Api\\Teacher\\AuthController@logout');
            Route::get('/profile', 'Api\\Teacher\\AuthController@profile');
        });
    });

    Route::prefix("user")->group(function () {
        Route::post("/register", 'Api\\UserController@register');
        Route::post('/create', 'Api\\UserController@create');


        Route::middleware('auth:api')->group(function (){
            Route::get("/browser", 'Api\\UserController@browser');
            Route::post("/invite", 'Api\\UserController@invite');

            Route::post('/follow/{id}', 'Api\\FollowerController@store');
            Route::delete('/follow/{id}', 'Api\\FollowerController@destory');
            Route::get('/follower', 'Api\\UserController@followers');
            Route::get('/following', 'Api\\UserController@followings');

            Route::get('/school', 'Api\\UserController@schools');
        });
    });

    Route::middleware('auth:api')->group(function () {
        Route::get('/school/browser', 'Api\\SchoolController@browser');
        Route::post('/school/join', 'Api\\SchoolController@join');
        Route::post('/school/store', 'Api\\SchoolController@store');

        Route::post('/notification/send', 'Api\\MessageNotificationController@send');
        Route::post('/chat/send', 'Api\\MessageChatController@send');
    });
});

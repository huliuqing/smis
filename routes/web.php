<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    return view('welcome');
    return view('smis');
});


// @TODO 删除测试消息推送和聊天 index 页面
Route::get('/notification/index', 'Api\\MessageNotificationController@index');
Route::get('/chat/index', 'Api\\MessageChatController@index');

Route::prefix('login')->group(function() {
    Route::get('/line/redirect', 'Api\\Auth\\LineController@redirect')->name('line.redirect');
    Route::get('/line/callback', 'Api\\Auth\\LineController@callback')->name('line.callback');
//    Route::get('/line/doBind', 'Api\\Auth\\LineController@doBind')->name('line.doBind');
});

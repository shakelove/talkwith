<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/', 'WelcomeController@index');

// ユーザ登録
Route::get('signup', 'Auth\AuthController@getRegister')->name('signup.get');
Route::post('signup', 'Auth\AuthController@postRegister')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\AuthController@getLogin')->name('login.get');
Route::post('login', 'Auth\AuthController@postLogin')->name('login.post');
Route::get('logout', 'Auth\AuthController@getLogout')->name('logout.get');


Route::group(['middleware' => 'auth'], function () {
    Route::resource('messages', 'MessagesController', ['only' => ['index', 'store']]);
    Route::resource('users', 'UsersController', ['only' => ['show', 'edit', 'update']]);
    
     
        Route::post('levels', 'UsersController@levels')->name('levels');
     
    
    Route::group(['prefix' => 'users/{id}'], function () { 
        Route::post('talks', 'UserTalksController@store')->name('user.talks');  //いらんかも
        Route::delete('unthanks', 'UserThanksController@destroy')->name('user.unthanks');  //いらん
        Route::get('talkers', 'UsersController@talkers')->name('users.talkers');
    });
});

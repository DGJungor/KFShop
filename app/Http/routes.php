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



Route::get('/', function() {

	return view('web/index');

});

Route::get('/home', function () {
	
   return view('web/nav/nav');

});

Route::group(['prefix' => 'admin'], function () {
    Route::get('goods', 'GoodsController@index');

    Route::get('Friend', 'FriendController@index');

    Route::get('Friend/edit{id}', 'FriendController@edit');



});

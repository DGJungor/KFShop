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





Route::get('/', function () {
	return view('welcome');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
	Route::get('goods', 'GoodsController@index');

	//后台反馈路由
	Route::get('feedback', 'AdminFeedback@index');

	//后台订单路由
	Route::get('orders', 'OrdersController@index');

	Route::get('Friend', 'FriendController@index');

    Route::get('Friend/edit{id}', 'FriendController@edit');


});


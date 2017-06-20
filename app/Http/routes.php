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
    Route::get('/', function () { return view('admin.public'); });

    Route::resource('goods', 'GoodsController');

    Route::resource('types', 'TypesController');

	Route::get('goods', 'GoodsController@index');

	//后台反馈路由
	Route::get('feedback', 'FeedbackController@index');

	//反馈信息详情
	Route::get('feedback/details','FeedbackController@details');


	//后台订单路由
	Route::get('orders', 'OrdersController@index');

	//后台友情链接路由
	Route::get('friends', 'FriendController@index');

	//前台用户路由
    Route::resource('users', 'usersController');

    //后台用户路由
    Route::resource('adminusers', 'AdminUsersController');

    


});


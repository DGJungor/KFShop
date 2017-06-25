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

	return view('web.index');
});

//前台购物车路由
Route::resource('cart','CartController');

//前台信息反馈路由
Route::resource('feedback','FeedbackController');

//前台评论
Route::get('comment', 'CommentController@index');


Route::group(['middleware'=>'adminid','namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', function () { return view('admin.index'); });

    Route::resource('goods', 'GoodsController');

    Route::resource('types', 'TypesController');

    Route::resource('friends', 'FriendController');

    Route::post('goods/ajax', 'GoodsController@ajax');

	Route::post('goods/upload', 'GoodsController@upload');

	//后台反馈组
	Route::resource('feedback','FeedbackController');

	//后台订单路由
	Route::resource('orders', 'OrdersController');

    //后台轮播图管理路由
    Route::resource('recommend', 'RecommendController');

	//后台友情链接路由
	Route::get('friends', 'FriendController@index');
	
	//前台用户路由
    Route::resource('users', 'UsersController');

    //后台用户路由
    Route::resource('admins', 'AdminUsersController');

    //后台评论路由
    Route::resource('comment', 'CommentController');

});

//后台登录首页路由
Route::get('/admin/login','Admin\AdminLoginController@login');

//后台执行登录路由
Route::post('/admin/dologin', 'Admin\AdminLoginController@dologin');




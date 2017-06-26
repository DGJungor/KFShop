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




//首页
Route::get('/', 'HomeController@index');

//前台购物车路由
Route::get('cart','CartController@index');

//前台信息反馈路由
Route::resource('feedback','FeedbackController');


Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', function () { return view('admin.public'); });
    //商品管理
    Route::resource('goods', 'GoodsController');
    //商品分类管理
    Route::resource('types', 'TypesController');

    Route::resource('friends', 'FriendController');

    //ajax请求数据
    Route::post('goods/ajax', 'GoodsController@ajax');

    //上传图片插件请求
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
    Route::resource('adminusers', 'AdminUsersController');


});


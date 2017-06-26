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
Route::resource('cart','CartController');
Route::post('cart/ajax','CartController@ajax');

//前台信息反馈路由
Route::resource('feedback','FeedbackController');

//前台评论
Route::get('comment', 'CommentController@index');

<<<<<<< HEAD
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', function () { return view('admin.public'); });
    //商品管理
=======

//Route::group(['middleware'=>'adminid','namespace' => 'Admin', 'prefix' => 'admin'], function () {
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', function () { return view('admin.index'); });

>>>>>>> 74ec2097e44d18857cc7ec3d5c867025401a4744
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
    Route::resource('admins', 'AdminUsersController');

    //后台评论路由
    Route::resource('comment', 'CommentController');

});

//后台登录首页路由
Route::get('/admin/login','Admin\AdminLoginController@login');

//后台执行登录路由
Route::post('/admin/dologin', 'Admin\AdminLoginController@dologin');




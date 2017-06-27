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

//前台购物车路由 --jun
Route::resource('cart','CartController');
Route::post('cart/ajax','CartController@ajax');

//前台信息反馈路由  --jun
Route::resource('feedback','FeedbackController');

//前台评论
Route::get('comment', 'CommentController@index');

//前台订单路由  --jun
Route::resource('orders','OrdersController');

//商品列表页
Route::get('goods_list', function () {

    return view('web.goods.list');
});
//商品详情页
Route::get('goods_details', function () {

    return view('web.goods.details');
});

// 登录页面
Route::get('/login', "LoginController@index");
// 执行登录
Route::post('/login', "LoginController@login");

// 退出登录
Route::get('/logout', "LoginController@logout");

// 注册页面
Route::get('/register', "RegisterController@index");
// 执行注册
Route::post('/register', "RegisterController@register");

Route::group(['prefix' => 'user'], function () {
    Route::get('/', "PersonalController@index");
});


//后台登录首页
Route::get('admin/login','Admin\LoginController@index');
//后台执行登录
Route::post('admin/login', 'Admin\LoginController@login');
//后台退出登录
Route::get('admin/logout', 'Admin\LoginController@logout');

// Route::group(['middleware'=>'auth:admin','namespace' => 'Admin', 'prefix' => 'admin'], function () {
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

	//后台反馈组 --jun
	Route::resource('feedback','FeedbackController');

	//后台订单路由  --jun
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

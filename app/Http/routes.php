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
Route::post('/ajax', 'HomeController@ajax');

//前台搜索控制器
Route::get('/search','SearchController@indexS');

//前台购物车路由 --jun
Route::get('cart/add/{id}', 'CartController@add');
Route::post('cart/ajax', 'CartController@ajax');
Route::post('cart/del', 'CartController@del');
Route::resource('cart', 'CartController');

//前台信息反馈路由  --jun
Route::resource('feedback', 'FeedbackController');

//前台评论
Route::resource('comment', 'CommentController');


//支付订单组  添加中间件 --Jun
Route::group(['middleware' => 'auth'], function () {

	//立即购买订单路由 --Jun
	Route::get('buynow/{id}', 'OrdersController@buynow');

	//前台订单路由  --jun
	Route::resource('orders', 'OrdersController');

	//前台支付路由 --jun
	Route::resource('pay', 'PayController');

});


//商品列表页
Route::get('goods_list/{types}', 'GoodsListController@goodsList');
Route::post('goods_list/ajax', 'GoodsListController@ajax');
Route::post('goods_list/recom', 'GoodsListController@recom');
//商品详情页
Route::get('details/{id}', 'HomeController@details');

// 前台登录页面
Route::get('/login', 'LoginController@index');
// 执行登录
Route::post('/login', 'LoginController@login');

// 退出登录
Route::get('/logout', 'LoginController@logout');

// 注册页面
Route::get('/register', 'RegisterController@index');
// 执行注册
Route::post('/register', 'RegisterController@register');
//邮箱验证
Route::get('service/validate_email/uid/{uid}/code/{code}', 'Service\ValidateController@validateEmail');

//个人中心


Route::group(['middleware' => 'auth','prefix' => 'user'], function () {
    Route::get('/', 'PersonalController@index');
    //个人资料
    Route::get('personal', 'PersonalController@index');
    //修改个人信息
    Route::post('editUserInfo', 'PersonalController@editUserInfo');
    //收货地址
    Route::get('address', 'PersonalController@address');
    //展示我的收货地址
    Route::post('ajax/showAddress', 'PersonalController@showAddress');
    //城市三级联动
    Route::post('ajax/showCity', 'PersonalController@showCity');
    //新增收货地址
    Route::post('ajax/createAddress', 'PersonalController@createAddress');
    //删除收货地址
    Route::post('ajax/delAddress', 'PersonalController@delAddress');
    //设置默认地址
    Route::post('ajax/setDefault', 'PersonalController@setDefault');
    //修改头像
    Route::get('ajax/uploadAvatar', 'PersonalController@uploadAvatar');

	//个人中心订单  --Jun
	Route::resource('/orders', 'UserOrdersController');

});


//前台注册用户名Ajax请求
Route::post('/ajax/user/register', 'RegisterController@checkName');


//后台登录首页
Route::get('admin/login', 'Admin\LoginController@index');
//后台执行登录
Route::post('admin/login', 'Admin\LoginController@login');
//后台退出登录
Route::get('admin/logout', 'Admin\LoginController@logout');


Route::group(['middleware' => 'auth:admin', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
//Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

	Route::get('/', function () {
		return view('admin.index');
	});
	//商品管理
	Route::resource('goods', 'GoodsController');
	//商品分类管理
	Route::resource('types', 'TypesController');

	Route::resource('friends', 'FriendController');

	//ajax请求数据
	Route::post('goods/ajax', 'GoodsController@ajax');

	Route::post('goods/del', 'GoodsController@del');

	//上传图片插件请求
	Route::post('goods/upload', 'GoodsController@upload');

	//后台反馈组 --jun
	Route::resource('feedback', 'FeedbackController');

	//后台订单路由  --jun
	Route::resource('orders', 'OrdersController');

	//后台轮播图管理路由
	Route::resource('recommend', 'RecommendController');

	//后台推荐管理路由
	Route::resource('shop_banner', 'Shop_BannerController');
	//后台友情链接路由
	Route::get('friends', 'FriendController@index');

	//前台用户路由
	Route::resource('member', 'MemberController');

	//后台管理员路由
	Route::resource('admins', 'AdminController');
	//ajax管理员唯一性验证
	Route::post('ajax/checkName', 'AdminController@checkName');

	//后台评论路由
	Route::resource('comment', 'CommentController');

});

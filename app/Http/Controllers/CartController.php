<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Overtrue\LaravelShoppingCart\Cart;

use Illuminate\Session\Store;

use Illuminate\Support\Facades\Redis;

class CartController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Cart $cart, Request $request, Store $store)
	{
		$store->start();

		//模拟添加购物车
//		$cart->add(37, 'Item name', 5, 100.00, ['color' => 'red', 'size' => 'M']);
//		$cart->add(127, 'foobar', 15, 100.00, ['color' => 'green', 'size' => 'S']);
//
//		$cart->clean();

//		$store->save();
		$session = $request->session()->get('cart');

//		foreach ($session['default'] as $k => $v) {
//			echo '<pre>';
//			echo $v;
//			echo $v['id'];
//		}

		//判断购物车中是否为空  空着跳转 提醒客户添加商品页面
		if(empty($session['default'])){
			return view('web.cart.null');
		}else{
			return view('web.cart.index', ['cartInfo' => $session['default']]);
		}


	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Cart $cart, $id)
	{
		//接收到购物车中 商品的列表id  删除
		$info = $cart->remove($id);

		return view('web.cart.index');

	}

	//购物车的ajax 控制器
	public function ajax(Request $request, Cart $cart,Store $store)
	{
		$num = (int)$request->num;
		$id = $request->id;
		$cart->update($id, $num);
		$store->save();

		return json_encode($num);
	}
}

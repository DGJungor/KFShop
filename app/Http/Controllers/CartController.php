<?php

namespace App\Http\Controllers;

use App\Events\Event;
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
//=====================================================================================
		//模拟添加购物车
//		$cart->add(37, 'Item name', 5, 100.00, ['color' => 'red', 'size' => 'M', 'picname' =>'2017-06-23-20-48-41-594d0e2959cee.jpg']);
//		$cart->add(127, 'foobar', 15, 100.00, ['color' => 'green', 'size' => 'S','picname' =>'2017-06-23-20-48-41-594d0e2959cee.jpg']);
//    	$store->save();
//		$cart->clean();
//======================================================================================
		//从session中获得
		$session = $request->session()->get('cart');

		//计算购物车中的商品数
		$count = count($session['default']);
		
		//判断购物车中是否为空  空着跳转 提醒客户添加商品页面
		if ($count == 0) {
			return view('web.cart.null');
		} else {

			//查询商品的信息
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

//		return Redirect::to("/dos/storeget");
//		return view('web.cart.index');
		return redirect('cart');

	}

	//购物车的ajax 控制器
	public function ajax(Request $request, Cart $cart)
	{
		$type = $request->type;
		$num = (int)$request->num;
		$id = $request->id;
		switch ($type) {
			case 'update':

				$cart->update($id, $num);
				$request->session()->save();
				return json_encode($type);
				break;

			case 'subtract':
				$cart->update($id, $num);
				$request->session()->save();
				return json_encode($type);
				break;

			case 'add':
				$cart->update($id, $num);
				$request->session()->save();
				return json_encode($type);
				break;

			default:
				break;

		}

	}

	public function del(Request $request, Cart $cart)
	{

		$id = $request->id;
		$cart->remove($id);
		return $id;
	}
}

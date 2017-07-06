<?php

namespace App\Http\Controllers;

use App\Events\Event;
use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
		$cart->clean();
		$cart->add(1, 'Item name', 5, 100.00, ['color' => 'red', 'size' => 'M', 'picname' =>'2017-06-27-01-21-08-595142844f4a3.jpg']);
		$cart->add(2, 'foobar', 15, 100.00, ['color' => 'green', 'size' => 'S','picname' =>'2017-06-27-01-28-37-5951444547728.jpg']);
//		$cart->add(17, 'foobar', 15, 100.00, ['color' => 'green', 'size' => 'S','picname' =>'2017-06-23-20-48-41-594d0e2959cee.jpg']);
    	$store->save();
//		$cart->clean();
//======================================================================================

		$user = Auth::user();
		dump($user);

		//从session中获得
		$session = $request->session()->get('cart');

		//计算购物车中的商品数
		$count = count($session['default']);

		//购物车总金额
		$cartTotal = $cart->total();

		//判断购物车中是否为空  空着跳转 提醒客户添加商品页面
		if ($count == 0) {
			return view('web.cart.null');
		} else {

			//查询商品的信息
			return view('web.cart.index', [
				'cartInfo' => $session['default'],
				'cartTotal' => $cartTotal
			]);
		}


	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Cart $cart, Request $request, Store $store,$id,$num)
	{
		//查询商品信息
//		dump($id);
//		dd($num);
//		DB::table('data_goods')->where('id','=',$id)->get();
//
//		$store->start();



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

		return redirect('cart');

	}

	//购物车的ajax 控制器
	public function ajax(Request $request, Cart $cart)
	{
		//获取类型
		$type = $request->type;

		//获取数量原数量
		$num  = (int)$request->num;

		//获取商品id
		$id   = $request->id;

		//根据动作类型 修改购物车中的数量
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

	//添加购物城的控制器
	public function add(Cart $cart, Request $request, Store $store,$id)
	{
		//获取商品数量
		$num = $_GET['num'];

		//查询商品信息
		$goodData = DB::table('data_goods')->where('id','=',$id)->get();

		//将商品信息存入基于redis1号数据库的session
		$store->start();
		$cart->add($id, $goodData[0]->{'goodname'}, $num, $goodData[0]->{'price'}, ['picname' =>$goodData[0]->{'picname'}]);
		$store->save();
		return view('web.cart.succeed');

	}
}

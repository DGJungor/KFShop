<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Overtrue\LaravelShoppingCart\Cart;

use Illuminate\Session\Store;

class OrdersController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		//

		return '这是首页订单首页路由';
//		return date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);

//		return date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request, Cart $cart)
	{

		//模拟数据
		$uid = 123;

//=====================================================

		//获取用户收货地址信息
		$address = \DB::table('data_address')->where('uid', $uid)->get();

		//获取结算前的全选按钮的值
		$allcart = $request->input('allcart');

		//随机生成一个 日期规则的 订单号
		$guid = date('Ymd') . substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);

		//初始化一个变量 供计算总价格
		$total = 0;

		//判断有无选中全选购物车
		if ($allcart) {


			//获取购车中所有商品
			$list = $cart->all();

			//更新购物车信息 并计算总价格
			foreach ($list as $v) {

				$newPrice = \DB::table('data_goods')->where('id', $v['id'])->select('price')->get();
				$v['price'] = $newPrice[0]->{'price'};
				$total += ($v['qty'] * $v['price']);
			}

		} else {

			//获取选中商品的rawid
			$data = $request->input('hobby');

			//计算购物车中商品种类数
			$count = count($data);

			//将选中的商品信息重新组合成数组
			for ($i = 0; $i < $count; $i++) {

				//获取购物车中 商品的rawid;
				$raw_id = $data[$i];
				//以rawid 为键  组合成 数组
				$list[$raw_id] = $cart->get($data[$i]);
			}

			//更新购物车信息 并甲酸总价格
			foreach ($list as $v) {

				$newPrice = \DB::table('data_goods')->where('id', $v['id'])->select('price')->get();
				$v['price'] = $newPrice[0]->{'price'};
				$total += ($v['qty'] * $v['price']);
			}
//			dump($list);

		}
		return view('web.orders.create',
			[
				'list' => $list,
				'guid' => $guid,
				'total' => $total,
				'address' => $address

			]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, Cart $cart)
	{
		//
//	    return 'store';
//	   $data =  $request->instance()->getContent();
//	   $data =  $request->input('hobby');

//	   $data = $request->all();
//		$count = count($data);
//	    dd($data[0]);

//	    dd($request);
		dd('12312312312');

//		$data = $cart->all();
//		dd($data);


		//获取结算前的全选按钮的值
		$allcart = $request->input('allcart');

		//判断有无选中全选购物车
		if ($allcart) {
			$guid = date('Ymd') . substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
			$user_id = "";


		} else {

		}

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
	public function destroy($id)
	{
		//
	}
}

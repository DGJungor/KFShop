<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use \Exception;
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
//=====================================================
		//模拟数据

		//用户id
		$uid = 123;

//=====================================================

		//获取用户收货地址信息
		$address = \DB::table('data_address')->where('uid', $uid)->get();

		//获取结算前的全选按钮的值
		$allcart = $request->input('allcart');

		//获取选中商品的rawid
		$data = $request->input('hobby');

		//随机生成一个 日期规则的 订单号
		$guid = date('Ymd') . substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);

		//初始化一个变量 供计算总价格
		$total = 0;


		//判断用户时候没有勾选商品   若没勾选商品则返回到原来的路由
		if ($allcart || $data) {

			//判断有无选中全选购物车
			if ($allcart) {


				//获取购车中所有商品
				$list = $cart->all();

				//更新购物车信息 并计算总价格
				foreach ($list as $v) {

					$newPrice   = \DB::table('data_goods')->where('id', $v['id'])->select('price')->get();
					$v['price'] = $newPrice[0]->{'price'};
					$total      += ($v['qty'] * $v['price']);
				}

			} else {

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

					$newPrice   = \DB::table('data_goods')->where('id', $v['id'])->select('price')->get();
					$v['price'] = $newPrice[0]->{'price'};
					$total      += ($v['qty'] * $v['price']);
				}
//			dump($list);

			}
			return view('web.orders.create',
				[
					'list'    => $list,
					'guid'    => $guid,
					'total'   => $total,
					'address' => $address

				]);
		} else {

			//返回到原来的页面
			return Redirect::back();

		}


	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, Cart $cart)
	{
//=============================================================
//
//		$info = $request->all();
//		dump($info);
//		dump(json_decode($request->ordersList));
//==============================================================

		//获取商品列表
		$ordersList = json_decode($request->ordersList);
		dump($ordersList);
		//获取订单号
		$guid = $request->guid;

		//获取地址信息id号
		$addressId = $request->addressId;

		//获取userid
		$user_id = '6866';

		// 使用数据库事务操作
		DB::beginTransaction();
		try {
			//初始化一个统计总金额的变量
			$total = 0;

			foreach ($ordersList as $v) {

				//查询数据库中的商品信息 确保价格正确
				$price = DB::table('data_goods')->where('id', $v->{'id'})->select('price')->first()->{'price'};

				//添加订单详情表信息
				DB::table('data_orders_details')->insert([
					'orders_guid'      => $addressId,
					'user_id'          => $user_id,
					'goods_id'         => $v->{'id'},
					'order_status'     => 1,
					'commodity_number' => $v->{'qty'},
					'cargo_price'      => $price
				]);

				//计算商品总金额
				$total += $price * $v->{'qty'};
			}

			//插入订单管理表数据
			DB::table('data_orders')->insert([
				'user_id'         => $user_id,
				'guid'            => $guid,
				'address_message' => '123',
				'address_id'      => $addressId,
				'order_status'    => 1,
				'total_amount'    => $total
			]);

			//提交事务
			DB::commit();
			return '下单成功';
		} catch (Exception $e) {
			DB::rollBack();
			throw $e;
			return '下单失败';
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

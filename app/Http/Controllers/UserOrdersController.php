<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Pagination\BootstrapThreePresenter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserOrdersController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
//=====================================================================
//
//
//
//=====================================================================


		//获取用户信息
		$user = Auth::user();

		//获取用户id
		$userId = $user['attributes']['id'];

		//定义一个用于存放q订单详情变量
		$userOD = null;

		$typeData = DB::select('select order_status,count(order_status) as status  from data_orders where user_id=? group by order_status', [$userId]);

		//整理查询数据 以便于在视图页输出
		$typeCount[1] = 0;
		$typeCount[2] = 0;
		$typeCount[3] = 0;
		$typeCount[4] = 0;
		$typeCount[5] = 0;
		foreach ($typeData as $v) {
			switch ($v->{'order_status'}) {

				//待付款
				case'1':
					$typeCount[1] = $v->{'status'};
					break;

				//待发货
				case'2':
					$typeCount[2] = $v->{'status'};

					break;

				//待收货
				case'3':
					$typeCount[3] = $v->{'status'};

					break;

				//待	评价
				case'4':
					$typeCount[4] = $v->{'status'};

					break;

				//完成
				case'5':
					$typeCount[5] = $v->{'status'};
					break;
				default:
					break;
			}
		}

		$userOrders = DB::table('data_orders')
			->where('user_id', '=', $userId)
			->orderBy('created_at', 'desc')
			->paginate(5);

		foreach ($userOrders as $v) {

			//查询订单详情表数据并连接相关商品的相关数据
			$userOD[$v->{'guid'}] = DB::table('data_orders_details')
				->where('orders_guid', '=', $v->{'guid'})
				->Leftjoin('data_goods', 'data_goods.id', '=', 'data_orders_details.goods_id')
				->select('data_orders_details.id', 'data_orders_details.goods_id', 'data_orders_details.commodity_number', 'data_orders_details.cargo_price', 'data_goods.goodname', 'data_goods.picname')
				->get();

			//添加中文状态
			switch ($v->{'order_status'}) {

				//待付款
				case'1':
					$v->{'statusCH'} = '待付款';
					break;

				//待发货
				case'2':
					$v->{'statusCH'} = '待发货';
					break;

				//待收货
				case'3':
					$v->{'statusCH'} = '待收货';
					break;

				//待	评价
				case'4':
					$v->{'statusCH'} = '待评价';
					break;

				//完成
				case'5':
					$v->{'statusCH'} = '完成';
					break;
				default:
					break;
			}


		}

		//返回视图页 并发送订单数据
		return view('web.orders.userIndex', [
			'username'=> $user['attributes']['username'],
			'typeCount'  => $typeCount,
			'userOrders' => $userOrders,
			'userOD'     => $userOD
		]);

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

		//获取订单编号
		$guid = $id;

		//获取动作类型
		$action =  $request->action;
		switch ($action){

			//将订单状态改为待评价
			case'confirm':
				DB::table('data_orders')
					->where('guid', $guid)
					->update(['order_status' => 4]);
				return view('web.orders.message', [
					'message' => '确认收货成功'
				]);
				break;

			case 'obligation':
				return view('web.pay.index', [
					'guid' => $guid
				]);
				break;

			default:
				break;

		}

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

<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Pagination\BootstrapThreePresenter;
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
//  测试用的模拟数据
//
		$userId = 6866;
//		dd( $bootstrap->render());
//
//
//
//	    $data =DB::table('data_orders')
//		    ->where('user_id','=',$userId)
//
//		    ->count();
//=====================================================================
//		$renderable->render();

		//获取用户id
//		$userId = '';

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

		//取出待付款订单
		$userOrders[1] = DB::table('data_orders')->where('user_id', '=', $userId)->where('order_status', '=', 1)->paginate(5);

		//取出待发货订单
		$userOrders[2] = DB::table('data_orders')->where('user_id', '=', $userId)->where('order_status', '=', 2)->paginate(5);

		//取出待收货订单
		$userOrders[3] = DB::table('data_orders')->where('user_id', '=', $userId)->where('order_status', '=', 3)->paginate(5);

		//取出待评价订单
		$userOrders[4] = DB::table('data_orders')->where('user_id', '=', $userId)->where('order_status', '=', 4)->paginate(5);

		//取出已完成订单
		$userOrders[5] = DB::table('data_orders')->where('user_id', '=', $userId)->where('order_status', '=', 5)->paginate(5);



		//返回视图页 并发送订单数据
		return view('web.orders.userIndex', [
			'typeCount'  => $typeCount,
			'userOrders' => $userOrders
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

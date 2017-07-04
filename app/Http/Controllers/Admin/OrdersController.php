<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{

	public function index()
	{

		//获取订单总数量
		$count = \DB::select('select count(*)  from data_orders');


		$data = \DB::table('data_orders')->Paginate(10);

		//输出订单页首页模板
		return view('admin.orders.index', compact('data', 'count'));

	}

	public function destroy($id)
	{
		$info = \DB::table('data_orders')->where('guid', '=', $id)->delete();
		if ($info) {
			return redirect('/admin/orders')->with(['success' => '删除成功！']);
		} else {
			return back()->with(['success' => '删除失败']);
		}

	}


	public function show($id)
	{
		//获取订单商品总数量
		$count = \DB::table('data_orders_details')->where('orders_guid', '=', $id)->count();

		//从数据库中取出订单号为$id的订单数据
		$data = \DB::table('data_orders_details')->where('orders_guid', '=', $id)->orderBy('created_at', 'desc')->get();

		return view('admin.orders.details', [
			'count' => $count,
			'data' => $data,
		]);
	}

	public function update(Request $request, $id)
	{
		//判断需要修改订单数据的数据
		$type = $request->type;

		//获得需要修改数据的订单ID
		$guid = $request->guid;
//		dd($request);

		//根据类型修改数据库订单数据
		switch ($type) {
			case 'SendOut':

				//修改数据局订单状态为已发货
				$info = \DB::table('data_orders')->where('guid', '=', $guid)->update(['order_status' => 3]);

				//判断是否修改成功  根据情况返回相应的信息
				if ($info) {
					return redirect('/admin/orders')->with(['success' => '发货成功！']);
				} else {
					return back()->with(['success' => '发货失败!']);
				}


				break;
			default:
				break;
		}
	}
}

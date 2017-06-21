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
		$data = \DB::table('data_orders_details')->where('orders_guid', '=', $id)->get();

		return view('admin.orders.details', [
			'count' => $count,
			'data' => $data,
		]);
	}
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    //
	public function index()
	{

		//获取订单总数量
		$count = \DB::select('select count(*)  from data_orders');


		$data = \DB::table('data_orders')->Paginate(10);

		//输出订单页首页模板
		return view('admin.orders.index',compact('data','count'));

	}
}

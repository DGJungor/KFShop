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

		$data = \DB::table('data_orders')->get();
//		dd($data);
//		return view();
		//输出订单页首页模板
		return view('admin.orders.index',compact('data'));

	}
}

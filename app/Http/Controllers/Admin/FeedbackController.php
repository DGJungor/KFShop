<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
	public function index()
	{

		//获取客户反馈信息
		$data = \DB::table('data_feedback')->orderBy('created_at', 'desc')->Paginate(10);

		//获取反馈信息总数量
		$count = \DB::select('select count(*)  from data_orders');


		//输出反馈页首页模板
		return view('admin.feedback.index', compact('data', 'count'));

	}

	public function details()
	{
		return view('admin.feedback.details');
	}


}

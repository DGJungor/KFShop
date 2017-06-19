<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminFeedback extends Controller
{
	public function index()
	{

		//获取客户反馈信息
		$data = \DB::table('data_feedback')->orderBy('created_at', 'desc')->take(10)->get();

		//输出反馈页首页模板
		return view('admin.feedback.index',compact('data'));

	}
}

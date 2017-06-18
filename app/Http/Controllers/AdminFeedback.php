<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminFeedback extends Controller
{
	public function index()
	{
		//输出反馈页首页模板
		return view('admin.feedback.index');

	}
}

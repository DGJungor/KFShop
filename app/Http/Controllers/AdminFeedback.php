<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminFeedback extends Controller
{
	public function index()
	{
		return view('admin.feedback.index');
//		return '2324';
	}
}

<?php

namespace App\Http\Controllers;
use App\Good;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class GoodsController extends Controller
{
    public function index()
    {
    	$post = Good::all();
    	return view('admin.goods.index', compact('post'));
    }
}

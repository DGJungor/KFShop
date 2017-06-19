<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FriendController extends Controller
{
	/**
	*显示友情链接列表
	*
	*/
    public function index()
    {
    	return view('admin.Friend.index');
    }
    /**
    *修改友情链接的方法
    *
    */
    public function edit()
    {

    }
    /**
    *添加友情链接的方法
    *
    */
    public function add()
    {

    }
     /**
    *删除友情链接的方法
    *
    */
     public function del()
     {
     	
     }
}

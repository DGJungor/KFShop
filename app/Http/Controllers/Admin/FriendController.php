<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class FriendController extends Controller
{
	/**
	*显示友情链接列表
	*
	*/
    public function index()
    {
        $data = \DB::table('data_friend_link')->get();
    	// dump($data);
        //访问友情链接首页
        return view('admin.friends.index', compact('data'));
    }
    /**
    *修改友情链接的方法
    *
    */
    public function edit($id)
    {
        //
    }
    /**
    *添加友情链接的方法
    *
    */
    public function add($id)
    {
        //
    }
     /**
    *删除友情链接的方法
    *
    */
     public function del($id)
     {
     	//
     }
}

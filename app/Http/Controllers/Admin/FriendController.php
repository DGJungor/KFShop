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
        return view('admin.friend.index', compact('data'));
    }
    /**
    *修改友情链接的方法
    *
    */
    // public function edit()
    // {

    // }
    // /**
    // *添加友情链接的方法
    // *
    // */
    // public function add()
    // {

    // }
    //  /**
    // *删除友情链接的方法
    // *
    // */
    //  public function del()
    //  {
     	
    //  }
}

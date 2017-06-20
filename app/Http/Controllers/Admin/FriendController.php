<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin\Friend;

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
        $type=['1'=>'图片', '2'=>'文字'];

        $status=['0'=>'启用', '1'=>'禁用'];
        
        return view('admin.friends.index', compact('data', 'type', 'status'));
    }
    /**
    *
    *链接修改页面
    */
    public function edit($id)
    {
        $dataObj = Friend::find($id);
        // dump($dataObj);
        return view('admin.friends.edit', compact('dataObj'));

    }
    /**
    *修改友情链接的方法
    *
    */
    public function updata(Request $request, $id)
    {
        
        dump($request->all());

    }
     /**
    *删除友情链接的方法
    *
    */
     // public function del($id)
     // {
     // 	//
     // }
}

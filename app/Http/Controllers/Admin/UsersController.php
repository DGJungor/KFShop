<?php

namespace App\Http\Controllers\Admin;

use App\Admin\UserInfo;
use App\Admin\UserRegister;
use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     * 前台用户列表页
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserInfo::orderby('uid','asc')->paginate(20);
        //跳转前台用户列表页
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * 前台用户添加
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * 前台用户信息展示
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //用户信息
        $user = UserInfo::find($id);
        $uid = $user['uid'];
        //用户注册信息
        $reg_info = UserRegister::find($uid);
        if (!$user or !$reg_info){
            return back();
        }
        //跳转用户信息页面
        return view('admin.users.show', compact(['user', 'reg_info']));

    }

    /**
     * Show the form for editing the specified resource.
     * 前台用户信息修改
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (UserInfo::where('id','=',$id)->update([
            'status'=>$request->status
        ]))
        {
            return redirect('/admin/users');
        } else {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * 删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //获取用户注册表id
        $uid = (UserInfo::find($id))['uid'];
        //删除用户信息
        if (UserInfo::destroy($id)){
            //删除用户注册表
            if (UserRegister::destroy($uid)){
                return redirect('/admin/users')->with(['msg' => '删除成功！！！']);
            }
        }


    }
}

<?php

namespace App\Http\Controllers\Admin;

use Hash;
use App\Admin\AdminUser;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{
    //加载后台登录界面
    public function login(){
        return view('admin.login');
    }

    //执行登录
    public function dologin(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        if(empty($username) || empty($password)){
            return back()->with('error', '用户名或密码不能为空！！！');
        }
        $admin= AdminUser::where('username','=',$username)->first();
        //判断用户是否存在
        if(empty($admin)){
            return back()->with('error','用户或密码错误！！！');
        }
        //验证密码
        if(Hash::check($password,$admin->password)){
            //将登录用户id存到闪存中
            session(['aid'=>$admin->id]);
            return redirect('admin/');
        } else {
            return back()->with('error', '密码错误！！！');
        }
    }
}

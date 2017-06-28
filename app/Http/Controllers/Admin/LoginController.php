<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //登录页面
    public function index()
    {
        return view('admin.login');
    }

    //执行登录
    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ],[
            'required' => ':attribute 是必填字段',
        ],[
            'username' => '用户名',
            'password' => '密码',
        ]);

        $user['username'] = request()->username;
        $user['password'] = request()->password;
        $user['status'] = 1;
        if (true == \Auth::guard('admin')->attempt($user)) {
            return redirect('admin');
        }

        return back()->withErrors('用户名或密码错误');
    }

    //退出登录
    public function logout()
    {
        \Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}

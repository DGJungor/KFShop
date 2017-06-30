<?php

namespace App\Http\Controllers\Admin;

use App\Admin\AdminUser;
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
            'name_email_tel' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha',
        ],[
            'required' => ':attribute 不能为空',
            'captcha' => ':attribute 错误',
        ],[
            'name_email_tel' => '用户名/邮箱/手机号',
            'password' => '密码',
            'captcha' => '验证码',
        ]);

        //判断登录字段
        $login = request()->name_email_tel;
        //手机号登录
        if ( preg_match("/^\d+$/", $login)) {
            $user['tel'] = $login;
        } else {
            //true为邮箱 false为用户名
            filter_var($login, FILTER_VALIDATE_EMAIL) ? $user['email'] = $login : $user['username'] = $login;
        }
        $user['password'] = request()->password;
        $user['status'] = 1;
        if (true == \Auth::guard('admin')->attempt($user)) {
            return redirect('admin');
        }

        return back()->with(['error' => '用户名和密码不匹配！！！'])->withInput();
    }

    //退出登录
    public function logout(Request $request)
    {
        $id = \Auth::guard('admin')->user()->id;
        $request->setTrustedProxies(array('10.32.0.1/16'));
        $ip = $request->getClientIp();
        AdminUser::where('id', '=', $id)->update(['last_login_ip' => $ip]);
        \Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}

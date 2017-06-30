<?php

namespace App\Http\Controllers\Admin;

use App\Admin\AdminUser;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class LoginController
 * @author liuzhiqi
 * @package App\Http\Controllers\Admin
 */
class LoginController extends Controller
{
    /**
     * 登录页面
     * @author liuzhiqi
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.login');
    }

    /**
     * 执行登录
     * @author liuzhiqi
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'username_tel' => 'required|alpha_dash',
            'password' => 'required',
            'captcha' => 'required|captcha',
        ],[
            'required' => ':attribute 不能为空',
            'alpha_dash' => '请输入正确的用户名/手机号',
            'captcha' => ':attribute 错误',
        ],[
            'name_email_tel' => '用户名/邮箱/手机号',
            'password' => '密码',
            'captcha' => '验证码',
        ]);

        //判断登录字段
        $login = request()->username_tel;
        //手机号登录
        if ( preg_match("/^\d+$/", $login)) {
            $user['tel'] = $login;
        } else {
            //用户名登录
            $user['username'] = $login;
        }
        $user['password'] = request()->password;
        $user['status'] = 1;
        if (true == \Auth::guard('admin')->attempt($user)) {
            return redirect('admin');
        }

        return back()->with(['error' => '用户名和密码不匹配！！！'])->withInput();
    }

    /**
     * 退出登录
     * @author liuzhiqi
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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

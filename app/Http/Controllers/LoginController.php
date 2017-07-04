<?php

namespace App\Http\Controllers;

use App\Admin\UserRegister;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class LoginController
 * @author liuzhiqi
 * @package App\Http\Controllers
 */
class LoginController extends Controller
{
    /**
     * 前台登录页面
     * @author liuzhiqi
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index()
    {
        if (\Auth::check()) {
            return redirect("/user/pensonal");
        }

        return view('web.login');
    }

    /**
     * 执行登录
     * @author liuzhiqi
     * @param Request $request
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
            'captcha' => '验证码错误',
        ],[
            'username_tel' => '用户名/手机号',
            'password' => '密码',
            'captcha' => '验证码',
        ]);

        //判断账号密码是否匹配
        $login = request()->username_tel;
        if (preg_match("/^\d+$/", $login)) {
            if (!UserRegister::where('tel',$login)->first()) {
                return back()-> with(['error' => '用户不存在！！！'])->withInput();
            }
            if (UserRegister::where('tel',$login)->first()->active != 1) {
                return back()->with(['error' => '请先前往您的邮箱激活账号！！！']);
            }
            //手机号登录
            $user['tel'] = $login;
        } else {
            if (!UserRegister::where('username',$login)->first()) {
                return back()-> with(['error' => '用户不存在！！！'])->withInput();
            }
            if (UserRegister::where('username',$login)->first()->active != 1) {
                return back()->with(['error' => '请先前往您的邮箱激活账号！！！']);
            }
            //用户名登录
            $user['username'] = $login;
        }
        $user['password'] = request()->password;
        if (true == \Auth::attempt($user)) {
            return redirect('/user/personal');
        }

        return back()->with(['error' => '用户名和密码不匹配！！！'])->withInput();
    }

    /**
     * 退出登录
     * @author liuzhiqi
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        \Auth::logout();
        return redirect('/');
    }

}

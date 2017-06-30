<?php

namespace App\Http\Controllers;

use App\Admin\UserRegister;
use Illuminate\Http\Request;

use App\Http\Requests;

class RegisterController extends Controller
{
    /**
     * 注册页面
     * @author liuzhiqi
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('web.register');
    }

    /**
     * @author liuzhiqi
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:3|max:20|alpha_dash|unique:data_users_register,username',
            'password' => 'required|confirmed',
            'email' => 'required',
            'tel' => 'required',
            'captcha' => 'required|captcha',
        ],[
            'required' => ':attribute 不能为空',
            'alpha_dash' => '用户名只能有字母、数字、下划线组成',
            'unique' => '用户已存在',
        ],[
            'username' => '用户名',
            'password' => '密码',
            'email' => 'E-mail',
            'tel' => '手机号码',
            'captcha' => '验证码',
        ]);

        $user['username'] = request('username');
        $user['password'] = bcrypt(request('password'));
        $user['email'] = request('email');
        $user['tel'] = request('tel');
        $user['register_ip'] = request()->getClientIp();
        if (UserRegister::create($user)){
            return redirect('/login')->with(['msg' => '注册成功！！！']);
        }

        return back()->with(['msg' => '网络异常'])->withInput();
    }


    public function checkName()
    {
        //
        if(UserRegister::where('username','=', 'admin1')->first()){
            dd(1);
        }
    }
}

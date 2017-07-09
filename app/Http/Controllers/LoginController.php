<?php

namespace App\Http\Controllers;

use App\Admin\UserRegister;
use App\Models\MsgResult;
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
     * 判断登录类型
     * @author liuzhiqi
     * @param $name
     * @return mixed
     */
    public function findLoginUser($name)
    {
        if (preg_match("/^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/", $name)) {
            $field = 'email';
        } elseif (preg_match("/13[123569]{1}\d{8}|15[1235689]\d{8}|188\d{8}/", $name)) {
            $field = 'tel';
        } else {
            $field = 'username';
        }
        $loginUser = UserRegister::where($field, '=', $name)->first();
        return $loginUser;
    }

    /**
     * 验证是否存在登录限制
     * @author liuzhiqi
     * @param Request $request
     * @return string
     */
    public function loginCheck(Request $request)
    {
        $login = $request->input('username_email_tel', '');
        $msg_result = new MsgResult;
        if ($login == null) {
            $msg_result->status = 1;
            return $msg_result->toJson();
        }
        $loginUser = $this->findLoginUser($login);
        if ($loginUser == null) {
            $msg_result->status =2;
            return $msg_result->toJson();
        }
        $error_number = $loginUser->login_error_number;
        $error_time = $loginUser->login_last_error_time;
        //判断最后登录错误时间
        if (strtotime($error_time) > time()) {
            $time = strtotime($error_time) - time();
            $msg_result->status = 3;
            $msg_result->message = $time;
            return $msg_result->toJson();
        } else {
            //判断登录错误次数
            if ($error_number == 5) {
                //限制登录时间失效,重置错误次数、错误时间
                UserRegister::where('id', '=', $loginUser->id)->update(['login_error_number' => 0, 'login_last_error_time' => '']);
                $msg_result->status = 4;
                return $msg_result->toJson();
            } elseif ($error_number > 1 && $error_number < 5) {
                $msg_result->status =5;
                return $msg_result->toJson();
            } else {
                $msg_result->status = 0;
                return $msg_result->toJson();
            }
        }

    }

    /**
     * 执行登录
     * @author liuzhiqi
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'username_email_tel' => 'required',
            'password' => 'required',
        ], [
            'required' => ':attribute 不能为空',
            'alpha_dash' => '请输入正确的用户名/手机号',
        ], [
            'username_email_tel' => '用户名/邮箱/手机号',
            'password' => '密码',
        ]);

        //判断账号密码是否匹配
        $login = request()->username_email_tel;
        $loginUser = $this->findLoginUser($login);
        if ($loginUser == null) {
            return back()->with(['error' => '用户不存在！！！'])->withInput();
        }
        //用户登录错误次数
        $error_number = $loginUser->login_error_number;
        //用户最后登录错误的时间
        $error_time = $loginUser->login_last_error_time;
        if ($loginUser->active != 1) {
            return back()->with(['error' => '请先前往您的邮箱激活账号！！！']);
        }
        //判断上次登录限制登录的时间
        if (strtotime($error_time) > time()) {
            $time = strtotime($error_time) - time();
            return back()->with(['error_time' => $time]);
        } else {
            if ($error_number == 5) {
                //限制登录时间失效,重置错误时间
                UserRegister::where('id', '=', $loginUser->id)->update(['login_error_number' => 0, 'login_last_error_time' => '']);
            } else {
                if ($error_number > 1 && $error_number < 5) {
                    $this->validate($request, [
                        'captcha' => 'required|captcha',
                    ], [
                        'required' => '验证码不能为空',
                        'captcha' => '验证码错误',
                    ]);
                }
                if (preg_match("/^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/", $login)) {
                    //手机号登录
                    $user['email'] = $login;
                } elseif (preg_match("/^\d{11}$/", $login)) {
                    //手机号登录
                    $user['tel'] = $login;
                } else {
                    //用户名登录
                    $user['username'] = $login;
                }
                $user['password'] = request()->password;
                if (true == \Auth::attempt($user) && $error_number < 5) {
                    //登录成功后重置密码错误次数和最后登录错误时间
                    UserRegister::where('id', '=', $loginUser->id)->update(['login_error_number' => 0, 'login_last_error_time' => '']);
                    return redirect('/user/personal');
                } else {
                    //密码错误,添加登录错误次数
                    if ($error_number < 5) {
                        //判断登录错误次数
                        $num = $error_number + 1;
                        UserRegister::where('id', '=', $loginUser->id)->update(['login_error_number' => $num]);
                        if ($num == 5) {
                            //密码错误5次后添加最后错误的时间
                            $login_last_error_time = date('Y-m-d H-i-s', time() + 30 * 60);
                            UserRegister::where('id', '=', $loginUser->id)->update(['login_last_error_time' => $login_last_error_time]);
                            return back()->withErrors(['error' => '密码错误次数过多,请在30分钟后登录', 'error_time' => 1800]);
                        }
                        if ($num >1 && $num < 5) {
                            return back()->withErrors(['error' => '用户名和密码不匹配！！！','code'=> 'code'])->withInput();
                        } else {
                            return back()->withErrors(['error' => '用户名和密码不匹配！！！'])->withInput();
                        }
                    }
                }
            }
        }
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

<?php

namespace App\Http\Controllers;

use App\Admin\UserRegister;
use App\Admin\UserInfo;
use App\Admin\TempEmail;
use Illuminate\Http\Request;
use App\Models\SendEmail;
use App\Tool\UUID;
use Mail;

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
            'captcha' => '验证码错误',
        ],[
            'username' => '用户名',
            'password' => '密码',
            'email' => 'E-mail',
            'tel' => '手机号码',
            'captcha' => '验证码',
        ]);

        return back()->with(['status' => '0','msg' => '注册成功,请到您的邮箱激活账号'])->withInput();

        $user['username'] = request('username');
        $user['password'] = bcrypt(request('password'));
        $user['email'] = request('email');
        $user['tel'] = request('tel');
        $user['register_ip'] = request()->getClientIp();
        $user_reg = UserRegister::create($user);
        if ($user_reg){
            $uuid = UUID::create();

            $user_info = new UserInfo;
            $user_info->username = $user_reg->username;
            $user_info->email = $user_reg->email;
            $user_info->tel = $user_reg->tel;
            $user_info->save();

            $send_email = new SendEmail;
            $send_email->to = request('email');
            $send_email->cc = 'Crossstarlight@163.com';
            $send_email->subject = '狂风商城验证';
            $send_email->content = 'http://ddemo.com/service/validate_email'
                . '?uid=' . $user_reg->id
                . '&code=' . $uuid;

            $tempEmail = new TempEmail;
            $tempEmail->uid = $user_reg->id;
            $tempEmail->code = $uuid;
            $tempEmail->deadline = date('Y-m-d H-i-s', time() + 24*60*60);
            $tempEmail->save();
            Mail::send('web.email_register', ['send_email' => $send_email], function ($m) use ($send_email) {

                $m->to($send_email->to, '尊敬的用户')
                  ->cc($send_email->cc)
                  ->subject($send_email->subject);

            });
            return back()->with(['success' => '注册成功,请到您的邮箱激活账号']);
        }

        return back()->with(['msg' => '网络异常'])->withInput();
    }


    public function checkName(Request $request)
    {
        $username = request()->input('username','');
        if ($username == null) {
            return 2;
        }
        if(UserRegister::where('username','=', $username)->first()){
            return 1;
        }
        return 0;
    }
}

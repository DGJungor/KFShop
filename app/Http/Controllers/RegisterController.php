<?php

namespace App\Http\Controllers;

use App\Admin\UserRegister;
use App\Admin\UserInfo;
use App\Admin\TempEmail;
use Illuminate\Http\Request;
use App\Models\SendEmail;
use App\Models\MsgResult;
use App\Tool\UUID;
use Mail;
use DB;

use App\Http\Requests;

/**
 * 用户注册控制器
 * Class RegisterController
 * @author liuzhiqi
 * @package App\Http\Controllers
 */
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
     * 注册验证
     * @author liuzhiqi
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:3|max:20|alpha_dash|unique:data_users_register,username',
            'password' => 'required|confirmed',
            'email' => 'required|unique:data_users_register,email',
            'tel' => 'required',
            'captcha' => 'required|captcha',
            'agree' => 'required',
        ], [
            'required' => ':attribute 不能为空',
            'alpha_dash' => '用户名只能有字母、数字、下划线组成',
            'unique' => ':attribute 已存在',
            'captcha' => '验证码错误',
        ], [
            'username' => '用户名',
            'password' => '密码',
            'email' => 'E-mail',
            'tel' => '手机号码',
            'captcha' => '验证码',
            'agree' => '协议',
        ]);

        $user['username'] = request('username');
        $user['password'] = bcrypt(request('password'));
        $user['email'] = request('email');
        $user['tel'] = request('tel');
        $user['register_ip'] = request()->getClientIp();
        $user_reg = UserRegister::create($user);
        if ($user_reg) {
            $uuid = UUID::create();

            $user_info = new UserInfo;
            $user_info->uid = $user_reg->id;
            $user_info->username = $user_reg->username;
            $user_info->email = $user_reg->email;
            $user_info->tel = $user_reg->tel;
            $user_info->save();

            //邮件内容
            $send_email = new SendEmail;
            $send_email->to = request('email');
            $send_email->cc = 'Crossstarlight@163.com';
            $send_email->subject = '狂风商城验证';
            $send_email->content = 'http://www.perter.xin/service/validate_email' . '/uid/' . $user_reg->id . '/code/' . $uuid;


            //发送邮件
            try {
                $flag = Mail::send('web.email_register', ['send_email' => $send_email], function ($m) use ($send_email) {

                    $m->to($send_email->to, '尊敬的用户')
                        ->cc($send_email->cc)
                        ->subject($send_email->subject);

                });
                //把验证码存放到TempEmail表中
                $tempEmail = new TempEmail;
                $tempEmail->uid = $user_reg->id;
                $tempEmail->code = $uuid;
                $tempEmail->deadline = date('Y-m-d H-i-s', time() + 24 * 60 * 60);
                $tempEmail->save();
                return back()->with(['success' => '注册成功,请到您的邮箱激活账号']);
            } catch (\Exception $e) {
                //发送失败
                //开启事务删除由于邮件发送失败添加的用户注册信息
                \DB::beginTransaction();
                $flag_info = UserInfo::destroy($user_info->id);
                if ($flag_info < 0) {
                    \DB::rollBack();
                }
                $flag_reg = UserRegister::destroy($user_reg->id);
                if ($flag_reg < 0) {
                    \DB::rollBack();
                }
                \DB::commit();
                return back()->with(['error' => '邮件发送失败']);
            }


        }

        return back()->with(['msg' => '网络异常'])->withInput();
    }

    /**
     * 用户名唯一性验证
     * @author liuzhiqi
     * @param Request $request
     * @return string
     */
    public function checkName(Request $request)
    {
        $msg_result = new MsgResult;
        $username = request()->input('username', '');
        if ($username == null) {
            $msg_result->status = 1;
            $msg_result->message = '不能为空';
            return $msg_result->toJson();
        } elseif (!preg_match("/^[A-Za-z][A-Za-z1-9_-]{2,20}$/", $username)) {
            $msg_result->status = 2;
            $msg_result->message = '';
            return $msg_result->toJson();
        } elseif (UserRegister::where('username', '=', $username)->first()) {
            $msg_result->status = 3;
            $msg_result->tip = 'username';
            $msg_result->message = '用户已注册';
            return $msg_result->toJson();
        } else {
            $msg_result->status = 0;
            $msg_result->tip = 'username';
            $msg_result->message = '可以注册';
            return $msg_result->toJson();
        }
    }

    /**
     * 注册邮箱唯一性
     * @author liuzhiqi
     * @param Request $request
     * @return string
     */
    public function checkEmail(Request $request)
    {
        $msg_result = new MsgResult;
        $email = request()->input('email', '');
        if ($email == null) {
            $msg_result->status = 1;
            $msg_result->message = '不能为空';
            return $msg_result->toJson();
        } elseif (!preg_match("/^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/", $email)) {
            $msg_result->status = 2;
            $msg_result->tip = 'email';
            $msg_result->message = '';
            return $msg_result->toJson();
        } elseif (UserRegister::where('email', '=', $email)->first()) {
            $msg_result->status = 3;
            $msg_result->tip = 'email';
            $msg_result->message = '邮箱已注册';
            return $msg_result->toJson();
        } else {
            $msg_result->status = 0;
            $msg_result->tip = 'email';
            $msg_result->message = '邮箱可以注册';
            return $msg_result->toJson();
        }
    }

    /**
     * 注册手机号唯一性
     * @author liuzhiqi
     * @param Request $request
     * @return string
     */
    public function checkTel(Request $request)
    {
        $msg_result = new MsgResult;
        $tel = $request->input('tel', '');
        if ($tel == null) {
            $msg_result->status = 1;
            $msg_result->tip = 'tel';
            $msg_result->message = '不能为空';
            return $msg_result->toJson();
        } elseif (!preg_match("/13[123569]{1}\d{8}|15[1235689]\d{8}|188\d{8}/", $tel)) {
            $msg_result->status = 2;
            $msg_result->tip = 'tel';
            $msg_result->message = '';
            return $msg_result->toJson();
        } elseif (UserRegister::where('tel', '=', $tel)->first()) {
            $msg_result->status = 3;
            $msg_result->tip = 'tel';
            $msg_result->message = '手机已注册';
            return $msg_result->toJson();
        } else {
            $msg_result->status = 0;
            $msg_result->tip = 'tel';
            $msg_result->message = '手机可以注册';
            return $msg_result->toJson();
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Admin\UserRegister;
use App\Admin\ForgetPasswordCode;
use App\Models\MsgResult;
use Illuminate\Http\Request;
use App\Models\SendEmail;
use Mail;

use App\Http\Requests;

/**
 * 用户安全中心控制器
 * Class SafetyController
 * @author liuzhiqi
 * @package App\Http\Controllers
 */
class SafetyController extends Controller
{
    /**
     * 重置密码界面
     * @author liuzhiqi
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function forgetPage()
    {
        return view('web.safety.forget');
    }

    /**
     * 发送邮箱验证码
     * @author liuzhiqi
     * @param Request $request
     * @return string
     */
    public function sendEmailCode(Request $request)
    {
        $msg_result = new MsgResult;
        $username = $request->input('username', '');
        $email = $request->input('email', '');
        if ($username == '' || $email == '') {
            $msg_result->status = 1;
            $msg_result->message = '数据异常';
            return $msg_result->toJson();
        }
        $uid = UserRegister::where('username', '=', $username)->first()->id;
        $code = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
        for ($i = 0; $i < 6; $i++) {
            $code .= $pattern{mt_rand(0, 61)}; //生成php随机数
        }
        //邮件内容
        $send_email = new SendEmail;
        $send_email->to = $email;
        $send_email->cc = 'Crossstarlight@163.com';
        $send_email->subject = '狂风商城邮箱验证码';
        $send_email->content = '您重置密码的验证码是 ' . $code . ',10分钟内有效。';


        //发送邮件
        try {
            $flag = Mail::send('web.email_code', ['send_email' => $send_email], function ($m) use ($send_email) {

                $m->to($send_email->to, '尊敬的用户')
                    ->cc($send_email->cc)
                    ->subject($send_email->subject);

            });
            //判断邮件是否发送成功
            if ($flag) {
                //把验证码存放到TempEmail表中
                $pwdCode = new ForgetPasswordCode;
                $pwdCode->uid = $uid;
                $pwdCode->code = $code;
                $pwdCode->deadline = date('Y-m-d H-i-s', time() + 10 * 60);
                $pwdCode->save();
                //返回
                $msg_result->status = 0;
                $msg_result->message = '发送成功';
                return $msg_result->toJson();
            } else {
                $msg_result->status = 2;
                $msg_result->message = '发送失败';
                return $msg_result->toJson();
            }
        } catch (\Exception $e) {
            $msg_result->status = 2;
            $msg_result->message = '发送失败';
            return $msg_result->toJson();
        }

    }

    /**
     * 重置密码
     * @author liuzhiqi
     * @param Request $request
     * @return string
     */
    public function resetPassword(Request $request)
    {
        $username = $request->input('username', '');
        $code = $request->input('code', '');
        $password = $request->input('password', '');
        $password_confirm = $request->input('password_confirm', '');
        $msg_result = new MsgResult;
        if ($username == '' || $code == '' || $password == '' || $password_confirm == '') {
            $msg_result->status = 1;
            $msg_result->message = '数据异常';
            $msg_result->toJson();
        }
        //密码验证
        if ($password != $password_confirm) {
            $msg_result->status = 2;
            $msg_result->message = '两次密码不一致';
            return $msg_result->toJson();
        }
        if (!preg_match("/^(?![0-9]+$)(?![a-zA-Z]+$)(?!([^(0-9a-zA-Z)]|[\(\)])+$)([^(0-9a-zA-Z)]|[\(\)]|[a-zA-Z]|[0-9]){6,60}$/",$password)) {
            $msg_result->status = 3;
            $msg_result->message = '密码过于简单';
            $msg_result->toJson();
        }
        if (strlen($password) > 60) {
            $msg_result->status = 3;
            $msg_result->message = '密码长度超出限制';
            $msg_result->toJson();
        }
        if (strlen($password) < 6 ){
            $msg_result->status = 3;
            $msg_result->message = '密码不能小于6个字符';
            $msg_result->toJson();
        }
        $user = UserRegister::where('username','=',$username)->first();
        if ($user == null) {
            $msg_result->status = 3;
            $msg_result->message = '验证异常';
            $msg_result->toJson();
        }
        $pwdCode = ForgetPasswordCode::where('uid','=',$user->id)->orderby('deadline','desc')->first();
        if ($pwdCode == null) {
            $msg_result->status = 5;
            $msg_result->message = '非法操作';
            $msg_result->toJson();
        }
        //判断验证码
        if (strcasecmp($code,$pwdCode->code) == 0) {
            if (time() > strtotime($pwdCode->deadline)) {
                $msg_result->status = 6;
                $msg_result->message = '该验证码已失效';
                return $msg_result->toJson();
            }
            //重置密码
            $newpassword = bcrypt($password);
            if (UserRegister::where('id','=',$user->id)->update(['password' => $newpassword])) {
                //重置成功令该用户的所有验证码失效
                ForgetPasswordCode::where('uid','=',$user->id)->update(['deadline' => '']);
                $msg_result->status = 0;
                $msg_result->message = '修改成功';
                return $msg_result->toJson();
            } else {
                $msg_result->status = 7;
                $msg_result->message = '修改失败';
                return $msg_result->toJson();
            }
            $msg_result->status = 8;
            $msg_result->message = '该验证码已失效';
            return $msg_result->toJson();
        } else {
            $msg_result->status = 9;
            $msg_result->message = '该验证码已失效';
            return $msg_result->toJson();
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Admin\UserRegister;
use App\Admin\ForgetPasswordCode;
use App\Models\MsgResult;
use Illuminate\Http\Request;
use App\Models\SendEmail;
use Mail;

use App\Http\Requests;

class SafetyController extends Controller
{
    public function forgetPage()
    {
       /* $code='';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
        for($i = 0; $i < 6; $i ++) {
            $code .= $pattern {mt_rand ( 0, 61 )}; //生成php随机数
        }
        if ('adcd' == 'ABCD') {
            echo 1;
        }
        if (strcasecmp('abcd','ABCD') == 0){
            echo 1;
        }
        dd($code);*/
        return view('web.safety.forget');
    }

    public function sendEmailCode(Request $request)
    {
        $msg_result = new MsgResult;
        $username = $request->input('username', '');
        $email = $request->input('email','');
        if ($username == '' || $email == '') {
            $msg_result->status = 1;
            $msg_result->message = '数据异常';
            return $msg_result->toJson();
        }
        $uid = UserRegister::where('username','=',$username)->first()->id;
        $code='';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
        for($i = 0; $i < 6; $i ++) {
            $code .= $pattern {mt_rand ( 0, 61 )}; //生成php随机数
        }
        //邮件内容
        $send_email = new SendEmail;
        $send_email->to = $email;
        $send_email->cc = 'Crossstarlight@163.com';
        $send_email->subject = '狂风商城邮箱验证码';
        $send_email->content = '您重置密码的验证码是 ' . $code . ',10分钟内有效。';

        //把验证码存放到TempEmail表中
        $pwdCode = new ForgetPasswordCode;
        $pwdCode->uid = $uid;
        $pwdCode->code = $code;
        $pwdCode->deadline = date('Y-m-d H-i-s', time() + 10*60);
        $pwdCode->save();
        //发送邮件
        Mail::send('web.email_code', ['send_email' => $send_email], function ($m) use ($send_email) {

            $m->to($send_email->to, '尊敬的用户')
                ->cc($send_email->cc)
                ->subject($send_email->subject);

        });

        $msg_result->status = 0;
        $msg_result->message = '发送成功';
        return $msg_result->toJson();
    }
}

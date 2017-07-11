<?php

namespace App\Http\Controllers\Service;

use Illuminate\Http\Request;

use App\Admin\UserRegister;
use App\Admin\TempEmail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ValidateController extends Controller
{
    //
    public function validateEmail(Request $request)
    {
        $uid = $request->uid;
        $code = $request->code;
        if($uid == '' || $code == '') {
            return '验证异常';
        }

        $tempEmail = TempEmail::where('uid', $uid)->first();
        if($tempEmail == null) {
            return '验证异常';
        }

        if ($tempEmail->code == $code) {
            if (time() > strtotime($tempEmail->deadline)) {
                //开启事务删除由于超过时间未激活用户注册信息
                \DB::beginTransaction();
                $flag_info = UserInfo::destroy($uid);
                if ($flag_info < 0) {
                    \DB::rollBack();
                }
                $flag_reg = UserRegister::destroy($uid);
                if ($flag_reg < 0) {
                    \DB::rollBack();
                }
                \DB::commit();
                return '该链接已失效';
            }

            $user = UserRegister::find($uid);
            $user->active = 1;
            $user->save();

            return redirect('/login')->with(['success' => '账号成功激活！！！']);
        } else {
            return '该链接已失效';
        }
    }
}

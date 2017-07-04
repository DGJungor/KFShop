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
                return '该链接已失效';
            }

            $user = UserRegister::find($uid);
            $user->active = 1;
            $user->save();

            return redirect('/login');
        } else {
            return '该链接已失效';
        }
    }
}

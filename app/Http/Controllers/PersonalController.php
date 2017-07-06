<?php

namespace App\Http\Controllers;

use App\Admin\UserRegister;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin\UserInfo;
use App\Admin\Address;
use App\Models\MsgResult;
use Auth;
use DB;

class PersonalController extends Controller
{
    /**
     * 个人中心首页
     * @author liuzhiqi
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $id = Auth::user()->id;
        $userinfo = UserRegister::find($id)->userInfo[0];
        return view('web.personal.index', compact('userinfo'));
    }

    /**
     * 收货地址界面
     * @author liuzhiqi
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function address()
    {
        return view('web.personal.address');
    }

    public function showAddress(Request $request)
    {
        $id = $request->id;
        $data = \DB::table('district')->where('upid', '=', $id)->get();
        return $data;
    }

    public function createAddress(Request $request)
    {
        $data['uid'] = $request->input('id', '');
        $data['name'] = $request->input('name', '');
        $data['tel'] = $request->input('tel', '');
        $data['address'] = $request->input('address', '');
        $data['det_address'] = $request->input('det_address', '');
        if($address=Address::create($data)) {
            return $address;
        }
        return 2;
    }

    public function editUserInfo(Request $request)
    {
        $id = $request->input('id', '');
        $realname = $request->input('realname', '');
        $id_number = $request->input('id_number', '');
        $sex = $request->input('sex', '');
        $birthday = $request->input('birthday', '');

        $msg_result = new MsgResult;


        if ($id == null) {
            $msg_result->status = 1;
            $msg_result->message = '数据提交失败';
            return $msg_result->toJson();
        }
        if (strlen($realname) > 20) {
            $msg_result->status = 2;
            $msg_result->message = '真实姓名错误';
            return $msg_result->toJson();
        }
        if (strlen($id_number) > 18) {
            $msg_result->status = 3;
            $msg_result->message = '身份证号码错误';
            return $msg_result->toJson();
        }
        if (UserInfo::where('id','=',$id)->update(['realname' => $realname, 'id_number' => $id_number, 'sex' => $sex, 'birthday' => $birthday])) {
            $msg_result->status = 0;
            $msg_result->message = '修改成功';
            return $msg_result->toJson();
        }
    }

}

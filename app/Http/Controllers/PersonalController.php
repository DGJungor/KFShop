<?php

namespace App\Http\Controllers;

use App\Admin\UserRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin\UserInfo;
use App\Admin\Address;
use App\Models\MsgResult;
use Auth;
use DB;

/**
 * 个人中心控制器
 * Class PersonalController
 * @author liuzhiqi
 * @package App\Http\Controllers
 */
class PersonalController extends Controller
{
    /**
     * 个人中心首页
     * @author liuzhiqi
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //获取用户信息,返回到个人中心视图
        $id = Auth::user()->id;
        $userinfo = UserRegister::find($id)->userInfo[0];
        return view('web.personal.index', compact('userinfo'));
    }

    /**
     * 修改头像视图
     * @author liuzhiqi
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUpload()
    {
        return view('web.public.uploadImg');
    }

    /**
     * 修改头像
     * @author liuzhiqi
     * @param Request $request
     * @return string
     */
    public function uploadAvatar(Request $request)
    {
        //判断是否有上传图片
        $id = $request->input('id', '');
        if ($file = $request->hasFile('avatar') && $id != null) {
            $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . 'jpg';
            //保存图片
            Image::make(Input::file('avatar'))->resize(80, 80)->save('uploads/user_pic/' . $filename);
            $old_picname = UserInfo::where('uid', '=', $id)->first(['avatar']);
            //判断新头像是否添加成功
            if (UserInfo::where('uid', '=', $id)->update(['avatar' => $filename])) {
                //如果有旧头像就删除
                if ($old_picname !=null) {
                    @unlink('uploads/user_pic/' . $old_picname['avatar']);
                }
            } else {
                //新头像添加失败删除文件
                @unlink('uploads/user_pic/' . $filename);
            }
            return $filename;
        }
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

    /**
     * 城市三级联动
     * @author liuzhiqi
     * @param Request $request
     * @return mixed
     */
    public function showCity(Request $request)
    {
        //获取省/市/县区的信息
        $id = $request->id;
        $data = \DB::table('district')->where('upid', '=', $id)->get();
        return $data;
    }

    /**
     * 展示个人收货地址
     * @author liuzhiqi
     * @param Request $request
     * @return int
     */
    public function showAddress(Request $request)
    {
        $id = $request->id;
        //判断是否有收货地址
        if (Address::count('uid', '=', $id) < 1) {
            return 2;
        }
        //获取收货地址
        $myAddress = Address::where('uid', '=', $id)->get();
        return $myAddress;
    }

    /**
     * 新增收货地址
     * @author liuzhiqi
     * @param Request $request
     * @return int|static
     */
    public function createAddress(Request $request)
    {
        //判断收货地址是否超出限制
        if (Address::count('uid', '=', \Auth::user()->id) < 21) {
            $data['uid'] = $request->input('id', '');
            $data['name'] = $request->input('name', '');
            $data['tel'] = $request->input('tel', '');
            $data['address'] = $request->input('address', '');
            $data['det_address'] = $request->input('det_address', '');
            //判断收货地址是否添加成功
            if ($address = Address::create($data)) {
                return $address;
            }
        }
        return 2;
    }

    /**
     * 删除收货地址
     * @author liuzhiqi
     * @param Request $request
     * @return int
     */
    public function delAddress(Request $request)
    {
        //获取收货地址id
        $id = $request->input('id', '');
        if ($id == null) {
            return 1;
        }
        //删除收货地址
        if (Address::destroy($id)) {
            return 0;
        }
        return 1;
    }

    /**
     * 更改默认收货地址
     * @author liuzhiqi
     * @param Request $request
     * @return int
     */
    public function setDefault(Request $request)
    {
        $id = $request->input('id', '');
        $uid = $request->input('uid', '');
        if ($id == null ||$uid == null) {
            return 1;
        }
        //更改默认收货地址
        if (Address::where('uid','=',$uid)->where('status','=',2)->first()){
            if (Address::where('uid', '=', $uid)->where( 'status', '=', 2)->update(['status'=> 1]) && Address::where('id', '=', $id)->update(['status' => 2])) {
                return 0;
            } else {
                return 1;
            }
        } else {
            if (Address::where('id', '=', $id)->update(['status' => 2])) {
                return 0;
            } else {
                return 1;
            }
        }

        return 1;
    }

    /**
     * 个人信息修改
     * @author liuzhiqi
     * @param Request $request
     * @return string
     */
    public function editUserInfo(Request $request)
    {
        //获取用户所要修改的信息
        $id = $request->input('id', '');
        $realname = $request->input('realname', '');
        $id_number = $request->input('id_number', '');
        $sex = $request->input('sex', '');
        $birthday = $request->input('birthday', '');

        $msg_result = new MsgResult;

        //判断是否获取到用户id
        if ($id == null) {
            $msg_result->status = 1;
            $msg_result->message = '数据提交失败';
            return $msg_result->toJson();
        }
        //判断真实姓名
        if (strlen($realname) > 20) {
            $msg_result->status = 2;
            $msg_result->message = '真实姓名错误';
            return $msg_result->toJson();
        }
        //判断身份证号码
        if (strlen($id_number) > 18) {
            $msg_result->status = 3;
            $msg_result->message = '身份证号码错误';
            return $msg_result->toJson();
        }
        //判断是否修改成功
        if (UserInfo::where('id','=',$id)->update(['realname' => $realname, 'id_number' => $id_number, 'sex' => $sex, 'birthday' => $birthday])) {
            $msg_result->status = 0;
            $msg_result->message = '修改成功';
            return $msg_result->toJson();
        }
    }

    /**
     * 密码修改界面
     * @author liuzhiqi
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function password()
    {
        return view('web.safety.modifyPassword');
    }

    /**
     * 修改密码
     * @author liuzhiqi
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function modifyPassword(Request $request)
    {
        $id = $request->input('id', '');
        $oldpassword = $request->input('oldpassword', '');
        $newpassword = $request->input('newpassword', '');
        $password_confirmation = $request->input('password_confirmation', '');
        if ($id == null) {
            return back()->with(['error' => '非法操作！！！']);
        }
        //判断两次输入的密码
        if ($newpassword != $password_confirmation) {
            return back()->with(['error' => '两次密码不一样！！！']);
        }
        //判断原密码
        if (!Hash::check($oldpassword,UserRegister::where('id','=',$id)->first()->password)) {
            return back()->with(['error' => '原密码错误！！！']);
        }
        $password = bcrypt($newpassword);
        //修改密码
        if (UserRegister::where('id','=',$id)->update(['password'=>$password])) {
            return back()->with(['success' => '修改成功']);
        } else {
            return back()->with(['fail' => '修改失败']);
        }
    }

}

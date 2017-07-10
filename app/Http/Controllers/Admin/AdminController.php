<?php

namespace App\Http\Controllers\Admin;

use App\Admin\AdminUser;
use Illuminate\Http\Request;

use App\Models\MsgResult;
use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * //管理员控制器
 * Class AdminController
 * @author liuzhiqi
 * @package App\Http\Controller\Admin
 */
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * 管理员列表
     * @author liuzhiqi
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = AdminUser::paginate(20);
         return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     * @author liuzhiqi
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 添加管理员
     * @author liuzhiqi
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $username = $request->input('username', '');
        $password = $request->input('password', '');
        $password_confirmation = $request->input('password_confirmation', '');
        $email = $request->input('email', '');
        $tel = $request->input('tel', '');
        $type = $request->input('type', '1');
        $status = $request->input('status', '1');

        $msg_result = new MsgResult;

        if ($username == '' || strlen($username) < 2) {
            $msg_result->status = 1;
            $msg_result->message = '用户名不能小于2个字符';
            return $msg_result->toJson();
        }elseif (strlen($username) > 20) {
            $msg_result->status = 1;
            $msg_result->message = '用户名不能超过20个字符';
            return $msg_result->toJson();
        }
        if ($password == '' || strlen($password) < 6) {
            $msg_result->status = 2;
            $msg_result->message = '密码不能小于6个字符';
            return $msg_result->toJson();
        } elseif (strlen($password) > 24) {
            $msg_result->status = 2;
            $msg_result->message = '密码不能超过20个字符';
            return $msg_result->toJson();
        }
        if ($password_confirmation == '' || strlen($password_confirmation) < 6) {
            $msg_result->status = 3;
            $msg_result->message = '密码不能小于6个字符';
            return $msg_result->toJson();
        } elseif (strlen($password_confirmation) > 24) {
            $msg_result->status = 3;
            $msg_result->message = '密码不能超过20个字符';
            return $msg_result->toJson();
        }
        if ($password != $password_confirmation) {
            $msg_result->status = 4;
            $msg_result->message = '两次密码不相同';
            return $msg_result->toJson();
        }
        if ($email == ''){
            $msg_result->status = 5;
            $msg_result->message = '邮箱不能为空';
            return $msg_result->toJson();
        } elseif (!preg_match("/^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/", $email)) {
            $msg_result->status = 5;
            $msg_result->message = '邮箱格式有误';
            return $msg_result->toJson();
        }
        if ($tel == '') {
            $msg_result->status = 6;
            $msg_result->message = '手机号不能为空';
            return $msg_result->toJson();
        } elseif (!preg_match("/13[123569]{1}\d{8}|15[1235689]\d{8}|188\d{8}/", $tel)) {
            $msg_result->status = 6;
            $msg_result->message = '手机号格式有误';
            return $msg_result->toJson();
        }


        $admin = new AdminUser;
        $admin->username = $username;
        $admin->password = bcrypt($password);
        $admin->email = $email;
        $admin->tel = $tel;
        $admin->type = $type;
        $admin->status = $status;
        $admin->avatar = '/uploads/admin_pic/admin_avatar_default.jpg';
        $admin->save();

        $msg_result->status = 0;
        $msg_result->message = '添加成功';
        return $msg_result->toJson();
    }

    /**
     * Display the specified resource.
     * 管理员信息展示页面
     * @author liuzhiqi
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //管理员信息
        $admin = AdminUser::findorFail($id);
        //判断角色类型
        if (\Auth::guard('admin')->user()->type != 0) {
            $power = 'disabled';
            return view('admin.admins.show', compact(['admin', 'power']));
        }
        return view('admin.admins.show', compact('admin'));

    }

    /**
     * Show the form for editing the specified resource.
     * 管理员信息修改页面
     * @author liuzhiqi
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //管理员信息修改
        $admin = AdminUser::findorFail($id);
        //判断角色类型
        if (\Auth::guard('admin')->user()->type != 0) {
            $power = 'disabled';
            return view('admin.admins.show', compact(['admin', 'power']));
        }
        return view('admin.admins.show', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     * 修改管理员信息
     * @author liuzhiqi
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (AdminUser::where('id', '=', $id)->update(['email'=>$request->email, 'tel'=>$request->tel])) {
            return redirect('/admin/admins');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * 删除管理员
     * @author liuzhiqi
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( \Auth::guard('admin')->user()->type == 0) {
            if (AdminUser::destroy($id)) {
                return redirect('admin/admins')->with(['msg' => '删除成功！！！']);
            }
        }
        return back()->with(['msg' => '权限不足']);
    }

    /**
     * 检测管理员是否存在
     * @author liuzhiqi
     * @param Request $request
     * @return int
     */
    public function checkName(Request $request)
    {
        $username = request()->input('username','');
        if ($username == null) {
            return 2;
        }
        if (AdminUser::where('username', '=', $username)->first()) {
            return 1;
        }
        return 0;
    }

}

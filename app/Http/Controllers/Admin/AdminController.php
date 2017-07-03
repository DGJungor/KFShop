<?php

namespace App\Http\Controllers\Admin;

use App\Admin\AdminUser;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class AdminController
 * @author liuzhiqi
 * @package App\Http\Controller\Admin
 */
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
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
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     * @author liuzhiqi
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @author liuzhiqi
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //管理员信息修改页面
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

}

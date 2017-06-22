@extends('admin.public')

@section('title')
    用户信息
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">

                    <div class="ibox-title">
                        <h5>用户信息</h5>

                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="form_basic.html#">选项1</a>
                                </li>
                                <li><a href="form_basic.html#">选项2</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-lg-4 control-label">用户ID:</label>
                                    <label class="control-label">{{$user->uid}}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">用户名:</label>
                                    <label class="control-label">{{$user->username}}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">真实姓名:</label>
                                    <label class="control-label">{{$user->realname}}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">邮箱:</label>
                                    <label class="control-label">{{$user->email}}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">手机号码:</label>
                                    <label class="control-label">{{$user->tel}}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">性别:</label>
                                    <label class="control-label">
                                        @if($user->sex == 1)
                                            男
                                        @elseif($user->sex ==2)
                                            女
                                        @else
                                        @endif
                                    </label>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">身份证号码:</label>
                                    <label class="control-label">{{$user->id_number}}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">生日:</label>
                                    <label class="control-label">{{$user->birthday}}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">注册ip:</label>
                                    <label class="control-label">{{$reg_info->register_ip}}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">注册时间:</label>
                                    <label class="control-label">{{$reg_info->created_at}}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">状态:</label>
                                    <label class="control-label">{{$user->status}}</label>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-5 col-sm-offset-3">
                                        <button class="btn btn-primary" onclick="location.href='/admin/users/{{$user->id}}/edit'">编辑信息</button>
                                        <button class="btn btn-white" onclick="location.href='/admin/users'">返回列表</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('admin.public')

@section('css')
    <link href="{{ asset('/style/js/plugins/layer/skin/layer.css') }}" rel="stylesheet">
@endsection

@section('title')
    用户信息
@endsection

@section('bigtitle')
    <div class="breadcrumb">
        <h2>用户</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/admin/users">用户管理</a>
            </li>
            <li>
                <strong>用户信息</strong>
            </li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">

                    <div class="ibox-title">
                        <h5>用户信息</h5>

                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
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
                                <label class="col-lg-4 control-label">状态:</label>
                                    <label class="control-label">{{$user->status}}</label>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-5 col-sm-offset-3">
                                        <button class="btn btn-primary" onclick="location.href='/admin/member'">返回列表</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox float-e-margins">

                    <div class="ibox-title">
                        <h5>注册信息</h5>

                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-lg-4 control-label">ID:</label>
                                    <label class="control-label">{{$reg_info->id}}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">用户名:</label>
                                    <label class="control-label">{{$reg_info->username}}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">邮箱:</label>
                                    <label class="control-label">{{$reg_info->email}}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">手机号码:</label>
                                    <label class="control-label">{{$reg_info->tel}}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">注册ip:</label>
                                    <label class="control-label">{{$reg_info->register_ip}}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">注册时间:</label>
                                    <label class="control-label">{{$reg_info->created_at}}</label>
                            </div>

                            <div class="hr-line-dashed"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- layer javascript -->
    <script src="{{ asset('/style/js/plugins/layer/layer.min.js') }}"></script>
    <script>
        layer.use('extend/layer.ext.js'); //载入layer拓展模块
    </script>

    <script src="{{ asset('/style/js/demo/layer-demo.js') }}"></script>

    <script>
        //修改成功弹窗
        @if (session('success'))
            layer.msg('修改成功',1,1);
        @endif
    </script>
@endsection
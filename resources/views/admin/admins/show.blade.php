@extends('admin.public')

@section('title')
    个人资料
@endsection

@section('bigtitle')
    <div class="col-lg-10">
        <h3>个人资料</h3>
    </div>
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>管理员信息</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form action="/admin/admins/{{$admin->id}}" method="POST" class="form-horizontal">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">头像:</label>

                                <div class="col-sm-10">
                                    <img src="/uploads/admin_pic/{{$admin->avatar}}" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">用户名</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" value="{{$admin->username}}" {{ $power or ''}}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">角色</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" value="{{ $admin->type != 0 ? '管理员' : '超级管理员' }}" disabled="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">邮箱:</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="email" value="{{$admin->email}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">手机号码:</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tel" value="{{$admin->tel}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">创建时间:</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$admin->created_at}}" disabled="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">最后一次登录IP:</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$admin->last_login_ip}}" disabled="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">最后一次登录时间:</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$admin->last_login_at}}" disabled="">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">保存修改</button>
                                    <button class="btn btn-white" onclick="history.back(-1)">返回</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
@endsection
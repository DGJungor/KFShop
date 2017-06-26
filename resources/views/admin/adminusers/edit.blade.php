@extends('admin.public')

@section('title')
    修改用户信息
@endsection

@section('bigtitle')
    <div class="col-lg-10">
        <h2>用户</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/admin/users">用户管理</a>
            </li>
            <li>
                <strong>信息修改</strong>
            </li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>修改用户信息</h5>
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
                        <form action="/admin/users/{{$user->id}}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">用户ID</label>

                                <div class="col-sm-10">
                                    {{$user->uid}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">用户名</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" value="{{$user->username}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">真实姓名:</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="realname" value="{{$user->realname}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">邮箱:</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="email" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">手机号码:</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tel" value="{{$user->tel}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">头像:</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="avatar" value="{{$user->avatar}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">性别:</label>

                                <div class="col-sm-10">
                                    <label class="radio-inline i-checks">
                                        <input type="radio" name="sex" value="1" {{ $user->sex == 1 ? 'checked': '' }}>男</label>
                                    <label class="radio-inline i-checks">
                                        <input type="radio" name="sex" value="2" {{ $user->sex == 2 ? 'checked': '' }}>女</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">身份证号码:</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="id_number" value="{{$user->id_number}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">密保问题:</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="answer" value="{{$user->answer}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">生日:</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="birthda" value="{{$user->birthday}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">状态:</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$user->status}}">
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
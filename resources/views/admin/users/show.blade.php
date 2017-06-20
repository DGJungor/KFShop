@extends('admin.public')

@section('title')
    用户信息
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-sm-3 control-label">文本框：</label>
                    <div class="col-sm-9">
                        <input type="text" name="" class="form-control" placeholder="请输入文本"> <span class="help-block m-b-none">说明文字</span>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">文本框：</label>
                    <div class="col-sm-9">
                        <input type="text" name="" class="form-control" placeholder="请输入文本"> <span class="help-block m-b-none">说明文字</span>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">文本框：</label>
                    <div class="col-sm-9">
                        <input type="text" name="" class="form-control" placeholder="请输入文本"> <span class="help-block m-b-none">说明文字</span>

                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>横向表单</h5>
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
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal">
                            <p>欢迎登录本站(⊙o⊙)</p>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">用户名：</label>

                                <div class="col-lg-8">
                                    <input type="email" placeholder="用户名" class="form-control"> <span class="help-block m-b-none">请输入您注册时所填的E-mail</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">密码：</label>

                                <div class="col-lg-8">
                                    <input type="password" placeholder="密码" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-8">
                                    <button class="btn btn-sm btn-white" type="submit">登 录</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
                                <label class="col-sm-2 control-label">用户ID:</label>
                                    <label class="col-sm-2">{{$user->uid}}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">用户名:</label>
                                    <label class="col-sm-2">{{$user->username}}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">真实姓名:</label>
                                    <label class="col-sm-2">{{$user->realname}}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">邮箱:</label>
                                    <label class="col-sm-2">{{$user->email}}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">手机号码:</label>
                                    <label class="col-sm-2">{{$user->tel}}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">性别:</label>
                                    <label class="col-sm-2">
                                        @if($user->sex == 1)
                                            男
                                        @elseif($user->sex ==2)
                                            女
                                        @else
                                        @endif
                                    </label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">身份证号码:</label>
                                    <label class="col-sm-2">{{$user->id_number}}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">生日:</label>
                                    <label class="col-sm-2">{{$user->birthday}}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">注册ip:</label>
                                    <label class="col-sm-2">{{$reg_info->register_ip}}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">注册时间:</label>
                                    <label class="col-sm-2">{{$reg_info->created_at}}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">状态:</label>
                                    <label class="col-sm-2">{{$user->status}}</label>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <a href="/admin/users/{{$user->id}}/edit">
                                        <button class="btn btn-primary">编辑信息</button>
                                    </a>
                                    <a href="/admin/users">
                                        <button class="btn btn-white">返回</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
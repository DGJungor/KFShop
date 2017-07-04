@extends('admin.public')

@section('css')
    <link href="{{asset('/style/css/plugins/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{ asset('/style/js/plugins/layer/skin/layer.css') }}" rel="stylesheet">
@endsection()

@section('title')
    管理员列表页
@endsection

@section('bigtitle')
    <div class="col-lg-10">
        <h2>管理员</h2>
        <ol class="breadcrumb">
            <li>
                <a>角色管理</a>
            </li>
            <li>
                <strong>管理员列表</strong>
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
                        <h5>管理员列表</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <button id="btn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAdminModal">
                            <i class="fa fa-plus-square"> 添加管理员</i>
                        </button>

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>管理员ID</th>
                                <th>用户名</th>
                                <th>角色</th>
                                <th>Email</th>
                                <th>手机号码</th>
                                <th>加入时间</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admins as $admin)
                                <tr>
                                    <td>{{$admin->id}}</td>
                                    <td>{{$admin->username}}</td>
                                    <td>@if($admin->type == 0) 超级管理员 @elseif($admin->type == 1) 管理员 @else @endif</td>
                                    <td>{{$admin->email}}</td>
                                    <td>{{$admin->tel}}</td>
                                    <th>{{$admin->created_at}}</th>
                                    <td class="center">@if($admin->status == 0) 禁用 @elseif($admin->status == 1) 使用中 @endif</td>
                                    <td class="text-center">
                                        <a href="/admin/admins/{{$admin->id}}/edit">
                                            <i class="fa fa-edit text-navy">编辑</i>
                                        </a>
                                        @if ($admin->type != 0)
                                        <a href="javascript:;" class="deladmin" name="form{{ $admin->id }}">
                                            <i class="fa fa-trash text-danger">删除</i></a>
                                        <form id="form{{ $admin->id }}" action="/admin/admins/{{$admin->id}}" method="POST">

                                            <input type="hidden" name="_method" value="DELETE">
                                            {{ csrf_field() }}
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>管理员ID</th>
                                <th>用户名</th>
                                <th>角色</th>
                                <th>Email</th>
                                <th>手机号码</th>
                                <th>加入时间</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_info" id="DataTables_Table_0_info" role="alert" aria-live="polite" aria-relevant="all">
                                    显示 1 到 {{ $admins->count() }} 项，共 {{ $admins->total() }} 项
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                    {{ $admins->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 添加管理员模态框（addAdminModal） -->
    <div class="modal fade" id="addAdminModal" tabindex="-1" role="form" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="addAdminModalLabel">添加管理员</h4>
                </div>
                <div class="modal-body">
                    <form id="addAdminForm">
                        <div class="form-group">
                            <label for="username" class="control-label">用户名:</label>
                            <input type="text" maxlength="20" name="username" class="form-control" id="username" placeholder="用户名">
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">密码:</label>
                            <input type="password" maxlength="24" name="password" class="form-control" id="password" placeholder="密码">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="control-label">确认密码:</label>
                            <input type="password" maxlength="24" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="确认密码">
                        </div>

                        <div class="form-group">
                            <label for="email" class="control-label">E-mail:</label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="邮箱">
                        </div>
                        <div class="form-group">
                            <label for="tel" class="control-label">手机号:</label>
                            <input type="text" maxlength="11" name="tel" class="form-control" id="tel" placeholder="手机号">
                        </div>
                        <div class="form-group ">
                            <div class="radio i-checks">
                                <label class="control-label">类型:</label>
                                <input type="radio" name="type" value="1" checked>管理员
                                <input type="radio" name="type" value="0">超级管理员
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="radio i-checks">
                                <label class="control-label">状态:</label>
                                <input type="radio" name="status" value="1" checked>开启
                                <input type="radio" name="status" value="0">禁用
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" id="addbtn" class="btn btn-primary" onclick="putForm()">添加</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('/style/js/plugins/jeditable/jquery.jeditable.js')}}"></script>

    <!-- Data Tables -->
    <script src="{{asset('/style/js/plugins/dataTables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('/style/js/plugins/dataTables/dataTables.bootstrap.js')}}"></script>
    <!-- jQuery Validation plugin javascript-->
    <script src="{{ asset('/style/js/plugins/validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/style/js/plugins/validate/messages_zh.min.js') }}"></script>
    <!-- layer javascript -->
    <script src="{{ asset('/style/js/plugins/layer/layer.min.js') }}"></script>

    <script src="{{ asset('/style/js/demo/layer-demo.js') }}"></script>
    <script src="{{ asset('/style/js/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                radioClass: 'iradio_square-green',
            });
        });
    </script>

    <script>
        //验证管理员唯一性
        $('#username').blur(function () {
            var username = '';
            var input_username = $('#username');
            username = $('#username').val();
            $.ajax({
                type:"POST",
                url: 'ajax/checkName',
                dataType: 'json',
                data: {username: username, _token: "{{ csrf_token() }}"},
                success: function (data) {
                    if (data == null) {
                        layer.msg('服务器端错误',2,1);
                    }
                    if (data == 0) {
                        $('#nametip').remove();
                        input_username.before("<i id=\"nametip\" class=\"fa fa-check-circle text-navy\" style=\"position: absolute;right: 30px;padding: 10px 10px 10px 10px;\">可以添加</i>");
                        return;
                    }
                    if (data == 1) {
                        $('#nametip').remove();
                        input_username.before("<i id=\"nametip\" class=\"fa fa-times-circle text-danger\" style=\"position: absolute;right: 30px;padding: 10px 10px 10px 10px;\">管理员已存在</i>");
                        return;
                    }

                }
            });
        });

        //隐藏错误信息
        $('input').focus(function(event) {
            $(this).next().children().html('');
        });

        //以下为修改jQuery Validation插件兼容Bootstrap的方法，没有直接写在插件中是为了便于插件升级
        $.validator.setDefaults({
            highlight: function (element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            },
            success: function (element) {
                element.closest('.form-group').removeClass('has-error').addClass('has-success');
            },
            errorElement: "span",
            errorClass: "help-block m-b-none",
            validClass: "help-block m-b-none"

        });

        $('#addAdminForm').validate({
            submitHandler: function (){
                //提交表单数据
                var username = $('#username').val();
                var password = $('#password').val();
                var password_confirmation = $('#password_confirmation').val();
                var email = $('#email').val();
                var tel = $('#tel').val();
                var type = $('input[name="type"]:checked').val();
                var status = $('input[name="status"]:checked').val();

                //防止表单重复提交
//                $('#addbtn').attr("disabled", "disabled");

                $.ajax({
                    type: 'POST',
                    url: '/admin/admins',
                    dataType: 'json',
                    cache: false,
                    data: {username: username, password: password, password_confirmation: password_confirmation,
                            email: email, tel: tel, type: type, status: status, _token: "{{ csrf_token() }}"},
                    success: function (data) {
                        if (data == null) {
                            layer.msg('服务器端错误',2 ,1);
                            return;
                        }
                        if (data.status == 0) {
                            $('input').val('');
                            $('#addbtn').removeAttr("disabled");
                            setTimeout(function () {
                                $('#addAdminModal').modal('hide');
                                window.location.reload();
                            },3000);
                            layer.msg(data.message, 2, 1);
                            return;
                        }
                        if (data.status != 0) {
                            layer.msg(data.message, 2, 1);
                            $('#password').val('');
                            $('#password_confirmation').val('');
                            $('#addbtn').removeAttr("disabled");
                            return;
                        }
                    }
                });
            },
            rules: {
                username: {
                    required: true,
                    minlength: 2,
                    maxlength: 20
                },
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 24
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true,
                },
                tel: {
                    required: true,
                    digits: true,
                    minlength: 11,
                    maxlength: 11
                },
            },
            messages: {
                username: {
                    required: "请输入您的用户名",
                    minlength: "用户名必须2个字符以上",
                    maxlength: "用户名不能超过20个字符",
                },
                password: {
                    required: "请输入您的密码",
                    minlength: "密码必须6个字符以上",
                    maxlength: "密码长度不能超过24个字符"
                },
                password_confirmation: {
                    required: "请再次输入密码",
                    equalTo: "两次输入的密码不一样"
                },
                email: {
                    required: "请输入您的E-mail",
                    email: "请输入正确的E-mail"
                },
                tel: {
                    required: "请输入您的手机号码",
                    digits: "格式有误",
                    minlength: "请输入正确的手机号码",
                    maxlength: "请输入正确的手机号码"
                },
            },

        });

        function putForm() {
            $('#addAdminForm').submit();


        }

    </script>

    <script>

        //确认删除弹窗
        $('.deladmin').on('click', function () {
            var name = $(this).prop('name');
            var id = '#' + name;
            $.layer({
                shade: [0],
                area: ['auto','auto'],
                dialog: {
                    msg: '确定要删除？',
                    btns: 2,
                    type: 8,
                    btn: ['确定','取消'],
                    yes: function(){
                        $(id).submit();
                    }
                }
            });

        });

        @if (session('msg'))
            layer.msg('删除成功', 2, 1);
        @endif
    </script>
@endsection
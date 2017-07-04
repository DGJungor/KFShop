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
    <form method="post" action="" class="form-horizontal" role="form" id="form_data" style="margin: 20px;">
        <div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                        <h4 class="modal-title" id="myModalLabel">
                            用户信息
                        </h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label for="user_id" class="col-sm-3 control-label">用户ID</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="user_id" name="user_id" value="{user_id}"
                                           placeholder="请输入用户ID">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lastname" class="col-sm-3 control-label">用户名</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="user_name" value="" id="user_name"
                                           placeholder="用户名">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="col-sm-3 control-label">地址</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="address" value="" id="address"
                                           placeholder="地址">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="remark" class="col-sm-3 control-label">备注</label>
                                <div class="col-sm-9">
                                <textarea  class="form-control"  name="remark" value="{remark}" id="remark"
                                           placeholder="备注">

                                </textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                        </button>
                        <button type="submit" class="btn btn-primary">
                            提交
                        </button><span id="tip"> </span>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal -->
        </div>
    </form>
@endsection

@section('js')
    <script src="{{asset('/style/js/plugins/jeditable/jquery.jeditable.js')}}"></script>

    <!-- Data Tables -->
    <script src="{{asset('/style/js/plugins/dataTables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('/style/js/plugins/dataTables/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('/style/js/demo/treeview-demo.js') }}"></script>
    <!-- layer javascript -->
    <script src="{{ asset('/style/js/plugins/layer/layer.min.js') }}"></script>
    <script>
        layer.use('extend/layer.ext.js'); //载入layer拓展模块
    </script>

    <script src="{{ asset('/style/js/demo/layer-demo.js') }}"></script>

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
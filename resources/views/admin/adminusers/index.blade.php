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
                        <a href="/admin/admins/create">
                            <button id="btn" type="button" class="btn btn-primary">
                                <i class="fa fa-plus-square"> 添加管理员</i>
                            </button>
                        </a>

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
                            @foreach($admins as $v)
                                <tr>
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->username}}</td>
                                    <td>@if($v->type == 0) 超级管理员 @elseif($v->type == 1) 管理员 @else @endif</td>
                                    <td>{{$v->email}}</td>
                                    <td>{{$v->tel}}</td>
                                    <th>{{$v->created_at}}</th>
                                    <td class="center">@if($v->status == 0) 禁用 @elseif($v->status == 1) 使用中 @endif</td>
                                    <td class="text-center">
                                        <a href="/admin/admins/{{$v->id}}/edit">
                                            <i class="fa fa-edit text-navy">编辑</i>
                                        </a>
                                        @if ($v->type != 0)
                                        <a href="javascript:;" id="deladmin">
                                            <i class="fa fa-trash text-danger">删除</i></a>
                                        <form id="delform" action="/admin/admins/{{$v->id}}" method="POST">

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
        $('#deladmin').on('click', function () {
            $.layer({
                shade: [0],
                area: ['auto','auto'],
                dialog: {
                    msg: '确定要删除？',
                    btns: 2,
                    type: 8,
                    btn: ['确定','取消'],
                    yes: function(){
                        $('#delform').submit();
                    }
                }
            });

        });

        @if (session('msg'))
            layer.msg('删除成功', 1, 1);
        @endif
    </script>
@endsection
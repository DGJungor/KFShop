@extends('admin.public')

@section('css')
    <link href="{{asset('/style/css/plugins/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{ asset('/style/js/plugins/layer/skin/layer.css') }}" rel="stylesheet">
@endsection()

@section('title')
    用户列表
@endsection

@section('bigtitle')
    <div class="col-lg-10">
        <h2>用户</h2>
        <ol class="breadcrumb">
            <li>
                <a>用户管理</a>
            </li>
            <li>
                <strong>用户列表</strong>
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
                        <h5>用户列表</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        {{--<a href="/admin/users/create">
                            <button id="btn" type="button" class="btn btn-primary">
                                <i class="fa fa-plus-square"> 添加用户</i>
                            </button>
                        </a>--}}

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>用户ID</th>
                                <th>用户名</th>
                                <th>真实姓名</th>
                                <th>邮箱</th>
                                <th>手机号码</th>
                                <th>性别</th>
                                <th>生日</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $v)
                            <tr>
                                <td>{{$v->uid}}</td>
                                <td>{{$v->username}}</td>
                                <td>{{$v->realname}}</td>
                                <td>{{$v->email}}</td>
                                <td>{{$v->tel}}</td>
                                <td>@if($v->sex == 1) 男 @elseif($v->sex == 2) 女 @else @endif</td>
                                <td>{{$v->birthday}}</td>
                                <td class="center">
                                    <form action="/admin/member/{{$v->id}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="PUT">
                                        @if($v->status == 0)
                                            <input type="hidden" name="status" value="1">
                                            <button type="submit" class="btn btn-danger btn-xs">
                                                禁用
                                            </button>
                                        @elseif($v->status == 1)
                                            <input type="hidden" name="status" value="0">
                                            <button type="submit" class="btn btn-success btn-xs">
                                                开启
                                            </button>
                                        @endif
                                    </form>
                                </td>

                                <td class="text-center">
                                    <a href="/admin/member/{{$v->id}}">
                                        <i class="fa fa-eye text-success">查看详情</i>
                                    </a>
                                    <a href="javascript:;" class="deluser" name="form{{$v->id}}">
                                        <i class="fa fa-trash text-danger">删除</i></a>
                                        <form id="form{{ $v->id }}" action="/admin/member/{{$v->id}}" method="POST">

                                            <input type="hidden" name="_method" value="DELETE">
                                            {{ csrf_field() }}
                                        </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>用户ID</th>
                                <th>用户名</th>
                                <th>真实姓名</th>
                                <th>邮箱</th>
                                <th>手机号码</th>
                                <th>性别</th>
                                <th>生日</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_info" id="DataTables_Table_0_info" role="alert" aria-live="polite" aria-relevant="all">
                                    显示 1 到 {{ $users->count() }} 项，共 {{ $users->total() }} 项
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                    {{ $users->links() }}
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
        $('.deluser').on('click', function () {
            var name = $(this).prop('name');
            var id = '#' + name;
            console.log(id);
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
            layer.msg('删除成功', 1, 1);
        @endif
    </script>
@endsection
@extends('admin.public')

@section('css')

    <link href="{{asset('/style/css/plugins/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{ asset('/style/js/plugins/layer/skin/layer.css') }}" rel="stylesheet">

@endsection

@section('title')

    评论管理

@endsection

@section('bigtitle')

    <div class="col-lg-9">
        <h2>评论列表</h2>

    </div>
@endsection

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5> <small>评论管理</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>评论用户ID</th>
                                <th>关联商品</th>
                                <th>商品评价</th>
                                <th>评论时间</th>
                                <th>评论内容</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comment as $v)
                            <tr class="gradeX">
                                <td class="text-center">{{ $v->user_id }}</td>
                                <td class="text-center">{{ $v->goods_id }}</td>
                                <td class="text-center">{{ $stor[$v->star] }}</td>
                                <td class="text-center">{{ $v->created_at }}</td>
                                <td class="text-center">{{ $v->comment_info }}</td>
                                <td class="text-center">

                                    <form id="form" action="/admin/comment/{{ $v->id }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {!! csrf_field() !!}
                                        <button id="btnDel" type="submit" class="" data-toggle="modal" data-target="#DeleteForm" onclick="">
                                            <span class="fa fa-eraser text-danger" aria-hidden="true"></span>
                                        </button>
                                        {{ csrf_field() }}
                                    </form>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_info" id="DataTables_Table_0_info" role="alert" aria-live="polite" aria-relevant="all">
                                    显示 1 到 20 项，共 {{ count($comment) }} 项
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                {{ $comment->links() }}
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

{{--    <script src="{{ asset('/style/js/jquery-2.1.1.min.js') }}"></script>--}}
    <script src="{{ asset('/style/js/demo/layer-demo.js') }}"></script>


@endsection
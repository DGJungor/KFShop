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
                        <h5>基本 <small>分类，查找</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>评论用户</th>
                                <th>关联商品</th>
                                <th>商品评价</th>
                                <th>评论时间</th>
                                <th>评论内容</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td class="center"></td>
                                <td class="center"></td>
                                <td class="center"></td>
                                <td class="center"></td>
                                <td class="center"></td>
                                <td class="center"></td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>评论用户</th>
                                <th>关联商品</th>
                                <th>商品评价</th>
                                <th>评论时间</th>
                                <th>评论内容</th>
                                <th>操作</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_info" id="DataTables_Table_0_info" role="alert" aria-live="polite" aria-relevant="all">
                                    显示 1 到  项，共  项
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">

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
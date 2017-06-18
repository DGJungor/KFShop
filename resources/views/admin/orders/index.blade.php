@extends('admin.public')



@section('title')
    <div class="col-lg-10">
        <h2>订单管理</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">主页</a>
            </li>
            <li>
                <a>后台数据</a>
            </li>
            <li>
                <strong>订单管理</strong>
            </li>
        </ol>
    </div>

@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>基本
                        <small>分类，查找</small>
                    </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="table_data_tables.html#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="table_data_tables.html#">选项1</a>
                            </li>
                            <li><a href="table_data_tables.html#">选项2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_length" id="DataTables_Table_0_length"><label>每页 <select
                                                name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"
                                                class="form-control input-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> 条记录</label></div>
                            </div>
                            <div class="col-sm-6">
                                <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>查找：<input
                                                class="form-control input-sm" aria-controls="DataTables_Table_0"
                                                type="search"></label></div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover dataTables-example dataTable"
                               id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                            <thead>
                            <tr role="row">
                                <th rowspan="1"
                                    colspan="1" style="width: 204px;">
                                    订单编号
                                </th>
                                <th rowspan="1"
                                    colspan="1" style="width: 245px;">用户ID
                                </th>
                                <th rowspan="1"
                                    colspan="1" style="width: 215px;">支付交易号
                                </th>
                                <th rowspan="1"
                                    colspan="1" style="width: 134px;">金额
                                </th>
                                <th rowspan="1"
                                    colspan="1" style="width: 228px;">下单时间
                                </th>
                                <th rowspan="1"
                                    colspan="1" style="width: 128px;">支付状态
                                </th>
                                <th rowspan="1"
                                    colspan="1" style="width: 110px;">操作
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            {{--{{dd($data)}}--}}
							<?php $i = 0; ?>
                            @foreach($data as $v)
                                @if($i%2==0)
                                    <tr class="gradeA odd">
                                @else
                                    <tr class="gradeA even">
                                        @endif
                                        <td class="sorting_1">{{ $v->guid }}</td>
                                        <td class=" ">{{$v->user_id}}</td>
                                        <td class=" ">{{ $v->pay_transaction }}</td>
                                        <td class="center ">{{ $v->total_amount }}</td>
                                        <td class="center ">{{ $v->created_at }}</td>
                                        <td class="center ">{{ $v->pay_status }}</td>
                                        <td class="center ">
                                            <form action=" " method="POST">
                                                <a href=" ">
                                                    <button id="btnEdit" type="button" class="btn btn-warning">
                                                        <span class="glyphicon glyphicon-edit"
                                                              aria-hidden="true"></span>
                                                    </button>
                                                </a>
                                                <input type="hidden" name="_method" value="DELETE">
                                                {!! csrf_field() !!}
                                                <button id="btnDel" type="submit" class="btn btn-danger"
                                                        data-toggle="modal" data-target="#DeleteForm" onclick="">
                                                    <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>

									<?php $i++; ?>
                                    @endforeach
                            </tbody>
                            <tfoot>
                            {{--<tr>--}}
                                {{--<th rowspan="1" colspan="1">渲染引擎</th>--}}
                                {{--<th rowspan="1" colspan="1">浏览器</th>--}}
                                {{--<th rowspan="1" colspan="1">平台</th>--}}
                                {{--<th rowspan="1" colspan="1">引擎版本</th>--}}
                                {{--<th rowspan="1" colspan="1">CSS等级</th>--}}
                            {{--</tr>--}}
                            </tfoot>
                        </table>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_info" id="DataTables_Table_0_info" role="alert"
                                     aria-live="polite" aria-relevant="all">显示 1 到 10 项，共 57 项
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button previous disabled" aria-controls="DataTables_Table_0"
                                            tabindex="0" id="DataTables_Table_0_previous"><a href="#">上一页</a></li>
                                        <li class="paginate_button active" aria-controls="DataTables_Table_0"
                                            tabindex="0"><a href="#">1</a></li>
                                        <li class="paginate_button " aria-controls="DataTables_Table_0" tabindex="0"><a
                                                    href="#">2</a></li>
                                        <li class="paginate_button " aria-controls="DataTables_Table_0" tabindex="0"><a
                                                    href="#">3</a></li>
                                        <li class="paginate_button " aria-controls="DataTables_Table_0" tabindex="0"><a
                                                    href="#">4</a></li>
                                        <li class="paginate_button " aria-controls="DataTables_Table_0" tabindex="0"><a
                                                    href="#">5</a></li>
                                        <li class="paginate_button " aria-controls="DataTables_Table_0" tabindex="0"><a
                                                    href="#">6</a></li>
                                        <li class="paginate_button next" aria-controls="DataTables_Table_0" tabindex="0"
                                            id="DataTables_Table_0_next"><a href="#">下一页</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


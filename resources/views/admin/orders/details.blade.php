@extends('admin.public')

@section('bigtitle')
    <div class="col-lg-10">
        <h2>订单详情</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">主页</a>
            </li>
            <li>
                <a>后台数据</a>
            </li>
            <li>
                <strong>订单详情详情</strong>
            </li>
        </ol>
    </div>
@endsection

@section('success')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

@endsection


@section('content')
    {{--{{ dd($count) }}--}}
    {{--{{ dd($data) }}--}}
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>订单编号:
                        <small>{{ $data[0]->{'orders_guid'} }}</small>
                    </h5>
                    <div class="ibox-tools">
                        <h5>用户ID:
                            <small>{{ $data[0]->{'user_id'} }}</small>
                        </h5>
                    </div>
                </div>
                <div class="ibox-content">

                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">

                        {{----}}
                        {{--<div class="row">--}}
                            {{--<div class="col-sm-6">--}}
                                {{--<div class="dataTables_length" id="DataTables_Table_0_length"><label>每页 <select--}}
                                                {{--name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"--}}
                                                {{--class="form-control input-sm">--}}
                                            {{--<option value="10">10</option>--}}
                                            {{--<option value="25">25</option>--}}
                                            {{--<option value="50">50</option>--}}
                                            {{--<option value="100">100</option>--}}
                                        {{--</select> 条记录</label></div>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-6">--}}
                                {{--<div id="DataTables_Table_0_filter" class="dataTables_filter"><label>查找：<input--}}
                                                {{--class="form-control input-sm" aria-controls="DataTables_Table_0"--}}
                                                {{--type="search"></label></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}


                        <table class="table table-striped table-bordered table-hover dataTables-example dataTable"
                               id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                            <thead>
                            <tr role="row">
                                <th rowspan="1"
                                    colspan="1" style="width: 204px;">
                                    商品ID
                                </th>
                                <th rowspan="1"
                                    colspan="1" style="width: 150px;">
                                    商品图片
                                </th>
                                <th rowspan="1"
                                    colspan="1" style="width: 245px;">商品单价
                                </th>
                                <th rowspan="1"
                                    colspan="1" style="width: 215px;">商品总额
                                </th>

                                <th rowspan="1"
                                    colspan="1" style="width: 130px;">退货状态
                                </th>
                                <th rowspan="1"
                                    colspan="1" style="width: 130px;">评论状态
                                </th>
                                <th rowspan="1"
                                    colspan="1" style="width: 110px;">操作
                                </th>
                            </tr>
                            </thead>
                            <tbody>
							<?php $i = 0 ?>
                            @foreach($data as $v)

                                @if($i%2==0)
                                    <tr class="gradeA odd">
                                @else
                                    <tr class="gradeA even">
                                        @endif
                                        <td class="sorting_1">{{ $v->goods_id }}</td>
                                        <td class="center">
                                            <div class="mid-tu f-l">
                                                <a href="#"><img width="80" height="80"
                                                                 src="{{url( '/uploads/goods/')}}/{{ $v->picname }}"></a>
                                            </div>
                                        </td>
                                        <td class="center">¥ :{{ $v->cargo_price }}<br>x{{ $v->commodity_number }}</td>
                                        <td class="center">¥ :{{ $v->cargo_price*$v->commodity_number }}</td>
                                        <td class="center">{{ $v->return_statusCH }}</td>
                                        <td class="center">{{ $v->comment_statusCH }}</td>
                                        <td class="center">
                                            <form action="orders/" method="POST">
                                                <a href="orders/">
                                                    <button id="btnEdit" type="button" class="btn btn-warning">修改信息

                                                    </button>
                                                </a>
                                                {{--<input type="hidden" name="_method" value="DELETE">--}}
                                                {!! csrf_field() !!}
                                                {{--<button id="btnDel" type="submit" class="btn btn-danger btn-xs"--}}
                                                {{--data-toggle="modal" data-target="#DeleteForm" onclick="">--}}
                                                {{--<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>--}}
                                                {{--</button>--}}
                                            </form>

                                        </td>
                                    </tr>
									<?php  $i++; ?>
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
                            <div class="col-sm-8">
                                <div class="dataTables_info" id="DataTables_Table_0_info" role="alert"
                                     aria-live="polite" aria-relevant="all">显示 1 到 10 项，共 {{ $count }}
                                    项
                                </div>
                            </div>
                            <div class="col-sm-4">
                                {{--{{ $data->links() }}--}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
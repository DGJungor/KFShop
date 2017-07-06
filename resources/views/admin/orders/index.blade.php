@extends('admin.public')



@section('bigtitle')
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

@section('success')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>
                        <small></small>
                    </h5>
                    <div class="ibox-tools">
                        {{--框框右上角--}}

                    </div>
                </div>
                <div class="ibox-content">

                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                        <div class="row">
                            {{--<div class="col-sm-6">--}}
                                {{----}}
                                {{--<div class="dataTables_length" id="DataTables_Table_0_length"><label>每页 <select--}}
                                                {{--name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"--}}
                                                {{--class="form-control input-sm">--}}
                                            {{--<option value="10">10</option>--}}
                                            {{--<option value="25">25</option>--}}
                                            {{--<option value="50">50</option>--}}
                                            {{--<option value="100">100</option>--}}
                                        {{--</select> 条记录</label></div>--}}
                            {{--</div>--}}
                            {{----}}
                            {{--<div class="col-sm-6">--}}
                                {{--<div id="DataTables_Table_0_filter" class="dataTables_filter"><label>查找：<input--}}
                                                {{--class="form-control input-sm" aria-controls="DataTables_Table_0"--}}
                                                {{--type="search"></label></div>--}}
                            {{--</div>--}}


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
                                    colspan="1" style="width: 215px;">支付方式
                                </th>
                                <th rowspan="1"
                                    colspan="1" style="width: 134px;">金额
                                </th>
                                <th rowspan="1"
                                    colspan="1" style="width: 228px;">下单时间
                                </th>
                                <th rowspan="1"
                                    colspan="1" style="width: 128px;">订单状态
                                </th>
                                <th rowspan="1"
                                    colspan="1" style="width: 220px;">操作
                                </th>
                            </tr>
                            </thead>
                            <tbody>


							<?php $i = 0; ?>
                            @foreach($data as $v)

								<?php
								switch ($v->order_status) {
									case 1:
										$status = '待付款';
										break;
									case 2:
										$status = '待发货';
										break;
									case 3:
										$status = '待收货';
										break;
									case 4:
										$status = '待评价';
										break;
									case 5:
										$status = '完成';
										break;
									case 6:
										$status = '取消';
										break;
									default:
										$status = '未知状态';
								}
								if ($v->order_status != 2) {
									$but_status = 'disabled="disabled"';
								} else {
									$but_status = '';
								}


								?>


                                @if($i%2==0)
                                    <tr class="gradeA odd">
                                @else
                                    <tr class="gradeA even">
                                        @endif
                                        <td class="sorting_1">{{ $v->guid }}</td>
                                        <td class=" ">{{$v->user_id}}</td>
                                        <td class=" ">{{ $v->pay_typeCH }}</td>
                                        <td class="center ">¥ :{{ $v->total_amount }}</td>
                                        <td class="center ">{{ $v->created_at }}</td>
                                        <td class="center ">{{ $status }}</td>
                                        <td class="center ">
                                            <form action="orders/{{  $v->guid }} " method="POST">
                                                <a href="orders/{{ $v->guid }}">
                                                    <button id="btnEdit" type="button" class="btn btn-primary">查看订单
                                                    </button>
                                                </a>
                                                <input type="hidden" name="_method" value="PUT">
                                                <input type="hidden" name="type" value="SendOut">
                                                <input type="hidden" name="guid" value="{{ $v->guid }}">
                                                {{--<input type="hidden" name="_method" value="DELETE">--}}
                                                {!! csrf_field() !!}
                                                <button id="btnDel" type="submit" class="btn btn-danger"
                                                        data-toggle="modal" data-target="#DeleteForm"
                                                        onclick="" {{ $but_status }}>确认发货
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
                            <div class="col-sm-8">
                                <div class="dataTables_info" id="DataTables_Table_0_info" role="alert"
                                     aria-live="polite" aria-relevant="all">显示 1 到 10 项，共 {{ $count[0]->{'count(*)'} }}
                                    项
                                </div>
                            </div>
                            <div class="col-sm-4">
                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


@extends('admin.public')

@section('title')

友情链接

@endsection

@section('bigtitle')

<div class="col-lg-10">
    <h2>友情链接管理</h2>
    
</div>
<div class="col-lg-2">

</div>
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>

@endsection


@section('content')

<div class="row">
    <div class="col-lg-12">
                        <div class="mail-box-header">

                            <form method="get" action="" class="pull-right mail-search">
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm" name="search" placeholder="搜索友情链接">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            搜索
                                        </button>
                                    </div>
                                </div>
                            </form>
                                <h3>
                                     友情链接列表
                                </h3>
                            <div class="mail-tools tooltip-demo m-t-md">
                                <div class="btn-group pull-right">
                                    <button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i>
                                    </button>
                                    <button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i>
                                    </button>

                                </div>
                                <button onclick="window.location.reload();" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="刷新友情链接列表"><i class="fa fa-refresh"></i> 刷新</button>
                            </div>
                        </div>
                    
                    <div class="mail-box">

                       <div class="ibox-content">
                            <div class="table-responsive">
                                 <table class="table table-striped table-bordered table-hover dataTables-example dataTable"
                               id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                        <tr role="row">
                                            <th rowspan="1"
                                    colspan="1" style="width: 54px;">ID</th>
                                            <th rowspan="1"
                                    colspan="1" style="width: 104px;">链接名称</th>
                                            <th rowspan="1"
                                    colspan="1" style="width: 54px;">类型</th>
                                            <th rowspan="1"
                                    colspan="1" style="width: 204px;">链接地址</th>
                                            <th rowspan="1"
                                    colspan="1" style="width: 204px;">图片名称</th>
                                            <th rowspan="1"
                                    colspan="1" style="width: 104px;">状态</th>
                                            <th rowspan="1"
                                    colspan="1" style="width: 104px;">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    {{--{{dd($data)}}--}}
                                    <?php $i = 0; ?>
                                    @foreach($data as $v)

                                         <tr class="gradeA odd">
                                            <td class="text-center ">{{ $v->id }}</td>
                                            <td class="text-center ">{{ $v->name }}</td>
                                            <td class="text-center ">{{ $type[$v->type] }}</td>
                                            <td class="text-center ">http://{{ $v->url }}</td>
                                            <td class="text-center ">{{ $v->image }}</td>
                                            <td class="text-center ">{{ $status[$v->status] }}</td>
                                            <td class="text-center">
                                                <form action="friends/{{$v->id}}" method="POST">

                                                <span>&nbsp;</span>
                                                <span>&nbsp;</span>

                                                <a href="/admin/friends/{{$v->id}}/edit">
                                                    <button id="btnEdit" type="button"  >
                                                        <span class="glyphicon glyphicon-edit text-navy" aria-hidden="true"></span>
                                                    </button>
                                                    {{--<i id="Edit" class="glyphicon glyphicon-edit text-"></i>--}}
                                                </a>
                                                <span>&nbsp;</span>
                                                <span>&nbsp;</span>
                                                <span>&nbsp;</span>
                                                <span>&nbsp;</span>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    {!! csrf_field() !!}
                                                    <button id="btnDel" type="submit" class="" data-toggle="modal" data-target="#DeleteForm" onclick="">
                                                        <span class="glyphicon glyphicon-remove-sign text-danger" aria-hidden="true"></span>
                                                    </button>
                                                {{--<i id="Del" class="glyphicon glyphicon-remove-sign text-danger"></i>--}}
                                                </form>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
    </div>
</div>
@endsection
                                   <!--  <button class="btn btn-info btn-circle" type="button"><i class="fa fa-check"></i>
                                    </button>
                                    <button class="btn btn-warning btn-circle" type="button"><i class="fa fa-times"></i>
                                    </button> -->
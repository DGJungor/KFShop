@extends('admin.public')

@section('css')
    <link href="{{asset('/style/css/plugins/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">
@endsection()

@section('title')
    用户列表
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        @if (session('msg'))
            <div class="alert {{ session('css') }} text-center">
                {{ session('msg') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>用户管理</h5>
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

                        </div>
                    </div>
                    <div class="ibox-content">
                        <a href="/admin/users/create">
                            <button id="btn" type="button" class="btn btn-primary">
                                <i class="fa fa-plus-square"> 添加用户</i>
                            </button>
                        </a>

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>用户ID</th>
                                <th>用户名</th>
                                <th>邮箱</th>
                                <th>手机号码</th>
                                <th>性别</th>
                                <th>状态</th>
                                <th>查看|编辑</th>
                                <th>删除</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $v)
                            <tr>
                                <td>{{$v->id}}</td>
                                <td>{{$v->uid}}</td>
                                <td>{{$v->username}}</td>
                                <td>{{$v->email}}</td>
                                <td>{{$v->tel}}</td>
                                <td>@if($v->sex == 1) 男 @elseif($v->sex == 2) 女 @else @endif</td>
                                <td class="center">@if($v->status == 0) 禁用 @elseif($v->status == 1) 使用中 @endif</td>
                                <td class="text-center">
                                    <a href="/admin/users/{{$v->id}}">
                                            <i class="col-lg-2 glyphicon glyphicon-eye-open text-success"></i>
                                    </a>
                                    <a href="/admin/users/{{$v->id}}/edit">
                                            <i class=" glyphicon glyphicon-edit text-navy"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:;" onClick="deluser()"><i class="fa fa-trash text-danger"></i></a>
                                        <form id="delform" action="/admin/users/{{$v->id}}" method="POST">

                                            <input type="hidden" name="_method" value="DELETE">
                                            {{ csrf_field() }}
                                            {{--<button type="submit">
                                                <i class="fa fa-trash text-danger"></i>
                                            </button>--}}
                                        </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>用户ID</th>
                                <th>用户名</th>
                                <th>邮箱</th>
                                <th>手机号码</th>
                                <th>性别</th>
                                <th>状态</th>
                                <th>查看|编辑</th>
                                <th>删除</th>
                            </tr>
                            </tfoot>
                        </table>

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
    <script>
        $(document).ready(function () {
            $('.dataTables-example').dataTable();

            /* Init DataTables */
            var oTable = $('#editable').dataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable('../example_ajax.php', {
                "callback": function (sValue, y) {
                    var aPos = oTable.fnGetPosition(this);
                    oTable.fnUpdate(sValue, aPos[0], aPos[1]);
                },
                "submitdata": function (value, settings) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition(this)[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            });


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData([
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row"]);

        }

        function deluser() {
            if (confirm("确定要删除？")){
                $("#delform").submit();
            }
        }

    </script>
@endsection
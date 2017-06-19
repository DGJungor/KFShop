@extends('admin.public')

@section('bigtitle')
    <div class="col-lg-10">
        <h2>反馈</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">主页</a>
            </li>
            <li>
                <a>后台数据</a>
            </li>
            <li>
                <strong>反馈信息</strong>
            </li>
        </ol>
    </div>
@endsection

@section('success')

    @endsection


@section('content')
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>反馈信息</h5>

            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-sm-5 m-b-xs">
                        <div data-toggle="buttons" class="btn-group">
                            <label class="btn btn-sm btn-white active">
                                <input id="option1" name="options" type="radio">天</label>
                            <label class="btn btn-sm btn-white">
                                <input id="option2" name="options" type="radio">周</label>
                            <label class="btn btn-sm btn-white">
                                <input id="option3" name="options" type="radio">月</label>
                        </div>
                    </div>
                    <div class="col-sm-4 m-b-xs">

                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input placeholder="请输入关键词" class="input-sm form-control" type="text"> <span
                                    class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-primary"> 搜索</button> </span>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>项目</th>
                            <th style="width: 280px;">用户</th>
                            <th style="width: 180px;">日期</th>
                            <th style="width: 110px;">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $v)
                            <tr>
                                <td>{{ $v->title }}</td>
                                <td>{{$v->user_id}}</td>
                                <td>{{$v->created_at}}</td>
                                <td>
                                    <form action=" " method="POST">
                                        <a href=" ">
                                            <button id="btnEdit" type="button" class="btn btn-warning">
                                                <span class="glyphicon glyphicon-edit"
                                                      aria-hidden="true"></span>
                                            </button>
                                        </a>
                                        <input type="hidden" name="_method" value="DELETE">
                                        {!! csrf_field() !!}
                                        <button id="btnDel" type="submit" class="btn btn-danger" data-toggle="modal"
                                                data-target="#DeleteForm" onclick="">
                                            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="dataTables_info" id="DataTables_Table_0_info" role="alert"
                             aria-live="polite" aria-relevant="all">显示 1 到 10 项，共 {{ $count[0]->{'count(*)'} }} 项
                        </div>
                    </div>
                    <div class="col-sm-4">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@extends('admin.public')

@section('title')
分类管理
@endsection
@section('bigtitle')
<div class="col-lg-10">
    <h2>商品分类管理</h2>
</div>
<div class="col-lg-2">
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-sm-9"></div>
                    <div class="col-sm-3 m-b-xs">
                        <div class="input-group">
                        </div>
                    </div>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped"  style="text-align:center">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>分类名称</th>
                                <th>父id</th>
                                <th>分类路径</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($dataObj as $v)
                            <?php

                                $m = substr_count($v->path, ",") - 1;
                                $num = $m * 5;
                                $nbsp = str_repeat("&nbsp;",$num);
                            ?>
                            <tr>
                                <td>{{ $v->id }}</td>
                                <td align="left" >{{ $nbsp }}|--{{ $v->name }}</td>
                                <td>{{ $v->pid }}</td>
                                <td>{{ $v->path }}</td>
                                <td>{{ $v->created_at }}</td>
                                <td>

                                    <form action="types/{{ $v->id }}" method="POST">
                                        <a href="types/{{ $v->id }}">
                                            <button id="btn" type="button" class="btn btn-primary">
                                                <i class="fa fa-plus-square"></i>
                                            </button>
                                        </a>
                                        <input type="hidden" name="_method" value="DELETE">
                                        {!! csrf_field() !!}
                                        <button id="btnDel" type="submit" class="btn btn-danger" data-toggle="modal" data-target="#DeleteForm" onclick="">
                                            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                        </button>
                                    </form>

                                </td>
                            </tr>

                            @endforeach

                        </tbody>

                    </table>
                    <center></center>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection

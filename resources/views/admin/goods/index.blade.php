@extends('admin.public')
@section('title')
查看管理
@endsection
@section('bigtitle')
<div class="col-lg-10">
    <h2>商品列表</h2>
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
                        <form action="{{ asset('admin/goods/soso') }}" method="post">
                        <div class="input-group">
                            <input type="text" placeholder="请输入商品名关键词" name="soso" class="input-sm form-control"> <span class="input-group-btn">
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-sm btn-primary"> 搜索</button> </span>
                        </div>
                        </form>
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
                                <th>商品id</th>
                                <th>分类id</th>
                                <th width="150">商品名称</th>
                                <th>商品状态</th>
                                <th>购买量</th>
                                <th>单价</th>
                                <th>库存</th>
                                <th>商品图片</th>
                                <th>品牌</th>
                                <th>生产地</th>
                                <th>适用人群</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($dataObj as $v)
                            <tr>
                                <td >{{$v['id']}}</td>
                                <td>{{$v['typeid']}}</td>
                                <td>{{$v['goodname']}}</td>
                                <td>{{ $state[$v['state']] }}</td>
                                <td>{{$v['buy']}}</td>
                                <td>{{$v['price']}}</td>
                                <td>{{$v['inventory']}}</td>
                                <td><img width="120" height="100" src="{{ asset('uploads/goods/') }}/{{ $v['picname'] }}"></td>
                                <td>{{$v['brand']}}</td>
                                <td>{{$v['makein']}}</td>
                                <td>{{$v['suit']}}</td>
                                <td>{{$v['created_at']}}</td>
                                <td>
                                    <form action="goods/{{$v['id']}}" method="POST">
                                        <a href="goods/{{$v['id']}}">
                                            <button id="btnEdit" type="button" class="btn btn-warning">
                                                <span class="fa fa-eye" aria-hidden="true"></span>
                                            </button>
                                        </a>
                                        <a href="goods/{{$v['id']}}/edit">
                                            <button id="btnEdit" type="button" class="btn btn-warning">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
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
                    <center>{{ $dataObj->links() }}</center>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection


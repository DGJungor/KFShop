@extends('admin.public')
@section('title')
查看管理
@endsection
@section('bigtitle')
<div class="col-lg-10">
    <h2>商品列表</h2>
</div>
<div class="col-lg-2">
    温馨提示：新增商品请移步到<a href="{{ url('admin/types') }}">商品分类</a>
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
                            <input type="text" placeholder="请输入商品名关键词" class="input-sm form-control"> <span class="input-group-btn">
                        <button type="button" class="btn btn-sm btn-primary"> 搜索</button> </span>
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
                                <th>商品id</th>
                                <th>分类id</th>
                                <th>商品名称</th>
                                <th>商品状态</th>
                                <th>购买量</th>
                                <th>商品描述</th>
                                <th>适用人群</th>
                                <th>品牌</th>
                                <th>生产地</th>
                                <th>上架时间</th>
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
                                <td>{{$v['describe']}}</td>
                                <td>{{$v['brand']}}</td>
                                <td>{{$v['suit']}}</td>
                                <td>{{$v['makein']}}</td>
                                <td>{{$v['created_at']}}</td>
                                <td>
                                    <form action="goods/{{$v['id']}}" method="POST">
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
                    <center>{{$dataObj->links()}}</center>
                    
                </div>

            </div>
        </div>
    </div>
</div>

@endsection


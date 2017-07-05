@extends('admin.public')
@section('title')
商品详情
@endsection
@section('bigtitle')
<div class="col-lg-10">
    <h2>商品图文详情</h2>
</div>
<div class="col-lg-2"></div>
@endsection
@section('content')

    @foreach($listObj as $b)
        <div class="col-lg-2"></div>

        <div class="col-lg-3">
            <h3>列表图片</h3>
                @foreach($b->listname as $val)
                    <img width="200" src="{{ asset('uploads/goods/') }}/{{ $val }}"><br>
                @endforeach
        </div>
        <div class="col-lg-3">
            <h3>商品图文</h3>
            <p>商品描述：{{$b->details}}</p>

            @foreach($b->picname as $v)
                <img width="400" src="{{ asset('uploads/goods/') }}/{{ $v }}"><br>
            @endforeach
        </div>
    @endforeach



@endsection
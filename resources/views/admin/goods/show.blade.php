@extends('admin.public')
@section('title')
编辑商品
@endsection
@section('bigtitle')
<div class="col-lg-10">
    <h2>商品图文详情</h2>
</div>
<div class="col-lg-2">

</div>
@endsection
@section('content')
    <center>
    @foreach($listObj as $b)
    <h3>商品图文</h3>
        <p>{{$b->details}}</p>

        @foreach($b->picname as $v)
            <img width="400" src="{{ asset('uploads/goods/') }}/{{ $v }}"><br>
        @endforeach

    @endforeach
    </center>

@endsection
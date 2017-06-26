@extends('admin.public')
@section('title')
编辑商品
@endsection
@section('bigtitle')
<div class="col-lg-10">
    <h2>商品详情</h2>
</div>
<div class="col-lg-2">

</div>
@endsection
@section('content')

    @foreach($listObj as $b)

        @foreach($b->picname as $v)
            <img width="400" src="{{ asset('uploads/goods/') }}/{{ $v }}"><br>
        @endforeach

    @endforeach


@endsection
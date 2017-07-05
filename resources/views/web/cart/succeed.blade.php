@extends('web.public.public')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/shopping-mall-index.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{url('/web/css/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('/web/css/zhongling2.css')}}"/>
@endsection


@section('title')
    购物车
@endsection


@section('content')
    <div class="zl2-cgjr w1200">
        <div class="zl2-cgjrl f-l">
            <h3>商品已成功加入购物车！</h3>
            <p>商品数量有限，请您尽快下单并付款！</p>
        </div>
        <div class="zl2-cgjrr f-l">
            <a href="/cart" class="zl2-goto">去购物车结算</a>
            <p>您还可以<a href="/">继续购物</a></p>
        </div>
        <div style="clear:both;"></div>
    </div>
@endsection
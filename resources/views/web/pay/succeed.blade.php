@extends('web.public.public')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/shopping-mall-index.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{url('/web/css/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('/web/css/zhongling2.css')}}"/>
@endsection


@section('title')
    下单成功
@endsection


@section('content')
    <div class="zl2-cgjr w1200">
        <div class="zl2-cgjrl f-l">
            <h3>成功下单</h3>
            <p>订单号:{{ $guid }}</p>
        </div>
        <div class="zl2-cgjrr f-l">
            {{--<a href="/cart" class="zl2-goto">去购物车结算</a>--}}
            <p>您还可以<a href="/">继续购物</a></p>
        </div>
        <div style="clear:both;"></div>
    </div>
@endsection
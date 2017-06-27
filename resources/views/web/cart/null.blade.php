@extends('web.index')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/shopping-mall-index.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{url('/web/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('/web/css/zhongling2.css')}}" />
@endsection


@section('title')
    购物车
@endsection


@section('content')
    <div class="zl2-cgjr w1200">
        <div class="zl2-cgjrl f-l"  style="clear:both;">
            <h3>购物车内暂时没有商品</h3>
            <p></p>
        </div>
        <div class="zl2-cgjrr f-l">
            <a href="{{url('/')}}" class="zl2-goto">去购物</a>
            {{--<p>您还可以<a href="JavaScript:;">继续购物</a></p>--}}
        </div>
        <div style="clear:both;"></div>
    </div>
    @endsection
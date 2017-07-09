@extends('web.public.public')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('/web/css/style.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{ url('/web/css/shopping-mall-index.css')}}"/>

<link rel="stylesheet" type="text/css" href="{{ url('/web/css/jun.css')}}"/>


@endsection


@section('title')
评论管理
@endsection

@section('content')

<div class="personal w1200">


    @include('web.public.leftMenu')


    <div class="order-right f-r">
        <div class="order-md">
            <div class="md-tit">
                <h3>我的评价</h3>
            </div>
            <div class="md-hd">
                <p class="md-p3">
                    商品图片
                </p>
                <p class="md-p2">商品名字</p>
                <p class="md-p3">评分</p>
                <p class="md-p4">评论人状态</p>
                <p class="md-p5">评论内容</p>
                <p class="md-p6">操作</p>
                <hr>
            </div>

            <div class="md-info">
                @foreach($comment as $v)

                <div class="dai">

                    <span></span>

                    <span>&nbsp;&nbsp;&nbsp;&nbsp;订单号:{{ $v->orde->orders_guid }} </span>
                    <span style="float:right; ">

                        <form action="orders/ " method="POST">
                        {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="action" value="confirm">
                            <button class="btn btn-danger btn-sm" type="submit">删除评论</button>
                        </form>
                        <form action="orders/" method="POST">
                        {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="action" value="obligation">
                            <button class="btn btn-info btn-sm" type="submit">修改评论</button>

                    </span>
                </div>
                <div class="dai-con">
                    <dl class="dl1">
                        <dt>
                            <a href="#" class="f-l"><img
                                        src="{{url( '/uploads/goods')}}/{{ $v->good->picname }}"></a>
                        <div style="clear:both;"></div>
                        </dt>
                        <dd>
                            <p>{{ $v->good->goodname }}</p>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <div class="dai-right f-l">
                        <p class="d-r-p1">{{ $stor[$v->star] }}<br>&nbsp;</p>
                        <p class="d-r-p2">{{ $tyle[$v->comment_tyle] }}</p>
                        <textarea id="comment_info" style="height: 50px;" maxlength="50" readonly>{{ $v->comment_info }}</textarea>
                    </div>
                    <div style="clear:both;"></div>
                </div>

                <hr>
                    @endforeach
            </div>


            </div>
    </div>
    <div style="clear:both;"></div>
</div>

@endsection



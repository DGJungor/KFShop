@extends('web.index')

@section('title')
    商品列表页
@endsection

@section('css')

    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/shopping-mall-index.css') }}" />

@endsection

@section('nav')

    <!--nav-->
    <div class="nav-box">
        <div class="nav-kuai w1200">
            <div class="nav-kuaijie yjp-hover1 f-l">
                <a href="JavaScript:;" class="kj-tit1">商品分类快捷</a>
                <div class="kuaijie-box yjp-show1" style="display:none;">
                    <div class="kuaijie-info">
                        <dl class="kj-dl1">
                            <dt><img src="{{ url('/web/images/zl2-07.gif') }}" /><a href="#">食品/饮料/酒水</a></dt>
                            <dd>
                                <a href="#">饼干糕点</a><span>|</span>
                                <a href="#">冲调保健</a><span>|</span>
                                <a href="#">酒水</a>
                            </dd>
                        </dl>
                        <div class="kuaijie-con">
                            <dl class="kj-dl2">
                                <dt><a href="#">洗浴用品/身体护理</a></dt>
                                <dd>
                                    <a href="#">护手霜</a><span>|</span>

                                </dd>
                            </dl>
                            <div style="clear:both;"></div>
                        </div>
                    </div>
                    <div class="kuaijie-info">
                        <dl class="kj-dl1">
                            <dt><img src="{{ url('/web/images/zl2-08.gif') }}" /><a href="搜索列表(有品牌).html">粮油副食</a></dt>
                            <dd>
                                <a href="#">厨房调味</a><span>|</span>
                                <a href="#">大米/面粉</a><span>|</span>
                                <a href="#">方便速食</a>
                            </dd>
                        </dl>
                        <div class="kuaijie-con">
                            <dl class="kj-dl2">
                                <dt><a href="#">洗浴用品/身体护理</a></dt>

                            </dl>
                            <div style="clear:both;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="nav-font f-l">
                <li><a href="#">在线商城</a></li>
                <li><a href="#">二手市场</a><span><img src="{{ url('/web/images/zl2-05.gif') }}" /></span></li>
                <div style="clear:both;"></div>
            </ul>
            <div style="clear:both;"></div>
        </div>
    </div>

@endsection
@section('hot')
    <div class="brand-sales ">

        <dl style="border-bottom:none;">
            <dt>商品种类</dt>
            <dd>
                {{--遍历内容--}}
                <a href="" style="color: #63A61D">种类1</a>
                {{--遍历--}}
            </dd>
            <div style="clear:both;"></div>
        </dl>

        <dl style="border-bottom:none;">
        <dt>商品分类</dt>
            <dd>
                {{--遍历内容--}}
                <a href="">分类</a>
                {{--遍历--}}
            </dd>
            <div style="clear:both;"></div>
        </dl>
    </div>
@endsection

@section('content')

    <div class="shopping-content w1200">
        <div class="shop-pg-left f-l" style="width:215px">
            <div class="shop-left-buttom" style="margin-top:0;">
                <div class="sp-tit1">
                    <h3>商品推荐</h3>
                </div>
                <ul class="shop-left-ul">
                    {{--遍历的地方--}}
                    <li style="height:250px;">
                        <div class="li-top">
                            <a href="#" class="li-top-tu" target="_blank"><img src="{{ url('web/images/beaut-lg-tu2.gif') }}" width='95' height='110' /></a>
                            <p class="jiage"><span class="sp1">￥3.00</span><!-- <span class="sp2">￥209</span> --></p>
                            <p class="jiage"><span class="sp1">Vip:3.20</span><!-- <span class="sp2">￥209</span> --></p>
                        </div>
                        <p class="miaoshu">美丹白苏打饼干</p>
                        <div class="li-md">

                            <div style="clear:both;"></div>
                        </div>
                        <p class="pingjia">0评价</p>
                    </li>
                    {{--遍历--}}
                </ul>
            </div>
        </div>
        <div class="shop-pg-right f-r">
            <div class="shop-right-cmp" style="margin-top:0;">
                <ul class="shop-cmp-l f-l">
                    <li class="current"><a href="#">综合 ↓</a></li>
                    <li><a href="#">销量 ↓</a></li>
                    <li><a href="#">新品 ↓</a></li>
                    <li><a href="#">评价 ↓</a></li>
                    <div style="clear:both;"></div>
                </ul>

                <div style="clear:both;"></div>
            </div>
            <div class="shop-right-con">
                <ul class="shop-ul-tu shop-ul-tu1">
                    {{--遍历内容--}}
                    <li style="height:250px">
                        <div class="li-top">
                            <a href="#"  target="_blank" class="li-top-tu"><img src="{{ url('web/images/beaut-lg-tu2.gif') }}" height="110" width="95" /></a>
                            <p class="jiage">
                                <span class="sp2">￥6.80</span>
                                <span class="sp1" style="padding-left: 10px;">VIP:￥5.70</span>
                            </p>
                        </div>
                        <p class="miaoshu">美丹白苏打鲜葱味饼干</p>
                        <div class="li-md">
                            <div style="clear:both;"></div>
                        </div>
                        <p class="pingjia">0评价</p>

                    </li>
                    <div style="clear:both;"></div>
                    {{--遍历--}}
                </ul>

                <!--分页-->
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>


@endsection
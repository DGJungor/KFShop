@extends('web.public.public')

@section('title')
    商品列表页
@endsection

@section('css')

    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/shopping-mall-index.css') }}" />

@endsection


@section('menu')
    <div class="brand-sales ">
        @foreach($order as $k=>$v)
        <dl style="border-bottom:none;">
            <dt>商品种类</dt>
            <dd>
                {{--遍历内容--}}

                @if($k==0)
                @foreach($v->children as $ke=>$val)

                <a href="{{$val->id}}">{{$val->name}}</a>

                {{--遍历--}}
                @endforeach
                    @endif

            </dd>
            <div style="clear:both;"></div>
        </dl>

        <dl style="border-bottom:none;">
        <dt>商品分类</dt>
            <dd>
                {{--遍历内容--}}
                @if($k==0)
                    @foreach($v->children as $ke=>$val)
                     @foreach($val->grandchild as $kk=>$va)

                          <a href="">{{$va->name}}</a>

                    @endforeach
                @endforeach
                @endif
                {{--遍历--}}
            </dd>
            <div style="clear:both;"></div>
        </dl>
        @endforeach
    </div>
    <br>
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
                @foreach($order as $k=>$v)
                <ul class="shop-ul-tu shop-ul-tu1">

                    @foreach($goods as $ve)

                    <li style="margin-right:0;">
                        <div class="li-top">
                            <a href="#"  target="_blank" class="li-top-tu"><img src="{{ url('uploads/goods') }}/{{$ve->picname}}" height="110" width="95" /></a>
                            <p class="jiage">
                                <span class="sp1">VIP:￥{{$ve->price}}</span>
                            </p>
                        </div>
                        <p class="miaoshu">{{$ve->goodname}}</p>
                        <div class="li-md">
                            <div class="md-l f-l">
                                <span class="md-l-l f-l" ap=""></span>
                                <div class="md-l-r f-l">

                                </div>
                                <div style="clear:both;"></div>
                            </div>
                            <div class="md-r f-l">
                                <button class="md-l-btn1">立即购买</button>
                                <button class="md-l-btn2">加入购物车</button>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <p class="pingjia">0评价</p>
                        <p class="weike">{{$ve->brand}}品牌</p>
                    </li>
                    @endforeach

                    <div style="clear:both;"></div>


                    {{--遍历--}}
                </ul>
                    @endforeach
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>
    
     <!--分页-->
        <div class="paging">
                <div class="pag-left f-l">
                    <a href="#" class="about left-r f-l"><</a>
                    <ul class="left-m f-l">
                        <li><a href="#">1</a></li>
                        
                        <div style="clear:both;"></div>
                    </ul>
                    <a href="#" class="about left-l f-l">></a>
                    <div style="clear:both;"></div>
                </div>
                <div class="pag-right f-l">
                    <div class="jump-page f-l">
                        到第<input type="text" />页
                    </div>
                    <button class="f-l">确定</button>
                    <div style="clear:both;"></div>
                </div>
                <div style="clear:both;"></div>
        </div>

@endsection


@section('js')
    <script>

$()


    </script>

@endsection

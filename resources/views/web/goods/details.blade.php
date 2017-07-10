
@extends('web.public.public')

@section('title')
    {{$dataObj['goodname']}}
@endsection

@section('css')

    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/shopping-mall-index.css') }}" />

@endsection


@section('content')
<!--内容开始-->
<div class="details w1200">
    <div class="deta-info1">
        <div class="dt-if1-l f-l">
            <div class="dt-if1-datu">
                <ul qie-da="">
                    @foreach($listObj as $val)
                        @foreach($val->listname as $pic)
                            <li><a href="#"><img width="351" height="351" src="{{ url('uploads/goods') }}/{{ $pic }}" /></a></li>
                        @endforeach
                    @endforeach
                    <div style="clear:both;"></div>
                </ul>
            </div>
            <div class="dt-if1-qietu">
                <a class="dt-qie-left f-l" href="JavaScript:;"><img src="{{ url('web/images/dt-if1-qietu-left.gif') }}" /></a>
                <div class="dt-qie-con f-l">
                    <ul qie-xiao="">
                    @foreach($listObj as $val)
                        @foreach($val->listname as $pic)
                            <li><a href="#"><img width="60" height="60" src="{{ url('uploads/goods') }}/{{ $pic }}" /></a></li>
                        @endforeach
                    @endforeach
                        <div style="clear:both;"></div>
                    </ul>
                </div>
                <a class="dt-qie-right f-r" href="JavaScript:;"><img src="{{ url('web/images/dt-if1-qietu-right.gif') }}" /></a>
            </div>
            <div class="dt-if1-fx">

                <p>分享到：<a href="#"><img src="{{ url('web/images/dt-xl.gif') }}" /></a><a href="#"><img src="{{ url('web/images/dt-kj.gif') }}" /></a><a href="#"><img src="{{ url('web/images/dt-wx.gif') }}" /></a></p>
            </div>
        </div>

        <div class="dt-if1-m f-l">
            <div class="dt-ifm-hd">
                <h3><a href="#">{{$dataObj['goodname']}}</a></h3>
            </div>
            <div class="dt-ifm-gojia">
                <dl>
                    <dt>vip</dt>
                    <dd>
                        <p class="p1">
                            <span class="sp1">¥{{$dataObj['price']}}</span><span class="sp2">{{$dataObj['inventory']}}</span>
                        </p>
                        <p class="p2">
                            <span class="sp1"><img src="{{ url('web/images/dt-ifm-sp1-img.gif') }}" />5分</span><span class="sp2">共有 2 条评价</span>
                        </p>
                    </dd>
                    <div style="clear:both;"></div>
                </dl>
            </div>
            <dl class="dt-ifm-spot">
                <dt>活动</dt>
                <dd>
                    <P><span>包邮</span>满50.00元免运费</P>
                    <P><span>满赠</span>满500.00元赠300.00元礼品（随机赠送）</P>
                </dd>
                <div style="clear:both;"></div>
            </dl>
            <dl class="dt-ifm-box3">
                <dt>数量</dt>
                <dd>
                    <a class="box3-left" href="JavaScript:;">-</a>
                    <input onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" type="text" value="1" min="1" class="inputnum">
                    <a class="box3-right" href="JavaScript:;">+</a>
                </dd>
                <div style="clear:both;"></div>
            </dl>
            <div class="dt-ifm-box4">
                @if($dataObj->state == 0)
                <a href="{{ url('buynow') }}/{{ $dataObj->id }}?num=1" class='buynow' data="{{$dataObj['id']}}"><button class="btn1">立即购买</button></a>
                <a href="{{ url('cart/add') }}/{{ $dataObj->id }}?num=1" class="cart" data="{{$dataObj['id']}}"><button class="btn2">加入购物车</button></a>
                @else
                <button class="btn3">已下架</button>
                @endif
                <button class="btn3">收藏</button>
            </div>
        </div>

        <div class="dt-if1-r f-r">
            <div class="dt-ifr-fd">
                <div class="dt-ifr-tit">
                    <h3>同类推荐</h3>
                </div>
                <dl>
                    <dt><a href="#"><img src="{{ url('web/images/dt-ifr-fd-dt-tu.gif') }}" /></a></dt>
                    <dd>
                        <a href="#">【观音桥】罗兰钢管舞舞蹈体验</a>
                        <p>¥9.90</p>
                    </dd>
                    <div style="clear:both;"></div>
                </dl>
                <dl>
                    <dt><a href="#"><img src="{{ url('web/images/dt-ifr-fd-dt-tu.gif') }}" /></a></dt>
                    <dd>
                        <a href="#">【观音桥】罗兰钢管舞舞蹈体验</a>
                        <p>¥9.90</p>
                    </dd>
                    <div style="clear:both;"></div>
                </dl>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>

    <div class="deta-info2">
        <div class="dt-if2-l f-l">
            <div class="if2-l-box1">
                <div class="if2-tit">
                    <h3>浏览记录</h3>
                </div>
                <ul>
                    <li>
                        <a href="#"><img src="{{ url('web/images/if2-l-box1-tu1.gif') }}" /></a>
                        <a class="if2-li-tit" href="#">乐事Lay's 无限薯片（翡翠黄瓜味）104g/罐</a>
                        <p>¥6.90</p>
                    </li>
                </ul>
            </div>
            <div class="if2-l-box1" style="margin-top:18px;">
                <div class="if2-tit">
                    <h3>看了又看</h3>
                </div>
                <ul>
                    <li>
                        <a href="#"><img src="{{ url('web/images/if2-l-box1-tu1.gif') }}" /></a>
                        <a class="if2-li-tit" href="#">乐事Lay's 无限薯片（翡翠黄瓜味）104g/罐</a>
                        <p>¥6.90</p>
                    </li>
                </ul>
            </div>
        </div>



        <!--  -->
        <div class="dt-if2-r f-r">
            <ul class="if2-tit2">
                <li class="current" com-det="dt1"><a href="JavaScript:;">产品信息</a></li>
                <li com-det="dt2"><a href="JavaScript:;">商品评论</a></li>
                <div style="clear:both;"></div>
            </ul>


            <!--  -->
            <div style="border:1px solid #DBDBDB;" com-det-show="dt1">

                <div class="if2-tu3">
                @foreach($listObj as $val)
                {{$val->details}}
                     @foreach($val->picname as $v)
                    <img width="935" src="{{ url('uploads/goods')}}/{{$v}}" />
                    @endforeach
                @endforeach
                </div>
            </div>


            <!--  -->


            <div style="display:none;" com-det-show="dt2">
                <dl class="if2-r-box2">
                    <dt>
                    <p class="box2-p1">好评率</p>
                    <p class="box2-p2">%</p>
                    <p class="box2-p3">共@if(isset($comment)){{ count($comment) }}@endif人评论</p>
                    </dt>

                    <div style="clear:both;"></div>
                </dl>
                <div class="if2-r-box3">
                    <ul>
                        <li class="current-li"><a href="#">全部（@if(isset($comment)){{ count($comment) }} @endif）</a></li>

                        <div style="clear:both;"></div>
                    </ul>
                    <dl>
                        @if(isset($comment))
                        @foreach($comment as $ve)
                        <dt>
                            <a href="#"><img src="{{ url('web/images/box3-dt-tu.gif')}}" /></a>
                        </dt>
                        <dd>
                            <a href="#">{{ $ve->user_id }}</a>
                            <p class="b3-p1">{{ $ve->comment_info }}</p>
                            <p class="b3-p2">{{ $ve->created_at }} </p>
                        </dd>
                        @endforeach

                        <div style="clear:both;"></div>

                    </dl>
                </div>
            </div>
                    {{ $comment->links() }}
                     @endif


            <!--  -->



        </div>
        <div style="clear:both;"></div>
    </div>
</div>

@endsection
@extends('web.public.public')

@section('title')
首页
@endsection

@section('css')
<link href="{{ url('/web/css/zhonglingxm2.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('menu')

    <div class="banner">
        <ul class="ban-ul1">
            @foreach($res["banner"] as $v)
            @if($v->disabled == '显示')
                <li><a href="http://{{($v->redirect_url)}}"><img src="{{ url($v['img_url']) }}" /></a></li>
                @else

                @endif
            @endforeach
        </ul>
        <div class="ban-box w1200">
            <ol class="ban-ol1">
                <li class="current"></li>
                <li></li>
                <li></li>
                <li></li>
                <div style="clear:both;"></div>
            </ol>
        </div>
    </div>

    <div class="tuijian-left f-l">
        <img src="{{ url('/web/images/zl2-14.png') }}" />
    </div>
    <input type="hidden" value="{{$a=$res['banners']->count()}}">

    {{--{{dd($a)}}--}}
    <ul class="tuijian-right f-l">
        {{--@for($i=1;$i<=$a;$i++)--}}
            {{--{{$i}}--}}
        {{--@endfor--}}
        {{--@foreach($res["dataObj"] as $row)--}}

{{--            {{$i=$row}}--}}
        <li>
            <div class="li-box li-box"   style="background: no-repeat right 20px;">
                <a href="JavaScript:;" class="li-a1">锦尚世家</a>
                <a href="JavaScript:;" class="li-a2">锦绣花苑　传承世家</a>
                <a href="JavaScript:;" class="li-a3">more</a>

            </div>
        </li>
                {{--@endforeach--}}
        <div style="clear:both;"></div>
    </ul>
    <div style="clear:both;"></div>
@endsection

@section('content')
<style>
    .title1-ul1 .current a{color:#dc4525}
</style>
<div class="zl-title1" style="border-color:#dc4525">
    <h3 class="title1-h3 f-l">
        1F  在线商城
    </h3>
    <ul class="title1-ul1 f-r">
        <li class="current">
            <a href="JavaScript:;">
                食品酒饮
            </a>
            <div class="sanjiao1" style="border-color: transparent transparent #dc4525;">
            </div>
        </li>
        <li class="">
            <a href="JavaScript:;">
                家庭清洁
            </a>
            <div class="sanjiao1" style="border-color: transparent transparent #dc4525;">
            </div>
        </li>
        <li class="">
            <a href="JavaScript:;">
                美妆洗护
            </a>
            <div class="sanjiao1" style="border-color: transparent transparent #dc4525;">
            </div>
        </li>
        <div style="clear:both;">
        </div>
    </ul>
    <div style="clear:both;">
    </div>
</div>
<div class="zl-con">
    <div class="zl-con-left f-l">
        <div class="zl-tu" style="margin-top:0px;height:479px">
            <img class="zl-img" height="479" src="/./Uploads/cate_img/20161128/583ba99776374.jpg" width="210"/>
        </div>
        <ul class="zl-lhover" style="background-color:#dc4525;">
            <li>
                <a href="/index.php/Home/Goods/goods_list/cate_one/21/cate_id/22/cate_v/23.html">
                    食品酒饮
                </a>
            </li>
            <li>
                <a href="/index.php/Home/Goods/goods_list/cate_one/151/cate_id/152/cate_v/154.html">
                    家庭清洁
                </a>
            </li>
            <li>
                <a href="/index.php/Home/Goods/goods_list/cate_one/200/cate_id/201/cate_v/202.html">
                    美妆洗护
                </a>
            </li>
            <div style="clear:both;">
            </div>
        </ul>
    </div>
    <div class="zl-con-right f-l">
        <div class="zl-rbox lihover">
            <div class="rbox-left f-l">
                <div class="rbox-ltop">
                    <a href="javascript:;">
                        <img height="259" src="/./Uploads/cate_img/20160224/56cd5f9068596.jpg" width="569"/>
                    </a>
                </div>
                <ul class="rbox-lft">
                    <li>
                        <a class="a1" href="/index.php/Home/Goods/goods_detail/goods_id/1625.html" title="品品麻辣牛板筋">
                            品品麻辣牛板筋
                        </a>
                        <p>
                            <font color="red">
                                Vip:9.00
                            </font>
                            ￥11.80/个
                        </p>
                        <a class="a2" href="/index.php/Home/Goods/goods_detail/goods_id/1625.html">
                            <img height="116" src="/./Uploads/goods_face/20151218/56736c7510371.jpg" width="88"/>
                        </a>
                    </li>
                    <li>
                        <a class="a1" href="/index.php/Home/Goods/goods_detail/goods_id/1631.html" title="品品烧烤牛板筋">
                            品品烧烤牛板筋
                        </a>
                        <p>
                            <font color="red">
                                Vip:3.10
                            </font>
                            ￥3.60/个
                        </p>
                        <a class="a2" href="/index.php/Home/Goods/goods_detail/goods_id/1631.html">
                            <img height="116" src="/./Uploads/goods_face/20151218/56736e08bf4ad.jpg" width="88"/>
                        </a>
                    </li>
                    <li>
                        <a class="a1" href="/index.php/Home/Goods/goods_detail/goods_id/1669.html" title="可比克烧烤味薯片">
                            可比克烧烤味薯片
                        </a>
                        <p>
                            <font color="red">
                                Vip:0.90
                            </font>
                            ￥1.20/个
                        </p>
                        <a class="a2" href="/index.php/Home/Goods/goods_detail/goods_id/1669.html">
                            <img height="116" src="/./Uploads/goods_face/20151218/56737f73d0d28.jpg" width="88"/>
                        </a>
                    </li>
                    <div style="clear:both;">
                    </div>
                </ul>
            </div>
            <ul class="rbox-right f-l">
                <li>
                    <a class="a1" href="/index.php/Home/Goods/goods_detail/goods_id/1757.html" title="美丹白苏打饼干">
                        美丹白苏打饼干
                    </a>
                    <p>
                        <font color="red">
                            Vip:3.20
                        </font>
                        ￥3.00/个
                    </p>
                    <a class="a2" href="/index.php/Home/Goods/goods_detail/goods_id/1757.html">
                        <img data-original="/./Uploads/goods_face/20151218/5673aee8a1455.jpg" height="116" src="/./Uploads/goods_face/20151218/5673aee8a1455.jpg" width="88"/>
                    </a>
                </li>
                <li>
                    <a class="a1" href="/index.php/Home/Goods/goods_detail/goods_id/1762.html" title="美丹白苏打鲜葱味饼干">
                        美丹白苏打鲜葱味饼干
                    </a>
                    <p>
                        <font color="red">
                            Vip:5.70
                        </font>
                        ￥6.80/个
                    </p>
                    <a class="a2" href="/index.php/Home/Goods/goods_detail/goods_id/1762.html">
                        <img data-original="/./Uploads/goods_face/20151218/5673b060bf98a.jpg" height="116" src="/./Uploads/goods_face/20151218/5673b060bf98a.jpg" width="88"/>
                    </a>
                </li>
                <li>
                    <a class="a1" href="/index.php/Home/Goods/goods_detail/goods_id/1765.html" title="美丹白苏打原味饼干">
                        美丹白苏打原味饼干
                    </a>
                    <p>
                        <font color="red">
                            Vip:5.70
                        </font>
                        ￥6.80/个
                    </p>
                    <a class="a2" href="/index.php/Home/Goods/goods_detail/goods_id/1765.html">
                        <img data-original="/./Uploads/goods_face/20151218/5673b19fa26a0.jpg" height="116" src="/./Uploads/goods_face/20151218/5673b19fa26a0.jpg" width="88"/>
                    </a>
                </li>
                <div style="clear:both;">
                </div>
            </ul>
            <div style="clear:both;">
            </div>
        </div>
        <div class="zl-rbox lihover">
            <div class="rbox-left f-l">
                <div class="rbox-ltop">
                    <a href="javascript:;">
                        <img height="259" src="/./Uploads/cate_img/20160224/56cd5fcb70713.jpg" width="569"/>
                    </a>
                </div>
                <ul class="rbox-lft">
                    <li>
                        <a class="a1" href="/index.php/Home/Goods/goods_detail/goods_id/3625.html" title="奥妙净蓝全效水清莲香高浓度洗衣液（2+1）">
                            奥妙净蓝全效水清莲香高...
                        </a>
                        <p>
                            <font color="red">
                                Vip:16.50
                            </font>
                            ￥19.30/袋
                        </p>
                        <a class="a2" href="/index.php/Home/Goods/goods_detail/goods_id/3625.html">
                            <img height="116" src="/./Uploads/goods_face/20151223/5679f8c831e9c.JPG" width="88"/>
                        </a>
                    </li>
                    <li>
                        <a class="a1" href="/index.php/Home/Goods/goods_detail/goods_id/3626.html" title="奥妙净蓝全效水清莲香高浓度">
                            奥妙净蓝全效水清莲香高...
                        </a>
                        <p>
                            <font color="red">
                                Vip:16.00
                            </font>
                            ￥19.60/瓶
                        </p>
                        <a class="a2" href="/index.php/Home/Goods/goods_detail/goods_id/3626.html">
                            <img height="116" src="/./Uploads/goods_face/20151223/5679f930297b8.JPG" width="88"/>
                        </a>
                    </li>
                    <li>
                        <a class="a1" href="/index.php/Home/Goods/goods_detail/goods_id/3918.html" title="奥妙清新柠檬超效洗衣皂2块装">
                            奥妙清新柠檬超效洗衣皂...
                        </a>
                        <p>
                            <font color="red">
                                Vip:8.50
                            </font>
                            ￥10.60/块
                        </p>
                        <a class="a2" href="/index.php/Home/Goods/goods_detail/goods_id/3918.html">
                            <img height="116" src="/./Uploads/goods_face/20151223/567a61393fa3a.jpg" width="88"/>
                        </a>
                    </li>
                    <div style="clear:both;">
                    </div>
                </ul>
            </div>
            <ul class="rbox-right f-l">
                <li>
                    <a class="a1" href="/index.php/Home/Goods/goods_detail/goods_id/3920.html" title="奥妙清新柠檬超效洗衣皂3块装">
                        奥妙清新柠檬超效洗衣皂...
                    </a>
                    <p>
                        <font color="red">
                            Vip:12.70
                        </font>
                        ￥16.50/块
                    </p>
                    <a class="a2" href="/index.php/Home/Goods/goods_detail/goods_id/3920.html">
                        <img data-original="/./Uploads/goods_face/20160309/56df9acfeff17.gif" height="116" src="/./Uploads/goods_face/20160309/56df9acfeff17.gif" width="88"/>
                    </a>
                </li>
                <div style="clear:both;">
                </div>
            </ul>
            <div style="clear:both;">
            </div>
        </div>
        <div class="zl-rbox lihover">
                <div class="rbox-left f-l">
                <div class="rbox-ltop">
                    <a href="javascript:;">
                        <img height="259" src="/./Uploads/cate_img/20160224/56cd606a4a3e5.jpg" width="569"/>
                    </a>
                </div>
                <ul class="rbox-lft">
                    <li>
                        <a class="a1" href="/index.php/Home/Goods/goods_detail/goods_id/3135.html" title="丹姿他能量活力保湿男士霜50g">
                            丹姿他能量活力保湿男士...
                        </a>
                        <p>
                            <font color="red">
                                Vip:26.40
                            </font>
                            ￥33.00/瓶
                        </p>
                        <a class="a2" href="/index.php/Home/Goods/goods_detail/goods_id/3135.html">
                            <img height="116" src="/./Uploads/goods_face/20151222/5678ab2165b60.jpg" width="88"/>
                        </a>
                    </li>
                    <li>
                        <a class="a1" href="/index.php/Home/Goods/goods_detail/goods_id/3136.html" title="丹姿他能量男士1+1套装">
                            丹姿他能量男士1+1套...
                        </a>
                        <p>
                            <font color="red">
                                Vip:46.40
                            </font>
                            ￥58.00/套
                        </p>
                        <a class="a2" href="/index.php/Home/Goods/goods_detail/goods_id/3136.html">
                            <img height="116" src="/./Uploads/goods_face/20151222/5678ab7eb2363.jpg" width="88"/>
                        </a>
                    </li>
                    <li>
                        <a class="a1" href="/index.php/Home/Goods/goods_detail/goods_id/3137.html" title="丹姿他能量男士润肤露130g">
                            丹姿他能量男士润肤露1...
                        </a>
                        <p>
                            <font color="red">
                                Vip:27.10
                            </font>
                            ￥33.80/瓶
                        </p>
                        <a class="a2" href="/index.php/Home/Goods/goods_detail/goods_id/3137.html">
                            <img height="116" src="/./Uploads/goods_face/20151222/5678abd8eaa2b.jpg" width="88"/>
                        </a>
                    </li>
                    <div style="clear:both;">
                    </div>
                </ul>
            </div>
            <ul class="rbox-right f-l">
                <li>
                    <a class="a1" href="/index.php/Home/Goods/goods_detail/goods_id/3264.html" title="黑人专研清新牙膏">
                        黑人专研清新牙膏
                    </a>
                    <p>
                        <font color="red">
                            Vip:14.00
                        </font>
                        ￥16.50/支
                    </p>
                    <a class="a2" href="/index.php/Home/Goods/goods_detail/goods_id/3264.html">
                        <img data-original="/./Uploads/goods_face/20151222/5678c567566b8.jpg" height="116" src="/./Uploads/goods_face/20151222/5678c567566b8.jpg" width="88"/>
                    </a>
                </li>
                <li>
                    <a class="a1" href="/index.php/Home/Goods/goods_detail/goods_id/3432.html" title="欧贝斯专业定型啫喱水HS15">
                        欧贝斯专业定型啫喱水H...
                    </a>
                    <p>
                        <font color="red">
                            Vip:14.90
                        </font>
                        ￥18.60/瓶
                    </p>
                    <a class="a2" href="/index.php/Home/Goods/goods_detail/goods_id/3432.html">
                        <img data-original="/./Uploads/goods_face/20151222/5679052daf9a1.jpg" height="116" src="/./Uploads/goods_face/20151222/5679052daf9a1.jpg" width="88"/>
                    </a>
                </li>
                <li>
                    <a class="a1" href="/index.php/Home/Goods/goods_detail/goods_id/3434.html" title="欧贝斯专业造型啫喱膏（高弹保湿）">
                        欧贝斯专业造型啫喱膏（...
                    </a>
                    <p>
                        <font color="red">
                            Vip:15.90
                        </font>
                        ￥19.80/瓶
                    </p>
                    <a class="a2" href="/index.php/Home/Goods/goods_detail/goods_id/3434.html">
                        <img data-original="/./Uploads/goods_face/20151222/56790567e6c61.jpg" height="116" src="/./Uploads/goods_face/20151222/56790567e6c61.jpg" width="88"/>
                    </a>
                </li>
                <li>
                    <a class="a1" href="/index.php/Home/Goods/goods_detail/goods_id/3583.html" title="舒蕾奢养精油修护洗发露">
                        舒蕾奢养精油修护洗发露
                    </a>
                    <p>
                        <font color="red">
                            Vip:49.70
                        </font>
                        ￥59.80/盒
                    </p>
                    <a class="a2" href="/index.php/Home/Goods/goods_detail/goods_id/3583.html">
                        <img data-original="/./Uploads/goods_face/20151222/567921cf31484.jpg" height="116" src="/./Uploads/goods_face/20151222/567921cf31484.jpg" width="88"/>
                    </a>
                </li>
                <div style="clear:both;">
                </div>
            </ul>
            <div style="clear:both;">
            </div>
        </div>
    </div>
    <div style="clear:both;">
    </div>
</div>
@endsection

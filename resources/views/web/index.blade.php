@extends('web.public.public')

@section('title')
首页
@endsection

@section('css')
<link href="{{ url('/web/css/zhonglingxm2.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ url('/web/css/shopping-mall-index.css')}}" rel="stylesheet" type="text/css"/>
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
                <img src="{{ url('/web/images/banner.png') }}"/>
            </a>
        </li>
        <li>
            <a href="JavaScript:;">
                <img src="{{ url('/web/images/banner.png') }}"/>
            </a>
        </li>
        <li>
            <a href="JavaScript:;">
                <img src="{{ url('/web/images/banner.png') }}"/>
            </a>
        </li>
        <li>
            <a href="JavaScript:;">
                <img src="{{ url('Web') }}"/>
            </a>
        </li>
    </ul>
    <div class="ban-box w1200">
        <ol class="ban-ol1">
            <li class="current">
            </li>
            <li>
            </li>
            <li>
            </li>
            <li>
            </li>
            <div style="clear:both;">
            </div>
        </ol>
    </div>
</div>
<div class="zl-tuijian w1200">
    <div class="tuijian-left f-l">
        <img src="{{ url('/web/images/zl2-14.png') }}"/>
    </div>
    <ul class="tuijian-right f-l">
        <li>
            <div class="li-box li-box1">
                <a class="li-a1" href="JavaScript:;">
                    锦尚世家
                </a>
                <a class="li-a2" href="JavaScript:;">
                    锦绣花苑　传承世家
                </a>
                <a class="li-a3" href="JavaScript:;">
                    more
                </a>
            </div>
        </li>
        <li>
            <div class="li-box li-box2">
                <a class="li-a1" href="JavaScript:;">
                    速8快捷酒店
                </a>
                <a class="li-a2" href="JavaScript:;">
                    最大的经济型酒店
                </a>
                <a class="li-a3" href="JavaScript:;">
                    more
                </a>
            </div>
        </li>
        <li>
            <div class="li-box li-box3">
                <a class="li-a1" href="JavaScript:;">
                    老诚一锅羊蝎子火锅
                </a>
                <a class="li-a2" href="JavaScript:;">
                    最养生的火锅
                </a>
                <a class="li-a3" href="JavaScript:;">
                    more
                </a>
            </div>
        </li>
        <li>
            <div class="li-box li-box4">
                <a class="li-a1" href="JavaScript:;">
                    鹏程之家汽车店
                </a>
                <a class="li-a2" href="JavaScript:;">
                    最便宜的汽车4S店
                </a>
                <a class="li-a3" href="JavaScript:;">
                    more
                </a>
            </div>
        </li>
        <li>
            <div class="li-box li-box5">
                <a class="li-a1" href="JavaScript:;">
                    速8快捷酒店
                </a>
                <a class="li-a2" href="JavaScript:;">
                    最大的经济型酒店
                </a>
                <a class="li-a3" href="JavaScript:;">
                    more
                </a>
            </div>
        </li>
        <li>
            <div class="li-box li-box6">
                <a class="li-a1" href="JavaScript:;">
                    老诚一锅羊蝎子火锅
                </a>
                <a class="li-a2" href="JavaScript:;">
                    最养生的火锅
                </a>
                <a class="li-a3" href="JavaScript:;">
                    more
                </a>
            </div>
        </li>
        <li>
            <div class="li-box li-box7">
                <a class="li-a1" href="JavaScript:;">
                    鹏程之家汽车店
                </a>
                <a class="li-a2" href="JavaScript:;">
                    最便宜的汽车4S店
                </a>
                <a class="li-a3" href="JavaScript:;">
                    more
                </a>
            </div>
        </li>
        <li>
            <div class="li-box li-box8">
                <a class="li-a1" href="JavaScript:;">
                    鹏程之家汽车店
                </a>
                <a class="li-a2" href="JavaScript:;">
                    最便宜的汽车4S店
                </a>
                <a class="li-a3" href="JavaScript:;">
                    more
                </a>
            </div>
        </li>
        <div style="clear:both;">
        </div>
    </ul>
    <div style="clear:both;">
    </div>
</div>
@endsection

@section('content')

<div class="zl-info w1200">
    @foreach($dataObj as $k=>$v)
    <style>
        .title1-ul1 .current a{color:#dc4525}
    </style>
    <div class="zl-title1" style="border-color:#dc4525">
        <h3 class="title1-h3 f-l">
            {{$k+1}}F  {{$v->name}}
        </h3>
        <ul class="title1-ul1 f-r">
            @foreach($v->children as $val)
                @foreach($val->grandchild as $va)
                <li class="over" data-id={{ $va->id }}>
                    <a href="JavaScript:;">
                        {{ $va->name }}
                    </a>
                </li>
                @endforeach
            @endforeach

            <div style="clear:both;">
            </div>
        </ul>

        <div style="clear:both;">
        </div>
    </div>
    <div class="sp-con-info" >
        <div class="sp-info-l f-l">
            <a href="#"><img src="{{url('web/images/sp-con-l-tu.gif')}}" /></a>
            <div class="sp-l-b">
                @foreach($v->children as $val)
                    <a href="#">{{$val->name}}</a>
                @endforeach
            </div>
        </div>
        <ul class="sp-info-r f-r">
            @foreach($goodsObj as $va)
            <li>
                <div class="li-top">
                    <a href="#" class="li-top-tu"><img width="95" height="110" src="{{ url('uploads/goods')}}/{{ $va->picname }}" /></a>
                    <p class="jiage"><span class="sp1">￥109</span><span class="sp2">￥209</span></p>
                </div>
                <p class="miaoshu">{{ $va->goodname }}</p>
                <div class="li-md">
                    <div class="md-l f-l">
                        <p class="md-l-l f-l" ap="">1</p>
                        <div class="md-l-r f-l">
                            <a href="JavaScript:;" class="md-xs" at="">∧</a>
                            <a href="JavaScript:;" class="md-xx" ab="">∨</a>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                    <div class="md-r f-l">
                        <button class="md-l-btn1">立即购买</button>
                        <button class="md-l-btn2">加入购物车</button>
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <p class="pingjia">88888评价</p>
                <p class="weike">{{ $va->brand }}</p>
            </li>
            @endforeach
        </ul>
        <div class="start" style="clear:both;"></div>
    </div>

    @endforeach
</div>
@endsection

@section('js')
<script>
$('.kuaijie-box').css('display','block');
$('.nav-kuaijie').removeClass('yjp-hover1');

$('.over').on('mouseenter', function () {

    var that = $(this);
    var id = this.getAttribute('data-id');
    var start = that.parent().parent().next().children('.start');
    var info = that.parent().parent().next().children('.sp-info-r');
    // console.log(that.prop('data-id'+id));
    info.remove();
    if(that.prop('data-id'+id)){

        start.before(that.prop('data-id'+id));
        return;
    }
    $.ajax({
        type : 'post',

        url: '{{ url('/ajax') }}',

        dataType: 'json',

        data : { '_token':'{{csrf_token()}}', 'pid':id },

        success:function (data) {

            var str = '<ul class="sp-info-r f-r">';
            info.remove();
            for (var i = 0; i < data.length; i++) {
                str +='<li><div class="li-top"><a href="#" class="li-top-tu"><img width="95" height="110" src="{{ url('uploads/goods')}}/'+data[i].picname+'"></a>';
                str +='<p class="jiage"><span class="sp1">￥'+data[i].price+'</span><span class="sp2">￥209</span></p>';
                str += '</div><p class="miaoshu">'+data[i].goodname+'</p>';
                str += '<div class="li-md"><div class="md-l f-l"><p class="md-l-l f-l" ap="">1</p><div class="md-l-r f-l">';
                str += '<a href="JavaScript:;" class="md-xs" at="">∧</a>';
                str += '<a href="JavaScript:;" class="md-xx" ab="">∨</a>';

                str += '</div><div style="clear:both;"></div></div>';
                str += '<div class="md-r f-l">';
                str += '<button class="md-l-btn1">立即购买</button>';
                str += '<button class="md-l-btn2">加入购物车</button>';
                str += '</div><div style="clear:both;"></div></div>';
                str += '<p class="pingjia">88888评价</p>';
                str += '<p class="weike">'+data[i].brand+'</p>';
                str += '</li>';
            }
            str+='</ul>';
            that.prop('data-id'+id, str);
            // console.log(a);
            start.before(str);
        }
    });
});

</script>
@endsection
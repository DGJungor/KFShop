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
                <li>
                    <a href="http://{{($v->redirect_url)}}"><img src="{{ url($v['img_url']) }}" /></a>
                </li>
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
    <div class="zl-tuijian w1200">
    <div class="tuijian-left f-l">
        <img src="{{ url('/web/images/zl2-14.png') }}" />
    </div>
    <ul class="tuijian-right f-l">

            @foreach($res['banners'] as $w=>$q)
            @if($q->recommend_location == 1)
        <li>
            <div class="li-box li-box{{$w}}"   style="background: url({{('/uploads/s_').$q->recommend_picname}})no-repeat right 20px;">
                <a href="JavaScript:;" class="li-a1">{{$q->recommend_name}}</a>
                <a href="JavaScript:;" class="li-a2">{{$q->recommend_introduction}}</a>
                <a href="JavaScript:;" class="li-a3">more</a>
            </div>
        </li>
            @endif
            @endforeach

        <div style="clear:both;"></div>
    </ul>
    <div style="clear:both;"></div>
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
                <li class="over">
                    <a href="JavaScript:;" data-id={{ $va->id }}>
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
            <a href="#"><img width="233" height="454" src="{{url('uploads/types')}}/{{$v->picname}}" /></a>
            <div class="sp-l-b">
                @foreach($v->children as $val)
                    <a href="#">{{$val->name}}</a>
                @endforeach
            </div>
        </div>
        <div class="charu">
            <ul class="sp-info-r f-r">
                @foreach($v->goods as $va)
                <li>
                    <div class="li-top">
                        <a href="{{ asset('details') }}/{{ $va->id }}" class="li-top-tu"><img width="95" height="110" src="{{ url('uploads/goods')}}/{{ $va->picname }}" /></a>
                        <p class="jiage"><span class="sp1">￥{{$va->price}}</span><span class="sp2">￥{{$va->inventory}}</span></p>
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
                            <a href="{{ asset('buynow') }}/{{$va->id}}"><button class="md-l-btn1">立即购买</button></a>
                            <a href=""><button class="md-l-btn2">加入购物车</button></a>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                    <p class="pingjia">0评价</p>
                    <p class="weike">{{ $va->brand }}</p>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="start" style="clear:both;"></div>
    </div>

    @endforeach
</div>
@endsection

@section('js')
<script>
$('.md-xx').on('click', function(){ alert(1)})
$('.kuaijie-box').css('display','block');
$('.nav-kuaijie').removeClass('yjp-hover1');

$('.over a').off().on('mouseover', function () {
    var that = $(this);
    var id = this.getAttribute('data-id');
    var info = that.parent().parent().parent().next().children('.charu');
    // console.log(that.prop('data-id'+id));
    info.children('.sp-info-r').remove();
    if(that.prop('data-id'+id)){

        info.append(that.prop('data-id'+id));
        return;
    }else{


        $.ajax({
            type : 'post',

            url: '{{ url('/ajax') }}',

            dataType: 'json',

            data : { '_token':'{{csrf_token()}}', 'pid':id },

            success:function (data) {

                var str = '<ul class="sp-info-r f-r">';
                // info.remove();
                for (var i = 0; i < data.length; i++) {
                    str +='<li><div class="li-top"><a href="{{ asset('details') }}/'+data[i].id+'" class="li-top-tu"><img width="95" height="110" src="{{ url('uploads/goods')}}/'+data[i].picname+'"></a>';
                    str +='<p class="jiage"><span class="sp1">￥'+data[i].price+'</span><span class="sp2">￥'+data[i].inventory+'</span></p>';
                    str += '</div><p class="miaoshu">'+data[i].goodname+'</p>';
                    str += '<div class="li-md"><div class="md-l f-l">';
                    str += '<p class="md-l-l f-l" ap="">1</p><div class="md-l-r f-l">';
                    str += '<a href="JavaScript:;" class="md-xs" at="">∧</a>';
                    str += '<a href="JavaScript:;" class="md-xx" ab="">∨</a>';

                    str += '</div><div style="clear:both;"></div></div>';
                    str += '<div class="md-r f-l">';
                    str += '<button class="md-l-btn1">立即购买</button>';
                    str += '<a href="{{asset('buynow')}}/'+data[i].id+'"><button class="md-l-btn2">加入购物车</button></a>';
                    str += '</div><div style="clear:both;"></div></div>';
                    str += '<p class="pingjia">0评价</p>';
                    str += '<p class="weike">'+data[i].brand+'</p>';
                    str += '</li>';
                }
                str+='</ul>';
                that.prop('data-id'+id, str);
                // console.log(a);
                // console.log(that.prop('data-id'+id));

                // info.next().remove();
                info.children('.sp-info-r').remove();
                info.append(str);
            }
        });
    }
});

</script>
@endsection
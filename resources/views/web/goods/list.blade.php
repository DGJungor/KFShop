@extends('web.public.public')

@section('title')
    商品列表页
@endsection

@section('css')

    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/shopping-mall-index.css') }}" />

@endsection


@section('menu')
    <div class="brand-sales " >
        <dl style="border-bottom:none;">

            <dt style="width: 200px;">
             位置:   {{$types[0]->name}}<em>&gt;</em>{{$children->name}}<em>&gt;</em>{{$type[0]->name}}
            </dt>

            <div style="clear:both;"></div>
        </dl>

        <dl style="border-bottom:none;">
        <dt style="width: 250px">
            {{$type[0]->name}} &nbsp; <span style="color: #1D1D1D"> 商品筛选</span>
             <span style="color: #1D1D1D">共
             <strong>{{count($goods)}}</strong>
             件相关商品
             </span>

        </dt>
            <div style="clear:both;"></div>
        </dl>

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

                  @foreach( $recommend as $vv )
                    {{--@if( $vv->recommend_location == 2 )--}}
                    <li style="height:250px;">
                        <div class="li-top">
                            <a href="#" class="li-top-tu" target="_blank"><img src="{{ url('uploads') }}/x_{{$vv->recommend_picname}}" width='95' height='110' /></a>
                            <p class="jiage"><span class="sp1">{{$vv->recommend_introduction}}</span></p>

                        </div>
                        <p class="miaoshu"></p>
                        <div class="li-md">

                            <div style="clear:both;"></div>
                        </div>
                        <p class="pingjia">0评价</p>
                    </li>
                        {{--@endif--}}
                    @endforeach

                </ul>
            </div>
        </div>
        <div class="shop-pg-right f-r">

            <div class="shop-right-cmp" style="margin-top:0;">
                <ul class="shop-cmp-l f-l">

                    <li class="current">
                        <a href="#" onclick="location.reload()" title="综合">综合</a>
                    </li>
                    <li >
                        <a  href="#" id="buys" ty-id="{{$type[0]->id}}" title="销量">销量 ↓</a>
                    </li>

                    <li >
                        <a href="#" id="prices" ty-id="{{$type[0]->id}}"  title="价格">价格 ↓</a>
                    </li>

                    {{--<li >--}}
                        {{--<a  href="#" id="comments" ty-id="{{$type[0]->id}}" title="评价">评价 </a>--}}
                    {{--</li>--}}

                    <div style="clear:both;"></div>
                </ul>

                <div style="clear:both;"></div>
            </div>
            <div class="shop-right-con">
                <ul class="shop-ul-tu shop-ul-tu1" id="goodslist">

                    @foreach( $goods as $ve )

                    <li style="margin-right:0;">
                        <div class="li-top">
                            <a href="{{ url('details') }}/{{$ve->id}}"  target="_blank" class="li-top-tu"><img src="{{ url('uploads/goods') }}/{{$ve->picname}}" height="110" width="95" /></a>
                            <p class="jiage">
                                <span class="sp1">￥{{$ve->price}}</span>
                            </p>
                        </div>
                        <p style="text-align: center;font-size: 16px; color: #000">{{$ve->goodname}}</p>
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
                        <br>
                        <p style="margin-left: 10px">销量：{{$ve->buy}}</p>

                        <p class="weike">{{$ve->brand}}自营</p>
                    </li>
                    @endforeach



                    {{--遍历--}}
                </ul>
                <div style="clear:both;" class="news"></div>
                    {{--@endforeach--}}
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>
    
     <!--分页-->
        <div class="paging">
                <div class="pag-left f-l">

                    <ul class="left-m f-l">
                        {{ $goods->links() }}
                    </ul>

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

    //点击获取排序的焦点样式
    $(function (){
        $('li').click(function (){
            $(this).addClass('current').siblings('li').removeClass('current');
        });

    });
    $('a').off().click(function () {
        var path = $(this).attr('id');
//        console.log(path);
        var that = $(this);
        var id = this.getAttribute('ty-id');
        var ssd = that.parent().parent().parent().next().children('.news');
        var lists= that.parent().parent().parent().next().children('#goodslist');
        lists.remove();
        if(that.prop('ty-id'+id)){
            ssd.before(that.prop('ty-id'+id));
            return;
        }

        $.ajax({

            type:'POST',

            url:'/goods_list/ajax',

            dataType:'json',

            data : { '_token':'{{csrf_token()}}', 'pid':id ,'path':path},

            success:function (data) {

               var str='<ul class="shop-ul-tu shop-ul-tu1" id="goodslist">';
               for(var i = 0; i < data.length; i++) {
                   str += '<li style="margin-right:0;">';
                   str += '<div class="li-top">';
                   str += '<a href="#"  target="_blank" class="li-top-tu"><img src="{{ url('uploads/goods') }}/' + data[i].picname + '" height="110" width="95" /></a>';
                   str += '<p class="jiage">';
                   str += '<span class="sp1">￥'+data[i].price+'</span>';
                   str += '</p>';
                   str += '</div>';
                   str += '<p style="text-align: center;font-size: 16px; color: #000">' + data[i].goodname + '</p>';
                   str += '<div class="li-md">';
                   str += '<div class="md-l f-l">';
                   str += '<span class="md-l-l f-l" ></span>';
                   str += '<div class="md-l-r f-l">';
                   str += '</div>';
                   str += '<div style="clear:both;"></div>';
                   str += '</div>';
                   str += '<div class="md-r f-l">';
                   str += '<button class="md-l-btn1">立即购买</button>';
                   str += '<button class="md-l-btn2">加入购物车</button>';
                   str += '</div>';
                   str += ' <div style="clear:both;"></div>';
                   str += '</div>';
                   str += '<br>';
                   str += '<p style="margin-left: 10px">销量：' + data[i].buy + '</p>';
                   str += '<p class="weike">' + data[i].brand + '自营</p>';
                   str += '</li>';

               }
                str += '</ul>';
               that.prop('ty-id'+id, str);

                console.log(that.prop('ty-id'+id))
               ssd.before(str);
            }



        });

    });


    </script>

@endsection

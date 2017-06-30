@extends('web.public.public')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/shopping-mall-index.css') }}"/>
@endsection


@section('title')
    购物车
@endsection



@section('content')
    {{ dump($cartInfo) }}
    {{ dump($cartTotal) }}
    <form action="orders/create" method="GET">
        {{csrf_field()}}
        <div class="cart-content w1200">
            <ul class="cart-tit-nav">
                <li class="current"><a href="#">全部商品 21</a></li>
                <li><a href="#">降价商品 1</a></li>
                <li><a href="#">进口商品 1</a></li>
                <div style="clear:both;"></div>
            </ul>
            <div class="cart-con-tit">
                <p class="p1">
                    <input type="checkbox" value="" name="all" id="all">
                    <script>

                    </script>
                    <span>全选</span>
                </p>
                <p class="p2">商品信息</p>
                <p class="p3">规格</p>
                <p class="p4">数量</p>
                <p class="p5">单价（元）</p>
                <p class="p6">金额（元）</p>
                <p class="p7">操作</p>
            </div>

            {{--  商品栏  --}}

            @foreach( $cartInfo as $v )
                {{ dump($v)  }}
                <div class="cart-con-info" id="{{ $v['__raw_id'] }}">
                    <div class="info-top">

                    </div>
                    <div class="info-mid">
                        <input type="checkbox" value="{{ $v['__raw_id'] }}" name="hobby[]" class="mid-ipt f-l">
                        <input type="hidden" value="{{ $v['total'] }}" class="onesum">
                        {{--<script>--}}
                            {{--$(function (){--}}
                                {{--if (this.checked) {--}}
                                    {{--var sum = $('.mid-ipt').next().val();--}}
                                    {{--alert(sum);--}}
                                {{--}else {--}}
                                    {{--var sum = $('.mid-ipt').next().val();--}}
                                    {{--alert(sum);--}}
                                {{--}--}}
                            {{--});--}}
                        {{--</script>--}}
                        <div class="mid-tu f-l">
                            <a href="#"><img src="{{url( '/uploads/goods/m')}}{{$v['picname']}}"/></a>
                        </div>
                        <div class="mid-font f-l">
                            <a href="#">{{ $v['name'] }}<br/></a>
                            <span>满赠</span>
                            <br>
                            ------------------------------------
                        </div>
                        <div class="mid-guige f-l">
                            <p>默认</p>


                            {{--<p>颜色：蓝色</p>--}}
                            {{--<p>尺码：XL</p>--}}
                            {{--<a href="JavaScript:;" class="xg" xg="xg1">修改</a>--}}
                            {{--<div class="guige-xiugai" xg-g="xg1">--}}
                            {{--<div class="xg-left f-l">--}}
                            {{--<dl>--}}
                            {{--<dt>颜 色</dt>--}}
                            {{--<dd>--}}
                            {{--<a href="JavaScript:;" class="current">黑色</a>--}}
                            {{--<a href="JavaScript:;">白色</a>--}}
                            {{--</dd>--}}
                            {{--<div style="clear:both;"></div>--}}
                            {{--</dl>--}}
                            {{--<dl>--}}
                            {{--<dt>尺 码</dt>--}}
                            {{--<dd>--}}
                            {{--<a href="JavaScript:;" class="current">M</a>--}}
                            {{--<a href="JavaScript:;">L</a>--}}
                            {{--<a href="JavaScript:;">XL</a>--}}
                            {{--</dd>--}}
                            {{--<div style="clear:both;"></div>--}}
                            {{--</dl>--}}
                            {{--<a href="JavaScript:;" class="qd">确定</a>--}}
                            {{--<a href="JavaScript:;" class="qx" qx="xg1">取消</a>--}}
                            {{--</div>--}}
                            {{--<div class="xg-right f-l">--}}
                            {{--<a href="#"><img src="images/dai2.gif"/></a>--}}
                            {{--</div>--}}
                            {{--<div style="clear:both;"></div>--}}
                            {{--</div>--}}
                        </div>
                        <div class="mid-sl f-l">
                            <a href="JavaScript:;" class="num-left">-</a>

                            <input onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"
                                   onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"
                                   type="text" value="{{ $v['qty'] }}" class="num">

                            <input type="hidden" value="{{  $v['__raw_id'] }}" class="id">
                            <a href="JavaScript:;" class="num-right">+</a>

                        </div>
                        <p class="mid-dj f-l">¥ <span class="cartprice">{{ $v['price'] }}</span>.00</p>
                        <p class="mid-je f-l">¥ <span class="carttotal">{{ $v['total'] }}</span>.00</p>
                        <div class="mid-chaozuo f-l">
                            {{--<form action="cart/{{ $v['__raw_id'] }}" method="POST">--}}
                            {{--{{ csrf_field() }}--}}
                            {{--<input type="hidden" name="_method" value="DELETE">--}}
                            {{--<a href="#">移入收藏夹</a>--}}
                            {{--<a href="cart/{{ $v['__raw_id'] }}"><input class="btnDel" type="submit" value="删除"></a>--}}

                            {{--</form>--}}
                            <button class="btnDel">删除</button>
                            <input type="hidden" value="{{ $v['__raw_id'] }}">

                        </div>
                        <div style="clear:both;"></div>
                    </div>
                </div>

            @endforeach

        <!--分页-->

            {{--<div class="paging">--}}
            {{--<div class="pag-left f-l">--}}
            {{--<a href="#" class="about left-r f-l"><</a>--}}
            {{--<ul class="left-m f-l">--}}
            {{--<li><a href="#">1</a></li>--}}
            {{--<li class="current"><a href="#">2</a></li>--}}
            {{--<li><a href="#">3</a></li>--}}
            {{--<li><a href="#">4</a></li>--}}
            {{--<li><a href="#">5</a></li>--}}
            {{--<li><a href="#">6</a></li>--}}
            {{--<li><a href="#">...</a></li>--}}
            {{--<li><a href="#">100</a></li>--}}
            {{--<div style="clear:both;"></div>--}}
            {{--</ul>--}}
            {{--<a href="#" class="about left-l f-l">></a>--}}
            {{--<div style="clear:both;"></div>--}}
            {{--</div>--}}
            {{--<div class="pag-right f-l">--}}
            {{--<div class="jump-page f-l">--}}
            {{--到第<input type="text"/>页--}}
            {{--</div>--}}
            {{--<button class="f-l">确定</button>--}}
            {{--<div style="clear:both;"></div>--}}
            {{--</div>--}}
            {{--<div style="clear:both;"></div>--}}
            {{--</div>--}}


            <div class="cart-con-footer">
                <div class="quanxuan f-l">
                    <input type="checkbox" value="all" name="allcart" id="allcart">
                    <span>全选</span>
                    <a href="#">删除</a>
                    <a href="#">加入收藏夹</a>
                    <p>（此处始终在屏幕下方）</p>
                </div>
                <div class="jiesuan f-r">
                    <div class="jshj f-l">
                        <input type="hidden" value="0" id="sum">
                        <p>合计（不含运费）</p>
                        <p class="jshj-p2">
                            ￥：<span id="bigTotal">0</span>.00
                        </p>
                    </div>
                    {{--<a href="JavaScript:;" class="js-a1 f-l"></a>--}}

                    <button class="js-a1 f-l" type="submit">结算</button>

                    <div style="clear:both;"></div>
                </div>
                <div style="clear:both;"></div>
            </div>
        </div>
    </form>

    <div class="zhang">
        <input type="hidden" value="123" class="junjun">
        <input type="hidden" value="123" class="junjun">
    </div>

    <div class="zhang">
        <input type="hidden" value="123" class="junjun">
        <input type="hidden" value="123" class="junjun">
    </div>
@endsection

@section('js')

    <script>


        //点击任何一个多选框 计算 选中框价格和
        $('.mid-ipt').on("click",function () {
            var sum = 0;
            $('.mid-ipt').each( function () {
                if (this.checked) {
                    sum += parseInt($(this).next().val());
                } else {
                }
            });
            $('#bigTotal').html(sum);
            $('#sum').html(sum);
        });

//        //当点击其中一个多选框时  计算价格
//        $('.mid-ipt').on("click", function () {
//            var sum = parseInt($('#sum').val());
//            if (this.checked) {
//                sum = parseInt($(this).next().val())+parseInt(sum);
//                $('#sum').val(sum);
//            } else {
//                sum = parseInt(sum)-parseInt($(this).next().val());
//                $('#sum').val(sum);
//            }
//            $('#bigTotal').html(sum);
//        });


        //删除按钮  当点击删除时 页面上移除商品 并且ajax 删除基于redis的session中的购物车中的东西
        $('.btnDel').on("click", function () {
            var id = $(this).next().val();
            $('#' + id).remove();
            $.ajax({
                type: "POST",
                url: "{{ url('/cart/del') }}",

                data: {'_token': '{{csrf_token()}}', 'id': id},
                success: function (data) {
//                    alert(data);

                }


            });

        });


        //全选按钮
        $("#all").click(function () {
            if (this.checked) {
                $('.info-mid input[type=checkbox]').prop('checked', true);
            } else {
                $('.info-mid input[type=checkbox]').prop('checked', "");
            }

        });

        //结算前的 全选按钮
        $("#allcart").click(function () {
            if (this.checked) {
                $('#bigTotal').html('{{ $cartTotal }}');
                $('#sum').val({{$cartTotal}});
                $('.info-mid input[type=checkbox]').prop('checked', true);
            } else {
                $('.info-mid input[type=checkbox]').prop('checked', "");
                $('#sum').val(0);
                $('#bigTotal').html('0');
            }
        });

        //输入修改购物车 商品数量  失去焦点时触发ajax修改
        $('.num').keyup(function () {

            var id = $(this).next().val();
            var num = $(this).val();
            var price = $(this).parent().next().children().html();

            $(this).parent().next().next().children().html(num * price);
            $.ajax({
                type: "POST",
                url: "{{ url('/cart/ajax') }}",

                data: {'_token': '{{csrf_token()}}', 'id': id, 'num': num, 'type': 'update'},
                success: function (data) {
//                    window.location.reload();
//                    alert(data);
                }
            });
        });

        //鼠标点击加好  增减数量一
        $('.num-left').on(
            "click",
            function () {

                var num = $(this).next().val();
                num--;
                var id = $(this).next().next().val();
                var price = $(this).parent().next().children().html();

                $(this).next().val(num);
                $(this).parent().next().next().children().html(num * price);

                $.ajax({
                    type: "POST",
                    url: "{{ url('/cart/ajax') }}",

                    data: {'_token': '{{csrf_token()}}', 'id': id, 'num': num, 'type': 'subtract'},
                    success: function (data) {
//                    alert(data);

                    }
                });
            }
        );


        //鼠标点击加号  购物车商品数量减一
        $('.num-right').on(
            "click",
            function () {

                var num = $(this).prev().prev().val();
                num++;

                var id = $(this).prev().val();
                var price = $(this).parent().next().children().html();

                $(this).prev().prev().val(num);
                $(this).parent().next().next().children().html(num * price);

                $.ajax({
                    type: "POST",
                    url: "{{ url('/cart/ajax') }}",

                    data: {'_token': '{{csrf_token()}}', 'id': id, 'num': num, 'type': 'add'},
                    success: function (data) {
//                    alert(data);

                    }
                });
            }
        );


        //删除按钮 删除购物车不刷新整个页面


    </script>
@endsection
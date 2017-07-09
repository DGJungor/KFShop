@extends('web.public.public')

@section('title')

商品评价表

@endsection

@section('css')

<link rel="stylesheet" type="text/css" href="{{ url('/web/css/comment.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('/web/css/shopping-mall-index.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('/web/css/star-rating.css' ) }}" media="all"/>
{{--<script type="text/javascript" src="{{ url('/web/js/star.js') }}"></script>--}}

@endsection



@section('content')

 <!--内容开始-->
        <div class="personal w1200">
            @include('web.public.leftMenu')
            <div class="management f-r">

                    <div class="tanchuang-con">
                        <div class="tc-title" style="text-align: center; ">
                            <label style=" font-size: 15px;">订单评价</label><br>
                            <label id="orders_guid" >订单号:</label><span>&nbsp;{{ $value->orders_guid }}&nbsp;</span><label ></label>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <input type="hidden" id="user_id" value="{{ $value->user_id }}">
                            <input type="hidden" id="cargo_id" value="{{ $value->cargo_id }}">
                            <input type="hidden" id="goods_id" value="{{ $value->good->id }}">
                            <input type="hidden" id="order_id" value="{{ $value->id }}">
                            <label id="created_at">{{ $value->created_at }}</label>
                        </div>
                    <ul class="tc-con2">
                        <li class="tc-li1">
                            <p class="l-p">商品ID</p>
                            <div class="xl-dz">
                                <div class="layui-form-item">
                                    <div class="dz-left f-l">
                                        <span style="font-size: 15px; line-height: 31px;">{{ $value->good->id }}</span>
                                    </div>
                                </div>
                                <div style="clear:both;"></div>
                            </div>
                            <div style="clear:both;"></div>
                        </li>
                        <li class="tc-li1">
                            <p class="l-p">商品名称</p>
                            <div class="xl-dz">
                                <div class="layui-form-item">
                                    <div class="dz-left f-l">
                                        <span id="goods_name" style="font-size: 15px; line-height: 31px">{{ $value->good->goodname }}</span>
                                    </div>
                                </div>
                                <div style="clear:both;"></div>
                            </div>
                            <div style="clear:both;"></div>
                        </li>
                        <li class="tc-li1">
                            <p class="l-p">商品单价</p>
                            <div class="xl-dz">
                                <div class="layui-form-item">
                                    <div class="dz-left f-l">
                                        <span id="cargo_price" style="font-size: 15px; line-height: 31px">￥{{ $value->good->price }}</span>
                                    </div>
                                </div>
                                <div style="clear:both;"></div>
                            </div>
                            <div style="clear:both;"></div>
                        </li>
                        <li class="tc-li1">
                            <p class="l-p">评分<span>*</span></p>

                                <div class="dz-left f-l">
                                <dd>
                                    <input type="hidden"  id="star" value="" class="star">
                                    <ul class="rating nostar">
                                        <li class="one"><a href="#" title="1">1</a><span></span></li>
                                        <li class="two"><a href="#"  title="2">2</a><span></span></li>
                                        <li class="three"><a href="#"  title="3">3</a><span></span></li>
                                    </ul>
                                    <span></span>

                                </dd>
                                    </div>
                                <div style="clear:both;"></div>
                            <dl>
                        </li>
                        <li class="tc-li1">
                            <p class="l-p">评论内容</p>
                            <textarea id="comment_info" class="textarea1" maxlength="50" ></textarea>
                            <div style="clear:both;"></div>
                        </li>
                    </ul>
                        {!! csrf_field() !!}
                        <a href="{{ asset('/user/comment') }}"><button id="createdAddress" class="btn-pst2">提交评论</button></a>
                        <span style="padding-left: 16px;margin-top: 9px;">
                            <input type="checkbox"id="comment_type" name="comment_type" value="0"  checked="checked"> <label for="check1">匿名评价</label>
                        </span>

                </div>

            </div>
            <div style="clear:both;"></div>
        </div>

@endsection
@section('js')
    <script src="{{ asset('/style/js/plugins/layer/layer.min.js') }}"></script>
    <script src="{{ asset('/style/js/demo/layer-demo.js') }}"></script>

    <script>
        /*商品评分效果*/
        $(function(){
            //通过修改样式来显示不同的星级
            $("ul.rating li a").click(function(){
                var title = $(this).attr("title");
                $(this).parent().parent().prev().val(title);
                var cl = $(this).parent().attr("class");
                $(this).parent().parent().removeClass().addClass("rating "+cl+"star");
                $(this).blur();//去掉超链接的虚线框
                return false;
            })
        })
    </script>
    <script>
        $(function(){
            $('#comment_type').click(function(){
                if($('input[name="comment_type"]').prop("checked"))
                {
                    $('input[name="comment_type"]').val(0);
                }
                else
                    $('input[name="comment_type"]').val(1);
            });
        })

    </script>
    <script>

        $('.btn-pst2').click(function () {
            var goodsid = $('#goods_id').val();
            var userid = $('#user_id').val();
            var orderid = $('#order_id').val();
            var cargoid = $('#cargo_id').val();
            var tyles = $('#comment_type').val();
            var star = $('#star').val();
            var info = $('#comment_info').val();

            $.ajax({
                type : "POST",
                url : '/user/ajax/comment',
                dataType : 'json',
                data : {
                    good_id : goodsid,
                    user_id : userid,
                    order_id : orderid,
                    cargo_id : cargoid,
                    comment_tyle : tyles,
                    star : star,
                    comment_info : info,
                    _token :  "{{ csrf_token() }}"
                },
                success: function (data) {
                    if (data == 0) {
                        layer.msg(data.message, 1, 1);
                    }

                }



            });

        })


    </script>

@endsection

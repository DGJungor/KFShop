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
                            <label>订单号:</label><span>&nbsp;</span><label>123</label>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <label>2017-02-12</label>
                        </div>
                    <ul class="tc-con2">
                        <li class="tc-li1">
                            <p class="l-p">用户ID</p>
                            <div class="xl-dz">
                                <div class="layui-form-item">
                                    <div class="dz-left f-l">
                                        <input type="text" name="user_id" value="" readonly>
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
                                        <input type="text" name="goods_id" value="" readonly>
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
                                    <input type="hidden" value="" name="star" class="star">
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
                            <textarea id="det_address" class="textarea1" name="comment_info" maxlength="50" ></textarea>
                            <div style="clear:both;"></div>
                        </li>
                    </ul>
                        {!! csrf_field() !!}
                    <button id="createdAddress" class="btn-pst2">提交评论</button>
                        <span style="padding-left: 16px;margin-top: 9px;">
                            <input type="checkbox"id="check1" name="comment_type" value="0"  checked="checked"> <label for="check1">匿名评价</label>
                        </span>

                </div>

            </div>
            <div style="clear:both;"></div>
        </div>

@endsection
@section('js')

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
            $('#check1').click(function(){
                if($('input[name="comment_type"]').prop("checked"))
                {
                    $('input[name="comment_type"]').val('0');
                }
                else
                    $('input[name="comment_type"]').val('1');
            });
        })

    </script>
    <script>





    </script>

@endsection

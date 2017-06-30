@extends('web.public.public')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/shopping-mall-index.css')}}"/>
@endsection


@section('title')
    确认订单
@endsection



@section('content')
    {{ dump($list) }}
    {{ dump($guid) }}
    {{ dump($total) }}
    {{ dump($address) }}

    <div class="payment-interface w1200">
        <div class="pay-info">
            <div class="info-tit">
                <h3>选择收货地址</h3>
            </div>
            <ul class="pay-dz">

            @foreach( $address as $v )
                {{--{{ dump($v) }}--}}
                @if($v->{'status'}==2)
                        <li class="current" value="{{ $v->{'id'} }}">

                            {{--让默认选中的地址id添加到下方的 表单隐藏域  通过匿名函数自动加载--}}
                            <script>
                                $(function () {
                                    $('#addressId').val({{ $v->{'id'} }});
                                });
                            </script>

                    @else
                        <li value="{{ $v->{'id'} }}">
                    @endif
                    <h3><span class="sp1"> {{ $v->{'address'} }} </span><span class="sp2"> {{-- 地址 --}}  </span>（<span class="sp3">{{ $v->{'name'} }}</span> 收）</h3>
                    <p><span class="sp1"> {{ $v->{'det_address'} }} </span><span class="sp2"> {{ $v->{'tel'}  }}</span></p>
                    <a href="JavaScript:;" xiugai="">修改</a>

                </li>
            @endforeach

                <div style="clear:both;">

                </div>
            </ul>
            <p class="pay-xgdz">修改地址和使用新地址样式一样。</p>
            <button class="pay-xdz-btn">使用新地址</button>
        </div>
        <div class="pay-info">
            <div class="info-tit" style="border-bottom:0;">
                <h3>订单信息</h3>
            </div>
        </div>
        <div class="cart-con-info">
            <div class="cart-con-tit" style="margin:20px 0 5px;">
                <p class="p1" style="width:400px;">
                    {{--<input value="" name="hobby" type="checkbox">--}}
                    <span> </span>
                </p>
                <p class="p3" style="width:145px;"></p>
                <p class="p4" style="width:130px;">规格</p>
                <p class="p8" style="width:75px;">数量</p>
                <p class="p5" style="width:100px;">运费</p>
                <p class="p6" style="width:130px;">单价（元）</p>
                <p class="p7">金额(元)</p>
                {{--<p class="p7">配送方式</p>--}}
            </div>

            @foreach( $list as $v )
            <div class="info-mid">
                <div class="mid-tu f-l">
                    <a href="#"><img src="{{url( '/uploads/goods/m')}}{{$v['picname']}}"></a>
                </div>
                <div class="mid-font f-l" style="margin-right:40px;">
                    <a href="#">{{ $v['name'] }}</a>
                    <br>
                    --------------------------------------------------------------------
                </div>
                <div class="mid-guige1 f-l" style="margin-right:40px;">
                    <p>颜色：蓝色</p>
                    <p>尺码：XL</p>
                </div>
                {{--<div class="mid-sl f-l" style="margin:10px 54px 0px 0px;">--}}
                    {{--<a href="JavaScript:;" class="sl-left">-</a>--}}
                    {{--<input value="1" type="text">--}}
                    {{--<a href="JavaScript:;" class="sl-right">+</a>--}}
                {{--</div>--}}
                <p class="mid-dj f-l" style="width:50px;">{{ $v['qty'] }}</p>
                <p class="mid-yunfei f-l" style="width:70px;" >¥ 0.00</p>
                <p class="mid-dj f-l">¥ {{ $v['price'] }}</p>
                <p class="mid-je f-l" style="width:50px;" >¥ {{ $v['qty']*$v['price'] }}</p>
                {{--<div class="mid-chaozuo f-l">--}}
                    {{--<select>--}}
                        {{--<option>送货上门</option>--}}
                        {{--<option>快递包邮</option>--}}
                    {{--</select>--}}
                {{--</div>--}}
                <div style="clear:both;"></div>
            </div>
            @endforeach

            <div class="info-heji">
                <p class="f-r">店铺合计(含运费)：<span>¥{{ $total }}</span></p>
                <h3 class="f-r">订单号：{{ $guid }}</h3>
            </div>
            <div class="info-tijiao">
                <p class="p1">实付款：<span>¥{{ $total }}</span></p>
                <form action="/orders" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="addressId" value="" id="addressId">
                    <input type="hidden" name="ordersList" value="{{ json_encode($list) }}">
                    <input type="hidden" name="guid" value="{{ $guid }}">
                 <button class="btn" type="submit">提交订单</button>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>

        //获取地址列表选中的ID 传到form表单的隐藏域中
        $('.pay-dz > li').on("click", function (){
            var addressId = $(this).val();
            $('#addressId').val(addressId);
        });

    </script>

@endsection
@extends('web.public.public')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/style.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/shopping-mall-index.css') }}"/>
@endsection


@section('title')
    订单支付
@endsection



@section('content')
    <div class="payment-interface w1200">
        <div class="pay-info">
            <div class="info-tit">
                <h3>选择支付方式</h3>
            </div>
            <ul class="pay-yh">
                <li>
                    <input value="" name="hobby" type="checkbox">
                    <img src="images/jiangheng.gif">
                    <div style="clear:both;"></div>
                </li>
                <li>
                    <input value="" name="hobby" type="checkbox">
                    <img src="images/jiangheng.gif">
                    <div style="clear:both;"></div>
                </li>
                <li>
                    <input value="" name="hobby" type="checkbox">
                    <img src="images/jiangheng.gif">
                    <div style="clear:both;"></div>
                </li>
                <li style="border-right:0; width:298px;">
                    <input value="" name="hobby" type="checkbox">
                    <img src="images/jiangheng.gif">
                    <div style="clear:both;"></div>
                </li>
               
                <div style="clear:both;"></div>
            </ul>
        </div>
        <div class="pay-info">
            <div class="info-tit">
                <h3>输入卡号</h3>
            </div>
            <div class="pay-kahao">
                <input placeholder="请输入银行卡号或支付宝账号" type="text">
                <p>输入正确</p>
            </div>
        </div>
        <div class="pay-info">
            <div class="info-tit">
                <h3>输入密码</h3>
            </div>
            <div class="pay-mima">
                <p class="mima-p1">你在安全的环境中，请放心使用！</p>
                <div class="mima-ipt">
                    <p>支付宝或银行卡密码：</p>
                    <input style="border-left:1px solid #E5E5E5;" type="text"><input type="text"><input
                            type="text"><input type="text"><input type="text"><input type="text">
                    <span>请输入6位数字支付密码</span>
                </div>
                <button class="mima-btn">立即支付</button>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
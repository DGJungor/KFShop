@extends('web.public.public')

@section('title')
    注册
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('web/css/shopping-mall-index.css') }}" />
@endsection

@section('content')
    <div class="password-con registered">
        <div class="psw">
            <p class="psw-p1">用户名</p>
            <input type="text" placeholder="HR了" />
            <span class="dui"></span>
        </div>
        <div class="psw">
            <p class="psw-p1">输入密码</p>
            <input type="text" placeholder="请输入密码" />
            <span class="cuo">密码由6-16的字母、数字、符号组成</span>
        </div>
        <div class="psw">
            <p class="psw-p1">确认密码</p>
            <input type="text" placeholder="请再次确认密码" />
            <span class="cuo">密码不一致，请重新输入</span>
        </div>
        <div class="psw psw2">
            <p class="psw-p1">手机号/邮箱</p>
            <input type="text" placeholder="请输入手机/邮箱验证码" />
            <button>获取短信验证码</button>
        </div>
        <div class="psw psw3">
            <p class="psw-p1">验证码</p>
            <input type="text" placeholder="请输入手机/邮箱验证码" />
        </div>
        <div class="psw psw3">
            <p class="psw-p1">验证码</p>
            <input type="text" placeholder="请输入验证码" />
        </div>
        <div class="yanzhentu">
            <div class="yz-tu f-l">
                <img src="images/psw-yanzhengtu.gif" />
            </div>
            <p class="f-l">看不清？<a href="#">换张图</a></p>
            <div style="clear:both;"></div>
        </div>
        <div class="agreement">
            <input type="checkbox" name="hobby"></input>
            <p>我有阅读并同意<span>《宅客微购网站服务协议》</span></p>
        </div>
        <button class="psw-btn">立即注册</button>
        <p class="sign-in">已有账号？请<a href="#">登录</a></p>
    </div>
@endsection
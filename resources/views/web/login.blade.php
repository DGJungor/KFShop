<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
<link rel="stylesheet" type="text/css" href="{{ url('web/css/style.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('web/css/shopping-mall-index.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('web/css/zhonglingxm2.css') }}" />
<script type="text/javascript" src="{{ url('web/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ url('web/js/zhonglin.js') }}"></script>
</head>

<body>

    <div class="sign-logo w1200">
        <h1 class="zl-h11"><a href="#" title="宅客微购"><img src="{{ url('/web/images/zl2-01.gif') }}" /></a></h1>
    </div>

    <div class="sign-con w1200">
    <img src="{{ url('/web/images/logn-tu.gif') }}" class="sign-contu f-l" />
    <form action="/login" method="POST" class="sign-ipt f-l">
        <p>用户名</p>
        <input type="text" name="name" placeholder="手机号/邮箱" />
        <p>密码</p>
        <input type="text" name="password" placeholder="密码" /><br />
        <div>
            <input type="hidden" size="25" placeholder="验证码" />
        </div>
        <button class="slig-btn">登录</button>
        <p>已有账号？请<a href="#">登录</a><a href="#" class="wj">忘记密码？</a></p>
        <div class="sign-qx">
            <a href="#" class="f-r"><img src="{{ url('/web/images/sign-xinlan.gif') }}" /></a>
            <a href="#" class="qq f-r"><img src="{{ url('/web/images/sign-qq.gif') }}" /></a>
            <div style="clear:both;"></div>
        </div>
    </form>
    <div style="clear:both;"></div>
</div>

    <!--底部一块-->
    @include('web.public.footer')
</body>
</html>

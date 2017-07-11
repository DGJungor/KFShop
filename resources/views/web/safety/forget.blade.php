<!doctype html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>忘记密码</title>

    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/shopping-mall-index.css') }}" />
    <script type="text/javascript" src="{{ url('/web/js/jquery.min.js') }}"></script>

</head>

<body id="top">

<!--header-->
@include('web.public.header')

@yield('menu')

<!--内容开始-->
<div class="password-con">
    <div class="psw">
        <p class="psw-p1">用户名</p>
        <input id="username" name="username" type="text" placeholder="用户名" />
        <span id="name_dui" class="dui" style="display: none;"></span>
        <span id="name_cuo" class="cuo" style="display: none;">用户不存在</span>
        <span id="name_must" class="cuo" style="display: none;">请输入用户名</span>
    </div>
    <div class="psw psw2">
        <p class="psw-p1">邮箱</p>
        <input id="email" name="email" type="text" placeholder="请输入邮箱验证码" />
        <button id="getCode">获取邮箱验证码</button>
        <span id="email_dui" class="dui" style="display: none">发送成功</span>
        <span id="email_error" class="cuo" style="display: none">发送失败</span>
        <span id="email_cuo" class="cuo" style="display: none">请输入要验证的邮箱</span>
    </div>
    <div class="psw">
        <p class="psw-p1">验证码</p>
        <input id="code" name="code" type="text" placeholder="请输入邮箱验证码" />
        <span id="code_cuo" class="cuo" style="display: none;">请输入邮箱码</span>
    </div>
    <div class="psw">
        <p class="psw-p1">输入密码</p>
        <input id="password" name="password" type="password" placeholder="请输入密码" />
        <span id="pwd_tip" style="display: none;">密码由6-16的字母、数字、符号组成</span>
        <span id="pwd_easy" class="cuo" style="display: none;">密码过于简单</span>
        <span id="pwd_length" class="cuo" style="display: none;">密码由6-60位的字母、数字、符号组成</span>
    </div>
    <div class="psw">
        <p class="psw-p1">确认密码</p>
        <input id="password_confirm" name="password" type="password" placeholder="请再次确认密码" />
        <span id="pwd_again" class="cuo" style="display: none;">请再次输入密码</span>
        <span id="pwd_vary" class="cuo" style="display: none">密码不一致，请重新输入</span>
    </div>
    <button id="resetPwd" class="psw-btn">重置密码</button>
</div>

<!--底部一块-->
@include('web.public.footer')

</body>

</html>
<!-- layer javascript -->
<script src="{{ asset('/style/js/plugins/layer/layer.min.js') }}"></script>
<script src="{{ asset('/style/js/demo/layer-demo.js') }}"></script>
<script>
    var interval;
    var enable =true;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //用户名唯一性验证
    $('#username').blur(function () {
        $('#name_dui').hide();
        $('#name_cuo').hide();
        $('#name_must').hide();
        var username = $('#username').val();
        if (username == '') {
            $('#name_dui').hide();
            $('#name_cuo').hide();
            $('#name_must').show();
        }
        $.ajax({
            type: 'POST',
            url: '/ajax/user/checkName',
            dataType: 'json',
            data: {username: username},
            success: function (data) {
                if (data == null) {
                    layer.msg('服务器端错误', 2, 0);
                    return;
                }
                if (data.status == 3) {
                    $('#name_cuo').hide();
                    $('#name_must').hide();
                    $('#name_dui').show();
                    return;
                }
                if (data.status == 0) {
                    $('#name_dui').hide();
                    $('#name_must').hide();
                    $('#name_cuo').show();
                    return;
                }
            }
        });
    });

    $('#email').blur(function () {
        $('#email_dui').hide();
        $('#email_cuo').hide();
        $('#email_must').hide();
        if ($('#email').val() == '') {
            $('#email_cuo').show();
            return false;
        }
    });

    //发送邮箱验证码
    $('#getCode').off().click(function () {
        if (!enable) {
            return false;
        }
        if ($('#username').val() == '') {
            $('#name_dui').hide();
            $('#name_cuo').hide();
            $('#name_must').show();
            return false;
        }
        if ($('#email').val() == '') {
            $('#email_cuo').show();
            $('#email_dui').hide();
            return false;
        }

        var username = $('#username').val();
        var email = $('#email').val();
        $.ajax({
            type: 'POST',
            url: '/forget/sendEmailCode',
            dataType: 'json',
            data: {username: username, email: email, _token: "{{csrf_token()}}"},
            success: function (data) {
                if (data == null) {
                    layer.msg('服务器端错误', 1, 0);
                    return;
                }
                if (data.status == 1) {
                    layer.msg('数据异常', 1, 0);
                    return;
                }
                if (data.status == 0) {
                    $('#email_cuo').hide();
                    $('#email_error').hide();
                    $('#email_dui').show();
                    enable = false;
                    var num = 60;
                    interval = window.setInterval(function () {
                        $('#getCode').html(--num + 's 重新发送');
                        if(num == 0) {
                            enable = true;
                            window.clearInterval(interval);
                            $('#getCode').html('重新发送');
                        }
                    }, 1000);
                    return;
                }
                if (data.status == 2) {
                    $('#email_cuo').hide();
                    $('#email_dui').hide();
                    $('#email_error').show();
                    return;
                }
                if (data.status == 3) {
                    layer.msg('邮箱错误', 1, 0);
                    return;
                }
            },
            error: function () {
                $('#email_cuo').hide();
                $('#email_dui').hide();
                $('#email_error').show();
                return;
            }
        });
    });

    //重置密码
    $('#resetPwd').click(function () {
        var username = $('#username').val();
        var code = $('#code').val();
        var password = $('#password').val();
        var password_confirm = $('#password_confirm').val();
        if ($('#username').val() == '') {
            $('#name_dui').hide();
            $('#name_cuo').hide();
            $('#name_must').show();
            return false;
        }
        if ($('#email').val() == '') {
            $('#email_cuo').show();
            $('#email_dui').hide();
            return false;
        }
        if ( code== '') {
            $('#code_cuo').show();
            $('#code_dui').hide();
            return false;
        }
        if (password == '') {
            $('#pwd_tip').show();
            $('#pwd_easy').hide();
            $('#pwd_length').hide();
            return false;
        }
        var checkPwd = /^(?![0-9]+$)(?![a-zA-Z]+$)(?!([^(0-9a-zA-Z)]|[\(\)])+$)([^(0-9a-zA-Z)]|[\(\)]|[a-zA-Z]|[0-9]){6,60}$/;
        if (!checkPwd.test(password)) {
            $('#pwd_easy').show();
            $('#pwd_tip').hide();
            $('#pwd_length').hide();
        }
        if (password.length > 60 || password.length < 6){
            $('#pwd_length').show();
            $('#pwd_easy').hide();
            $('#pwd_tip').hide();
        }
        if (password_confirm== '') {
            $('#pwd_vary').hide();
            $('#pwd_again').show();
            return false;
        }
        if (password != password_confirm) {
            $('#pwd_again').hide();
            $('#pwd_vary').show();
            return false;
        }

        $.ajax({
            type: 'POST',
            url: '/forget/resetPassword',
            dataType: 'json',
            data: {username: username,code: code, password: password,password_confirm: password_confirm, _token: "{{csrf_token()}}"},
            success: function (data) {
                if (data == null) {
                    layer.msg('服务器端错误', 1, 0);
                    return;
                }
                if (data.status == 0) {
                    $('#username').val('');
                    $('#email').val('');
                    $('#code').val('');
                    $('#password').val('');
                    $('#password_confirm').val('');
                    $('.dui').hide();
                    layer.msg('重置密码成功',1,1);
                    return;
                }
                if (data.status != 0) {
                    layer.msg(data.message, 1, 8);
                    return;
                }
            },
            error: function () {
                layer.msg('服务器异常',1,0);
                return;
            }
        });
    });

</script>
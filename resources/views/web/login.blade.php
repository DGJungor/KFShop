<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>登录</title>

    <link href="{{ asset('/style/css/bootstrap.min.css?v=3.4.0') }}" rel="stylesheet">
    <link href="{{ asset('/style/font-awesome/css/font-awesome.css?v=4.3.0') }}" rel="stylesheet">

    <link href="{{ asset('/style/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/style/css/style.css?v=2.2.0') }}" rel="stylesheet">

</head>

<body class="gray-bg">


<div class="middle-box text-center loginscreen  animated fadeInDown" style="margin: 50px 0px 0px 800px;">
    <div>
        <img src="/web/images/logn-tu.gif" alt="" style="margin: 0px 0px -450px -1100px;">
        <div>

            <a href="{{ url('/') }}"><img src="{{ url('/web/images/zl2-01-1.gif') }}" alt=""></a>

        </div>
        <h2>登录</h2>

        <div id="showErrorTime">

        </div>

        <form id="loginform" class="m-t" role="form" action="{{ url('/login') }}" method="POST">
            @if($errors->has('error'))
                <span id="top_error" class="text-danger">
                    <strong>{{ $errors->first('error') }}</strong>
                </span>
            @endif
            <div class="form-group {{ $errors->has('username_email_tel') ? 'has-error' : '' }}">
                <input id="username_email_tel" type="text" name="username_email_tel" class="form-control" placeholder="用户名/邮箱/手机号" value="{{ old('username_email_tel') }}">
                @if ($errors->has('username_email_tel'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('username_email_tel') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <input type="password" name="password" class="form-control" placeholder="密码">
                @if ($errors->has('password'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="input-group {{ $errors->has('captcha') ? ' has-error' : '' }}" style="display:  none;">
                <input id="code" type="text" name="captcha" class="form-control" placeholder="验证码">
                <span class="input-group-btn">
                    <img id="captcha" src="{{ captcha_src() }}" />
                </span>

            </div><!-- /input-group <-->
            @if ($errors->has('captcha'))
                <span class="text-danger">
                    <strong id="code_error">{{ $errors->first('captcha') }}</strong><br>
                </span>
            @endif
            {{csrf_field()}}
            <br>
            <button id="putLogin" type="submit" class="btn btn-primary block full-width m-b">登 录</button>
            <div class="form-group">
                <a href="{{ url('/forget') }}">忘记密码?</a> <a href="{{ url('/register') }}"> 我要注册！</a>
            </div>
            <div class="form-group">
                <a href="{{ url('/') }}"> 返回首页</a>
            </div>


        </form>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ asset('/style/js/jquery-2.1.1.min.js') }}"></script>
<script src="{{ asset('/style/js/bootstrap.min.js?v=3.4.0') }}"></script>
<!-- jQuery Validation plugin javascript-->
<script src="{{ asset('/style/js/plugins/validate/jquery.validate.min.js') }}"></script>
<script src="{{ asset('/style/js/plugins/validate/messages_zh.min.js') }}"></script>
<script>
    var interval;
    //判断是否要输入验证码
    @if ($errors->has('code'))
        $('.input-group').show();
    @endif
    @if ($errors->has('captcha'))
        $('.input-group').show();
    @endif

    @if ($errors->has('error_time'))
        var num = "{{ $errors->first('error_time') }}";
        interval = window.setInterval(function () {
            --num;
            var min = num / 60;
            min = parseInt(min);
            var sec = num % 60;
            $('#top_error').html('<strong>密码错误次数过多,请在'+min+'分'+sec+'秒'+ '后登录</strong>');
            if (num == 0) {
                $('#top_error').html('');
                window.clearInterval(interval);
            }
        }, 1000);
    @endif

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //用户名/邮箱/手机号唯一性检测
    $('#username_email_tel').blur(function () {
        $('#showErrorTime').html('');
        $('#top_error').html('');
        window.clearInterval(interval);
        $('#putLogin').removeAttr('disabled');
        var username_email_tel = $('#username_email_tel').val();
        $.ajax({
            type: 'POST',
            url: '/loginCheck',
            dataType: 'json',
            data: {username_email_tel: username_email_tel},
            success: function (data) {
                if (data.status == null) {
                    layer.msg('服务端错误',1,0);
                    return;
                }
                if (data.status == 3) {
                    var num = data.message;
                    interval = window.setInterval(function () {
                        --num;
                        var min = num / 60;
                        min = parseInt(min);
                        var sec = num % 60;
                        $('#showErrorTime').html('<span class="text-danger"><strong>密码错误次数过多,请在'+min+'分'+sec+'秒'+ '后登录</strong></span>');
                        if (num == 0) {
                            $('#showErrorTime').html('');
                            window.clearInterval(interval);
                        }
                    }, 1000);
                    $('#putLogin').attr('disabled', 'disabled');
                }
                if (data.status == 5) {
                    $('.input-group').show();
                }
            }
        });
    });

    //切换验证码图片
    $('#captcha').on('click', function () {
        var captcha = $(this);
        var url = '/captcha/' + captcha.data('captcha-config') + '?' + Math.random();
        captcha.attr('src', url);
    });

    //隐藏错误信息
    $('input').focus(function(event) {
        $(this).next().children().html('');
    });

    $('#code').focus(function(event) {
        $('#code_error').parent().remove();
    });

    //以下为修改jQuery Validation插件兼容Bootstrap的方法，没有直接写在插件中是为了便于插件升级
    $.validator.setDefaults({
        highlight: function (element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        success: function (element) {
            element.closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        errorElement: "span",
        errorClass: "help-block m-b-none",
        validClass: "help-block m-b-none"


    });

    $('#loginform').validate({
        rules: {
            username_email_tel: "required",
            password: "required",
            captcha: "required"
        },
        messages: {
            username_email_tel: "请输入您的用户名/邮箱/手机号",
            password: "请输入密码",
            captcha: "请输入验证码"
        }
    });
</script>


</body>

</html>
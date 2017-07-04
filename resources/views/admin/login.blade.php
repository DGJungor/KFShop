<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">

    <title>登录</title>

    <link href="{{ asset('/style/css/bootstrap.min.css?v=3.4.0') }}" rel="stylesheet">
    <link href="{{ asset('/style/font-awesome/css/font-awesome.css?v=4.3.0') }}" rel="stylesheet">

    <link href="{{ asset('/style/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/style/css/style.css?v=2.2.0') }}" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">KF</h1>

        </div>
        <h3>狂风商城后台</h3>

        <form id="loginform" class="m-t" role="form" action="/admin/login" method="POST">
            @if(session('error'))
                <span class="text-danger">
                    <strong>{{ session('error') }}</strong>
                </span>
            @endif
            <div class="form-group {{ $errors->has('username_tel') ? 'has-error' : '' }}">
                <input type="text" name="username_tel" class="form-control" placeholder="用户名/手机号" value="{{ old('username_tel') }}">
                @if ($errors->has('username_tel'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('username_tel') }}</strong>
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
            <div class="input-group {{ $errors->has('captcha') ? ' has-error' : '' }}">
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
            <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>

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
            username_tel: "required",
            password: "required",
            captcha: "required"
        },
        messages: {
            username_tel: "请输入您的用户名/手机号",
            password: "请输入密码",
            captcha: "请输入验证码"
        }
    });
</script>


</body>

</html>
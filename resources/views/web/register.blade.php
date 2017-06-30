<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">

    <title>注册</title>

    <link href="{{ asset('/style/css/bootstrap.min.css?v=3.4.0') }}" rel="stylesheet">
    <link href="{{ asset('/style/font-awesome/css/font-awesome.css?v=4.3.0') }}" rel="stylesheet">

    <link href="{{ asset('/style/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/style/css/style.css?v=2.2.0') }}" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <div>

            <a href="{{ url('/') }}"><img src="{{ url('/web/images/zl2-01-1.gif') }}" alt=""></a>

        </div>
        <h2>注册</h2>

        <form id="registerform" class="m-t" role="form" action="{{ url('/register') }}" method="POST">
            @if(session('error'))
                <span class="text-danger">
                    <strong>{{ session('error') }}</strong>
                </span>
            @endif
            <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                <input type="text" name="username" class="form-control" placeholder="用户名" value="{{ old('username') }}">
                @if ($errors->has('username'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <input id="password" type="password" name="password" class="form-control" placeholder="密码">
                @if ($errors->has('password'))
                    <span class="text-danger">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <input type="password" name="confirm_password" class="form-control" placeholder="确认密码">
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <input type="text" name="email" class="form-control" placeholder="邮箱" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('tel') ? 'has-error' : '' }}">
                <input type="text" name="tel" class="form-control" placeholder="手机号" value="{{ old('tel') }}">
                @if ($errors->has('tel'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('tel') }}</strong>
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
            <div class="checkbox">
                <label>
                    <input type="checkbox" class="" id="agree" name="agree">请同意我们的声明
                </label>
            </div>
            {{csrf_field()}}
            <button type="submit" class="btn btn-primary block full-width m-b">注册</button>
            <div class="form-group">
                <a href="#">忘记密码?</a> <a href="#"> 我要注册！</a>
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

    $('#registerform').validate({
        rules: {
            username: {
                required: true,
                minlength: 2
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 24
            },
            confirm_password: {
                required: true,
                equalTo: "#password"
            },
            email: {
                required: true,
                eamil:true,
            },
            tel: {
                required: true,
                minlength: 11,
                maxlength: 11
            },
            captcha: "required",
            agree: "required"
        },
        messages: {
            username: {
                required: "请输入您的用户名",
                minlength: "用户名必须2个字符以上"
            },
            password: {
                required: "请输入您的密码",
                minlength: "密码必须6个字符以上",
                maxlength: "密码长度不能超过24个字符"
            },
            confirm_password: {
                required: "请再次输入密码",
                equalTo: "两次输入的密码不一样"
            },
            email: {
                required: "请输入您的E-mail",
                email: "请输入正确的E-mail"
            },
            tel: {
                required: "请输入您的手机号码",
                minlength:"请输入正确的手机号码",
                maxlength: "请输入正确的手机号码"
            },
            captcha: "请输入验证码",
            agree: "必须同意协议后才能注册"
        }
    });
</script>


</body>

</html>
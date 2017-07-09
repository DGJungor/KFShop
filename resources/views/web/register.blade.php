<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                <input id="username" type="text" name="username" maxlength="20" class="form-control" placeholder="用户名" value="{{ old('username') }}">

                @if ($errors->has('username'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <input id="password" type="password" maxlength="60" name="password" class="form-control" placeholder="密码">
                @if ($errors->has('password'))
                    <span class="text-danger">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <input type="password" maxlength="60" name="password_confirmation" class="form-control" placeholder="确认密码">
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <input type="text" id="email" maxlength="32" name="email" class="form-control" placeholder="邮箱" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('tel') ? 'has-error' : '' }}">
                <input type="text" id="tel" maxlength="11" name="tel" class="form-control" placeholder="手机号" value="{{ old('tel') }}">
                @if ($errors->has('tel'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('tel') }}</strong>
                    </span>
                @endif
            </div>
            <div class="input-group {{ $errors->has('captcha') ? ' has-error' : '' }}">
                <input id="code" type="text" maxlength="12" name="captcha" class="form-control" placeholder="验证码">
                <span class="input-group-btn">
                    <img id="captcha" src="{{ captcha_src() }}" />
                </span>

            </div><!-- /input-group <-->
            @if ($errors->has('captcha'))
                <span class="text-danger">
                    <strong id="code_error">{{ $errors->first('captcha') }}</strong><br>
                </span>
            @endif
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" class="" id="agree" name="agree" value="1" checked>请同意我们的声明
                    </label>
                </div>
            </div>
            {{csrf_field()}}
            <button type="submit" class="btn btn-primary block full-width m-b">注册</button>
            <div class="form-group">
                <a href="{{ url('/login') }}">去登录</a>
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
<!-- layer javascript -->
<script src="{{ asset('/style/js/plugins/layer/layer.min.js') }}"></script>
<script src="{{ asset('/style/js/demo/layer-demo.js') }}"></script>
<script>
    //注册成功后跳转登录界面等待激活
    @if (session('success'))
        layer.msg('{{session('success')}}',2,14);
        setTimeout(function () {
            location.href = '/login';
        },2000);
    @endif
</script>
<script>
    $(document).ready(function () {
        //切换验证码图片
        $('#captcha').on('click', function () {
            var captcha = $(this);
            var url = '/captcha/' + captcha.data('captcha-config') + '?' + Math.random();
            captcha.attr('src', url);
        });

        //注册提示信息
        $('#username').focus(function () {
            $('#username').append('<span id="username-account">支持字母开头，由字母、数字、下划线、“-”和“_”组成的2-20个字符</span>');
        });

        //隐藏错误信息
        $('input').focus(function(event) {
            $(this).next().children().html('');
            $(this).prev().remove();
        });

        //错误提示的隐藏
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
                    minlength: 2,
                    maxlength: 20
                },
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 60
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email:true,
                },
                tel: {
                    required: true,
                    digits: true,
                    minlength: 11,
                    maxlength: 11
                },
                captcha: "required",
                agree: "required"
            },
            messages: {
                username: {
                    required: "请输入您的用户名",
                    minlength: "用户名必须2个字符以上",
                    maxlength: "用户名不能超过20个字符"
                },
                password: {
                    required: "请输入您的密码",
                    minlength: "密码必须6个字符以上",
                    maxlength: "密码长度不能超过24个字符"
                },
                password_confirmation: {
                    required: "请再次输入密码",
                    equalTo: "两次输入的密码不一样"
                },
                email: {
                    required: "请输入您的E-mail",
                    email: "请输入正确的E-mail"
                },
                tel: {
                    required: "请输入您的手机号码",
                    digits: "格式有误",
                    minlength:"请输入正确的手机号码",
                    maxlength: "请输入正确的手机号码"
                },
                captcha: "请输入验证码",
                agree: "必须同意协议后才能注册"
            }
        });

        //用户名唯一性验证
        $('#username').blur(function () {
            var not = [1,2,3];
            var username = $('#username').val();
            $.ajax({
                type: 'POST',
                url: '/ajax/user/checkName',
                dataType: 'json',
                data: {username: username, _token: "{{ csrf_token() }}"},
                success: function (data) {
                    if (data == null) {
                        layer.msg('服务器端错误', 2, 0);
                        return;
                    }
                    if (data.status == 0) {
                        var tip = data.tip + 'tip';
                        $('#'+tip).remove();
                        $('#'+data.tip).before("<i id=\""+tip+"\" class=\"fa fa-check-circle text-navy\" style=\"position: absolute;right: 0;padding: 10px 10px 10px 10px;\">"+data.message+"</i>");
                        return;
                    }
                    if ($.inArray(data.status, not) >= 0) {
                        var tip = data.tip + 'tip';
                        $('#'+tip).remove();
                        $('#'+data.tip).before("<i id=\""+tip+"\" class=\"fa fa-times-circle text-danger\" style=\"position: absolute;right: 0;padding: 10px 10px 10px 10px;\">"+data.message+"</i>");
                        return;
                    }
                }
            });
        });

        //邮箱唯一性验证
        $('#email').blur(function () {
            var not = [1,2,3];
            var email = $('#email').val();
            $.ajax({
                type: 'POST',
                url: '/ajax/user/checkEmail',
                dataType: 'json',
                data: {email: email, _token: "{{ csrf_token() }}"},
                success: function (data) {
                    if (data == null) {
                        layer.msg('服务器端错误', 2, 0);
                        return;
                    }
                    if (data.status == 0) {
                        var tip = data.tip + 'tip';
                        $('#'+tip).remove();
                        $('#'+data.tip).before("<i id=\""+tip+"\" class=\"fa fa-check-circle text-navy\" style=\"position: absolute;right: 0;padding: 10px 10px 10px 10px;\">"+data.message+"</i>");
                        return;
                    }
                    if ($.inArray(data.status, not) >= 0) {
                        var tip = data.tip + 'tip';
                        $('#'+tip).remove();
                        $('#'+data.tip).before("<i id=\""+tip+"\" class=\"fa fa-times-circle text-danger\" style=\"position: absolute;right: 0;padding: 10px 10px 10px 10px;\">"+data.message+"</i>");
                        return;
                    }
                }
            });
        });

        //手机号唯一性验证
        $('#tel').blur(function () {
            var not = [1,2,3];
            var tel = $('#tel').val();
            $.ajax({
                type: 'POST',
                url: '/ajax/user/checkTel',
                dataType: 'json',
                data: {tel: tel, _token: "{{ csrf_token() }}"},
                success: function (data) {
                    if (data == null) {
                        layer.msg('服务器端错误', 2, 0);
                        return;
                    }
                    if (data.status == 0) {
                        var tip = data.tip + 'tip';
                        $('#'+tip).remove();
                        $('#'+data.tip).before("<i id=\""+tip+"\" class=\"fa fa-check-circle text-navy\" style=\"position: absolute;right: 0;padding: 10px 10px 10px 10px;\">"+data.message+"</i>");
                        return;
                    }
                    if ($.inArray(data.status, not) >= 0) {
                        var tip = data.tip + 'tip';
                        $('#'+tip).remove();
                        $('#'+data.tip).before("<i id=\""+tip+"\" class=\"fa fa-times-circle text-danger\" style=\"position: absolute;right: 0;padding: 10px 10px 10px 10px;\">"+data.message+"</i>");
                        return;
                    }
                },
                error: function () {
                    layer.msg('呀,服务器开小差了！',1,8);
                }
            });
        });


        $('#registerform').submit(function () {
            if ($('.fa-times-circle').length >0) {
                return false;
            } else {
                return true;
            }
        });
    });

</script>

</body>

</html>
@extends('web.public.public')

@section('title')
    修改密码
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/shopping-mall-index.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/error.css') }}" />
    <link href="{{ asset('/style/js/plugins/layer/skin/layer.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="personal w1200">
        @include('web.public.leftMenu')
        <div class="personal-r f-r">
            <form id="pwdForm" action="/user/modifyPassword" method="post" class="personal-right">
                {!! csrf_field() !!}
                <div class="personal-r-tit">
                    <h3>修改密码</h3>
                </div>
                <div class="data-con">
                    @if (session('error'))
                        <div class="dt1">
                            <span style="font-size: 15px; color: #cd0a0a;margin-left: 200px;">{{ session('error') }}</span>
                        </div>
                    @endif
                    <div class="dt1">
                        <p class="dt-p f-l">原密码：</p>
                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                        <input id="oldpassword" name="oldpassword" maxlength="60" type="password" value="" />
                        <div style="clear:both;"></div>
                    </div>
                    <div class="dt1">
                        <p class="dt-p f-l">新密码：</p>
                        <input id="newpassword" name="newpassword" maxlength="60" type="password" value="" />
                        <div style="clear:both;"></div>
                    </div>
                    <div class="dt1">
                        <p class="dt-p f-l">确认密码：</p>
                        <input id="password_confirmation" name="password_confirmation" maxlength="60" type="password" value="" />
                        <div style="clear:both;"></div>
                    </div>

                    <button type="submit" class="btn-pst">确认修改</button>
                </div>
            </form>
        </div>
        <div style="clear:both;"></div>
    </div>
@endsection

@section('js')
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

        @if (session('success'))
                layer.msg('{{session('success')}}',1,1);
        @endif
        @if (session('fail'))
                layer.msg('{{session('fail')}}',1,8);
        @endif
        //以下为修改jQuery Validation插件兼容Bootstrap的方法，没有直接写在插件中是为了便于插件升级
        $.validator.setDefaults({
            highlight: function (element) {
                $(element).closest('input').removeClass('has-success').addClass('has-error');
            },
            success: function (element) {
                element.closest('input').removeClass('has-error').addClass('has-success');
            },
            errorElement: "span",
            errorClass: "tip-error",
            validClass: ""


        });

        $('#pwdForm').validate({
            rules: {
                oldpassword: {
                    required: true,
                    minlength: 6,
                    maxlength: 60
                },
                newpassword: {
                    required: true,
                    checkPwd: true,
                    minlength: 6,
                    maxlength: 60
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#newpassword"
                }
            },
            messages: {
                oldpassword: {
                    required: "请输入原密码！！！",
                    minlength: "密码必须6个字符以上！！！",
                    maxlength: "密码长度不能超过24个字符！！！"
                },
                newpassword: {
                    required: "请输入新密码！！！",
                    minlength: "密码必须6个字符以上！！！",
                    maxlength: "密码长度不能超过24个字符！！！"
                },
                password_confirmation: {
                    required: "请再次输入密码！！！",
                    equalTo: "两次输入的密码不一样！！！"
                }
            }
        });
        $.validator.addMethod("checkPwd",function(value,element,params){
            var checkPwd = /^(?![0-9]+$)(?![a-zA-Z]+$)(?!([^(0-9a-zA-Z)]|[\(\)])+$)([^(0-9a-zA-Z)]|[\(\)]|[a-zA-Z]|[0-9]){6,60}$/;
            return this.optional(element)||(checkPwd.test(value));
        },"密码过于简单，必须包含特殊符号！！！");

    </script>
@endsection
@extends('web.public.public')

@section('title')
        个人资料
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/shopping-mall-index.css') }}" />
    <link href="{{ asset('/style/js/plugins/layer/skin/layer.css') }}" rel="stylesheet">
    <link href="{{ asset('/style/css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
@endsection

@section('content')
        <!--内容开始-->
<div class="personal w1200">
    @include('web.public.leftMenu')
    <div class="personal-r f-r">
        <div class="personal-right">
            <div class="personal-r-tit">
                <h3>个人资料</h3>
            </div>
            <div class="data-con">
                <div class="dt1">

                    <p class="f-l">当前头像：</p>
                    <div class="touxiang f-l">
                        <div class="tu f-l">
                            <a href="javascript:;" onclick="return editAvatar()">
                                <img id="showPic" src="/uploads/user_pic/{{$userinfo->avatar != null ? $userinfo->avatar : 'user_avatar_default.jpg' }} "/>
                            </a>
                        </div>
                        <a href="JavaScript:;" class="sc f-l" onclick="return editAvatar()">修改头像</a>
                        <div style="clear:both;"></div>
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div class="dt1">
                    <p class="dt-p f-l">用户名：</p>
                    <input id="username" type="text" name="username" value="{{ $userinfo->username }}" disabled />
                    <div style="clear:both;"></div>
                </div>
                <div class="dt1">
                    <p class="dt-p f-l">真实姓名：</p>
                    <input id="realname" maxlength="20" type="text" name="realname" value="{{ $userinfo->realname }}" />
                    <div style="clear:both;"></div>
                </div>
                <div class="dt1">
                    <p class="dt-p f-l">身份证号：</p>
                    <input id="id_number" maxlength="18" type="text" name="id_number" value="{{ $userinfo->id_number }}" />
                    <div style="clear:both;"></div>
                </div>
                <div class="dt1 dt2">
                    <p class="dt-p f-l">性别：</p>
                    <input type="radio" name="sex" value="1" @if($userinfo->sex ==1) checked @else @endif><span>男</span>
                    <input type="radio" name="sex" value="2" @if($userinfo->sex ==2) checked @else @endif><span>女</span>
                    <div style="clear:both;"></div>
                </div>
                <div id="data_1" class="dt1">
                    <p class="dt-p f-l">生日：</p>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input id="birthday" maxlength="12" class="layui-input" name="birthday" value="{{ $userinfo->birthday }}">
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div class="dt1 dt4">
                    <p class="dt-p f-l">邮箱：</p>
                    <input id="email" name="email" type="email" maxlength="32" value="{{ $userinfo->email }}" disabled />
                        <button id="editEmail">更换邮箱</button>
                    <div style="clear:both;"></div>
                </div>
                <div class="dt1 dt4">
                    <p class="dt-p f-l">手机：</p>
                    <input id="tel" name="tel" type="tel" maxlength="11" value="{{ $userinfo->tel }}" disabled />
                        <button id="editTel">更换手机</button>
                    <div style="clear:both;"></div>
                </div>
                <button id="editUserInfo" class="btn-pst">保存</button>
            </div>
        </div>
    </div>
    <div style="clear:both;"></div>
</div>
@endsection

@section('js')
    <!-- layer javascript -->
    <script src="{{ asset('/style/js/plugins/layer/layer.min.js') }}"></script>
    <script src="{{ asset('/style/js/demo/layer-demo.js') }}"></script>
    <!-- Data picker -->
    <script src="{{ asset('/style/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>

    <script>
        //同步修改头像
        function editAvatar() {
            $.layer({
                type : 1,
                title: '头像上传',
                shadeClose: true,
                fix : false,
                area: ['200px', 200],
                page: {
                    url : '/user/showUpload'
                }
            });
        }

        //修改个人信息
        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

        $('#editUserInfo').click(function () {
            var id = "{{ $userinfo->id }}";
            var realname = $('#realname').val();
            var id_number = $('#id_number').val();
            var sex = $('input[name="sex"]:checked').val();
            if (sex == undefined) {
                sex = '';
            }
            var birthday = $('#birthday').val();
            $.ajax({
                type: "POST",
                url: '/user/editUserInfo',
                dataType: 'json',
                data: {
                    id: id,
                    realname: realname,
                    id_number: id_number,
                    sex: sex,
                    birthday: birthday,
                    _token: "{{ csrf_token() }}"
                },
                success: function (data) {
                    if (data.status == null) {
                        layer.msg('服务器端错误', 1, 0);
                    }
                    if (data.status != 0) {
                        layer.msg(data.message, 1, 1);
                    }
                    if (data.status == 0) {
                        layer.msg(data.message, 1, 1);
                    }
                }
            });
        });
    </script>
@endsection
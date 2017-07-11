@extends('web.public.public')

@section('title')
    收货地址
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/web/css/shopping-mall-index.css') }}" />
    <link href="{{ asset('/style/js/plugins/layer/skin/layer.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!--内容-->
    <div class="personal w1200">
        @include('web.public.leftMenu')
        <div class="management f-r">
            <div class="tanchuang-con">
                <div class="tc-title">
                    <h3>我的收货地址</h3>
                </div>
                <font class="xinxi">请认真填写以下信息！</font>
                <ul class="tc-con2">
                    <li class="tc-li1">
                        <p class="l-p">所在地区<span>*</span></p>
                        <div class="xl-dz">
                            <div class="layui-form-item">
                                <div class="dz-left f-l">
                                    <select id="province" name="province">
                                        <option value="">请选择省</option>
                                    </select>
                                    <select id="city" name="city">
                                        <option value="">请选择市</option>
                                    </select>
                                    <select id="county" name="county">
                                        <option value="">请选择县/区</option>
                                    </select>
                                </div>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <div style="clear:both;"></div>
                    </li>
                    <li class="tc-li1">
                        <p class="l-p">详细地址<span>*</span></p>
                        <textarea id="det_address" class="textarea1" name="det_address" maxlength="50" placeholder="请在50字以内如实填写您的详细信息，如街道名称、门牌号、楼层号和房间号。"></textarea>
                        <div style="clear:both;"></div>
                    </li>
                    <li class="tc-li1">
                        <p class="l-p">收货人姓名<span>*</span></p>
                        <input id="name" maxlength="12" type="text" name="name" />
                        <div style="clear:both;"></div>
                    </li>
                    <li class="tc-li1">
                        <p class="l-p">联系电话<span>*</span></p>
                        <input id="tel" type="text" maxlength="11" name="tel" />
                        <div style="clear:both;"></div>
                    </li>
                </ul>
                <button id="createdAddress" class="btn-pst2">保存</button>
            </div>
            <div class="man-info">
                <div class="man-if-con">
                    <div class="man-tit">
                        <p class="p1">收货人</p>
                        <p class="p2">所在地区</p>
                        <p class="p3">详细地址</p>
                        <p class="p4">电话/手机</p>
                        <p class="p5">创建时间</p>
                        <p class="p6">操作</p>
                    </div>
                    <ul id="show" class="man-ul1">

                    </ul>
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

    <script>
        $(document).ready(function () {
            //加载城市三级联动下拉框
            //省下拉框
            $.ajax({
                url: '/user/ajax/showCity',
                type: 'POST',
                dataType: 'json',
                data: {id: 0, _token: "{{ csrf_token() }}"},
                success: function (data) {
                    $('#province option').remove();
                    $('#province').append("<option value=\"\">请选择省</option>");
                    for (var i = 0; i < data.length; i++) {
                        var pro_option = "<option value=\"" + data[i].id + "\">" + data[i].name + "</option>";
                        $('#province').append(pro_option);
                    }
                }
            });

            //市下拉框
            $('#province').change(function () {
                var pro_val = $('#province').val();
                $('#city option').remove();
                $('#city').append("<option value=\"\">请选择市</option>");
                $('#county option').remove();
                $('#county').append("<option value=\"\">请选择县/区</option>");
                if (pro_val) {
                    $.ajax({
                        url: '/user/ajax/showCity',
                        type: 'POST',
                        dataType: 'json',
                        data: {id: pro_val, _token: "{{ csrf_token() }}"},
                        success: function (data) {
                            for (var i = 0; i < data.length; i++) {
                                var city_option = "<option value=\"" + data[i].id + "\">" + data[i].name + "</option>";
                                $('#city').append(city_option);
                            }
                        }
                    });
                }
            });

            //县区下拉框
            $('#city').change(function () {
                var city_val = $('#city').val();
                $('#county option').remove();
                $('#county').append("<option value=\"\">请选择县/区</option>");
                if (city_val) {
                    $.ajax({
                        url: '/user/ajax/showCity',
                        type: 'POST',
                        dataType: 'json',
                        data: {id: city_val, _token: "{{ csrf_token() }}"},
                        success: function (data) {
                            for (var i = 0; i < data.length; i++) {
                                var county_option = "<option value=\"" + data[i].id + "\">" + data[i].name + "</option>";
                                $('#county').append(county_option);
                            }
                        }
                    });
                }
            });
        });

        $(function () {
            $.ajax({
                url: '/user/ajax/showAddress',
                type: 'post',
                dataType: 'json',
                data: {id: "{{Auth::user()->id}}", _token: "{{ csrf_token() }}"},
                success: function (data) {
                    if (data == 2) {
                        $('#show').html("<p id=\"nothing\" style=\"font-size:15px; color: red; text-align: center; margin: 10px;\">您还没有收货地址呢,快去添加一个吧！</p>");
                    }
                    if (data != null || data != 2) {
                        $('#nothing').remove();
                        for (var i = 0; i < data.length; i++) {
                            var html = "<li>" +
                                    "<p class=\"p1\">" + data[i].name + "</p>" +
                                    "<p class=\"p2\">" + data[i].address + "</p>" +
                                    "<p class=\"p3\">" + data[i].det_address + "</p>" +
                                    "<p class=\"p4\">" + data[i].tel + "</p>" +
                                    "<p class=\"p5\">" + data[i].created_at + "</p>" +
                                    "<p class=\"p6\">" +
                                    "<a href='javascript:;' class='edit'  name='" + data[i].id + "'>修改</a> |" +
                                    "<a href='javascript:;' class='del'  name='" + data[i].id + "'>删除</a>" +
                                    "</p>" +
                                    "<p class=\"p7\">";
                            if (data[i].status == 2) {
                                html += "<a href='javascript:;' class='default' name='" + data[i].id + "'>默认地址</a>";
                            } else {
                                html += "<a href='javascript:;' class='to_default' name='" + data[i].id + "'>设为默认</a>";
                            }
                            html += "</p>" +
                                    "<div style=\"clear:both;\"></div>" +
                                    "</li>";
                            $('#show').prepend(html);
                        }
                    }
                }
            });

        });


        //新增地址
        $('#createdAddress').off().click(function () {
            if ($('#province').val() == "") {
                layer.msg('请选择省', 1, 8);
                return false;
            }
            if ($('#city').val() == "") {
                layer.msg('请选择市', 1, 8);
                return false;
            }
            if ($('#county').val() == "") {
                layer.msg('请选择县/区', 1, 8);
                return false;
            }
            var det_address = $('#det_address').val();
            if (!det_address) {
                layer.msg('请填写详细地址', 1, 8);
                return false;
            }
            var name = $('#name').val();
            if (!name) {
                layer.msg('请填写收货人', 1, 8);
                return false;
            }
            var tel = $('#tel').val();
            if (!tel) {
                layer.msg('请填写联系电话', 1, 8);
                return false;
            }
            var reg = /(1[3-9]\d{9})/;
            if (!reg.test(tel)) {
                layer.msg('请填写正确的手机号', 1, 8);
                return false;
            }

            var address = $('#province').find("option:selected").text() + "/";
            address += $('#city').find("option:selected").text() + "/";
            address += $('#county').find("option:selected").text();
            var id = "{{ \Auth::user()->id}}";
            $('#createdAddress').attr('disabled');

            $.ajax({
                url: '/user/ajax/createAddress',
                type: 'post',
                dataType: 'json',
                data: {
                    id: id,
                    name: name,
                    tel: tel,
                    address: address,
                    det_address: det_address,
                    _token: "{{ csrf_token() }}"
                },
                async: false,
                success: function (data) {
                    if (data == null) {
                        layer.mag('呀,服务器开小差了',2,8);
                        return;
                    }
                    if (data == 2) {
                        layer.msg('收货地址超过限制', 2, 8);
                        return;
                    }
                    if (data != null || data != 2) {
                        $('#nothing').remove();
                        layer.msg("添加成功", 1, 1);
                        var html = "<li>" +
                                "<p class=\"p1\">" + data.name + "</p>" +
                                "<p class=\"p2\">" + data.address + "</p>" +
                                "<p class=\"p3\">" + data.det_address + "</p>" +
                                "<p class=\"p4\">" + data.tel + "</p>" +
                                "<p class=\"p5\">" + data.created_at + "</p>" +
                                "<p class=\"p6\">" +
                                "<a href='javascript:;' class='edit'  name='" + data.id + "'>修改</a> |" +
                                "<a href='javascript:;' class='del'  name='" + data.id + "'>删除</a>" +
                                "</p>" +
                                "<p class=\"p7\">";
                        if (data.status == 2) {
                            html += "<a href='javascript:;' class='default' name='" + data.id + "'>默认地址</a>";
                        } else {
                            html += "<a href='javascript:;' class='to_default' name='" + data.id + "'>设为默认</a>";
                        }
                        html += "</p>" +
                                "<div style=\"clear:both;\"></div>" +
                                "</li>";
                        $('#show').prepend(html);
                        //新增地址成功,重置输入框
                        $('#province').val("");
                        $('#city').val("");
                        $('#county').val("");
                        $('#det_address').val("");
                        $('#name').val("");
                        $('#tel').val("");
                        $('#createdAddress').removeAttr("disabled");
                    }
                }
            });

        });


        //删除收货地址
        $('body').on('click', '.del', function () {
            var id = $(this).prop('name');
            $.ajax({
                url: '/user/ajax/delAddress',
                type: 'POST',
                dataType: 'json',
                data: {id: id, _token: "{{ csrf_token() }}"},
                success: function (data) {
                    if (data == null) {
                        layer.msg('呀,服务器开小差了', 2, 8);
                    }
                    if (data == 0) {
                        $('a[name="' + id + '"]').parent().parent().remove();
                        layer.msg('删除成功', 1, 1);
                    }
                    if (data == 1) {
                        layer.msg('删除失败', 1, 8);
                    }
                }
            });
        });

        //设置默认地址
        $('body').on('click', '.to_default', function () {
            $(this).attr('to', 'default');
            var id = $(this).prop('name');
            var uid = "{{Auth::user()->id}}";
            $.ajax({
                url: '/user/ajax/setDefault',
                type: 'POST',
                dataType: 'json',
                data: {id: id, uid: uid, _token: "{{ csrf_token() }}"},
                success: function (data) {
                    if (data == null) {
                        $('.ready_to_default').removeClass().addClass('to_default');
                        layer.msg('呀,服务器开小差了', 2, 8);
                        return;
                    }
                    if (data == 0) {
                        $('.default').html('设为默认').removeClass().addClass('to_default');
                        $('a[to="default"]').removeClass().addClass('default');
                        $('.default').html('默认地址').removeAttr('to');
                        layer.msg('设置成功', 1, 1);
                        return;
                    }
                    if (data == 1) {
                        layer.msg('设置失败', 1, 8);
                        return;
                    }
                }
            });
        });


    </script>
@endsection
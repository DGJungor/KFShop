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
                        <p class="p5">创建日期</p>
                        <p class="p6">操作</p>
                    </div>
                    <ul class="man-ul1">
                        <li>
                            <p class="p1">赵珍珍</p>
                            <p class="p2">重庆 重庆市 南岸区</p>
                            <p class="p3">南坪左岸阳光c2-10-3</p>
                            <p class="p4">18983945092</p>
                            <p class="p5">2017-06-06</p>
                            <p class="p6">
                                <a href="#">修改</a> |
                                <a href="#">删除</a>
                            </p>
                            <p class="p7"><a href="#">默认地址</a></p>
                            <div style="clear:both;"></div>
                        </li>
                        <li>
                            <p class="p1">赵珍珍</p>
                            <p class="p2">重庆 重庆市 南岸区 南坪街道</p>
                            <p class="p3">南岸区南坪福红路19号乙单元7-2南岸区南坪福红路19号乙单元7-2南岸区南坪福红路19号乙单元7-2</p>
                            <p class="p4">000000</p>
                            <p class="p5">18983945092</p>
                            <p class="p6">
                                <a href="#">修改</a> |
                                <a href="#">删除</a>
                            </p>
                            <div style="clear:both;"></div>
                        </li>
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
            $.ajax({
                url: '/user/ajax/showAddress',
                type: 'POST',
                dataType: 'json',
                data: {id: 0, _token: "{{ csrf_token() }}"},
                success: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        var pro_option = "<option value=\"" + data[i].id + "\">" + data[i].name + "</option>";
                        $('#province').append(pro_option);
                    }
                }
            });

            $('#province').change(function () {
                $('#city option').remove();
                $('#city').append("<option value=\"\">请选择市</option>");
                $('#county option').remove();
                $('#county').append("<option value=\"\">请选择县/区</option>");
                $.ajax({
                    url: '/user/ajax/showAddress',
                    type: 'POST',
                    dataType: 'json',
                    data: {id: $('#province').val(), _token: "{{ csrf_token() }}"},
                    success: function (data) {
                        for (var i = 0; i < data.length; i++) {
                            var city_option = "<option value=\"" + data[i].id + "\">" + data[i].name + "</option>";
                            $('#city').append(city_option);
                        }
                    }
                });
            });

            $('#city').change(function () {
                $('#county option').remove();
                $('#county').append("<option value=\"\">请选择县/区</option>");
                $.ajax({
                    url: '/user/ajax/showAddress',
                    type: 'POST',
                    dataType: 'json',
                    data: {id: $('#city').val(), _token: "{{ csrf_token() }}"},
                    success: function (data) {
                        for (var i = 0; i < data.length; i++) {
                            var county_option = "<option value=\"" + data[i].id + "\">" + data[i].name + "</option>";
                            $('#county').append(county_option);
                        }
                    }
                });
            });

            $('#createdAddress').click(function () {
                if ($('#province').val() == "") {
                        layer.msg('请选择省',1,8);
                    return false;
                }
                if ($('#city').val() == "") {
                        layer.msg('请选择市',1,8);
                    return false;
                }
                if ($('#county').val() == "") {
                        layer.msg('请选择县/区',1,8);
                    return false;
                }
                var det_address = $('#det_address').val();
                if (!det_address) {
                        layer.msg('请填写详细地址',1,8);
                    return false;
                }
                var name = $('#name').val();
                if (!name) {
                        layer.msg('请填写收货人',1,8);
                    return false;
                }
                var tel = $('#tel').val();
                if (!tel) {
                        layer.msg('请填写联系电话',1,8);
                    return false;
                }
                var reg = /(1[3-9]\d{9})/;
                if (!reg.test(tel)) {
                        layer.msg('请填写正确的手机号',1,8);
                    return false;
                }

                var address = $('#province').find("option:selected").text() + " / ";
                address += $('#city').find("option:selected").text() + " / ";
                address += $('#county').find("option:selected").text();
                console.log(address);
                return false;
                var id = "{{ \Auth::user()->id}}";

                $.ajax({
                    url: '/user/ajax/createAddress',
                    type: 'post',
                    dataType: 'json',
                    data: {id: id, name: name, tel: tel, address: address, det_address: det_address, _token: "{{ csrf_token() }}"},
                    success: function (data) {
                        layer.msg('添加成功',1,1);
                    }
                })

            });

        });
    </script>
@endsection
@extends('web.public.public')

@section('title')
        个人资料
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/web/css/shopping-mall-index.css') }}" />
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
                    {{ $userinfo }}
                    <p class="f-l">当前头像：</p>
                    <div class="touxiang f-l">
                        <div class="tu f-l">
                            <a href="#">
                                <img src="images/data-tu.gif" />
                                <input type="file" name="" id="" class="img1" />
                            </a>
                        </div>
                        <a href="JavaScript:;" class="sc f-l" shangchuang="">上传头像</a>
                        <div style="clear:both;"></div>
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div class="dt1">
                    <p class="dt-p f-l">用户名：</p>
                    <input type="text" value="zhao601884596" />
                    <div style="clear:both;"></div>
                </div>
                <div class="dt1">
                    <p class="dt-p f-l">真实姓名：</p>
                    <input type="text" value="zhao601884596" />
                    <div style="clear:both;"></div>
                </div>
                <div class="dt1">
                    <p class="dt-p f-l">身份证号：</p>
                    <input type="text" value="zhao601884596" />
                    <div style="clear:both;"></div>
                </div>
                <div class="dt1 dt2">
                    <p class="dt-p f-l">性别：</p>
                    <input type="radio" name="sex" value="1"><span>男</span>
                    <input type="radio" name="sex" value="2"><span>女</span>
                    <div style="clear:both;"></div>
                </div>
                <div class="dt1">
                    <p class="dt-p f-l">生日：</p>
                    <input type="text" value="20" />
                    <div style="clear:both;"></div>
                </div>
                <div class="dt1 dt3">
                    <p class="dt-p f-l">邮箱：</p>
                    <input type="eamil" value="601884596@qq.com" />
                    <button>获取邮箱验证码</button>
                    <div style="clear:both;"></div>
                </div>
                <div class="dt1">
                    <p class="dt-p f-l">验证码：</p>
                    <input type="text" value="" />
                    <div style="clear:both;"></div>
                </div>
                <div class="dt1">
                    <p class="dt-p f-l">手机号：</p>
                    <input type="text" value="12345678910" />
                    <div style="clear:both;"></div>
                </div>
                <button class="btn-pst">保存</button>
            </div>
        </div>
    </div>
    <div style="clear:both;"></div>
</div>
@endsection
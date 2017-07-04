@extends('web.public.public')

@section('title')
    重置密码
@endsection

@section('content')
    <div class="personal w1200">
        @include('web.public.leftMenu')
        <div class="personal-r f-r">
            <div class="personal-right">
                <div class="personal-r-tit">
                    <h3>修改密码</h3>
                </div>
                <div class="data-con">
                    <div class="dt1">
                        <p class="dt-p f-l">昵称：</p>
                        <input type="text" placeholder="RH了" />
                        <div style="clear:both;"></div>
                    </div>
                    <div class="dt1">
                        <p class="dt-p f-l">用户名：</p>
                        <input type="text" value="zhao601884596" />
                        <div style="clear:both;"></div>
                    </div>
                    <div class="dt1">
                        <p class="dt-p f-l">邮箱：</p>
                        <input type="text" value="601884596@qq.com" />
                        <div style="clear:both;"></div>
                    </div>
                    <div class="dt1 dt4">
                        <p class="dt-p f-l">密码：</p>
                        <input type="text" value="" />
                        <button>修改密码</button>
                        <div style="clear:both;"></div>
                    </div>
                    <button class="btn-pst">保存</button>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>
@endsection
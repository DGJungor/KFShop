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
                    <h3>重置密码</h3>
                </div>
                <div class="data-con">
                    <div class="dt1">
                        <p class="dt-p f-l">原密码：</p>
                        <input type="text" value="601884596@qq.com" />
                        <div style="clear:both;"></div>
                    </div>
                    <div class="dt1">
                        <p class="dt-p f-l">新密码：</p>
                        <input type="text" value="601884596@qq.com" />
                        <div style="clear:both;"></div>
                    </div>
                    <div class="dt1">
                        <p class="dt-p f-l">确认新密码：</p>
                        <input type="text" value="601884596@qq.com" />
                        <div style="clear:both;"></div>
                    </div>

                    <button class="btn-pst">确认重置</button>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>
@endsection
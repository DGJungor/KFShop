@extends('web.public.public')

@section('title')
    收货地址
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/web/css/shopping-mall-index.css') }}" />
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
                            <div class="dz-left f-l">
                                <p>新疆</p>
                                <ul>
                                    <li class="current"><a href="#">新疆</a></li>
                                    <li><a href="#">甘肃</a></li>
                                    <li><a href="#">宁夏</a></li>
                                    <li><a href="#">青海</a></li>
                                    <li><a href="#">重庆</a></li>
                                    <li><a href="#">长寿</a></li>
                                </ul>
                            </div>
                            <div class="dz-right f-l">
                                <p>乌鲁木齐</p>
                                <ul>
                                    <li class="current"><a href="#">乌鲁木齐</a></li>
                                    <li><a href="#">昌吉</a></li>
                                    <li><a href="#">巴音</a></li>
                                    <li><a href="#">郭楞</a></li>
                                    <li><a href="#">伊犁</a></li>
                                    <li><a href="#">阿克苏</a></li>
                                    <li><a href="#">喀什</a></li>
                                    <li><a href="#">哈密</a></li>
                                    <li><a href="#">克拉玛依</a></li>
                                    <li><a href="#">博尔塔拉</a></li>
                                    <li><a href="#">吐鲁番</a></li>
                                    <li><a href="#">和田</a></li>
                                    <li><a href="#">石河子</a></li>
                                    <li><a href="#">克孜勒苏</a></li>
                                    <li><a href="#">阿拉尔</a></li>
                                    <li><a href="#">五家渠</a></li>
                                    <li><a href="#">图木舒克</a></li>
                                    <li><a href="#">库尔勒</a></li>
                                    <div style="clear:both;"></div>
                                </ul>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <div style="clear:both;"></div>
                    </li>
                    <li class="tc-li1">
                        <p class="l-p">详细地址<span>*</span></p>
                        <textarea class="textarea1" placeholder="请如实填写您的详细信息，如街道名称、门牌号、楼层号和房间号。"></textarea>
                        <div style="clear:both;"></div>
                    </li>
                    <li class="tc-li1">
                        <p class="l-p">邮政编码<span></span></p>
                        <input type="text" />
                        <div style="clear:both;"></div>
                    </li>
                    <li class="tc-li1">
                        <p class="l-p">收货人姓名<span>*</span></p>
                        <input type="text" />
                        <div style="clear:both;"></div>
                    </li>
                    <li class="tc-li1">
                        <p class="l-p">联系电话<span>*</span></p>
                        <input type="text" />
                        <div style="clear:both;"></div>
                    </li>
                </ul>
                <button class="btn-pst2">保存</button>
            </div>
            <div class="man-info">
                <font>您已经保存三个地址！</font>
                <div class="man-if-con">
                    <div class="man-tit">
                        <p class="p1">收货人</p>
                        <p class="p2">所在地区</p>
                        <p class="p3">详细地址</p>
                        <p class="p4">邮编</p>
                        <p class="p5">电话/手机</p>
                        <p class="p6">操作</p>
                    </div>
                    <ul class="man-ul1">
                        <li>
                            <p class="p1">赵珍珍</p>
                            <p class="p2">重庆 重庆市 南岸区</p>
                            <p class="p3">南坪左岸阳光c2-10-3</p>
                            <p class="p4">563000</p>
                            <p class="p5">18983945092</p>
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
                            <p class="p3">南岸区南坪福红路19号乙单元7-2</p>
                            <p class="p4">000000</p>
                            <p class="p5">18983945092</p>
                            <p class="p6">
                                <a href="#">修改</a> |
                                <a href="#">删除</a>
                            </p>
                            <div style="clear:both;"></div>
                        </li>
                        <li>
                            <p class="p1">赵珍珍</p>
                            <p class="p2">浙江省 杭州市 余杭区崇贤街道</p>
                            <p class="p3">崇贤镇大安工业区彩诗纺织有限公司</p>
                            <p class="p4">311108</p>
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
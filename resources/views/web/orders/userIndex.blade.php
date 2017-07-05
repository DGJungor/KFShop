@extends('web.public.public')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/shopping-mall-index.css')}}"/>

    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/jun.css')}}"/>


@endsection


@section('title')
    个人中心-订单
@endsection


@section('content')
    {{ dump($typeCount) }}
    {{ dump($userOrders) }}

    @foreach($userOrders[1] as $v)
        {{ dump($v) }}

        @endforeach
        {{ $userOrders[1]->links() }}




    <div class="personal w1200">
        <div class="personal-left f-l">
            <div class="personal-l-tit">
                <h3>个人中心</h3>
            </div>
            <ul>
                <li class="current-li per-li1"><a href="#">消息中心<span>&gt;</span></a></li>
                <li class="per-li2"><a href="#">个人资料<span>&gt;</span></a></li>
                <li class="per-li3"><a href="#">我的订单<span>&gt;</span></a></li>
                <li class="per-li4"><a href="#">我的预约<span>&gt;</span></a></li>
                <li class="per-li5"><a href="#">购物车<span>&gt;</span></a></li>
                <li class="per-li6"><a href="#">管理收货地址<span>&gt;</span></a></li>
                <li class="per-li7"><a href="#">店铺收藏<span>&gt;</span></a></li>
                <li class="per-li8"><a href="#">购买记录<span>&gt;</span></a></li>
                <li class="per-li9"><a href="#">浏览记录<span>&gt;</span></a></li>
                <li class="per-li10"><a href="#">会员积分<span>&gt;</span></a></li>
            </ul>
        </div>
        <div class="order-right f-r">
            <div class="order-hd">
                <dl class="f-l">
                    <dt>
                        <a href="#"><img src="images/data-tu2.gif"></a>
                    </dt>
                    <dd>
                        <h3><a href="#">RH了</a></h3>
                        <p>zhao601884596</p>
                    </dd>
                    <div style="clear:both;"></div>
                </dl>
                <div class="ord-dai f-l">
                    <p>待付款<span>{{ $typeCount[1] }}</span></p>
                    <p>待发货<span>{{ $typeCount[2] }}</span></p>
                    <p>待收货<span>{{ $typeCount[3] }}</span></p>
                    <p>待评价<span>{{ $typeCount[4] }}</span></p>
                </div>
                <div style="clear:both;"></div>
            </div>
            <div class="order-md">
                <div class="md-tit">
                    <h3>我的订单</h3>
                </div>
                <div class="md-hd">
                    <p class="md-p1"><input name="hobby" value="" type="checkbox"><span>全选</span></p>
                    <p class="md-p2">商品信息</p>
                    <p class="md-p3">规格</p>
                    <p class="md-p4">单价（元）</p>
                    <p class="md-p5">金额（元）</p>
                    <p class="md-p6">操作</p>
                </div>
                <div class="md-info">
                    <div class="dai">
                        <input name="hobby" value="" type="checkbox"><span>待付款</span>
                    </div>
                    <div class="dai-con">
                        <dl class="dl1">
                            <dt>
                                <input name="hobby" value="" class="f-l" type="checkbox">
                                <a href="#" class="f-l"><img src="images/dai.gif"></a>
                            <div style="clear:both;"></div>
                            </dt>
                            <dd>
                                <p>登高阁紫菜肉松鸡蛋卷 海苔蛋卷 糕点江西特产小吃 休闲办公零食</p>
                                <span>X 1</span>
                            </dd>
                            <div style="clear:both;"></div>
                        </dl>
                        <div class="dai-right f-l">
                            <p class="d-r-p1">颜色：蓝色<br>尺码：XL</p>
                            <p class="d-r-p2">¥ 66.00</p>
                            <p class="d-r-p3">¥ 66.00</p>
                            <p class="d-r-p4"><a href="#">移入收藏夹</a><br><a href="#">删除</a><br><a href="#">付款</a></p>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                    <div class="dai-con">
                        <dl class="dl1">
                            <dt>
                                <input name="hobby" value="" class="f-l" type="checkbox">
                                <a href="#" class="f-l"><img src="images/dai.gif"></a>
                            <div style="clear:both;"></div>
                            </dt>
                            <dd>
                                <p>登高阁紫菜肉松鸡蛋卷 海苔蛋卷 糕点江西特产小吃 休闲办公零食</p>
                                <span>X 1</span>
                            </dd>
                            <div style="clear:both;"></div>
                        </dl>
                        <div class="dai-right f-l">
                            <p class="d-r-p1">颜色：蓝色<br>尺码：XL</p>
                            <p class="d-r-p2">¥ 66.00</p>
                            <p class="d-r-p3">¥ 66.00</p>
                            <p class="d-r-p4"><a href="#">移入收藏夹</a><br><a href="#">删除</a><br><a href="#">付款</a></p>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                </div>
                <div class="md-info">
                    <div class="dai">
                        <input name="hobby" value="" type="checkbox"><span>待发货</span>
                    </div>
                    <div class="dai-con">
                        <dl class="dl1">
                            <dt>
                                <input name="hobby" value="" class="f-l" type="checkbox">
                                <a href="#" class="f-l"><img src="images/dai.gif"></a>
                            <div style="clear:both;"></div>
                            </dt>
                            <dd>
                                <p>登高阁紫菜肉松鸡蛋卷 海苔蛋卷 糕点江西特产小吃 休闲办公零食</p>
                                <span>X 1</span>
                            </dd>
                            <div style="clear:both;"></div>
                        </dl>
                        <div class="dai-right f-l">
                            <p class="d-r-p1">颜色：蓝色<br>尺码：XL</p>
                            <p class="d-r-p2">¥ 66.00</p>
                            <p class="d-r-p3">¥ 66.00</p>
                            <p class="d-r-p4" style="margin-top:20px;"><a href="#">移入收藏夹</a><br><a href="#">删除</a></p>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                </div>
                <div class="md-info">
                    <div class="dai">
                        <input name="hobby" value="" type="checkbox"><span>待收货</span>
                    </div>
                    <div class="dai-con">
                        <dl class="dl1">
                            <dt>
                                <input name="hobby" value="" class="f-l" type="checkbox">
                                <a href="#" class="f-l"><img src="images/dai.gif"></a>
                            <div style="clear:both;"></div>
                            </dt>
                            <dd>
                                <p>登高阁紫菜肉松鸡蛋卷 海苔蛋卷 糕点江西特产小吃 休闲办公零食</p>
                                <span>X 1</span>
                            </dd>
                            <div style="clear:both;"></div>
                        </dl>
                        <div class="dai-right f-l">
                            <p class="d-r-p1" style=" position:relative;top:-20px;">颜色：蓝色<br>尺码：XL</p>
                            <p class="d-r-p2" style="top:-43px;">¥ 66.00</p>
                            <p class="d-r-p3" style="top:-43px;">¥ 66.00</p>
                            <p class="d-r-p4"><a href="#">移入收藏夹</a><br><a href="#">删除</a><br><a href="#">确认收货</a><br><a href="JavaScript:;" ckwl="">查看物流</a></p>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                </div>
                <div class="md-info">
                    <div class="dai">
                        <input name="hobby" value="" type="checkbox"><span>待评价</span>
                    </div>
                    <div class="dai-con">
                        <dl class="dl1">
                            <dt>
                                <input name="hobby" value="" class="f-l" type="checkbox">
                                <a href="#" class="f-l"><img src="images/dai.gif"></a>
                            <div style="clear:both;"></div>
                            </dt>
                            <dd>
                                <p>登高阁紫菜肉松鸡蛋卷 海苔蛋卷 糕点江西特产小吃 休闲办公零食</p>
                                <span>X 1</span>
                            </dd>
                            <div style="clear:both;"></div>
                        </dl>
                        <div class="dai-right f-l">
                            <p class="d-r-p1">颜色：蓝色<br>尺码：XL</p>
                            <p class="d-r-p2">¥ 66.00</p>
                            <p class="d-r-p3">¥ 66.00</p>
                            <p class="d-r-p4" style="margin-top:20px;"><a href="#">移入收藏夹</a><br><a href="#">删除</a></p>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                </div>
                <!--分页-->
                <div class="paging">
                    <div class="pag-left f-l">
                        <a href="#" class="about left-r f-l">&lt;</a>
                        <ul class="left-m f-l">
                            <li><a href="#">1</a></li>
                            <li class="current"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                            <li><a href="#">...</a></li>
                            <li><a href="#">100</a></li>
                            <div style="clear:both;"></div>
                        </ul>
                        <a href="#" class="about left-l f-l">&gt;</a>
                        <div style="clear:both;"></div>
                    </div>
                    <div class="pag-right f-l">
                        <div class="jump-page f-l">
                            到第<input type="text">页
                        </div>
                        <button class="f-l">确定</button>
                        <div style="clear:both;"></div>
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div class="md-ft">
                    <p class="md-p1"><input name="hobby" value="" type="checkbox"><span>全选</span></p>
                    <a href="#">删除</a>
                    <a href="#">加入收藏夹<span>（此处始终在屏幕下方）</span></a>
                    <button>结算</button>
                </div>
            </div>

        </div>
        <div style="clear:both;"></div>
    </div>

    @endsection



@extends('web.index')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/shopping-mall-index.css') }}" />
    @endsection


@section('title')
    购物车
@endsection



@section('content')

    <div class="cart-content w1200">
        <ul class="cart-tit-nav">
            <li class="current"><a href="#">全部商品 21</a></li>
            <li><a href="#">降价商品 1</a></li>
            <li><a href="#">进口商品 1</a></li>
            <div style="clear:both;"></div>
        </ul>
        <div class="cart-con-tit">
            <p class="p1">
                <input type="checkbox" value="" name="hobby"></input>

                <span>全选</span>
            </p>
            <p class="p2">商品信息</p>
            <p class="p3">规格</p>
            <p class="p4">数量</p>
            <p class="p5">单价（元）</p>
            <p class="p6">金额（元）</p>
            <p class="p7">操作</p>
        </div>

        <div class="cart-con-info">
            <div class="info-top">

            </div>
            <div class="info-mid">
                <input type="checkbox" value="" name="hobby" class="mid-ipt f-l"></input>
                <div class="mid-tu f-l">
                    <a href="#"><img src="images/dai1.gif"/></a>
                </div>
                <div class="mid-font f-l">
                    <a href="#">登高阁紫菜肉松鸡蛋卷 海苔蛋卷 糕点<br/>江西特产小吃 休闲办公零食</a>
                    <span>满赠</span>
                </div>
                <div class="mid-guige f-l">
                    <p>颜色：蓝色</p>
                    <p>尺码：XL</p>
                    <a href="JavaScript:;" class="xg" xg="xg1">修改</a>
                    <div class="guige-xiugai" xg-g="xg1">
                        <div class="xg-left f-l">
                            <dl>
                                <dt>颜 色</dt>
                                <dd>
                                    <a href="JavaScript:;" class="current">黑色</a>
                                    <a href="JavaScript:;">白色</a>
                                </dd>
                                <div style="clear:both;"></div>
                            </dl>
                            <dl>
                                <dt>尺 码</dt>
                                <dd>
                                    <a href="JavaScript:;" class="current">M</a>
                                    <a href="JavaScript:;">L</a>
                                    <a href="JavaScript:;">XL</a>
                                </dd>
                                <div style="clear:both;"></div>
                            </dl>
                            <a href="JavaScript:;" class="qd">确定</a>
                            <a href="JavaScript:;" class="qx" qx="xg1">取消</a>
                        </div>
                        <div class="xg-right f-l">
                            <a href="#"><img src="images/dai2.gif"/></a>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                </div>
                <div class="mid-sl f-l">
                    <a href="JavaScript:;" class="sl-left">-</a>
                    <input type="text" value="1"/>
                    <a href="JavaScript:;" class="sl-right">+</a>
                </div>
                <p class="mid-dj f-l">¥ <span>6</span>.00</p>
                <p class="mid-je f-l">¥ <span>6</span>.00</p>
                <div class="mid-chaozuo f-l">
                    <a href="#">移入收藏夹</a>
                    <a href="#">删除</a>
                </div>
                <div style="clear:both;"></div>
            </div>
        </div>
        <div class="cart-con-info">
            <div class="info-top">

            </div>
            <div class="info-mid">
                <input type="checkbox" value="" name="hobby" class="mid-ipt f-l"></input>
                <div class="mid-tu f-l">
                    <a href="#"><img src="images/dai1.gif"/></a>
                </div>
                <div class="mid-font f-l">
                    <a href="#">登高阁紫菜肉松鸡蛋卷 海苔蛋卷 糕点<br/>江西特产小吃 休闲办公零食</a>
                    <span>满赠</span>
                </div>
                <div class="mid-guige f-l">
                    <p>颜色：蓝色</p>
                    <p>尺码：XL</p>
                    <a href="JavaScript:;" class="xg" xg="xg1">修改</a>
                    <div class="guige-xiugai" xg-g="xg1">
                        <div class="xg-left f-l">
                            <dl>
                                <dt>颜 色</dt>
                                <dd>
                                    <a href="JavaScript:;" class="current">黑色</a>
                                    <a href="JavaScript:;">白色</a>
                                </dd>
                                <div style="clear:both;"></div>
                            </dl>
                            <dl>
                                <dt>尺 码</dt>
                                <dd>
                                    <a href="JavaScript:;" class="current">M</a>
                                    <a href="JavaScript:;">L</a>
                                    <a href="JavaScript:;">XL</a>
                                </dd>
                                <div style="clear:both;"></div>
                            </dl>
                            <a href="JavaScript:;" class="qd">确定</a>
                            <a href="JavaScript:;" class="qx" qx="xg1">取消</a>
                        </div>
                        <div class="xg-right f-l">
                            <a href="#"><img src="images/dai2.gif"/></a>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                </div>
                <div class="mid-sl f-l">
                    <a href="JavaScript:;" class="sl-left">-</a>
                    <input type="text" value="1"/>
                    <a href="JavaScript:;" class="sl-right">+</a>
                </div>
                <p class="mid-dj f-l">¥ <span>10</span>.00</p>
                <p class="mid-je f-l">¥ <span>10</span>.00</p>
                <div class="mid-chaozuo f-l">
                    <a href="#">移入收藏夹</a>
                    <a href="#">删除</a>
                </div>
                <div style="clear:both;"></div>
            </div>
        </div>
        <div class="cart-con-info">
            <div class="info-top">

            </div>
            <div class="info-mid">
                <input type="checkbox" value="" name="hobby" class="mid-ipt f-l"></input>
                <div class="mid-tu f-l">
                    <a href="#"><img src="images/dai1.gif"/></a>
                </div>
                <div class="mid-font f-l">
                    <a href="#">登高阁紫菜肉松鸡蛋卷 海苔蛋卷 糕点<br/>江西特产小吃 休闲办公零食</a>
                    <span>满赠</span>
                </div>
                <div class="mid-guige f-l">
                    <p>颜色：蓝色</p>
                    <p>尺码：XL</p>
                    <a href="JavaScript:;" class="xg" xg="xg1">修改</a>
                    <div class="guige-xiugai" xg-g="xg1">
                        <div class="xg-left f-l">
                            <dl>
                                <dt>颜 色</dt>
                                <dd>
                                    <a href="JavaScript:;" class="current">黑色</a>
                                    <a href="JavaScript:;">白色</a>
                                </dd>
                                <div style="clear:both;"></div>
                            </dl>
                            <dl>
                                <dt>尺 码</dt>
                                <dd>
                                    <a href="JavaScript:;" class="current">M</a>
                                    <a href="JavaScript:;">L</a>
                                    <a href="JavaScript:;">XL</a>
                                </dd>
                                <div style="clear:both;"></div>
                            </dl>
                            <a href="JavaScript:;" class="qd">确定</a>
                            <a href="JavaScript:;" class="qx" qx="xg1">取消</a>
                        </div>
                        <div class="xg-right f-l">
                            <a href="#"><img src="images/dai2.gif"/></a>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                </div>
                <div class="mid-sl f-l">
                    <a href="JavaScript:;" class="sl-left">-</a>
                    <input type="text" value="1"/>
                    <a href="JavaScript:;" class="sl-right">+</a>
                </div>
                <p class="mid-dj f-l">¥ <span>1</span>.00</p>
                <p class="mid-je f-l">¥ <span>1</span>.00</p>
                <div class="mid-chaozuo f-l">
                    <a href="#">移入收藏夹</a>
                    <a href="#">删除</a>
                </div>
                <div style="clear:both;"></div>
            </div>
        </div>

        <!--分页-->
        <div class="paging">
            <div class="pag-left f-l">
                <a href="#" class="about left-r f-l"><</a>
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
                <a href="#" class="about left-l f-l">></a>
                <div style="clear:both;"></div>
            </div>
            <div class="pag-right f-l">
                <div class="jump-page f-l">
                    到第<input type="text"/>页
                </div>
                <button class="f-l">确定</button>
                <div style="clear:both;"></div>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div class="cart-con-footer">
            <div class="quanxuan f-l">
                <input type="checkbox" value="" name="hobby"></input>
                <span>全选</span>
                <a href="#">删除</a>
                <a href="#">加入收藏夹</a>
                <p>（此处始终在屏幕下方）</p>
            </div>
            <div class="jiesuan f-r">
                <div class="jshj f-l">
                    <p>合计（不含运费）</p>
                    <p class="jshj-p2">
                        ￥：<span>0</span>.00
                    </p>
                </div>
                <a href="JavaScript:;" class="js-a1 f-l">结算</a>
                <div style="clear:both;"></div>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
@endsection
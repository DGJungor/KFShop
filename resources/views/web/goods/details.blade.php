
@extends('web.public.public')

@section('title')
    商品详情页
@endsection

@section('css')

    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/shopping-mall-index.css') }}" />

@endsection


@section('content')
<!--内容开始-->
<div class="details w1200">
    <div class="deta-info1">
        <div class="dt-if1-l f-l">
            <div class="dt-if1-datu">
                <ul qie-da="">
                    <li><a href="#"><img src="{{ url('web/images/dt-if1-l-tuda1.gif') }}" /></a></li>
                    <li><a href="#"><img src="{{ url('uploads/goods') }}/xl_{{$dataObj['picname']}}" /></a></li>
                    <li><a href="#"><img src="{{ url('web/images/dt-if1-l-tuda2.gif') }}" /></a></li>
                    <li><a href="#"><img src="{{ url('web/images/dt-if1-qietu-right.gif') }}" /></a></li>
                    <div style="clear:both;"></div>
                </ul>
            </div>
            <div class="dt-if1-qietu">
                <a class="dt-qie-left f-l" href="JavaScript:;"><img src="{{ url('web/images/dt-if1-qietu-left.gif') }}" /></a>
                <div class="dt-qie-con f-l">
                    <ul qie-xiao="">
                        <li class="current"><a href="#"><img src="{{ url('web/images/dt-if1-qietu1.gif') }}" /></a></li>
                        <li><a href="#"><img src="{{ url('uploads/goods') }}/m{{$dataObj['picname']}}" /></a></li>
                        <li><a href="#"><img src="{{ url('web/images/dt-if1-qietu2.gif') }}" /></a></li>
                        <li><a href="#"><img src="{{ url('web/images/dt-if1-qietu-right.gif') }}" /></a></li>
                        <div style="clear:both;"></div>
                    </ul>
                </div>
                <a class="dt-qie-right f-r" href="JavaScript:;"><img src="{{ url('web/images/dt-if1-qietu-right.gif') }}" /></a>
            </div>
            <div class="dt-if1-fx">

                <p>分享到：<a href="#"><img src="{{ url('web/images/dt-xl.gif') }}" /></a><a href="#"><img src="{{ url('web/images/dt-kj.gif') }}" /></a><a href="#"><img src="{{ url('web/images/dt-wx.gif') }}" /></a></p>
            </div>
        </div>

        <div class="dt-if1-m f-l">
            <div class="dt-ifm-hd">
                <h3><a href="#">韩国进口膨化零食品 九日牌蜂蜜黄油薯片60g 蜂蜜黄油味</a></h3>
                <p>香脆美味，传统苏格兰口味</p>
            </div>
            <div class="dt-ifm-gojia">
                <dl>
                    <dt>宅购价</dt>
                    <dd>
                        <p class="p1">
                            <span class="sp1">¥17.50</span><span class="sp2">29.50</span>
                        </p>
                        <p class="p2">
                            <span class="sp1"><img src="{{ url('web/images/dt-ifm-sp1-img.gif') }}" />5分</span><span class="sp2">共有 2 条评价</span>
                        </p>
                    </dd>
                    <div style="clear:both;"></div>
                </dl>
            </div>
            <dl class="dt-ifm-spot">
                <dt>活动</dt>
                <dd>
                    <P><span>包邮</span>本店满50.00元免运费</P>
                    <P><span>满赠</span>本店满500.00元赠300.00元礼品（随机赠送）</P>
                </dd>
                <div style="clear:both;"></div>
            </dl>
            <dl class="dt-ifm-box1">
                <dt>送时</dt>
                <dd>
                    <select>
                        <option>请选择配送日期</option>
                        <option>2015-8-31</option>
                        <option>2015-8-32</option>
                    </select>
                    <select>
                        <option>请选择配送时段</option>
                        <option>上午</option>
                        <option>下午</option>
                    </select>
                    <p>每天会有4个时间段统一配送，还有一个加急送，如果提前两天预定，还可以享受折扣哦！</p>
                </dd>
                <div style="clear:both;"></div>
            </dl>
            <dl class="dt-ifm-box2">
                <dt>送至</dt>
                <dd>
                    <select>
                        <option>新疆   乌鲁木齐</option>
                        <option>新疆   乌鲁</option>
                        <option>新疆   木齐</option>
                    </select>
                    <span>请选择配送地址</span>
                </dd>
                <div style="clear:both;"></div>
            </dl>
            <dl class="dt-ifm-box3">
                <dt>数量</dt>
                <dd>
                    <a class="box3-left" href="JavaScript:;">-</a>
                    <input type="text" value="1">
                    <a class="box3-right" href="JavaScript:;">+</a>
                </dd>
                <div style="clear:both;"></div>
            </dl>
            <div class="dt-ifm-box4">
                <button class="btn1">立即购买</button>
                <button class="btn2">加入购物车</button>
                <button class="btn3">收藏</button>
            </div>
        </div>

        <div class="dt-if1-r f-r">
            <div class="dt-ifr-fd">
                <div class="dt-ifr-tit">
                    <h3>同类推荐</h3>
                </div>
                <dl>
                    <dt><a href="#"><img src="{{ url('web/images/dt-ifr-fd-dt-tu.gif') }}" /></a></dt>
                    <dd>
                        <a href="#">【观音桥】罗兰钢管舞舞蹈体验</a>
                        <p>¥9.90</p>
                    </dd>
                    <div style="clear:both;"></div>
                </dl>
                <dl>
                    <dt><a href="#"><img src="{{ url('web/images/dt-ifr-fd-dt-tu.gif') }}" /></a></dt>
                    <dd>
                        <a href="#">【观音桥】罗兰钢管舞舞蹈体验</a>
                        <p>¥9.90</p>
                    </dd>
                    <div style="clear:both;"></div>
                </dl>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>

    <div class="deta-info2">
        <div class="dt-if2-l f-l">
            <div class="if2-l-box1">
                <div class="if2-tit">
                    <h3>浏览记录</h3>
                </div>
                <ul>
                    <li>
                        <a href="#"><img src="{{ url('web/images/if2-l-box1-tu1.gif') }}" /></a>
                        <a class="if2-li-tit" href="#">乐事Lay's 无限薯片（翡翠黄瓜味）104g/罐</a>
                        <p>¥6.90</p>
                    </li>
                </ul>
            </div>
            <div class="if2-l-box1" style="margin-top:18px;">
                <div class="if2-tit">
                    <h3>看了又看</h3>
                </div>
                <ul>
                    <li>
                        <a href="#"><img src="{{ url('web/images/if2-l-box1-tu1.gif') }}" /></a>
                        <a class="if2-li-tit" href="#">乐事Lay's 无限薯片（翡翠黄瓜味）104g/罐</a>
                        <p>¥6.90</p>
                    </li>
                </ul>
            </div>
        </div>



        <!--  -->
        <div class="dt-if2-r f-r">
            <ul class="if2-tit2">
                <li class="current" com-det="dt1"><a href="JavaScript:;">产品信息</a></li>
                <li com-det="dt2"><a href="JavaScript:;">商品评论</a></li>
                <div style="clear:both;"></div>
            </ul>


            <!--  -->
            <div style="border:1px solid #DBDBDB;" com-det-show="dt1">

                <div class="if2-tu3">
                @foreach($listObj as $val)
                {{$val->details}}
                     @foreach($val->picname as $v)
                    <img width="935" src="{{ url('uploads/goods')}}/{{$v}}" />
                    @endforeach
                @endforeach
                </div>
            </div>


            <!--  -->


            <div style="display:none;" com-det-show="dt2">
                <dl class="if2-r-box2">
                    <dt>
                    <p class="box2-p1">好评率</p>
                    <p class="box2-p2">0%</p>
                    <p class="box2-p3">共0人评论</p>
                    </dt>
                    <dd>
                        <P>买过的人觉得</P>
                        <ul>
                            <li><a href="#">香脆可口(0)</a></li>
                            <div style="clear:both;"></div>
                        </ul>
                    </dd>
                    <div style="clear:both;"></div>
                </dl>
                <div class="if2-r-box3">
                    <ul>
                        <li class="current-li"><a href="#">全部（0）</a></li>
                        <li><a href="#">好评（0）</a></li>
                        <li><a href="#">中评（0）</a></li>
                        <li><a href="#">差评（0）</a></li>
                        <div style="clear:both;"></div>
                    </ul>
                    <dl>
                        <dt>
                            <a href="#"><img src="{{ url('web/images/box3-dt-tu.gif')}}" /></a>
                        </dt>
                        <dd>
                            <a href="#">胡**</a>
                            <p class="b3-p1">赞赞赞赞赞赞赞赞赞赞赞赞赞！！！！！！！！！</p>
                            <p class="b3-p2">2015-12-12    16:57:22  </p>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>

                    <!--分页-->
                    <div class="paging">
                        <div class="pag-left f-l">
                            <a href="#" class="about left-r f-l"><</a>
                            <ul class="left-m f-l">
                                <li><a href="#">1</a></li>
                                <li class="current"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">...</a></li>
                                <div style="clear:both;"></div>
                            </ul>
                            <a href="#" class="about left-l f-l">></a>
                            <div style="clear:both;"></div>
                        </div>
                        <div class="pag-right f-l">
                            <div class="jump-page f-l">
                                到第<input type="text" />页
                            </div>
                            <button class="f-l">确定</button>
                            <div style="clear:both;"></div>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                </div>
            </div>


            <!--  -->



        </div>
        <div style="clear:both;"></div>
    </div>
</div>

@endsection
@extends('web.index')

@section('title')

商品评价表

@endsection

@section('css')

<link rel="stylesheet" type="text/css" href="{{ url('/web/css/shopping-mall-index.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('/web/css/star-rating.css' ) }}" media="all"/>

@endsection

@section('nav')
	<!--nav-->
<div class="nav-box">
    	<div class="nav-kuai w1200">
        	<div class="nav-kuaijie yjp-hover1 f-l">
            	<a href="JavaScript:;" class="kj-tit1">商品分类快捷</a>
                <div class="kuaijie-box yjp-show1" style="display:none;">
                	<div class="kuaijie-info">
                    	<dl class="kj-dl1">
                        	<dt><img src="{{ url('/web/images/zl2-07.gif') }}" /><a href="#">食品/饮料/酒水</a></dt>
                            <dd>
                            	<a href="#">饼干糕点</a><span>|</span>
                            	<a href="#">冲调保健</a><span>|</span>
                            	<a href="#">酒水</a>
                            </dd>
                        </dl>
                        <div class="kuaijie-con">
                        	<dl class="kj-dl2">
                            	<dt><a href="#">洗浴用品/身体护理</a></dt>
                                <dd>
                                   	<a href="#">护手霜</a><span>|</span>
                                   
                                </dd>
                            </dl>
                            <div style="clear:both;"></div>
                        </div>
                    </div>
                	<div class="kuaijie-info">
                    	<dl class="kj-dl1">
                        	<dt><img src="{{ url('/web/images/zl2-08.gif') }}" /><a href="搜索列表(有品牌).html">粮油副食</a></dt>
                            <dd>
                            	<a href="#">厨房调味</a><span>|</span>
                            	<a href="#">大米/面粉</a><span>|</span>
                            	<a href="#">方便速食</a>
                            </dd>
                        </dl>
                        <div class="kuaijie-con">
                        	<dl class="kj-dl2">
                            	<dt><a href="#">洗浴用品/身体护理</a></dt>
                                
                            </dl>
                            <div style="clear:both;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="nav-font f-l">
            	<li><a href="#">在线商城</a></li>
            	<li><a href="#">二手市场</a><span><img src="{{ url('/web/images/zl2-05.gif') }}" /></span></li>
                <div style="clear:both;"></div>
            </ul>
            <div style="clear:both;"></div>
        </div>
    </div>
@endsection


@section('content')

 <!--内容开始-->
    <div class="evaluate w1200">
    	<dl class="eva-info1">
        	<dt><a href="#"><img src="{{ url('web/images/want-evaluate-tu.gif') }}" /></a></dt>
            <dd>
            	<h3><a href="#">商品ID</a></h3>
                <ul>
                	<li>
                    	<span>价格</span><p class="p1">¥ 110.00 元</p>
                    </li>
                	<li>
                    	<span>配送</span><p>快递:  0.00</p>
                    </li>
                	<li>
                    	<span>评价</span><p>0分 (累计评价 43227 )</p>
                    </li>
                	<li>
                    	<span>颜色分类</span><p>长410ML*2，赠餐具</p>
                    </li>
                	<li>
                    	<span>订单号</span><p>20151223654586</p>
                    </li>
                </ul>
            </dd>
            <div style="clear:both;"></div>
        </dl>
        <dl class="eva-info2">
        	<dt>
            	<p class="p1">好评率</p>
            	<p class="p2">0%</p>
            	<p class="p3">共人评论</p>
            </dt>
            <dd>
            	<p>买过的人觉得</p>
                <ul>
                	<li><a href="#">香脆可口(0)</a></li>
                	<div style="clear:both;"></div>
                </ul>
            </dd>
            <div style="clear:both;"></div>
        </dl>
        <form action="" method="POST">
        <div class="eva-info3">
        	<div class="eva-if3-l f-l">
            	<dl class="if3-l-dl1">
                	<dt>商品评价</dt>
                    <dd><textarea name="comment_info"></textarea></dd>
            		<div style="clear:both;"></div>
                </dl>
            	<dl class="if3-l-d6">
                	<dt>等级评价</dt>
                    <dd>
                        好评: <input type="radio" name="star" value="1">
                        中评: <input type="radio" name="star" value="2">
                        差评: <input type="radio" name="star" value="3">
                    </dd>
            		<div style="clear:both;"></div>
                </dl>

                <button class="eva-btn" type="submit">提交评价</button>
            </div>

            <div style="clear:both;"></div>
        </div>
        </form>
    </div>

@endsection
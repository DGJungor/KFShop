@extends('web.index')

@section('title')

商品评价表

@endsection

@section('css')

<link rel="stylesheet" type="text/css" href="{{ url('/web/css/shopping-mall-index.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('/web/css/star-rating.css' ) }}" media="all"/>
<link rel="stylesheet" type="text/css" href="{{ url('/web/css/bootstrap.min.css' ) }}" rel="stylesheet"/>

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
        	<dt><a href="#"><img src="{{ url('web/css/images/want-evaluate-tu.gif') }}" /></a></dt>
            <dd>
            	<h3><a href="#">买一送三 正品ICOOK韩式耐热玻璃饭盒微波炉保鲜盒密封碗便当套装</a></h3>
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
            	<p class="p3">共0人评论</p>
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
        <div class="eva-info3">
        	<div class="eva-if3-l f-l">
            	<dl class="if3-l-dl1">
                	<dt>商品评价</dt>
                    <dd><textarea></textarea></dd>
            		<div style="clear:both;"></div>
                </dl>
            	<dl class="if3-l-dl2">
                	<dt>服务评价</dt>
                    <dd><textarea></textarea></dd>
            		<div style="clear:both;"></div>
                </dl>
            	<dl class="if3-l-dl3">
                	<dt>晒图片</dt>
                    <dd>
                    	<a href="JavaScript:;">
                        	<img src="{{ url('web/css/images/dl3-tu1.gif') }}" />
                            <input type="file" class="img1" />
                        </a>
                        <a href="JavaScript:;">
                        	<img src="{{ url('web/css/images/dl3-tu2.gif') }}" />
                            <input type="file" class="img1" />
                        </a>
                        <p>上传图片     1/5</p>
                        <div style="clear:both;"></div>
                    </dd>
            		<div style="clear:both;"></div>
                </dl>
                <button class="eva-btn">提交评价</button>
            </div>
        	<div class="eva-if3-r f-l">
           		<ul>
                	<li>
                    	<p class="p1"><span>*</span> 描述相符</p>
                        <form style="display:inline-block;">
                            <input id="input-21e" value="0" type="number" class="rating" min=0 max=5 step=0.5 data-size="xs" >
                        </form>
                    </li>
                	<li>
                    	<p class="p1"><span>*</span> 卖家服务</p>
                        <form style="display:inline-block;">
                            <input id="input-21e" value="0" type="number" class="rating" min=0 max=5 step=0.5 data-size="xs" >
                        </form>
                    </li>
                	<li>
                    	<p class="p1"><span>*</span> 物流服务</p>
                        <form style="display:inline-block;">
                            <input id="input-21e" value="0" type="number" class="rating" min=0 max=5 step=0.5 data-size="xs" >
                        </form>
                    </li>
                </ul>
                <p class="eva-fen">2分-4分为一般</p>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>

@endsection
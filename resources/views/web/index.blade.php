<!doctype html>
<html>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<title>@yield('title')</title>
	
	<link rel="stylesheet" type="text/css" href="{{ url('/web/css/style.css') }}" />
<!-- 	<link rel="stylesheet" type="text/css" href="{{ url('Web') }}" />
	<link rel="stylesheet" type="text/css" href="{{ url('/web/css/doubleDate.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ url('/web/css/index.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ url('/web/css/shopping-mall-index.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ url('/web/css/star-rating.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ url('/web/css/star-rating.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ url('/web/css/style2.css') }}" />
	
	<link rel="stylesheet" type="text/css" href="{{ url('/web/css/zhonglinggxm2.css') }}" /> -->
    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/zhonglingxm2.css') }}" />
	<script type="text/javascript" src="{{ url('/web/js/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ url('/web/js/zhonglin.js') }}"></script>
	<script type="text/javascript" src="{{ url('/web/js/zhongling2.js') }}"></script>
	<script type="text/javascript" src="{{ url('/web/js/star-rating.js') }}"></script>
	<script type="text/javascript" src="{{ url('/web/js/doubleDate2.0.js') }}"></script>
	<script type="text/javascript" src="{{ url('/web/js/jquery-1.4.2.min.js') }}"></script>
    @yield('css')
</head>

<body id="top">
	
	<!--header-->
    <div class="zl-header">
    	<div class="zl-hd w1200">
        	<p class="hd-p1 f-l">
            	Hi!您好，欢迎来到购物网，请登录  <a href="#">【免费注册】</a>
            </p>
        	<p class="hd-p2 f-r">
            	<a href="#">返回首页 (个人中心)</a><span>|</span>
                <a href="#">我的购物车</a><span>|</span>
                <a href="#">我的订单</a>
            </p>
            <div style="clear:both;"></div>
        </div>
    </div>
	
    <!--logo search weweima-->
 	<div class="logo-search w1200">
    	<div class="logo-box f-l">
        	<div class="logo f-l">
            	<a href="#" title="sunlogo"><img src="{{ url('/web/images/zl2-01-1.gif') }}" /></a>
            </div>
        	<div class="shangjia f-l">
            	<a href="JavaScript:;" class="shangjia-a1">[ 切换城市 ]</a>
            	<a href="JavaScript:;" class="shangjia-a2">商家入口</a>
                <div class="select-city">
        	<div class="sl-city-top">
            	<p class="f-l">切换城市</p>
                <a class="close-select-city f-r" href="JavaScript:;">
                	<img src="{{ url('/web/images/close-select-city.gif') }}" />
                </a>
            </div>
            <div class="sl-city-con">
            	
            </div>
        </div>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div class="erweima f-r">
        	<a href="JavaScript:;"><img src="{{ url('/web/images/zl2-04.gif') }}" /></a>
        </div>
        <div class="search f-r">
        	<div class="search-info">
            	<input type="text" placeholder="请输入商品名称" />
                <button>搜索</button>
                <div style="clear:both;"></div>
            </div>
            <ul class="search-ul">
            	<li><a href="JavaScript:;">热门</a></li>
            	
                <div style="clear:both;"></div>
            </ul>
        </div>
        <div style="clear:both;"></div>
    </div>

    <!--nav-->
    @yield('nav')

    <!--banner-->
    @yield('banner')

    <!--热门推荐-->
    @yield('hot')
    
    <!-- 内容 -->
    <div class="zl-info w1200">
		@yield('content')
    </div>

    <!--底部一块-->
    <div class="footer-box">
    	<ul class="footer-info1 w1200">
        	<li>
            	<div class="ft-tu1">
                	<a href="JavaScript:;"><img src="{{ url('Web') }}" /></a>
                </div>
                <h3><a href="JavaScript:;">号码保障</a></h3>
                <P>所有会员，手机短信验证</P>
            </li>
        	<li>
            	<div class="ft-tu1">
                	<a href="JavaScript:;"><img src="{{ url('/web/images/zl2-87.gif') }}" /></a>
                </div>
                <h3><a href="JavaScript:;">6*12小时客服</a></h3>
                <P>有任何问题随时免费资讯</P>
            </li>
        	<li>
            	<div class="ft-tu1">
                	<a href="JavaScript:;"><img src="{{ url('/web/images/zl2-88.gif') }}" /></a>
                </div>
                <h3><a href="JavaScript:;">专业专攻</a></h3>
                <P>我们只专注于建筑行业的信息服务</P>
            </li>
        	<li>
            	<div class="ft-tu1">
                	<a href="JavaScript:;"><img src="{{ url('/web/images/zl2-89.gif') }}" /></a>
                </div>
                <h3><a href="JavaScript:;">注册有礼</a></h3>
                <P>随时随地注册有大礼包</P>
            </li>
        	<li>
            	<div class="ft-tu1">
                	<a href="JavaScript:;"><img src="{{ url('/web/images/zl2-90.gif') }}" /></a>
                </div>
                <h3><a href="JavaScript:;">值得信赖</a></h3>
                <P>专业的产品，专业的团队</P>
            </li>
            <div style="clear:both;"></div>
        </ul>
    	<div class="footer-info2 w1200">
        	<div class="ft-if2-left f-l">
            	<dl>
                	<dt><a href="#">新手上路</a></dt>
                    <dd>
                    	<a href="#">购物流程</a>
                    	<a href="#">在线支付</a>
                    	<a href="#">投诉与建议</a>
                    </dd>
                </dl>
            	<dl>
                	<dt><a href="#">配送方式</a></dt>
                    <dd>
                    	<a href="#">货到付款区域</a>
                    	<a href="#">配送费标准</a>
                    </dd>
                </dl>
            	<dl>
                	<dt><a href="#">购物指南</a></dt>
                    <dd>
                    	<a href="#">订购流程</a>
                    	<a href="#">购物常见问题</a>
                    </dd>
                </dl>
            	<dl>
                	<dt><a href="#">售后服务</a></dt>
                    <dd>
                    	<a href="#">售后服务保障</a>
                    	<a href="#">退换货政策总则</a>
                    	<a href="#">自营商品退换细则</a>
                    </dd>
                </dl>
                <div style="clear:both;"></div>
            </div>
        	<div class="ft-if2-right f-r">
            	<h3>400-2298-223</h3>
                <p>周一至周日  9:00-24:00</p>
                <p>（仅收市话费）</p>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div class="footer-info3 w1200">
        	<p>
                <a href="#">免责条款</a><span>|</span>
                <a href="#">隐私保护</a><span>|</span>
                <a href="#">咨询热点</a><span>|</span>
                <a href="#">联系我们</a><span>|</span>
                <a href="#">公司简介</a>
            </p>
        	<p>
            	<a href="#">沪ICP备13044278号</a><span>|</span>
                <a href="#">合字B1.B2-20130004</a><span>|</span>
                <a href="#">营业执照</a><span>|</span>
                <a href="#">互联网药品信息服务资格证</a><span>|</span>
                <a href="#">互联网药品交易服务资格证</a>
            </p>
            <div class="ft-if3-tu1">
            	<a href="#"><img src="{{ url('/web/images/zl2-91.gif') }}" /></a>
            	<a href="#"><img src="{{ url('/web/images/zl2-92.gif') }}" /></a>
            	<a href="#"><img src="{{ url('/web/images/zl2-93.gif') }}" /></a>
            </div>
        </div>
    </div>
    
    <!--固定右侧-->
    <ul class="youce">
    	<li class="li1">
        	<a href="#" class="li1-tu1"><img src="{{ url('/web/images/zl2-94.png') }}" /></a>
            <a href="#" class="li1-zi1">返回首页</a>
        </li>
        <li class="li2">
        	<a href="#"><img src="{{ url('/web/images/zl2-95.png') }}" />购</br>物</br>车</a>
        </li>
        <li class="li3">
        	<a href="#" class="li1-tu2"><img src="{{ url('/web/images/zl2-96.png') }}" /></a>
            <a href="#" class="li1-zi2">我关注的品牌</a>
        </li>
        <li class="li3">
        	<a href="#" class="li1-tu2"><img src="{{ url('/web/images/zl2-97.png') }}" /></a>
            <a href="#" class="li1-zi2">我看过的</a>
        </li>
        <li class="li4">
        	<a href="JavaScript:;" class="li1-tu2"><img src="{{ url('/web/images/zl2-98.gif') }}" /></a>
            <div class="li4-ewm">
            	<a href="JavaScript:;"><img src="{{ url('/web/images/zl2-101.gif') }}" /></a>
                <p>扫一扫</p>
            </div>
        </li>
        <li class="li3 li5">
        	<a href="#top" class="li1-tu2"><img src="{{ url('/web/images/zl2-99.gif') }}" /></a>
            <a href="#top" class="li1-zi2">返回顶部</a>
        </li>
    </ul>

</body>

</html>
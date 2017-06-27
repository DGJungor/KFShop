<!doctype html>
<html>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>@yield('title')</title>

    @yield('css')
	<link rel="stylesheet" type="text/css" href="{{ url('/web/css/style.css') }}" />
	<script type="text/javascript" src="{{ url('/web/js/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ url('/web/js/zhonglin.js') }}"></script>
	<script type="text/javascript" src="{{ url('/web/js/zhongling2.js') }}"></script>
	<script type="text/javascript" src="{{ url('/web/js/star-rating.js') }}"></script>
	<script type="text/javascript" src="{{ url('/web/js/doubleDate2.0.js') }}"></script>
	<script type="text/javascript" src="{{ url('/web/js/jquery.min.js') }}"></script>

</head>

<body id="top">

	<!--header-->
    <div class="zl-header">
    	<div class="zl-hd w1200">
        	<p class="hd-p1 f-l">
            	Hi!您好，欢迎来到购物网，请登录  <a href="#">【免费注册】</a>
            </p>
            <p class="hd-p1 f-l">
                 <a href="feedback">【意见反馈】</a>
            </p>
        	<p class="hd-p2 f-r">
            	<a href="#">返回首页 (个人中心)</a><span>|</span>
                <a href="{{url('/cart')}}">我的购物车</a><span>|</span>
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

                <div class="select-city">
        	<div class="sl-city-top">

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
    @include('web.public.footer')

    <!--固定右侧-->
    @include('web.public.youce')


    @yield('js')

</body>

</html>
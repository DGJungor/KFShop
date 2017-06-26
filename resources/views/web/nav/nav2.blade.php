@extends('web.index')


@section('title')

商品列表

@endsection

@section('css')

<link rel="stylesheet" type="text/css" href="{{ url('/web/css/shopping-mall-index.css') }}" />

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


@section('banner')

    <!--广告栏-->
    <div class="advertisement w1200">
    	<p style="text-align:center;font-size:15px;color:#000;line-height:74px;">广告栏</p>
    </div>

@endsection

@section('content')

    	<div class="sp-con-info">
        	<ul class="sp-info-r m-act beaut">
                <li>
                    <div class="li-top">
                        <a href="#" class="li-top-tu"><img src="images/beaut-con-li-tu2.gif" /></a>
                        <p class="jiage"><span class="sp1">￥109</span><span class="sp2">￥209</span></p>
                    </div>
                    <p class="miaoshu">德国原装进口Wurenbacher瓦伦冰黑啤5L/桶</p>
                    <div class="li-md">
                    	<div class="md-l f-l">
                        	<p class="md-l-l f-l" ap="">1</p>
                        	<div class="md-l-r f-l">
                            	<a href="JavaScript:;" class="md-xs" at="">∧</a>
                            	<a href="JavaScript:;" class="md-xx" ab="">∨</a>
                            </div>
                        	<div style="clear:both;"></div>
                        </div>
                    	<div class="md-r f-l">
                        	<button class="md-l-btn1">立即购买</button>
                        	<button class="md-l-btn2">加入购物车</button>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                    <p class="pingjia">88888评价</p>
                    <p class="weike">微克宅购自营</p>
                </li>

                <div style="clear:both;"></div>
            </ul>
            <!--分页-->
            <div class="paging">
            	<div class="pag-left f-l">
                	<a href="#" class="about left-r f-l"><</a>
                    <ul class="left-m f-l">
                    	<li><a href="#">1</a></li>
                        <li class="current"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
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

@endsection
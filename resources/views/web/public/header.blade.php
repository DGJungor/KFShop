<div class="zl-header">
        <div class="zl-hd w1200">
            <p class="hd-p1 f-l">
                Hi!您好，欢迎来到购物网，
                @if(Auth::user()) <a href="{{url('/personal')}}">{{Auth::user()->username}}</a>  <a href="{{url('/logout')}}">退出</a>
                @else <a href="{{url('/login')}}">亲,请登录</a>  <a href="{{url('/register')}}">【免费注册】</a>
                @endif
            </p>
            <p class="hd-p1 f-l">
                 <a href="/feedback">【意见反馈】</a>
            </p>
            <p class="hd-p2 f-r">
                <a href="#">返回首页 (个人中心)</a><span>|</span>
                <a href="/cart">我的购物车</a><span>|</span>
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
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">

                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" src="{{ asset(Auth::guard('admin')->user()->avatar) }}" />
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">

                        <!-- <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::guard('admin')->user()->username }}</strong> -->
                     <!-- </span> <span class="text-muted text-xs block">{{ Auth::guard('admin')->user()->type !=0 ? '管理员' : '超级管理员' }} <b class="caret"></b></span> </span> -->

                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a data-toggle="modal" data-target="#avatarModal">修改头像</a>
                        </li>
                        <!-- <li><a href="/admin/admins/{{ Auth::guard('admin')->user()->id }}">个人资料</a> -->
                        </li>
                        <li class="divider"></li>
                        <li><a href="/admin/logout">安全退出</a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    狂风
                </div>

            </li>
            <li class="">
                <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">商品</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ asset('admin/goods') }}">商品管理</a>
                    </li>
                </ul>
                <ul class="nav nav-second-level">
                    <li><a href="{{ asset('admin/goods/create') }}">商品添加</a>
                    </li>
                </ul>
            </li>
             <li class="">
                <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">商品分类</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ asset('admin/types') }}">商品分类管理</a>
                    </li>
                </ul>
                <ul class="nav nav-second-level">
                    <li><a href="{{ asset('admin/types/create') }}">商品分类管理</a>
                    </li>
                </ul>
            </li>

            <li class="">
                <a href=""><i class="fa fa-table"></i> <span class="nav-label">订单</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ asset('admin/orders') }}">订单管理</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href=""><i class="fa fa-envelope"></i> <span class="nav-label">反馈</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ asset('admin/feedback') }}">反馈信息</a>
                    </li>
                </ul>
            </li>


            <li class="">
                <a href=""><i class=" fa fa-chain "></i> <span class="nav-label">友情链接</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li><a href="{{ asset('admin/friends') }}">友情链接管理</a>
                    <li><a href="{{ asset('admin/friends/create') }}">添加友情链接</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href=""><i class="fa fa-picture-o"></i> <span class="nav-label">轮播图</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li><a href="{{ asset('admin/shop_banner') }}">轮播图管理</a>
                    <li><a href="{{ asset('admin/shop_banner/create') }}">添加轮播图</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href=""><i class="fa  fa-thumbs-o-up"></i> <span class="nav-label">推荐</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li><a href="{{ asset('admin/recommend') }}">推荐管理</a>
                    <li><a href="{{ asset('admin/recommend/create') }}">添加推荐</a>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
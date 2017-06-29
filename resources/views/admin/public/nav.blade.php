<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">

                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" src="{{ asset('/style/img/profile_small.jpg') }}" />
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">
{{--                                    {{ Auth::guard('admin')->user()->username }}--}}
                                </strong>
                     </span> <span class="text-muted text-xs block">超级管理员 <b class="caret"></b></span> </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="form_avatar.html">修改头像</a>
                        </li>
                        <li><a href="profile.html">个人资料</a>
                        </li>
                        <li><a href="contacts.html">联系我们</a>
                        </li>
                        <li><a href="mailbox.html">信箱</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html">安全退出</a>
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
            <li class="active">
                <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">友情链接</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li><a href="{{ url('admin/friends') }}">友情链接管理</a>
                    <li><a href="{{ url('admin/friends/create') }}">添加友情链接</a>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
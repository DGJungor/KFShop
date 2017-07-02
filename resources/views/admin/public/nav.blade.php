<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">

                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" src="{{ asset(Auth::guard('admin')->user()->avatar) }}" />
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">

                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::guard('admin')->user()->username }}</strong>
                     </span> <span class="text-muted text-xs block">{{ Auth::guard('admin')->user()->type !=0 ? '管理员' : '超级管理员' }} <b class="caret"></b></span> </span>

                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a data-toggle="modal" data-target="#avatarModal">修改头像</a>
                        </li>
                        <li><a href="/admin/admins/{{ Auth::guard('admin')->user()->id }}">个人资料</a>
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
            <li class="active">
                <a href=""><i class="glyphicon glyphicon-link"></i> <span class="nav-label">友情链接</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li><a href="{{ url('admin/friends') }}">友情链接管理</a>
                    <li><a href="{{ url('admin/friends/create') }}">添加友情链接</a>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
<!-- 模态框（Modal） -->
<div class="modal fade" id="avatarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                </button>
                <h4 class="modal-title" id="avatarModalLabel">
                    个性头像
                </h4>
            </div>
            <form id="form_data" method="POST" action="/admin/admins/{{ \Auth::guard('admin')->user()->id }}/edit" enctype="mutipart/form-data">
            <div class="modal-body">
                <img src="{{ url(\Auth::guard('admin')->user()->avatar) }}" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                </button>
                <button type="button" class="btn btn-primary">
                    提交更改
                </button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
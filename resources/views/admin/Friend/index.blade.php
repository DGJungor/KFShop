

@extends('admin.public')



@section('title')
<div class="col-lg-10">
    <h2>友情链接管理</h2>
    <ol class="breadcrumb">
        <li>
            <a href="index.html">主页</a>
        </li>
        <li>
            <a>友情链接</a>
        </li>
        <li>
            <strong>链接列表</strong>
        </li>
    </ol>
</div>
<div class="col-lg-2">

</div>
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
@endsection


@section('content')
<div class="row">
    <div class="col-lg-12">
                        <div class="mail-box-header">

                            <form method="get" action="index.html" class="pull-right mail-search">
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm" name="search" placeholder="搜索友情链接">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            搜索
                                        </button>
                                    </div>
                                </div>
                            </form>
                                <h2>
                                     友情链接列表
                                </h2>
                            <div class="mail-tools tooltip-demo m-t-md">
                                <div class="btn-group pull-right">
                                    <button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i>
                                    </button>
                                    <button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i>
                                    </button>

                                </div>
                                <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="刷新友情链接列表"><i class="fa fa-refresh"></i> 刷新</button>
                                <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="标为已读"><i class="fa fa-eye"></i> 
                                </button>
                                <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="标为重要"><i class="fa fa-exclamation"></i> 
                                </button>
                                <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="标为失效删除"><i class="fa fa-trash-o"></i> 
                                </button>

                            </div>
                        </div>
                    
                    <div class="mail-box">

                       <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>

                                            <th>选择</th>
                                            <th>ID</th>
                                            <th>链接名称</th>
                                            <th>类型</th>
                                            <th>链接地址</th>
                                            <th>图片名称</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <tr>
                                            <td>
                                                <input type="checkbox" class="i-checks" name="input[]">
                                            </td>
                                            <td>1</td>
                                            <td>百度</td>
                                            <td>文字</td>
                                            <td>https://www.baidu.com</td>
                                            <td>百度Logo</td>
                                            <td><a href="#"><i class="fa fa-check text-navy"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
    </div>
</div>
@endsection
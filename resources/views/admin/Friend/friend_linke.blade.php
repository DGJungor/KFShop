<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css?v=4.3.0" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css?v=2.2.0" rel="stylesheet">
</head>
<body>
            <div class="col-lg-9 animated fadeInRight">
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
                    友情链接管理
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
                              <!--   <div class="row">
                                    <div class="col-sm-4 m-b-xs">
                                        
                                        <input type="text" class="form-control input-sm" name="search" placeholder="请输入名称">
                                    
                                    </div>
                                    <div class="col-sm-5 m-b-xs">
                                        <div data-toggle="buttons" class="btn-group">
                                            
                                            <input type="text" class="form-control input-sm" name="search" placeholder="@ 请输入链接">

                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            
                                        <button type="button" class="btn  btn-primary"> 添加</button>
                                      
                                        </div>
                                    </div>
                                </div> -->
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
</body>
</html>
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js?v=3.4.0"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/hplus.js?v=2.2.0"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>

    <!-- Peity -->
    <script src="js/demo/peity-demo.js"></script>
<script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
</script>
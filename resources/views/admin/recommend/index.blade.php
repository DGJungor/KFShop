@extends('admin.public')

@section('title')

轮播图管理

@endsection

@section('bigtitle')

 <div class="col-lg-9">
    <h2>轮播图管理</h2>

</div>
@endsection

@section('content')

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="file-manager">
                        <h5>显示：</h5>
                        <a href="#" class="file-control active">所有</a>
                        <div class="hr-line-dashed"></div>
                        {{--<form action="#" method="post" enctype="multipart/form-data">--}}
                            {{--<input type="file" name="picture" id="fill" style="display:none">--}}
                        {{--<input type="button" class="btn btn-primary btn-block"onclick="document.getElementById('fill').click();"value="上传文件">--}}
                        {{--</form>--}}

                            <button class="btn btn-primary btn-block" onclick="window.location.href='{{ url('admin/recommend/create') }}'">新增轮播图</button>


                        <div class="hr-line-dashed"></div>
                        <h5>文件夹</h5>
                        <ul class="folder-list" style="padding: 0">
                            </li>
                            <li><a href="#"><i class="fa fa-folder"></i>轮播图</a>
                            </li>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    {{--this--}}
                    <?php $i = 0; ?>
                    @foreach($data as $v)
                    <div class="file-box">
                        <div class="file">
                            <a href="#">
                                <span class="corner"></span>

                                <div class="image">
                                    <img alt="image" class="img-responsive" src="/uploads/{{$v['recommend_picname']}}">
                                </div>
                                <div class="file-name">
                                    {{$v['recommend_name']}}.jpg
                                    <br/>
                                    <small>添加时间：{{$v['created_at']}}</small>
                                </div>
                            </a>

                        </div>
                    </div>
                    <?php $i++; ?>
                    @endforeach
                    {{--this--}}
                </div>
            </div>
        </div>
    </div>
</div>
   <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js?v=3.4.0"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/hplus.js?v=2.2.0"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.file-box').each(function () {
                animationHover(this, 'pulse');
            });
        });
    </script>

@endsection
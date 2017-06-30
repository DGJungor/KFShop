@extends('admin.public')

@section('title')

    推荐管理

@endsection

@section('bigtitle')

    <div class="col-lg-9">
        <h2>推荐管理</h2>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>推荐图添加 </h3>

                </div>
                <div class="ibox-content">

                    <form method="POST" action="/admin/recommend" class="form-horizontal" enctype="multipart/form-data">
                        {{--<input type="date" name="created_at" >--}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">推荐位名称:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="recommend_name"  value="" required>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">
                               推荐位置:
                            </label>
                            <div class="">
                                <div class="radio i-checks">
                                    <input type="radio" value="1" name="recommend_location" checked> <i>首页</i>
                                    <input type="radio" value="2" name="recommend_location" > <i>其他页</i>
                                </div>

                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">
                                推荐类型:
                            </label>
                            <div class="">
                                <div class="radio i-checks">
                                    <input type="radio" value="0" name="recommend_type" checked> <i>图片</i>
                                    <input type="radio" value="1" name="recommend_type" > <i>其他</i>
                                </div>

                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">

                            <label class="col-sm-2 control-label">推荐导语:</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="recommend_introduction" value="" required>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                        {{--<div class="col-sm-4 col-sm-offset-2">--}}

                            {{--<input type="file" name="recommend_picname" id="fill" style="display:none">--}}
                            {{--<input type="button" class="btn btn-primary "onclick="document.getElementById('fill').click();"value="上传文件">--}}

                        {{--</div>--}}
                            <label class="col-sm-2 control-label">添加图片:</label>
                            <div class="col-sm-10">
                                <input type="file" name="recommend_picname" required>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                {!! csrf_field() !!}
                                <button class="btn btn-primary" type="submit">确定添加</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
@endsection
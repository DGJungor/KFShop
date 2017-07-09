@extends('admin.public')

@section('title')

添加链接

@endsection


@section('bigtitle')

<div class="col-lg-10">
    <h2>友情链接管理</h2>
    
</div>
<div class="col-lg-2">

</div>

@endsection

@section('content')

<div class="row">
                    <div class="col-lg-12">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h3>添加链接 </h3>
                               
                            </div>
                            <div class="ibox-content">
                                <form method="POST" action="/admin/friends" class="form-horizontal" enctype="multipart/form-data">
                                
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">友情链接名称:</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name"  value="" required>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                        类型:
                                        </label>
                                        <div class="">

                                        <div class="radio i-checks">

                                            <input id="types" type="radio" value="1" name="type" checked> <i>图片</i>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">地址链接:</label>

                                        <div class="col-sm-10">
                                            <div class="input-group m-b"><span class="input-group-btn">
                                            <button type="button" class="btn btn-primary">http://</button> </span>
                                                <input type="text" class="form-control" name="url" value="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">图片:</label>

                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="file"  >
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
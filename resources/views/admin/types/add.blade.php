@extends('admin.public')
@section('title')
添加分类
@endsection
@section('bigtitle')
<div class="col-lg-10">
    <h2>添加顶级分类</h2>
</div>
<div class="col-lg-2">

</div>
@endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <form method="post" action="/admin/types" class="form-horizontal bs-docs-example" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">顶级分类名称</label>

                        <div class="col-sm-10">
                            <input type="text" name="typename" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">分类图片</label>

                        <div class="col-sm-10">
                            <input type="file" name="picname">
                        </div>
                    </div>
                    {!! csrf_field() !!}
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit">添加</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

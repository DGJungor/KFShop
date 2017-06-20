@extends('admin.public')
@section('title')
添加分类
@endsection
@section('bigtitle')
<div class="col-lg-10">
    <h2>添加子类</h2>
</div>
<div class="col-lg-2">

</div>
@endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h6>正在添加的分类是 &nbsp;&nbsp;<strong>{{ $dataObj->name }}</strong>&nbsp;&nbsp;的子类</h6>
                <!-- <div class="ibox-tools">
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                             -->
            </div>
            <div class="ibox-content">
                <form method="post" action="/admin/types/{{ $dataObj->id }}" class="form-horizontal bs-docs-example">
                <input type="hidden" name="path" value="{{ $dataObj->path }}">
                <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">分类名称</label>

                        <div class="col-sm-10">
                            <input type="text" name="typename" class="form-control">
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

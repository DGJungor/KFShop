@extends('admin.public')

@section('title')

修改链接

@endsection


@section('bigtitle')

<div class="col-lg-10">
    <h2>友情链接管理</h2>
    
</div>
<div class="col-lg-2">

</div>

@endsection

@section('content')
{{--{{dump($dataObj)}}--}}

<div class="wrapper wrapper-content">
    <div class="ibox">
        <div class="ibox-title">
            <h5>修改友情链接</h5>
        </div>
        <div class="ibox-content">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form method="POST" action="/admin/friends/{{$dataObj->id}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" value="PUT" name="_method">
                <div class="form-group">
                    <label>友情链接名称：</label>
                    <input name="name" type="text" class="form-control"
                           value="{{$dataObj->name}}">
                </div>
                <div class="form-group">
                    <label>类型：</label>
                    <div class="radio i-checks">
                        <input type="radio" value="1" name="type" @if($dataObj->type == 1) checked @endif > <i>图片</i>
                        <input type="radio" value="2" name="type" @if($dataObj->type == 2) checked @endif > <i>文字</i>
                    </div>
                </div>
                <div class="form-group">
                    <label>链接：</label>
                    <div class="input-group m-b"><span class="input-group-btn">
                                            <button type="button" class="btn btn-primary">http://</button> </span>
                        <input type="text" name="url" class="form-control" value="{{$dataObj->url}}">
                    </div>
                </div>
                <div class="form-group">
                    <label>图片：</label>
                    @if($dataObj->image)
                        <img src="{{$dataObj->image}}" class="img-thumbnail">
                        <input id="file" name="file" type="file" class="form-control hidden">
                    @else
                        <input name="file" type="file" class="form-control" required>
                    @endif
                </div>
                <div class="form-group">
                    <label>状态：</label>
                    <div class="radio i-checks">
                        <input type="radio" value="0" name="status" @if($dataObj->status == 0) checked @endif > <i>启用</i>
                        <input type="radio" value="1" name="status" @if($dataObj->status == 1) checked @endif > <i>禁用</i>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">保存</button>
            </form>
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
    <script src="{{asset('style/js/bannerEdit.js')}}"></script>
@endsection

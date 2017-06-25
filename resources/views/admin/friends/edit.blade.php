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

<div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h3>修改链接 </h3>
                               
                            </div>
                            <div class="ibox-content">

                                <form method="POST" action="/admin/friends/{{$dataObj->id}}" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PUT">
                                    {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">友情链接名称:</label>

                                        <div class="col-sm-10">
                                            <input type="text" name="name" class="form-control" value="{{$dataObj->name}}">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                        类型:
                                        </label>


                                        <div class="radio i-checks">
                                            <input type="radio" value="1" name="type" @if($dataObj->type == 1) checked @endif > <i>图片</i>
                                            <input type="radio" value="2" name="type" @if($dataObj->type == 2) checked @endif > <i>文字</i>
                                            </div>   


                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">地址链接:</label>

                                        <div class="col-sm-10">
                                            <div class="input-group m-b"><span class="input-group-btn">
                                            <button type="button" class="btn btn-primary">http://</button> </span> 
                                                <input type="text" name="url" class="form-control" value="{{$dataObj->url}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">图片路径:</label>

                                        <div class="col-sm-10">
                                            <input type="text" name="image" class="form-control" value="{{$dataObj->image}}">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                        状态:
                                        </label>
                                        <div class="">
                                        <div class="radio i-checks">
                                            <input type="radio" value="0" name="status" @if($dataObj->status == 0) checked @endif > <i>启用</i>
                                            <input type="radio" value="1" name="status" @if($dataObj->status == 1) checked @endif > <i>禁用</i>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-2">

                                            <button class="btn btn-primary" type="submit">确定修改</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

@endsection
@section('js')

    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

@endsection

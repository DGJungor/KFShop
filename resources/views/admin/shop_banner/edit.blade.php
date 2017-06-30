@extends('admin.public')

@section('title')

    轮播图管理
    <link href="{{ asset('/style/js/plugins/fancybox/jquery.fancybox.css') }}" rel="stylesheet">

@endsection

@section('bigtitle')


    <div class="col-lg-10">
        <h3>修改管理</h3>

    </div>
    <div class="col-lg-2">
@endsection

@section('content')

            <div class="wrapper wrapper-content">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>修改轮播图</h5>
                    </div>
                    <div class="ibox-content">
                        <form action="{{url('admin/shop_banner/'.$data->id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" value="PUT" name="_method">
                            <div class="form-group">
                                <label>排序：</label>
                                <input name="sort" type="text" class="form-control" placeholder="值越小越靠前显示,默认为0"
                                       value="{{$data->sort}}">
                            </div>
                            <div class="form-group">
                                <label>标题：</label>
                                <input name="title" type="text" class="form-control" placeholder="轮播图标题，可为空"
                                       value="{{$data->title}}">
                            </div>
                            <div class="form-group">
                                <label>图片：</label>
                                @if($data->img_url)
                                    <img src="{{$data->img_url}}" class="img-thumbnail">
                                    <input id="file" name="file" type="file" class="form-control hidden">
                                @else
                                    <input name="file" type="file" class="form-control" required>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>链接：</label>
                                <input name="redirect_url" type="text" class="form-control" value="{{$data->redirect_url}}">
                            </div>
                            <div class="form-group">
                                <label>状态：</label>
                                <label class="radio-inline">
                                    <input type="radio" name="disabled" value="1" @if($data->disabled=="显示") checked @endif> 显示
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="disabled" value="2" @if($data->disabled=="隐藏") checked @endif> 隐藏
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">保存</button>
                        </form>
                    </div>
                </div>
            </div>
@endsection
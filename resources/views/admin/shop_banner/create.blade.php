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
        <div class="ibox">
            <div class="ibox-title">
                <h5>新增轮播图</h5>
            </div>
            <div class="ibox-content">
                <form id="type_form" action="{{url('/admin/shop_banner')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>排序：</label>
                        <input name="sort" type="text" class="form-control" placeholder="值越小越靠前显示,默认为0" value="0">
                    </div>
                    <div class="form-group">
                        <label>标题：</label>
                        <input name="title" type="text" class="form-control" placeholder="轮播图标题，可为空">
                    </div>
                    <div class="form-group">
                        <label>图片：</label>
                        <input id="pic" name="file" type="file" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>链接：</label>
                        <input name="redirect_url" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>状态：</label>
                        <label class="radio-inline">
                            <input type="radio" name="disabled" value="1" checked> 显示
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="disabled" value="2"> 隐藏
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">保存</button>
                </form>
            </div>
        </div>
    </div>


@endsection
@section('js')
<script >

</script>

    @endsection
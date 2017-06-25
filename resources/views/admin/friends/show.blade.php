@extends('admin.public')
@section('title')

    友情链接

@endsection

@section('bigtitle')

    <div class="col-lg-10">
        <h2>友情链接管理</h2>

    </div>
    <div class="col-lg-2">

    </div>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-offset-5">
           <div class="center-block">添加成功</div>
        </div>
        <div class="col-lg-2 col-md-offset-5">
            <a href="/admin/friends"><button class="btn btn-primary btn-block">返回首页</button></a>
        </div>
    </div>
@endsection

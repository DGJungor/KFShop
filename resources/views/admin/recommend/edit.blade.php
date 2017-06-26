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
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
{{--                        {{dump($data->recommend_picname)}}--}}
                        <h5>&nbsp;<small></small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>

                    <form action="/admin/recommend/{{$data->id}}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                    <div class="col-xs-4">
                            <div class="form-group">
                                <label for="exampleInputName2">轮播图名称</label>
                                <input type="text" class="form-control" placeholder=".col-xs-4" name="recommend_name" value="{{$data->recommend_name}}">
                            </div>
                        <br>
                            <div class="form-group">
                                <label for="exampleInputName2">轮播图导语</label>
                                <input type="text" class="form-control" placeholder=".col-xs-4" name="recommend_introduction" value="{{$data->recommend_introduction}}">
                            </div>

                        <br>

                        <button class="btn btn-success" type="submit">修改</button>
                    </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
        </div>


        </div>
@endsection

@section('js')

    <script src="{{ asset('/style/js/plugins/fancybox/jquery.fancybox.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.fancybox').fancybox({
                openEffect: 'none',
                closeEffect: 'none'
            });
        });
    </script>



@endsection

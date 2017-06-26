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
                        <h5>{{$data->recommend_name}} &nbsp;&nbsp;&nbsp;&nbsp;<small>标语:{{$data->recommend_introduction}}</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>

                    <div class="ibox-content">

                        <a class="fancybox" href="/uploads/{{$data->recommend_picname}}" title="预览">
                            <img alt="image" src="/uploads/{{$data->recommend_picname}}" />
                        </a>
                    </div>

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

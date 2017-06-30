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
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="file-manager">
                        <h5>显示：</h5>
                        <a href="#" class="file-control active">所有</a>
                        <div class="hr-line-dashed"></div>
                            <button class="btn btn-primary btn-block" onclick="window.location.href='{{ url('admin/shop_banner/create') }}'">新增轮播图</button>
                        <div class="hr-line-dashed"></div>
                        <h5>文件夹</h5>
                        <ul class="folder-list" style="padding: 0">
                            </li>
                            <li><a href="#"><i class="fa fa-folder"></i>轮播图</a>
                            </li>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    {{--this--}}
                    <?php $i = 0; ?>
                    @foreach($data as $v)
                    <div class="file-box">
                        <div class="file">

                            <a href="/admin/shop_banner/{{$v->id}}/edit">
                                <span class="corner"></span>

                                <div class="image">
                                    <img alt="image" class="img-responsive" src="{{$v['img_url']}}">
                                </div>
                                <div class="file-name">
                                    {{$v['disabled']}}
                                    <br/>
                                   <small>排序:{{$v['sort']}}</small>
                                    <br/>
                                    <small>跳转地址：{{$v['redirect_url']}}</small>
                                </div>
                            </a>
                            <div class="file-manager">
                                <div class="hr-line-dashed">
                                    <form action="{{ url('admin/shop_banner/'.$v->id) }}" method="POST">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button id="btnDel" type="submit" class="btn btn-primary btn-block">删除</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                    @endforeach
                    {{--this--}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <div class="pull-right">
        By：<a href="#" target="_blank">sun.shangcheng.or</a>
    </div>
    <div>
        <strong>Copyright</strong> 后台 &copy; 2017
    </div>
</div>

@endsection

@section('js')

    <script>
        $(document).ready(function () {
            $('.file-box').each(function () {
                animationHover(this, 'pulse');
            });
        });
    </script>

    <script>
        $(function () {
            $(from).on('click', 'button btnDel', function () {

            })

        })


    </script>
@endsection
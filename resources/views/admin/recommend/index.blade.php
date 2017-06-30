@extends('admin.public')

@section('title')

推荐管理

@endsection

@section('bigtitle')

 <div class="col-lg-9">
    <h2>推荐管理</h2>

</div>
@endsection

@section('content')

    <div class="wrapper wrapper-content">
        <div class="ibox">
            <div class="ibox-title">
                <h5>推荐列表</h5>
            </div>
            <div class="ibox-content">
                <a href="{{url('admin/recommend/create')}}" class="btn btn-primary">
                    <i class="fa fa-btn fa-plus"></i>新增
                </a>
                @if(!empty($data))
                    <table class="table table-responsive table-hover">
                        <thead>
                        <tr>
                            <th>图片</th>
                            <th>推荐位名称</th>
                            <th>推荐位置</th>
                            <th>推荐类型</th>
                            <th>推荐导语</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $v)
                            <tr class="gradeA odd">
                                <td class="text-center ">
                                    <img class="banner-img-url" alt="推荐图" src="/uploads/s_{{$v->recommend_picname}}"/>
                                </td>
                                <td class="text-center ">
                                    {{$v->recommend_name}}
                                </td>
                                <td class="text-center ">
                                    {{$v->recommend_location}}
                                </td>
                                <td class="text-center ">
                                    {{$v->recommend_type}}
                                </td>
                                <td class="text-center ">
                                    {{$v->recommend_introduction}}
                                </td>
                                <td class="text-center ">
                                    <button id="btnEdit" type="button"  >
                                    <a href="{{url('admin/recommend/'.$v->id.'/edit')}}" class="glyphicon glyphicon-edit text-navy" title="修改">修改</a>
                                    </button>
                                    <form action="{{url('admin/recommend/'.$v->id)}}" method="post" class="del-form">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{csrf_field()}}
                                        <button title="删除" type="submit" ><span class="glyphicon glyphicon-remove-sign text-danger">删除</span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
                <nav class="text-center">
                    {{$data->links()}}
                </nav>
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


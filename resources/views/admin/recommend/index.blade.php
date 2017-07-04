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
                <form method="get" action="" class="pull-right mail-search">
                    <div class="input-group">
                        <input type="text" class="form-control input-sm" name="searchs" placeholder="搜索名称" value="{{request()->input('searchs')}}">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-sm btn-primary">
                                搜索
                            </button>
                        </div>
                    </div>
                </form>

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
                        @forelse($recommend as $v)
                            <tr class="gradeA odd">
                                <td class="text-center ">
                                    <img class="banner-img-url" alt="推荐图" src="/uploads/s_{{$v->recommend_picname}}"/>
                                </td>
                                <td class="text-center ">
                                    {{$v->recommend_name}}
                                </td>
                                <td class="text-center ">
                                    {{$stor[$v->recommend_location]}}
                                </td>
                                <td class="text-center ">
                                    {{$v->recommend_type}}
                                </td>
                                <td class="text-center ">
                                    {{$v->recommend_introduction}}
                                </td>
                                <td class="text-center ">
                                    <button id="btnEdit" type="button"  >
                                    <a href="{{url('admin/recommend/'.$v->id.'/edit')}}" class="fa fa-pencil-square-o text-navy" title="修改">修改</a>
                                    </button>
                                    <form action="{{url('admin/recommend/'.$v->id)}}" method="post" class="del-form">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{csrf_field()}}
                                        <button title="删除" type="submit" ><span class="fa fa-eraser text-danger">删除</span></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr class="gradeA odd">
                                <td class="text-center " colspan="6">暂时没有数据</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>


                <div class="page" style="text-align: center">
                    {{ $recommend->links() }}
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


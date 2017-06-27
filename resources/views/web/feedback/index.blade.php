@extends('web.index')

@section('css')

    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
@endsection


@section('title')
    意见反馈
@endsection



@section('content')
    <div class="personal w1200">
        <form action="/feedback" method="POST">

            {{ csrf_field() }}
            {{--<input type="hidden" name="_method" value="POST">--}}
            <div class="form-group"><label>标题</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="请输入你要反馈信息的标题">
            </div>
            <div class="form-group">
                <label>正文内容</label>
                <textarea class="form-control" class="form-control" rows="5" id="text" name="text"></textarea>
            </div>

            <button type="submit" class="btn btn-success btn-lg">提交</button>
            <button type="reset" class="btn btn-warning btn-lg">清空</button>
        </form>

    </div>

@endsection()
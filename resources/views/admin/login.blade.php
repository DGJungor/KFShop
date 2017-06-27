<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">

    <title>登录</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link href="{{ asset('/style/css/bootstrap.min.css?v=3.4.0') }}" rel="stylesheet">
    <link href="{{ asset('/style/font-awesome/css/font-awesome.css?v=4.3.0') }}" rel="stylesheet">

    <link href="{{ asset('/style/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/style/css/style.css?v=2.2.0') }}" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">Baji</h1>

        </div>
        <h3>网站后台登录</h3>
        @if(session('error'))
            <div class="text-danger">
                {{session('error')}}
            </div>
        @endif

        <form class="m-t" role="form" action="/admin/dologin" method="POST">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="用户名" >
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="密码">
            </div>
            {{csrf_field()}}
            <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>


            <p class="text-muted text-center"> <a href="#"><small>忘记密码了？</small></a>
            </p>
            {{bcrypt('123')}}
        </form>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ asset('/style/js/jquery-2.1.1.min.js') }}"></script>
<script src="{{ asset('/style/js/bootstrap.min.js?v=3.4.0') }}"></script>


</body>

</html>
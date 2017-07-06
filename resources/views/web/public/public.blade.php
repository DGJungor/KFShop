<!doctype html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/style.css') }}" />
    <script type="text/javascript" src="{{ url('/web/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ url('/web/js/zhonglin.js') }}"></script>
    <script type="text/javascript" src="{{ url('/web/js/zhongling2.js') }}"></script>
    <script type="text/javascript" src="{{ url('/web/js/star-rating.js') }}"></script>
    <script type="text/javascript" src="{{ url('/web/js/doubleDate2.0.js') }}"></script>
    <script type="text/javascript" src="{{ url('/web/js/jquery.min.js') }}"></script>

    @yield('css')



</head>

<body id="top">

    <!--header-->
    @include('web.public.header')

    <!--nav-->
    @section('nav')
        @include('web.public.nav')
    @show

    @yield('menu')
    <!-- 内容 -->
    <div class="zl-info w1200">
        @yield('content')
    </div>

    <!--底部一块-->
    @include('web.public.footer')

    <!--固定右侧-->
    @include('web.public.youce')


    @yield('js')
</body>

</html>

@yield('js')
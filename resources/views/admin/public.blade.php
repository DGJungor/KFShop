<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">



    <title>@yield('title')</title>

    <link href="{{ asset('/style/css/bootstrap.min.css?v=3.4.0') }}" rel="stylesheet">
    <link href="{{ asset('/style/font-awesome/css/font-awesome.css?v=4.3.0') }}" rel="stylesheet">
    <link href="{{ asset('/style/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('/style/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/style/css/style.css?v=2.2.0') }}" rel="stylesheet">
    @yield('css')

</head>

<body>
    <div id="wrapper">
        @section('nav')
            @include('admin.public.nav')
        @show

        @section('page')
            @include('admin.public.page')
        @show

    </div>
</body>

</html>

	<script src="{{ asset('/style/js/jquery-2.1.1.min.js') }}"></script>

    <script src="{{ asset('/style/js/bootstrap.min.js?v=3.4.0') }}"></script>
    <script src="{{ asset('/style/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('/style/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Peity -->
    <script src="{{ asset('/style/js/plugins/peity/jquery.peity.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('/style/js/hplus.js?v=2.2.0') }}"></script>
    <script src="{{ asset('/style/js/plugins/pace/pace.min.js') }}"></script>

    <!-- iCheck -->
    <script src="{{ asset('/style/js/plugins/iCheck/icheck.min.js') }}"></script>

    <!-- Peity -->
    <script src="{{ asset('/style/js/demo/peity-demo.js') }}"></script>

    <script src="{{ asset('/style/js/plugins/fancybox/jquery.fancybox.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.fancybox').fancybox({
                openEffect: 'none',
                closeEffect: 'none'
            });
        });
    </script>
    @yield('js')



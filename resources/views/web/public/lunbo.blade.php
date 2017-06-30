{{--<div class="banner">--}}
    {{--<ul class="ban-ul1">--}}
        {{--<li><a href="JavaScript:;"><img src="{{ url('/web/images/banner.png') }}" /></a></li>--}}
        {{--<li><a href="JavaScript:;"><img src="{{ url('/web/images/banner.png') }}" /></a></li>--}}
        {{--<li><a href="JavaScript:;"><img src="{{ url('/web/images/banner.png') }}" /></a></li>--}}
        {{--<li><a href="JavaScript:;"><img src="{{ url('Web') }}" /></a></li>--}}
    {{--</ul>--}}
    {{--<div class="ban-box w1200">--}}
        {{--<ol class="ban-ol1">--}}
            {{--<li class="current"></li>--}}
            {{--<li></li>--}}
            {{--<li></li>--}}
            {{--<li></li>--}}
            {{--<div style="clear:both;"></div>--}}
        {{--</ol>--}}
    {{--</div>--}}
{{--</div>--}}


<div class="banner">
    <ul class="ban-ul1">
        {{--{{dd($recommend)}}--}}
        @foreach($recommend as $v)
            <li><a href="JavaScript:;"><img src="{{ url('/uploads') }}/l_{{$v['recommend_picname']}}" /></a></li>
        @endforeach
    </ul>
    <div class="ban-box w1200">
        <ol class="ban-ol1">
            <li class="current"></li>
            <li></li>
            <li></li>
            <li></li>
            <div style="clear:both;"></div>
        </ol>
    </div>
</div>
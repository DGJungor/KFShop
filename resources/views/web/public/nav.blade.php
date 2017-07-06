<div class="nav-box">
    <div class="nav-kuai w1200">
        <div class="nav-kuaijie yjp-hover1 f-l">
            <a href="JavaScript:;" class="kj-tit1">商品分类快捷</a>
            <div class="kuaijie-box yjp-show1" style="display:none;">
                @foreach($data as $v)
                    <div class="kuaijie-info">
                        <dl class="kj-dl1">
                            <dt><img src="{{ url('/web/images/zl2-07.gif') }}" /><a >{{ $v->name }}</a></dt>

                            <dd>
                            @foreach($v->children as $val)
                                <a >{{ $val->name }}</a><span>|</span>
                            @endforeach
                            </dd>
                        </dl>
                        <div class="kuaijie-con">
                            @foreach($v->children as $val)
                                <dl class="kj-dl2">
                                    <dt><a >{{ $val->name }}</a></dt>
                                    @foreach($val->grandchild as $value)
                                        <dd>
                                            <a href="{{ url('goods_list') }}/{{$value->id}}?{{$v->id}}">{{ $value->name }}</a><span>|</span>
                                        </dd>
                                    @endforeach
                                </dl>
                            @endforeach
                            <div style="clear:both;"></div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
        <ul class="nav-font f-l">
            <li><a href="#">在线商城</a></li>
            <li><a href="#">二手市场</a><span><img src="{{ url('/web/images/zl2-05.gif') }}" /></span></li>
            <div style="clear:both;"></div>
        </ul>
        <div style="clear:both;"></div>
    </div>
</div>
@extends('admin.public')

@section('title')
分类管理
@endsection
@section('content')
<div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>自定义主题</h5>
        </div>
        @foreach($dataObj as $v)
        <div class="ibox-content">

            <div class="dd" id="nestable2">
                <ol class="dd-list">
                    <li class="dd-item " data-id="1">
                        <div class="dd-handle">
                            <span class="label label-info"></span> {{ $v->name }}
                        </div>
                        <ol class="dd-list">
                            <li class="dd-item" data-id="2">
                                <div class="dd-handle">
                                    <span class="pull-right"> 12:00 </span>
                                    <span class="label label-info"></span> 设置
                                </div>
                            </li>
                            <li class="dd-item" data-id="3">
                                <div class="dd-handle">
                                    <span class="pull-right"> 11:00 </span>
                                    <span class="label label-info"></span> 筛选
                                </div>
                            </li>
                            <li class="dd-item" data-id="4">
                                <div class="dd-handle">
                                    <span class="pull-right"> 11:00 </span>
                                    <span class="label label-info"></span> 电脑
                                </div>
                            </li>
                        </ol>
                    </li>
        @endforeach
                    <li class="dd-item" data-id="5">
                        <div class="dd-handle">
                            <span class="label label-warning"></span> 用户
                        </div>
                        <ol class="dd-list">
                            <li class="dd-item" data-id="6">
                                <div class="dd-handle">
                                    <span class="pull-right"> 15:00 </span>
                                    <span class="label label-warning"></span> 列用户表
                                </div>
                            </li>
                            <li class="dd-item" data-id="7">
                                <div class="dd-handle">
                                    <span class="pull-right"> 16:00 </span>
                                    <span class="label label-warning"></span> 炸弹
                                </div>
                            </li>
                            <li class="dd-item" data-id="8">
                                <div class="dd-handle">
                                    <span class="pull-right"> 21:00 </span>
                                    <span class="label label-warning"></span> 子元素
                                </div>
                            </li>
                        </ol>
                    </li>
                </ol>
            </div>
        </div>

    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('/style/js/plugins/nestable/jquery.nestable.js') }}"></script>
<script>

    $(document).ready(function () {

        var updateOutput = function (e) {
            var list = e.length ? e : $(e.target),
                output = list.data('output');
            if (window.JSON) {
                //output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
            } else {
                output.val('浏览器不支持');
            }
        };
        // activate Nestable for list 1
        $('#nestable').nestable({
            group: 2
        }).on('change', updateOutput);

        // activate Nestable for list 2
        $('#nestable2').nestable({
            group: 1
        }).on('change', updateOutput);

        // output initial serialised data
        // updateOutput($('#nestable').data('output', $('#nestable-output')));
        // updateOutput($('#nestable2').data('output', $('#nestable2-output')));

        $('#nestable-menu').on('click', function (e) {
            var target = $(e.target),
                action = target.data('action');
            // if (action === 'expand-all') {
            //     $('.dd').nestable('expandAll');
            // }
            // if (action === 'collapse-all') {
            //     $('.dd').nestable('collapseAll');
            // }
        });
    });
</script>
@endsection

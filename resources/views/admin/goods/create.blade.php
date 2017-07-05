@extends('admin.public')
@section('css')
<style type="text/css">
body {
    font: 13px Arial, Helvetica, Sans-serif;
}
</style>
@endsection
@section('title')
添加商品
@endsection
@section('bigtitle')
<div class="col-lg-10">
    <h2>添加商品</h2>
</div>
<div class="col-lg-2">
</div>
@endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>添加商品</h5>
            </div>
            <div class="ibox-content">
                <form method="post" enctype="multipart/form-data" action="/admin/goods" class="form-horizontal bs-docs-example" >
                    <div class="form-group">
                        <label class="col-sm-2 control-label">商品名称</label>

                        <div class="col-sm-10">
                            <input type="text" name="goodname" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group" id="type">
                        <label class="col-sm-2 control-label">商品分类</label>
                        <div class="col-sm-2">
                            <select class="form-control m-b" name="typeid" id="pro">
                                <option value = "-1">--请选择分类--</option>
                            </select>
                        </div>

                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">购买量</label>

                        <div class="col-sm-10">
                            <input type="text" name="buy" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">库存</label>

                        <div class="col-sm-10">
                            <input type="text" name="inventory" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">单价</label>

                        <div class="col-sm-10">
                            <input type="text" name="price" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">品牌</label>
                        <div class="col-sm-10">
                            <input type="text" name="brand" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">商品描述</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" class="form-control" name="describe" rows="5" id="text" ></textarea>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">适用人群</label>

                        <div class="col-sm-10">
                            <input type="text" name="suit" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">生产地</label>

                        <div class="col-sm-10">
                            <input type="text" name="makein" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">封面图片上传</label>

                        <div class="col-sm-10">
                            <input name="picname" type="file">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">列表详情上传</label>
                        <div class="col-sm-10 ify-data">
                            <div id="queues"></div>
                            <input id="file_uploads" name="file_upload" type="file" multiple="true">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">多图片详情介绍上传</label>
                        <div class="col-sm-10 ify-data">
                            <div id="queue"></div>
                            <input id="file_upload" name="file_upload" type="file" multiple="true">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">商品状态</label>
                        <div class="col-sm-10">
                            <input type="radio" value="0" name="state" checked><i>在售</i>
                            <input type="radio" value="1" name="state"><i>下架</i>
                        </div>
                    </div>
                    {!! csrf_field() !!}
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit">提交操作</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

<script>
$.ajax({
    type: 'post',


    url: '{{ url('/admin/goods/ajax') }}',

    dataType: 'json',

    data: { '_token':'{{csrf_token()}}', 'pid':'0' },

    success:function (data) {
        // console.log(data);

        var str = '';
        for (var i =0; i<data.length; i++) {

            str += '<option value="'+data[i].id+'">'+data[i].name+'</option>';

        }

        $('#pro').append(str);


    }

});


    //给#sanji下面所有select标签绑定change事件
    $('#type').on('change', 'div', function () {

        // alert(1);
        // alert( $(this).val() );
        var id = $(this).children().val();
        // console.log(this);
        // alert(id);
        var that = $(this);



        //先统计div#sanji有多少个select
        var size = $('#type div').length;


        // console.log(size);
        // console.log(typeof size);
        switch (size) {

            //
            case 1:
                var selectName = 'two';
                var selectId = 'two';
            break;

            case 2:
                var selectName = 'three';
                var selectId = 'three';
            break;

            case 3:
                var selectName = 'four';
                var selectId = 'four';

            break;

            case 4:
                var selectName = 'five';
                var selectId = 'five';

            break;

            default:
                var selectName = 'other';
                var selectId = 'other';
            break;
        }

        // alert(size);
        //先清除当前点击的select标签后面的所有的select标签
        that.nextAll('div').remove();

        $.ajax({
            type : 'post',

            url: '{{ url('/admin/goods/ajax') }}',

            dataType: 'json',

            data : { '_token':'{{csrf_token()}}', 'pid':id },

            success:function (data) {


                if(data.length > 0){

                    var str = '<div class="col-sm-2"><select class="form-control m-b" name="'+selectName+'" id="'+selectId+'">';

                    str += '<option value="-1">--请选择--</option>';

                    for (var i = 0; i<data.length; i++) {

                        str += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    }

                    str += '</select></div>';


                    //在当前点击的select标签后面加str
                    that.after(str);
                }
            }
        });
});

</script>
<link rel="stylesheet" type="text/css" href="{{ asset('style/css/uploadify.css') }}">
<script src="{{asset('style/js/jquery.uploadify.min.js')}}" type="text/javascript"></script>
<script>
    $('#file_upload').uploadify({
            swf      : "{{ asset('style/css/uploadify.swf') }}", // 引入Uploadify 的核心Flash文件
            uploader : "{{ url('admin/goods/upload') }}", // PHP脚本地址
            formData : {'_token': '{{csrf_token()}}'},
            method   : 'post',
            // buttonText: '上传'//按钮显示的文字
            width: 120, // 上传按钮宽度
            height: 30, // 上传按钮高度
            // //buttonImage: "{{asset('org/uploadify/browse-btn.png')}}", // 上传按钮背景图片地址
            fileTypeDesc: 'Image File', // 选择文件对话框中图片类型提示文字
            fileTypeExts: '*.jpg;*.jpeg;*.png;*.gif', // 选择文件对话框中允许选择的文件类型
             // Laravel表单提交必需参数_token，防止CSRF
            queueSizeLimit: 5,
            //没有兼容的FLASH时触发

            //上传文件成功后触发（每一个文件都触发一次）
            onUploadSuccess: function (file, data, response) {
                console.log(data);
                var hidden='<input type="hidden" name="file_detail[]" value="'+data+'" readonly />';
                $('#queue').append(hidden);
            }
        });
    $('#file_uploads').uploadify({
            swf      : "{{ asset('style/css/uploadify.swf') }}", // 引入Uploadify 的核心Flash文件
            uploader : "{{ url('admin/goods/upload') }}", // PHP脚本地址
            formData : {'_token': '{{csrf_token()}}'},
            method   : 'post',
            // buttonText: '上传'//按钮显示的文字
            width: 120, // 上传按钮宽度
            height: 30, // 上传按钮高度
            // //buttonImage: "{{asset('org/uploadify/browse-btn.png')}}", // 上传按钮背景图片地址
            fileTypeDesc: 'Image File', // 选择文件对话框中图片类型提示文字
            fileTypeExts: '*.jpg;*.jpeg;*.png;*.gif', // 选择文件对话框中允许选择的文件类型
             // Laravel表单提交必需参数_token，防止CSRF
            queueSizeLimit: 5,
            //没有兼容的FLASH时触发

            //上传文件成功后触发（每一个文件都触发一次）
            onUploadSuccess: function (file, data, response) {
                console.log(data);
                var hidden='<input type="hidden" name="file[]" value="'+data+'" readonly />';
                $('#queues').append(hidden);
            }
        });
</script>
@endsection
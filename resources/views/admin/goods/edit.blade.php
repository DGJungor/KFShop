@extends('admin.public')
@section('title')
编辑商品
@endsection
@section('bigtitle')
<div class="col-lg-10">
    <h2>编辑商品</h2>
</div>
<div class="col-lg-2">

</div>
@endsection
@section('content')

<div class="row">
	<div class="col-lg-12">
	    <div class="ibox float-e-margins">
	        <div class="ibox-title">
	            <h5>正在编辑的商品是 <strong>{{$dataObj->goodname}}</strong></h5>
	        </div>
	        <div class="ibox-content">
	            <form method="post" action="/admin/goods/{{$dataObj->id}}" enctype="multipart/form-data" class="form-horizontal bs-docs-example">
	            <input type="hidden" name="typeid" value="{{ $dataObj->typeid }}">
                <input type="hidden" name="_method" value="PUT">
	                <div class="form-group">
	                    <label class="col-sm-2 control-label">商品名称</label>

	                    <div class="col-sm-10">
	                        <input type="text" name="goodname" class="form-control" value="{{$dataObj->goodname}}">
	                    </div>
	                </div>
	                <div class="hr-line-dashed"></div>
	                <div class="form-group">
	                    <label class="col-sm-2 control-label">购买量</label>

	                    <div class="col-sm-10">
	                        <input type="text" name="buy" value="{{$dataObj->buy}}" class="form-control">
	                    </div>
	                </div>
	                <div class="hr-line-dashed"></div>
	                <div class="form-group">
	                    <label class="col-sm-2 control-label">库存</label>

	                    <div class="col-sm-10">
	                        <input type="text" name="inventory" value="{{$dataObj->inventory}}" class="form-control">
	                    </div>
	                </div>
	                <div class="hr-line-dashed"></div>
	                <div class="form-group">
	                    <label class="col-sm-2 control-label">单价</label>

	                    <div class="col-sm-10">
	                        <input type="text" name="price" value="{{$dataObj->price}}" class="form-control">
	                    </div>
	                </div>
	                <div class="hr-line-dashed"></div>
	                <div class="form-group">
	                    <label class="col-sm-2 control-label">品牌</label>
	                    <div class="col-sm-10">
	                        <input type="text" name="brand" value="{{$dataObj->brand}}" class="form-control">
	                    </div>
	                </div>
	                <div class="hr-line-dashed"></div>
	                <div class="form-group">
	                    <label class="col-sm-2 control-label">商品描述</label>
	                    <div class="col-sm-10">
	                        <textarea class="form-control" class="form-control" name="area" rows="5" id="text">{{ $listObj[0]->details }}</textarea>
	                    </div>
	                </div>
	                <div class="hr-line-dashed"></div>
	                <div class="form-group">
	                    <label class="col-sm-2 control-label">适用人群</label>

	                    <div class="col-sm-10">
	                        <input type="text" name="suit" value="{{$dataObj->suit}}" class="form-control" name="password">
	                    </div>
	                </div>
	                <div class="hr-line-dashed"></div>
	                <div class="form-group">
	                    <label class="col-sm-2 control-label">生产地</label>

	                    <div class="col-sm-10">
	                        <input type="text" name="makein" value="{{$dataObj->makein}}" class="form-control">
	                    </div>
	                </div>
	                <div class="hr-line-dashed"></div>
                    <div class="form-group">
                    	<label class="col-sm-2 control-label">商品状态</label>
                        	<div class="col-sm-10">
                           		<input type="radio" value="0" name="state" @if($dataObj->state == 0) checked @endif ><i>在售</i>
                            	<input type="radio" value="1" name="state" @if($dataObj->state == 1) checked @endif ><i>下架</i>
                            </div>
                    </div>
	                <div class="hr-line-dashed"></div>
                    <div class="form-group">
	                    <label class="col-sm-2 control-label">列表封面</label>

	                    <div class="col-sm-10">
		                    <img width="100" src="{{ asset('uploads/goods/') }}/{{ $dataObj->picname }}">
	                        <input type="file" name="picname">
	                        <input type="hidden" name="picpic" value="{{$dataObj->picname}}">
	                    </div>
	                </div>
                    @foreach($listObj as $b)
	                <div class="hr-line-dashed"></div>
	                <div class="form-group">
				        <label class="col-sm-2 control-label">商品参数图文</label>
                        	<div class="col-sm-10 ify-data">

				                @foreach($b->listname as $val)
				                	<input type="hidden" name="file_detail[]" value="{{ $val }}">
				                    <img width="100" src="{{ asset('uploads/goods') }}/{{ $val }}">
				                    <a class="ajax" dname="{{ $val }}" href="javascript:;">删除</a>
				                @endforeach
					                <div id="queue"></div>
		                            <input id="file_uploads" name="file_upload" type="file" multiple="true">
				        	</div>
				    </div>
	                <div class="hr-line-dashed"></div>
	                <div class="form-group">
				        <label class="col-sm-2 control-label">详情图片</label>
                        	<div class="col-sm-10 ify-data">
					            @foreach($b->picname as $v)
					                <input type="hidden" name="file[]" value="{{ $v }}">
					                <img width="100" src="{{ asset('uploads/goods') }}/{{ $v }}">
					                <a class="ajax" dname="{{ $v }}" href="javascript:;">删除</a>
					            @endforeach
					            	<div id="queues"></div>
		                            <input id="file_upload" name="file_upload" type="file" multiple="true">
					        </div>
	                </div>
				    @endforeach
                    {!! csrf_field() !!}
	                <div class="hr-line-dashed"></div>
	                <div class="form-group">
	                    <div class="col-sm-4 col-sm-offset-6">
	                        <button class="btn btn-primary" type="submit">保存修改</button>
	                    </div>
	                </div>

	            </form>
	        </div>
	    </div>
	</div>
</div>
@endsection

@section('js')
<link rel="stylesheet" type="text/css" href="{{ asset('style/css/uploadify.css') }}">
<script src="{{asset('style/js/jquery.uploadify.min.js')}}" type="text/javascript"></script>
<script>
	$('.ajax').on('click', function() {
		var that = $(this);
		// console.log(that.prev().prev());
		var name = $(this).attr('dname');
		that.prev().prev()[0].remove();
    	that.prev()[0].remove();
    	that.remove();
		$.ajax({
		    type: 'post',


		    url: '{{ url('/admin/goods/del') }}',

		    dataType: 'json',

		    data: { '_token':'{{csrf_token()}}', 'name':name },

		    success:function (data) {


		    }

		});


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
                // console.log(data);
                var hidden='<input type="hidden" name="file_detail[]" value="'+data+'" readonly />';
                hidden += '<img width="100" src="{{url('uploads/goods')}}/'+data+'">';
                $('#queue').append(hidden);
            }
        });
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
                // console.log(data);
                var hidden='<input type="hidden" name="file[]" value="'+data+'" readonly />';
                hidden += '<img width="100" src="{{url('uploads/goods')}}/'+data+'">';
                $('#queues').append(hidden);
            }
        });
</script>
@endsection
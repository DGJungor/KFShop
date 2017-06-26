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
	            <div class="ibox-tools">
	                <a class="close-link">
	                    <i class="fa fa-times"></i>
	                </a>
	            </div>
	        </div>
	        <div class="ibox-content">
	            <form method="post" action="/admin/goods/{{$dataObj->id}}/" class="form-horizontal bs-docs-example">
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
	                    <label class="col-sm-2 control-label">品牌</label>
	                    <div class="col-sm-10">
	                        <input type="text" name="brand" value="{{$dataObj->brand}}" class="form-control">
	                    </div>
	                </div>
	                <div class="hr-line-dashed"></div>
	                <div class="form-group">
	                    <label class="col-sm-2 control-label">商品描述</label>
	                    <div class="col-sm-10">
	                        <textarea class="form-control" class="form-control" name="describe" rows="5" id="text">{{$dataObj->describe}}</textarea>
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
                           		<input type="radio" value="0" name="state" @if($dataObj->state = 0) checked @endif ><i>在售</i>
                            	<input type="radio" value="1" name="state" @if($dataObj->state = 1) checked @endif ><i>下架</i>
                            </div>
                    </div>
                    {!! csrf_field() !!}
	                <div class="hr-line-dashed"></div>
	                <div class="form-group">
	                    <div class="col-sm-4 col-sm-offset-2">
	                        <button class="btn btn-primary" type="submit">保存内容</button>
	                    </div>
	                </div>
	            </form>
	        </div>
	    </div>
	</div>
</div>
@endsection

@extends('admin.public')
@section('title')
编辑商品
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
                        <label class="col-sm-2 control-label">库存</label>

                        <div class="col-sm-10">
                            <input type="text" name="buy" class="form-control">
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
                        <label class="col-sm-2 control-label">生产地</label>

                        <div class="col-sm-10">
                            <input type="file" name="picture">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">商品状态</label>
                        <div class="radio i-checks">
                            <div class="col-sm-10">
                                <input type="radio" value="0" name="state"><i>在售</i>
                                <input type="radio" value="1" name="state"><i>下架</i>
                            </div>
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

@endsection
<!DOCTYPE html >
<html >
<head>
    <meta charset='utf-8'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Uploadify</title>
    <script src="{{ asset('/web/js/jquery.form.js') }}"></script>
</head>
<body>
    <form id="myForm" method="post" action="/user/ajax/uploadAvatar" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{Auth::user()->id}}">
        <input type="file" name="avatar" id="avatar" style="display: none" class="toImg">
        <img id="showImg" style="width: 100px; height: 100px;margin: 20px 50px 0px 50px;" src="/web/images/upload_default.png" onclick="avatar.click()">
        <input id="putForm" type="button" value="保存" style="width: 50px;margin: 10px 5px 2px 45px;background-color: #fff;"><input type="button" value="取消" id="quitImg" style="width: 50px;margin: 10px 45px 2px 5px;background-color: #fff;">
    </form>
</body>
    <script>
        $(document).ready(function () {
            $(".toImg").change(function(){
                if($(this).val()){
                    var objUrl = gebjectURL(this.files[0]) ;
                    $('#showImg').attr("src",objUrl)
                }
            });

            $('#quitImg').on('click', function() {
                layer.closeAll();
            })

            function gebjectURL(file) {
                var url = null ;
                if (window.createObjectURL!=undefined) { // basic
                    url = window.createObjectURL(file) ;
                } else if (window.URL!=undefined) { // mozilla(firefox)
                    url = window.URL.createObjectURL(file) ;
                } else if (window.webkitURL!=undefined) { // webkit or chrome
                    url = window.webkitURL.createObjectURL(file) ;
                }
                return url ;
            }
            $('#putForm').off().on('click', function () {
                $('#myForm').ajaxForm(function (picname) {
                    layer.closeAll();
                    $('#showPic').attr('src', '/uploads/user_pic/'+picname);
                    layer.msg('修改成功',1,1);
                }).submit();
            });
        });
    </script>
</html>
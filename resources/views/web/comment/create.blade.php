@extends('web.public.public')

@section('title')

商品评价表

@endsection

@section('css')

<link rel="stylesheet" type="text/css" href="{{ url('/web/css/comment.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('/web/css/shopping-mall-index.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('/web/css/star-rating.css' ) }}" media="all"/>
{{--<script type="text/javascript" src="{{ url('/web/js/star.js') }}"></script>--}}

@endsection



@section('content')

 <!--内容开始-->
 <div class="personal w1200">
     @include('web.public.leftMenu')
     <div class="personal-r f-r">
         <div class="personal-right">
             <div class="personal-r-tit">
                 <h3>商品评论</h3>
             </div>
             <div class="data-con">
                 <div class="dt1">

                     <p class="f-l">商品图片：</p>
                     <div class="touxiang f-l">
                         <div class="tu f-l">
                             <a id="editAvatar">
                                 <img src="" onclick="avatar.click()"/>
                             </a>
                         </div>

                         <div style="clear:both;"></div>
                     </div>
                     <div style="clear:both;"></div>
                 </div>
                 <div class="dt1">
                     <p class="dt-p f-l">商品名：</p>
                     <input id="username" type="text" name="username" value="{{ $userinfo->username }}" disabled />
                     <div style="clear:both;"></div>
                 </div>
                 <div class="dt1">
                     <p class="dt-p f-l">：</p>
                     <input id="realname" maxlength="20" type="text" name="realname" value="{{ $userinfo->realname }}" />
                     <div style="clear:both;"></div>
                 </div>
                 <div class="dt1">
                     <p class="dt-p f-l">身份证号：</p>
                     <input id="id_number" maxlength="18" type="text" name="id_number" value="{{ $userinfo->id_number }}" />
                     <div style="clear:both;"></div>
                 </div>
                 <div class="dt1 dt2">
                     <p class="dt-p f-l">性别：</p>
                     <input type="radio" name="sex" value="1" @if($userinfo->sex ==1) checked @else @endif><span>男</span>
                     <input type="radio" name="sex" value="2" @if($userinfo->sex ==2) checked @else @endif><span>女</span>
                     <div style="clear:both;"></div>
                 </div>
                 <div id="data_1" class="dt1">
                     <p class="dt-p f-l">生日：</p>
                     <div class="input-group date">
                         <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                         <input id="birthday" maxlength="12" class="layui-input" name="birthday" value="{{ $userinfo->birthday }}">
                     </div>
                     <div style="clear:both;"></div>
                 </div>
                 <div class="dt1 dt4">
                     <p class="dt-p f-l">邮箱：</p>
                     <input id="email" name="email" type="email" maxlength="32" value="{{ $userinfo->email }}" disabled />
                     <button id="editEmail">更换邮箱</button>
                     <div style="clear:both;"></div>
                 </div>
                 <div class="dt1 dt4">
                     <p class="dt-p f-l">手机：</p>
                     <input id="tel" name="tel" type="tel" maxlength="11" value="{{ $userinfo->tel }}" disabled />
                     <button id="editTel">更换手机</button>
                     <div style="clear:both;"></div>
                 </div>
                 <button id="editUserInfo" class="btn-pst">保存</button>
             </div>
         </div>
     </div>
     <div style="clear:both;"></div>
 </div>
        {{--评论区块--}}

        <div class="eva-info3">
        	<div class="eva-if3-l f-l">
            	<dl class="if3-l-dl1">
                	<dt>商品评价</dt>
                    <dd><textarea name="comment_info"></textarea></dd>
            		<div style="clear:both;"></div>
                </dl>
            	<dl class="if3-l-d6">
                	<dt>评分</dt>
                    <dd>
                        <input type="hidden" value="" name="star" class="star">
                        <ul class="rating nostar">
                            <li class="one"><a href="#" title="1">1</a><span></span></li>
                            <li class="two"><a href="#"  title="2">2</a><span></span></li>
                            <li class="three"><a href="#"  title="3">3</a><span></span></li>
                            <li class="four"><a href="#"  title="4">4</a><span></span></li>
                            <li class="five"><a href="#"  title="5">5</a><span></span></li>

                        </ul>
                        <span></span>

                    </dd>
            		<div style="clear:both;"></div>
                </dl>
                {!! csrf_field() !!}
                <button class="eva-btn" type="submit">提交评价</button>
            </div>

            <div style="clear:both;"></div>
        </div>
        </form>
    </div>

@endsection
@section('js')

    <script>
        /*商品评分效果*/
        $(function(){
            //通过修改样式来显示不同的星级
            $("ul.rating li a").click(function(){
                var title = $(this).attr("title");
                $(this).parent().parent().prev().val(title);
                var cl = $(this).parent().attr("class");
                $(this).parent().parent().removeClass().addClass("rating "+cl+"star");
                $(this).blur();//去掉超链接的虚线框
                return false;
            })
        })
    </script>



@endsection

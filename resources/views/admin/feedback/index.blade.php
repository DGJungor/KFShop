@extends('admin.public')


@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-content mailbox-content">
                        <div class="file-manager">
                            <a class="btn btn-block btn-primary compose-mail" href="mail_compose.html">写信</a>
                            <div class="space-25"></div>
                            <h5>文件夹</h5>
                            <ul class="folder-list m-b-md" style="padding: 0">
                                <li>
                                    <a href="mailbox.html"> <i class="fa fa-inbox "></i> 收件箱 <span class="label label-warning pull-right">16</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailbox.html"> <i class="fa fa-envelope-o"></i> 发信</a>
                                </li>
                                <li>
                                    <a href="mailbox.html"> <i class="fa fa-certificate"></i> 重要</a>
                                </li>
                                <li>
                                    <a href="mailbox.html"> <i class="fa fa-file-text-o"></i> 草稿 <span class="label label-danger pull-right">2</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailbox.html"> <i class="fa fa-trash-o"></i> 垃圾箱</a>
                                </li>
                            </ul>
                            <h5>分类</h5>
                            <ul class="category-list" style="padding: 0">
                                <li>
                                    <a href="mail_compose.html#"> <i class="fa fa-circle text-navy"></i> 工作</a>
                                </li>
                                <li>
                                    <a href="mail_compose.html#"> <i class="fa fa-circle text-danger"></i> 文档</a>
                                </li>
                                <li>
                                    <a href="mail_compose.html#"> <i class="fa fa-circle text-primary"></i> 社交</a>
                                </li>
                                <li>
                                    <a href="mail_compose.html#"> <i class="fa fa-circle text-info"></i> 广告</a>
                                </li>
                                <li>
                                    <a href="mail_compose.html#"> <i class="fa fa-circle text-warning"></i> 客户端</a>
                                </li>
                            </ul>

                            <h5 class="tag-title">标签</h5>
                            <ul class="tag-list" style="padding: 0">
                                <li><a href="mail_compose.html"><i class="fa fa-tag"></i> 朋友</a>
                                </li>
                                <li><a href="mail_compose.html"><i class="fa fa-tag"></i> 工作</a>
                                </li>
                                <li><a href="mail_compose.html"><i class="fa fa-tag"></i> 家庭</a>
                                </li>
                                <li><a href="mail_compose.html"><i class="fa fa-tag"></i> 孩子</a>
                                </li>
                                <li><a href="mail_compose.html"><i class="fa fa-tag"></i> 假期</a>
                                </li>
                                <li><a href="mail_compose.html"><i class="fa fa-tag"></i> 音乐</a>
                                </li>
                                <li><a href="mail_compose.html"><i class="fa fa-tag"></i> 照片</a>
                                </li>
                                <li><a href="mail_compose.html"><i class="fa fa-tag"></i> 电影</a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 animated fadeInRight">
                <div class="mail-box-header">

                    <form method="get" action="index.html" class="pull-right mail-search">
                        <div class="input-group">
                            <input class="form-control input-sm" name="search" placeholder="搜索邮件标题，正文等" type="text">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    搜索
                                </button>
                            </div>
                        </div>
                    </form>
                    <h2>
                        反馈
                    </h2>
                    <div class="mail-tools tooltip-demo m-t-md">
                        <div class="btn-group pull-right">
                            <button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i>
                            </button>
                            <button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i>
                            </button>

                        </div>
                        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="刷新邮件列表"><i class="fa fa-refresh"></i> 刷新</button>
                        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="标为已读"><i class="fa fa-eye"></i>
                        </button>
                        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="标为重要"><i class="fa fa-exclamation"></i>
                        </button>
                        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="标为垃圾邮件"><i class="fa fa-trash-o"></i>
                        </button>

                    </div>
                </div>
                <div class="mail-box">

                    <table class="table table-hover table-mail">
                        <tbody>
                        <tr class="unread">
                            <td class="check-mail">
                                <div class="icheckbox_square-green checked" style="position: relative;"><input class="i-checks" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">支付宝</a>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">支付宝提醒</a>
                            </td>
                            <td class=""><i class="fa fa-paperclip"></i>
                            </td>
                            <td class="text-right mail-date">昨天 10:20</td>
                        </tr>
                        <tr class="unread">
                            <td class="check-mail">
                                <div class="icheckbox_square-green" style="position: relative;"><input class="i-checks" checked="" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">Amaze UI</a>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">Amaze UI Beta2 发布</a>
                            </td>
                            <td class=""></td>
                            <td class="text-right mail-date">上午10:57</td>
                        </tr>
                        <tr class="read">
                            <td class="check-mail">
                                <div class="icheckbox_square-green checked" style="position: relative;"><input class="i-checks" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">WordPress</a>  <span class="label label-warning pull-right">验证邮件</span>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">wp-user-frontend-pro v2.1.9</a>
                            </td>
                            <td class=""></td>
                            <td class="text-right mail-date">上午9:21</td>
                        </tr>
                        <tr class="read">
                            <td class="check-mail">
                                <div class="icheckbox_square-green" style="position: relative;"><input class="i-checks" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">淘宝网</a>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">史上最全！淘宝双11红包疯抢攻略！</a>
                            </td>
                            <td class=""></td>
                            <td class="text-right mail-date">中午12:24</td>
                        </tr>
                        <tr class="read">
                            <td class="check-mail">
                                <div class="icheckbox_square-green" style="position: relative;"><input class="i-checks" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">淘宝网</a>  <span class="label label-danger pull-right">AD</span>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">亲，双11来啦！帮你挑货，还送你4999元红包！仅此一次！</a>
                            </td>
                            <td class=""><i class="fa fa-paperclip"></i>
                            </td>
                            <td class="text-right mail-date">上午6:48</td>
                        </tr>
                        <tr class="read">
                            <td class="check-mail">
                                <div class="icheckbox_square-green" style="position: relative;"><input class="i-checks" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">支付宝</a>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">支付宝提醒</a>
                            </td>
                            <td class=""><i class="fa fa-paperclip"></i>
                            </td>
                            <td class="text-right mail-date">昨天 10:20</td>
                        </tr>
                        <tr class="read">
                            <td class="check-mail">
                                <div class="icheckbox_square-green" style="position: relative;"><input class="i-checks" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">Amaze UI</a>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">Amaze UI Beta2 发布</a>
                            </td>
                            <td class=""></td>
                            <td class="text-right mail-date">上午10:57</td>
                        </tr>
                        <tr class="read">
                            <td class="check-mail">
                                <div class="icheckbox_square-green" style="position: relative;"><input class="i-checks" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">WordPress</a>  <span class="label label-warning pull-right">验证邮件</span>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">wp-user-frontend-pro v2.1.9</a>
                            </td>
                            <td class=""></td>
                            <td class="text-right mail-date">上午9:21</td>
                        </tr>
                        <tr class="read">
                            <td class="check-mail">
                                <div class="icheckbox_square-green" style="position: relative;"><input class="i-checks" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">淘宝网</a>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">史上最全！淘宝双11红包疯抢攻略！</a>
                            </td>
                            <td class=""></td>
                            <td class="text-right mail-date">中午12:24</td>
                        </tr>
                        <tr class="read">
                            <td class="check-mail">
                                <div class="icheckbox_square-green" style="position: relative;"><input class="i-checks" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">淘宝网</a>  <span class="label label-danger pull-right">AD</span>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">亲，双11来啦！帮你挑货，还送你4999元红包！仅此一次！</a>
                            </td>
                            <td class=""><i class="fa fa-paperclip"></i>
                            </td>
                            <td class="text-right mail-date">上午6:48</td>
                        </tr>
                        <tr class="read">
                            <td class="check-mail">
                                <div class="icheckbox_square-green" style="position: relative;"><input class="i-checks" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">支付宝</a>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">支付宝提醒</a>
                            </td>
                            <td class=""><i class="fa fa-paperclip"></i>
                            </td>
                            <td class="text-right mail-date">昨天 10:20</td>
                        </tr>
                        <tr class="read">
                            <td class="check-mail">
                                <div class="icheckbox_square-green" style="position: relative;"><input class="i-checks" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">Amaze UI</a>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">Amaze UI Beta2 发布</a>
                            </td>
                            <td class=""></td>
                            <td class="text-right mail-date">上午10:57</td>
                        </tr>
                        <tr class="read">
                            <td class="check-mail">
                                <div class="icheckbox_square-green" style="position: relative;"><input class="i-checks" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">WordPress</a>  <span class="label label-warning pull-right">验证邮件</span>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">wp-user-frontend-pro v2.1.9</a>
                            </td>
                            <td class=""></td>
                            <td class="text-right mail-date">上午9:21</td>
                        </tr>
                        <tr class="read">
                            <td class="check-mail">
                                <div class="icheckbox_square-green" style="position: relative;"><input class="i-checks" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">淘宝网</a>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">史上最全！淘宝双11红包疯抢攻略！</a>
                            </td>
                            <td class=""></td>
                            <td class="text-right mail-date">中午12:24</td>
                        </tr>
                        <tr class="read">
                            <td class="check-mail">
                                <div class="icheckbox_square-green" style="position: relative;"><input class="i-checks" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">淘宝网</a>  <span class="label label-danger pull-right">AD</span>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">亲，双11来啦！帮你挑货，还送你4999元红包！仅此一次！</a>
                            </td>
                            <td class=""><i class="fa fa-paperclip"></i>
                            </td>
                            <td class="text-right mail-date">上午6:48</td>
                        </tr>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>

@endsection
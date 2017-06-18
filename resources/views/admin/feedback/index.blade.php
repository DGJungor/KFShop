@extends('admin.public')


@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">

            <div class="col-lg-12 animated fadeInRight">
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
                        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title=""
                                data-original-title="刷新邮件列表"><i class="fa fa-refresh"></i> 刷新
                        </button>
                        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title=""
                                data-original-title="标为已读"><i class="fa fa-eye"></i>
                        </button>
                        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title=""
                                data-original-title="标为重要"><i class="fa fa-exclamation"></i>
                        </button>
                        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title=""
                                data-original-title="标为垃圾邮件"><i class="fa fa-trash-o"></i>
                        </button>

                    </div>
                </div>
                <div class="mail-box">

                    <table class="table table-hover table-mail">
                        <tbody>
                        <tr class="unread">

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

                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">WordPress</a> <span
                                        class="label label-warning pull-right">验证邮件</span>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">wp-user-frontend-pro v2.1.9</a>
                            </td>
                            <td class=""></td>
                            <td class="text-right mail-date">上午9:21</td>
                        </tr>
                        <tr class="read">

                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">淘宝网</a>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">史上最全！淘宝双11红包疯抢攻略！</a>
                            </td>
                            <td class=""></td>
                            <td class="text-right mail-date">中午12:24</td>
                        </tr>
                        <tr class="read">

                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">淘宝网</a> <span
                                        class="label label-danger pull-right">AD</span>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">亲，双11来啦！帮你挑货，还送你4999元红包！仅此一次！</a>
                            </td>
                            <td class=""><i class="fa fa-paperclip"></i>
                            </td>
                            <td class="text-right mail-date">上午6:48</td>
                        </tr>
                        <tr class="read">

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

                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">Amaze UI</a>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">Amaze UI Beta2 发布</a>
                            </td>
                            <td class=""></td>
                            <td class="text-right mail-date">上午10:57</td>
                        </tr>
                        <tr class="read">

                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">WordPress</a> <span
                                        class="label label-warning pull-right">验证邮件</span>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">wp-user-frontend-pro v2.1.9</a>
                            </td>
                            <td class=""></td>
                            <td class="text-right mail-date">上午9:21</td>
                        </tr>
                        <tr class="read">

                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">淘宝网</a>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">史上最全！淘宝双11红包疯抢攻略！</a>
                            </td>
                            <td class=""></td>
                            <td class="text-right mail-date">中午12:24</td>
                        </tr>
                        <tr class="read">

                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">淘宝网</a> <span
                                        class="label label-danger pull-right">AD</span>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">亲，双11来啦！帮你挑货，还送你4999元红包！仅此一次！</a>
                            </td>
                            <td class=""><i class="fa fa-paperclip"></i>
                            </td>
                            <td class="text-right mail-date">上午6:48</td>
                        </tr>
                        <tr class="read">

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

                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">Amaze UI</a>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">Amaze UI Beta2 发布</a>
                            </td>
                            <td class=""></td>
                            <td class="text-right mail-date">上午10:57</td>
                        </tr>
                        <tr class="read">

                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">WordPress</a> <span
                                        class="label label-warning pull-right">验证邮件</span>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">wp-user-frontend-pro v2.1.9</a>
                            </td>
                            <td class=""></td>
                            <td class="text-right mail-date">上午9:21</td>
                        </tr>
                        <tr class="read">

                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">淘宝网</a>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">史上最全！淘宝双11红包疯抢攻略！</a>
                            </td>
                            <td class=""></td>
                            <td class="text-right mail-date">中午12:24</td>
                        </tr>
                        <tr class="read">

                            </td>
                            <td class="mail-ontact"><a href="mail_detail.html">淘宝网</a> <span
                                        class="label label-danger pull-right">AD</span>
                            </td>
                            <td class="mail-subject"><a href="mail_detail.html">亲，双11来啦！帮你挑货，还送你4999元红包！仅此一次！</a>
                            </td>
                            <td class=""><i class="fa fa-paperclip"></i>
                            </td>
                            <td class="text-right mail-date">上午6:48</td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="row">
                        {{--<div class="col-lg-1"></div>--}}
                        <div class="col-lg-9">
                            <div class="dataTables_info" id="DataTables_Table_0_info" role="alert" aria-live="polite"
                                 aria-relevant="all">&nbsp;&nbsp; &nbsp;1 到 10 项，共 57 项
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button previous disabled" aria-controls="DataTables_Table_0"
                                        tabindex="0" id="DataTables_Table_0_previous"><a href="#">上一页</a></li>
                                    <li class="paginate_button active" aria-controls="DataTables_Table_0" tabindex="0">
                                        <a href="#">1</a></li>
                                    <li class="paginate_button " aria-controls="DataTables_Table_0" tabindex="0"><a
                                                href="#">2</a></li>
                                    <li class="paginate_button " aria-controls="DataTables_Table_0" tabindex="0"><a
                                                href="#">3</a></li>
                                    <li class="paginate_button " aria-controls="DataTables_Table_0" tabindex="0"><a
                                                href="#">4</a></li>
                                    <li class="paginate_button " aria-controls="DataTables_Table_0" tabindex="0"><a
                                                href="#">5</a></li>
                                    <li class="paginate_button " aria-controls="DataTables_Table_0" tabindex="0"><a
                                                href="#">6</a></li>
                                    <li class="paginate_button next" aria-controls="DataTables_Table_0" tabindex="0"
                                        id="DataTables_Table_0_next"><a href="#">下一页</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--这里我要放页码--}}

        </div>

    </div>

@endsection
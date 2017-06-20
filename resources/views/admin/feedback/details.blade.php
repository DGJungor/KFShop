@extends('admin.public')

@section('bigtitle')
    <div class="col-lg-10">
        <h2>反馈</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">主页</a>
            </li>
            <li>
                <a>后台数据</a>
            </li>
            <li>
                <strong>反馈详情</strong>
            </li>
        </ol>
    </div>
@endsection

@section('success')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

@endsection


@section('content')
    <div class="wrapper wrapper-content">
    <div class="col-lg-12 animated fadeInRight">
        <div class="mail-box-header">
            <div class="pull-right tooltip-demo">
                <a href="mail_compose.html" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top"
                   title="回复"><i class="fa fa-reply"></i> 回复</a>
                <a href="mail_detail.html#" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top"
                   title="打印邮件"><i class="fa fa-print"></i> </a>
                <a href="mailbox.html" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top"
                   title="标为垃圾邮件"><i class="fa fa-trash-o"></i> </a>
            </div>
            <h2>
                查看邮件
            </h2>
            <div class="mail-tools tooltip-demo m-t-md">


                <h3>
                    <span class="font-noraml">主题： </span>{{ $data[0]->{'title'} }}
                </h3>
                <h5>
                    <span class="pull-right font-noraml">发送时间:{{ $data[0]->{'created_at'}  }}</span>
                    <span class="font-noraml">发件人： </span> {{ $data[0]->{'user_id'} }}
                </h5>
            </div>
        </div>
        <div class="mail-box">


            <div class="mail-body">
                <h4>  </h4>
                <p>
                    {{-- p标签里面写的这是正文 --}}
                    {{ $data[0]->{'text'}  }}
                </p>

                <p class="text-right">

                </p>
            </div>
            <div class="mail-attachment">
                <p>
                    <span><i class="fa fa-paperclip"></i> 2 个附件 - </span>
                    <a href="mail_detail.html#">下载全部</a>
                    |
                    <a href="mail_detail.html#">预览全部图片</a>
                </p>

                <div class="attachment">
                    <div class="file-box">
                        <div class="file">
                            <a href="mail_detail.html#">
                                <span class="corner"></span>

                                <div class="icon">
                                    <i class="fa fa-file"></i>
                                </div>
                                <div class="file-name">
                                    Document_2014.doc
                                </div>
                            </a>
                        </div>

                    </div>
                    <div class="file-box">
                        <div class="file">
                            <a href="mail_detail.html#">
                                <span class="corner"></span>

                                <div class="image">
                                    <img alt="image" class="img-responsive" src="img/p1.jpg">
                                </div>
                                <div class="file-name">
                                    Italy street.jpg
                                </div>
                            </a>

                        </div>
                    </div>
                    <div class="file-box">
                        <div class="file">
                            <a href="mail_detail.html#">
                                <span class="corner"></span>

                                <div class="image">
                                    <img alt="image" class="img-responsive" src="img/p2.jpg">
                                </div>
                                <div class="file-name">
                                    My feel.png
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <form action="{{ $data[0]->{'feedback_id'} }}" method="POST">


            <div class="mail-body text-right tooltip-demo">
                <a class="btn btn-sm btn-white" href="mail_compose.html"><i class="fa fa-reply"></i> 回复</a>
                <a class="btn btn-sm btn-white" href="mail_compose.html"><i class="fa fa-arrow-right"></i> 下一封</a>
                <button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="打印这封邮件"
                        class="btn btn-sm btn-white"><i class="fa fa-print"></i> 打印
                </button>
                <input type="hidden" name="_method" value="DELETE">
                {{csrf_field()}}
                <input type="submit" title="" data-placement="top" data-toggle="tooltip" data-original-title="删除邮件"
                        class="btn btn-sm btn-white"  name="action" value="删除邮件" >
                </input>
            </div>
            <div class="clearfix"></div>

            <form>
        </div>
    </div>
    </div>
@endsection
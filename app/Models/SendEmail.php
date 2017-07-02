<?php

namespace App\Models;


/**
 * Class SendEmail
 * @author liuzhiqi
 * @package App\Models
 */
class SendEmail
{
    /**
     * @var string
     * @author liuzhiqi
     */
    public $from;     //发件人邮箱
    public $to;       //收件人邮箱
    public $cc;       //抄送
    public $attach;  //附件
    public $subject; //主题
    public $content; //内容

}
<?php

namespace App\Models;

/**
 * Class MsgResult
 * @author liuzhiqi
 * @package App\Models
 */
class MsgResult
{
    /**
     * @var
     * @author liuzhiqi
     */
    public $status;
    /**
     * @var
     * @author liuzhiqi
     */
    public $message;
    /**
     * @var
     * @author liuzhiqi
     */
    public $tip;

    /**
     * @author liuzhiqi
     * @return string
     */
    public function toJson()
    {
        return json_encode($this, JSON_UNESCAPED_UNICODE);
    }
}
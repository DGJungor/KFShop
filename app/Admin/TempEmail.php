<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TempEmail
 * @author liuzhiqi
 * @package App\Admin
 */
class TempEmail extends Model
{
    /**
     * 表名
     * @var string
     * @author liuzhiqi
     */
    protected $table = 'data_temp_email';
    /**
     * 主键
     * @var string
     * @author liuzhiqi
     */
    protected $primaryKey = 'id';

    /**
     * 是否自动更新时间戳
     * @var bool
     * @author liuzhiqi
     */
    public $timestamps = false;
}
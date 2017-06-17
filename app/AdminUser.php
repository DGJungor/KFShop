<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    /**
     * 管理员表
     * @var string
     */
    protected $table = 'data_admin_users';

    protected $fillable = ['nickname', 'tel', 'password', 'avatar', 'last_login_ip', 'last_login_at'];
}

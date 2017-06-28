<?php

namespace App\Admin;

use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
    /**
     * 管理员表
     * @var string
     */
    protected $table = 'data_admin_users';

    protected $fillable = ['username', 'tel', 'password', 'avatar', 'last_login_ip', 'last_login_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var  array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

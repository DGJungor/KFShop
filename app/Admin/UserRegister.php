<?php

namespace App\Admin;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class UserRegister
 * @package App\Model
 */
class UserRegister extends Authenticatable
{
    /**
     * 用户注册表
     *
     * @var string
     */
    protected $table = 'data_users_register';

    /**
     * @var array
     */
    protected $fillable = ['username', 'email', 'tel', 'password', 'register_ip'];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password'
    ];
}

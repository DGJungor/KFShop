<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRegister
 * @package App\Model
 */
class UserRegister extends Model
{
    /**
     * 用户注册原始表
     * @var string
     */
    protected $table = 'data_users_register';

    /**
     * @var array
     */
    protected $fillable = ['email', 'tel', 'password', 'register_ip'];
}

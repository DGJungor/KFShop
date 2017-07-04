<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserInfo
 * @package App\Model
 */
class UserInfo extends Model
{
    /**
     * 用户基本信息表
     * @var string
     */
    protected $table = 'data_users_info';

    /**
     * @var array
     */
    protected $fillable = ['uid', 'username', 'realname', 'tel', 'email', 'avatar', 'sex', 'id_number', 'answer', 'birthday'];

    public function userRegister() {
        return $this->belongsTo('App\Admin\UserRegister');
    }
}

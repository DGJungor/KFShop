<?php

namespace App;

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
    protected $fillable = ['user_id', 'nickname', 'realname', 'tel', 'email', 'avatar', 'sex', 'id_number', 'answer_1', 'birthday'];
}

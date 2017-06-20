<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    /**
     *友情链接表
     *
     * @var string
     */

	protected $table = 'data_friend_link';

    public $fillable = [
    	'id', 'name', 'type', 'url', 'image','status',
    ];
}


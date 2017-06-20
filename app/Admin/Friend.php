<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
	protected $table = 'data_friend_link';

    protected $fillable = [
    	'id', 'name', 'type', 'url', 'image', 'status',
    ];
}


<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    public $fillable = [
    	'id', 'good_id', 'user_id', 'order_id', 'cargo_id'
    ];
}


<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'data_types';

    protected $fillable = [
        'pid', 'name', 'path', 'picname'
    ];
}

<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'pid', 'name', 'path'
    ];
}

<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $table = 'data_goods';
    public $fillable = [
    	'typeid', 'goodname', 'state','buy','brand','suit','makein','onmarket','describe',
    ];
}

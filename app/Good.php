<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    public $fillable = [
    	'typeid', 'goodname', 'state','buy','brand','suit','makein','onmarket','describe',
    ];
}

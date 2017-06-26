<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{
    protected $table = 'data_recommend';

    public $fillable = [
        'id', 'recommend_name', 'recommend_location', 'recommend_type', 'recommend_picname','recommend_introduction','created_at',
    ];

    public $timestamps = true;

    public function freshTimestamp() {
        return time();
    }

}

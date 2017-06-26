<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'data_goods_comment';

    public $fillable = ['goods_id', 'order_id', 'usr_id', 'cargo_id', 'comment_tyle', 'star'];
}

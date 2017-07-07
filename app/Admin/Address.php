<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * 收货地址表
     * @var string
     */
    protected $table = 'data_address';

    /**
     * @var array
     */
    protected $fillable = ['uid', 'address', 'det_address', 'name', 'tel', 'status'];

}

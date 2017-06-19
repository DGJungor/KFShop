<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * 收货地址表
     * @var string
     */
    protected $table = 'data_receiving_address';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'consignee', 'tel', 'province', 'city', 'county', 'detailed_address', 'status'];

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_address', function (Blueprint $table) {
            $table->increments('id')->unsigned()->comment('收货地址表');
            $table->integer('uid')->unsigned()->index()->comment('用户id');
            $table->string('address', 50)->comment('收货地址');
            $table->string('det_address',100)->comment('详细地址');
            $table->string('name', 32)->comment('收货人');
            $table->string('tel', 32)->comment('手机号码');
            $table->tinyInteger('status')->default(1)->comment('地址状态: 1: 普通 2: 默认');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_address');
    }
}

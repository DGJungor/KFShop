<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //创建订单数据表
	    Schema::create('data_orders', function (Blueprint $table) {
		    $table->increments('id')->commment('订单管理表');
		    $table->integer('user_id')->commment('用户ID');
		    $table->char('guid',32)->comment('订单编号');
		    $table->string('cargo_message',32)->comment('下单商品信息 :单价、数量、商品ID');
		    $table->string('address_message',64)->comment('收货地址信息');
		    $table->string('pay_transaction',64)->comment('支付交易号');
		    $table->tinyInteger('pay_type')->comment('支付方式 1:支付宝 2:微信 3:其他');
		    $table->tinyInteger('pay_status')->comment('支付状态 1:待支付 2:已支付 3:取消支付');
		    $table->string('total_amount',64)->comment('商品总金额');
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
        //
	    Schema::drop('data_orders');
    }
}

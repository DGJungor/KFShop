<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataOrdersDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	    Schema::create('data_orders_details', function (Blueprint $table) {
		    //
		    $table->increments('id')->unsigned()->comment('商品订单详情表');
		    $table->char('orders_guid',32)->comment('订单编号');
		    $table->integer('user_id')->unsigned()->comment('用户ID');
		    $table->integer('goods_id')->unsigned()->comment('商品ID');
		    $table->integer('cargo_id')->unsigned()->comment('商品ID');
		    $table->tinyInteger('order_status')->unsigned()->comment('订单状态 1:待付款 2: 待发货 3:待收货 4:待评价 5 完成 6 取消 默认为1');
		    $table->integer('commodity_number')->unsigned()->comment('商品数量');
		    $table->string('cargo_price')->comment('商品单价');
		    $table->tinyInteger('return_status')->unsigned()->comment('退货状态 1 不退货 2:退货 默认为1');
		    $table->tinyInteger('comment_status')->unsigned()->comment('评论状态: 1 未评论 2:已评论 默认为1');
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
	    Schema::drop('data_orders_details');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataGoodsDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_goods_details', function (Blueprint $table) {
            $table->increments('id')->unsigned()->comment('商品详情表');
            $table->integer('goods_id')->unsigned()->comment('商品Id');
            $table->text('details')->comment('商品描述');
            $table->text('listname')->comment('商品详情图片');
            $table->text('picname')->comment('商品详情图片');
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
        Schema::drop('data_goods_details');
    }
}

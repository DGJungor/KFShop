<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('typeid')->comment('分类id');
            $table->string('goodname')->comment('商品名');
            $table->decimal('price', 7, 2)->comment('商品单价');
            $table->integer('inventory')->comment('库存');
            $table->tinyInteger('state')->default('0')->comment('商品状态 0=>在售 1=>下架');
            $table->integer('buy')->default('0')->comment('购买量');
            $table->string('picname')->comment('图片名');
            $table->string('brand', 32)->comment('品牌');
            $table->string('suit', 32)->comment('适用人群');
            $table->string('makein', 32)->comment('生产地');
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
        Schema::drop('data_goods');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataGoodsCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_goods_comment', function (Blueprint $table) {
            $table->increments('id')->unsigned()->comment('商品评价表');
            $table->integer('goods_id')->unsigned()->comment('商品ID');
            $table->integer('user_id')->unsigned()->index()->comment('用户ID');
            $table->integer('order_id')->unsigned()->index()->comment('订单详情表');
            $table->integer('cargo_id')->unsigned()->index()->comment('货品ID');
            $table->tinyInteger('comment_tyle')->defaule(0)->comment('评论人状态0:匿名评价 1:显示用户名');
            $table->tinyInteger('star')->default(1)->comment('1 差评 2 中评 3 好评');
            $table->text('comment_info')->nullable()->comment('评价内容');
            $table->timestamps();
            $table->softDeletes()->comment('软删除');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('data_goods_comment');
    }
}

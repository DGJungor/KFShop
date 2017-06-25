<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataRecommendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_recommend', function (Blueprint $table) {

            $table->increments('id')->unsigned()->comment('轮播图表');
            $table->string('recommend_name')->comment('轮播图名称');
            $table->tinyInteger('recommend_location')->default(1)->comment('轮播图位置 1 首页');
            $table->tinyInteger('recommend_type')->comemnt('轮播图类型');
            $table->string('recommend_picname',255)->comment('图片名称');
            $table->string('recommend_introduction',255)->comment('轮播图导语');
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
        Schema::drop('data_recommend');
    }
}

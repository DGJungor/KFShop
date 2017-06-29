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

            $table->increments('id')->unsigned()->comment('推荐位表');
            $table->string('recommend_name')->comment('推荐位名称');
            $table->tinyInteger('recommend_location')->default(1)->comment('推荐位置 1 首页');
            $table->tinyInteger('recommend_type')->comemnt('推荐类型');
            $table->string('recommend_picname',255)->comment('图片名称');
            $table->string('recommend_introduction',255)->comment('推荐导语');
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

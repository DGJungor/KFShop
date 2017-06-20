<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataFeedbackDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_feedback_details', function (Blueprint $table) {
            //
			$table->increments('id')->unsigned()->comment('反馈信息详情表');
	        $table->integer('feedback_id')->unsigned()->comment('反馈信息ID');
	        $table->integer('user_id')->unsigned()->comment('用户ID');
	        $table->string('title',64)->comment('标题');
	        $table->string('text')->comment('反馈信息正文');
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
	    Schema::drop('data_feedback_details');
    }
}

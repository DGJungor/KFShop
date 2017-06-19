<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataFeedback extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	    Schema::create('data_feedback',function (Blueprint $table){
	    	$table->increments('id')->commment('反馈信息ID');
	    	$table->integer('user_id')->comment('用户ID');
	    	$table->string('title',64)->comment('反馈信息标题');
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
	    Schema::drop('data_feedback');
    }
}

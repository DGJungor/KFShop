<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataFriendLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_friend_link', function (Blueprint $table) {
            $table->increments('id')->unsigned()->comment('友情链接');
            $table->string('name', 32)->comment('友情链接名称');
            $table->tinyInteger('type')->comment('类型1:图片 2:文字');
            $table->string('url',64)->comment('链接地址');
            $table->string('image', 64)->nullable()->comment('图片名称');
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
        Schema::drop('data_friend_link');
    }
}
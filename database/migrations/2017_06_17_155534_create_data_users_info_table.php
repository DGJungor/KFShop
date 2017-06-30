<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataUsersInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_users_info', function (Blueprint $table) {
            $table->increments('id')->unsigned()->comment('用户信息表');
            $table->integer('uid')->unsigned()->unique()->comment('用户ID');
            $table->string('username', 64)->nullable()->comment('用户名');
            $table->string('realname', 64)->nullable()->comment('真实姓名');
            $table->string('email', 32)->nullable()->comment('邮箱');
            $table->string('tel', 32)->comment('手机');
            $table->string('avatar', 64)->nullable()->comment('头像');
            $table->string('sex')->nullable()->comment('性别:1 男 2 女');
            $table->string('id_number', 32)->nullable()->comment('身份证号码');
            $table->string('answer', 64)->nullable()->comment('密保问题');
            $table->string('birthday', 32)->nullable()->comment('生日');
            $table->tinyInteger('status')->default(1)->comment('用户状态: 0 禁用 1 使用中');
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
        Schema::dropIfExists('data_users_info');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataForgetPasswordCodesTable extends Migration
{
    /**
     * 忘记密码时使用的验证码表
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_forget_password_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->comment('用户id');
            $table->string('code',32)->comment('随机验证码');
            $table->timestamp('deadline')->comment('失效时间');
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
        Schema::dropIFExists('data_forget_password_codes');
    }
}

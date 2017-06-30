<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataUsersRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_users_register', function (Blueprint $table) {
            $table->increments('id')->unsigned()->comment('用户注册原始表');
            $table->string('username', 64)->comment('用户名');
            $table->string('email', 32)->nullable()->index()->comment('邮箱');
            $table->string('tel', 32)->index()->comment('手机号码');
            $table->string('password', 255)->comment('密码');
            $table->ipAddress('register_ip')->comment('注册ip');
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
        Schema::dropIfExists('data_users_register');
    }
}

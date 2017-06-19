<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_admin_users', function (Blueprint $table) {
            $table->increments('id')->unsigned()->comment('后台用户管理员表');
            $table->string('username', 64)->comment('管理员名字');
            $table->tinyInteger('type')->default(1)->comment('后台用户类型: 0 超级管理员 1 管理员');
            $table->string('email', 32)->nullable()->comment('邮箱');
            $table->string('password',255)->comment('登录密码');
            $table->string('tel', 32)->index()->comment('手机号码');
            $table->string('avatar', 64)->nullable()->comment('头像');
            $table->ipAddress('last_login_ip')->nullable()->comment('最后一次登录的IP');
            $table->timestamp('last_login_at')->nullable()->comment('最后一次登录的时间');
            $table->tinyInteger('status')->default(1)->comment('状态: 0 禁用 1 使用中');
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_admin_users');
    }
}

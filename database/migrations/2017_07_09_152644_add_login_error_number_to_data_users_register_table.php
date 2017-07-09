<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLoginErrorNumberToDataUsersRegisterTable extends Migration
{
    /**
     * 添加登录时密码错误次数字段
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_users_register', function (Blueprint $table) {
            $table->tinyInteger('login_error_number')->nullable()->comment('密码错误次数');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_users_register', function (Blueprint $table) {
            //
        });
    }
}

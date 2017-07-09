<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLoginLastErrorTimeToDataUsersRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_users_register', function (Blueprint $table) {
            $table->timestamp('login_last_error_time')->nullable()->comment('最后密码错误的时间');
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

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActiveToDataUsersRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_users_register', function (Blueprint $table) {
            $table->tinyInteger('active')->default(1)->comment('是否激活 0 激活 1 未激活');
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

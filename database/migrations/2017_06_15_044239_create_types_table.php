<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->comment('父id');
            $table->string('picname', 40)->comment('分类图片');
            $table->string('name', 32)->comment('分类名');
            $table->string('path')->comment('分类路径');
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
        Schema::drop('data_types');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrThread extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trThread', function (Blueprint $table) {
            $table->increments('ThreadID');
            $table->integer('CategoryID')->unsigned();
            $table->integer('CreatedBy')->unsigned();
            $table->string('ThreadName');
            $table->string('ThreadDescription');
            $table->date('CreatedDate');
            $table->boolean('isClosed');
            $table->foreign('CreatedBy')->references('UserID')->on('msUser');
            $table->foreign('CategoryID')->references('CategoryID')->on('msCategory');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trThread');
    }
}

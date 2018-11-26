<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrThreadDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trThreadDetails', function (Blueprint $table) {
            $table->increments('ThreadDetailsID');
            $table->integer('ThreadID')->unsigned();
            $table->string('Post',400);
            $table->integer('PostedBy')->unsigned();
            $table->date('PostedDate');
            $table->foreign('ThreadID')->references('ThreadID')->on('trThread');
            $table->foreign('PostedBy')->references('UserID')->on('msUser');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trThreadDetails');
    }
}

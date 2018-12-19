<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrMessage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trMessage', function (Blueprint $table) {
            $table->increments('MessageId');
            $table->string('Message',300);
            $table->integer('SentBy')->unsigned();
            $table->integer('SentTo')->unsigned();
            $table->date('SentDate');
            $table->foreign('SentBy')->references('UserID')->on('msUser')->onDelete('cascade');
            $table->foreign('SentTo')->references('UserID')->on('msUser')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trMessage');
    }
}

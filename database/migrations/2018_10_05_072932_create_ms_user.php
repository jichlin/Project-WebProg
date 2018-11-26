<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msUser', function (Blueprint $table) {
            $table->increments('UserID');
            $table->integer('RolesID')->unsigned();
            $table->string('UserName',30);
            $table->string('UserEmail' , 30);
            $table->string('UserPassword',20);
            $table->string('UserPhone',30);
            $table->string('UserAddress',50);
            $table->date('UserDOB');
            $table->string('UserPicture');
            $table->integer('UserNegativePop');
            $table->integer('UserPositivePop');
            $table->char('Gender');
            $table->string('remember_token');
            $table->foreign('RolesID')->references('RolesID')->on('msRoles');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('msUser');
    }
}

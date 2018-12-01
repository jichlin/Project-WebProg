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
            $table->string('UserName',255);
            $table->string('UserEmail' , 30);
            $table->string('UserPassword',255);
            $table->string('UserPhone',30);
            $table->string('UserAddress',50);
            $table->date('UserDOB');
            $table->char('UserGender');
            $table->string('UserPicture')->default('');;
            $table->integer('UserNegativePop')->default(0);
            $table->integer('UserPositivePop')->default(0);;
            $table->string('remember_token')->default('');
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

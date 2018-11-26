<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $table="msUser";

    public function role(){
        return $this->hasOne('App\Roles','RolesID','RolesID');
    }
}

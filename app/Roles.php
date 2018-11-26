<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //
    protected $table='msRoles';
    public function user()
    {
        return $this->belongsTo('App\User','RolesID','RolesID');
    }

}

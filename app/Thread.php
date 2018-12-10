<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    //
     protected $table= 'trthread';

     public function category()
     {
         return $this->hasOne('App\Category', 'CategoryID', 'CategoryID');
     }
}

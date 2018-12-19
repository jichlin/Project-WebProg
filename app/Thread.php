<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    //
    protected $table= 'trthread';
    protected $primaryKey = 'ThreadID';
    public $timestamps = false;

    public function category(){
        return $this->hasOne('App\Category', 'CategoryID', 'CategoryID');
    }

    public function user(){
        return $this->hasOne('App\User','UserID','CreatedBy');
    }

    public function threadDetail(){
        return $this->hasMany('App\ThreadDetail', 'ThreadID', 'ThreadID');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThreadDetail extends Model
{
    //
    protected $table= 'trthreaddetails';
    protected $primaryKey = 'ThreadDetailID';
    public $timestamps = false;

    public function thread(){
        return $this->belongsTo('App\Thread','ThreadID','ThreadID');
    }

    public function profile(){
        return $this->belongsTo('App\User','UserID','PostedBy');
    }

}

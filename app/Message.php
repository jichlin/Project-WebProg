<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'trmessage';
    public $timestamps = false;
    protected $primaryKey = 'MessageId';

    public function user(){
        return $this->belongsTo('App/User','UserID','SentBy');
    }

}

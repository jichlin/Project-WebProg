<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table= 'mscategory';

    public function Thread()
    {
        return $this->hasMany('App\Thread');
    }
}

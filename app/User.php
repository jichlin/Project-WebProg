<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    protected $table="msUser";
    protected $primaryKey = 'UserID';
    public $timestamps = false;

    public function getAuthIdentifierName()
    {
        return 'UserName';
    }

    public function getAuthIdentifier()
    {
        $name = $this->getAuthIdentifierName();

        return $this->attributes[$name];
    }

    public function getAuthPassword()
    {
        return $this->attributes['UserPassword'];
    }

    public function getRememberToken()
    {
        return $this->attributes[$this->getRememberTokenName()];
    }

    public function setRememberToken($value)
    {
        $this->attributes[$this->getRememberTokenName()] = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function role(){
        return $this->hasOne('App\Roles','RolesID','RolesID');
    }
}

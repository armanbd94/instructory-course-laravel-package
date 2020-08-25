<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $fillable = [
         'name', 'email', 'password', 'provider', 'provider_id'
     ];
     protected $hidden = [
        'password', 'remember_token',
    ];
}

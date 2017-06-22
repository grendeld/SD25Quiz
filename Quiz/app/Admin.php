<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
  use Notifiable;
    protected $primaryKey='AdminID';
    protected $fillable=['FirstName','LastName','id','email', 'password'];
    protected $hidden = [
        'password', 'remember_token',
    ];
}

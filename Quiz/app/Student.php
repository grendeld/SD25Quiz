<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
  use Notifiable;
  
    protected $primaryKey = 'StudentID';
    protected $fillable=['FirstName','LastName','Photo','IntakeID','id','email', 'password'];
    public $timestamps = false;
    protected $hidden = [
        'password', 'remember_token',
    ];


public function Intake ()
{
  return $this->belongsTo('App\Intake','IntakeID','IntakeID');
}

}

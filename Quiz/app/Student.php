<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey = 'StudentID';
    protected $fillable=['FirstName','LastName','Photo','IntakeID','id'];
    public $timestamps = false;


public function Intake ()
{
  return $this->belongsTo('App\Intake','IntakeID','IntakeID');
}

}

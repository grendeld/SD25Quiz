<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $primaryKey='InstructorID';
    protected $fillable=['FirstName','LastName','id'];
    public $timestamps=false;
public function Intakes()
{
   return $this->hasMany('App\Intake','IntakeID','IntakeID');
}
public function Programs()
{
    return $this->hasMany('App\Program','ProgramID','ProgramID');
}
}

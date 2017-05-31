<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $primaryKey='InstructorID';
    protected $fillable=['FirstName','LastName','id'];
    public $timestamps=false;


public function intakes()
{
  //return $this->HasMany('App\Intake','InstructorIntakes','InstructorID','IntakeID');

return $this->belongsToMany('App\Intake','InstructorIntakes','InstructorID','IntakeID');
}

public function quizzes()
{
  return $this->HasMany('App\Quiz','InstructorID','InstructorID');
}





}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Instructor extends Authenticatable
{
  use Notifiable;
    protected $primaryKey='InstructorID';
    protected $fillable=['FirstName','LastName','id','email', 'password',];
    protected $hidden = [
        'password', 'remember_token',
    ];
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

public function programs(){
    return $this->hasManyThrough('App\Program','App\Intake','IntakeID','ProgramID','InstructorID');
}




}

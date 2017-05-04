<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intake extends Model
{
    protected $primaryKey='IntakeID';
    protected $fillable=['IntakeName','ProgramID'];
    public $timestamps=false;

     public function Instructor(){
       return $this->belongsToMany('App\Instructor', 'InstructorIntakes', 'InstructorID', 'InstructorID');
     }

    public function Students()
            {
                return $this->hasMany('App\Student','IntakeID','IntakeID');
            }
}

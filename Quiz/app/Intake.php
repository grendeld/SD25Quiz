<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intake extends Model
{
    protected $primaryKey='IntakeID';
    protected $fillable=['IntakeName','ProgramID','InstructorID'];
    public $timestamps=false;
}

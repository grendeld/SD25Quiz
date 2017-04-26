<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstructorIntake extends Model
{
    protected $fillable=['IntakID','InstructorID'];
    public $timestamps=false;
}
}

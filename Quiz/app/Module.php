<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
  protected $primaryKey = 'ModuleID';
  protected $fillable=['ModuleName','ProgramID','Active'];
  public $timestamps = false;


public function Program()
    {
        return $this->belongsTo(Program::class,'ProgramID','ProgramID');
    }
<<<<<<< HEAD

public function quizzes()
    {
        return $this->hasMany(Quiz::class,'ModuleID','ModuleID');
    }
=======
>>>>>>> 05b55c3a9c8be72a0d51d24f723c78aaddd62cb8
}

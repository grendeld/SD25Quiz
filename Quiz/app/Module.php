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

public function quizzes()
    {
        return $this->hasMany(Quiz::class,'ModuleID','ModuleID');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
  protected $table = 'quizzes';
  protected $primaryKey = 'QuizID';
  protected $fillable=['QuizName','Description','ModuleID','InstructorID','Active'];

  public function Module()
      {
          return $this->belongsTo(Module::class,'ModuleID','ModuleID');
      }

  public function Questions()
      {
      return $this->hasMany('App\Question','QuizID','QuizID');
      }

  public function Instructor()
          {
          return $this->belongsTo('App\Instructor','InstructorID','InstructorID');
          }

}

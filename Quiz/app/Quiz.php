<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
  protected $table = 'quizzes';
  protected $primaryKey = 'QuizID';
  protected $fillable=['QuizName','Description','ModuleID','Active'];
  public $timestamps = false;

  public function Module()
      {
          return $this->belongsTo(Module::class,'ModuleID','ModuleID');
      }

  public function Questions()
      {
      return $this->hasMany('App\Question','QuizID','QuizID');
      }
    


}

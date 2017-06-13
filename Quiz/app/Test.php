<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
  protected $primaryKey = 'TestID';
  protected $fillable=['QuizID','StudentID','StartDateTime','StopDateTime'];
  public $timestamps = false;

  public function Quiz()
      {
          return $this->belongsTo(Quiz::class,'QuizID','QuizID');
      }

  public function Responses()
      {
      return $this->hasMany('App\Response','TestID','TestID');
      }

  
}

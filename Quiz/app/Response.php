<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
  protected $primaryKey = 'ResponseID';
  protected $fillable=['QuizID','StudentID','StartDateTime','StopDateTime'];
  public $timestamps = false;

  public function Test()
      {
          return $this->belongsTo(Test::class,'TestID','TestID');
      }

    

}

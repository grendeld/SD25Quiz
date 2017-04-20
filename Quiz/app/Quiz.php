<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
  protected $primaryKey = 'QuizID';
  protected $fillable=['Description','ModuleID','Active'];
  public $timestamps = false;

  public function Module()
      {
          return $this->belongsTo(Module::class,'ModuleID','ModuleID');
      }




}

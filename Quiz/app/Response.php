<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
  protected $primaryKey = 'ResponseID';
  protected $fillable=['TestID','StudentID','StartDateTime','StopDateTime'];
  public $timestamps = false;

  public function Test()
      {
          return $this->belongsTo(Test::class,'TestID','TestID');
      }

    

}

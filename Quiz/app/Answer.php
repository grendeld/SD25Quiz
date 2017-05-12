<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
  protected $primaryKey = 'AnswerID';
  protected $fillable=['QuestionID','Answer'];
  public $timestamps = false;

  public function Question()
      {
          return $this->belongsTo(Question::class,'QuestionID','QuestionID');
      }
// public function CorrectAnswer()
//       {
//         return $this->belongsTo('App\Question', 'CorrectAnswer','AnswerID','QuestionID');
//       }




}

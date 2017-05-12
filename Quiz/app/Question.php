<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  protected $primaryKey = 'QuestionID';
<<<<<<< Updated upstream
  protected $fillable=['Question','Link','QuizID','Active'];
=======
  protected $fillable=['Question','Link','CorrectAnswerID','QuizID','Active'];
>>>>>>> Stashed changes
  public $timestamps = false;

  public function Quiz()
      {
          return $this->belongsTo(Quiz::class,'QuizID','QuizID');
      }
  public function Answers()
          {
          return $this->hasMany('App\Answer','QuestionID','QuestionID');
          }
    public function CorrectAnswer(){
        return $this->belongsTo('App\Answer','CorrectAnswerID','AnswerID');
    }

public function CorrectAnswer()
{
  return $this->hasOne('App\Answer', 'CorrectAnswer');
}

}

// $table->increments('QuestionID');
// $table->string('Question');
// $table->string('Link')->nullable();
// $table->integer('CorrectAnswer')->unsigned();
// $table->integer('QuizID')->unsigned();
// $table->foreign('QuizID')->references('QuizID')->on('quizzes');
// $table->string('Active',3)->default('Yes');

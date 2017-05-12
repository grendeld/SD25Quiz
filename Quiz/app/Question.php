<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  protected $primaryKey = 'QuestionID';

  protected $fillable=['Question','Link','CorrectAnswerID','QuizID','Active'];

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

}

// $table->increments('QuestionID');
// $table->string('Question');
// $table->string('Link')->nullable();
// $table->integer('CorrectAnswer')->unsigned();
// $table->integer('QuizID')->unsigned();
// $table->foreign('QuizID')->references('QuizID')->on('quizzes');
// $table->string('Active',3)->default('Yes');

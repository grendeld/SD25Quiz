<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('questions', function (Blueprint $table) {
          $table->increments('QuestionID');
          $table->string('Question');
          $table->string('Link')->nullable();
          //Should be another table
          $table->integer('CorrectAnswerID')->unsigned()->references('AnswerID')->on('answers')->nullable();
          $table->integer('QuizID')->unsigned();
          $table->foreign('QuizID')->references('QuizID')->on('quizzes');
          $table->string('Active',3)->default('Yes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorrectAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('CorrectAnswer', function (Blueprint $table) {

          $table->integer('QuestionID')->unsigned();
          $table->foreign('QuestionID')->references('QuestionID')->on('questions');
          $table->integer('AnswerID')->unsigned();
          $table->foreign('AnswerID')->references('AnswerID')->on('answers');

    });
  }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CorrectAnswer');
    }
}

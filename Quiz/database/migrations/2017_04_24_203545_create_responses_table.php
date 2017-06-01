<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->increments('ResponseID');
            $table->integer('TestID')->unsigned();
            $table->foreign('TestID')->references('QuestionID')->on('questions');
            $table->integer('QuestionID')->unsigned();
            $table->foreign('QuestionID')->references('QuestionID')->on('questions');
            $table->integer('AnswerID')->unsigned();
            $table->foreign('AnswerID')->references('AnswerID')->on('answers');
            $table->integer('Correct');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responses');
    }
}

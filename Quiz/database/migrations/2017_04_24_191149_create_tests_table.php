<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('tests', function (Blueprint $table) {
          $table->increments('TestID');
          $table->integer('QuizID')->unsigned();
          $table->foreign('QuizID')->references('QuizID')->on('quizzes');
          $table->integer('StudentID')->unsigned();
          $table->foreign('StudentID')->references('StudentID')->on('students');
          $table->DateTime('StartDateTime');
          $table->DateTime('StopDateTime')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests');
    }
}

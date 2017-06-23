<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('quizzes', function (Blueprint $table) {
          $table->increments('QuizID');
          $table->string('QuizName');
          $table->string('Description')->default('No description');
          $table->integer('ModuleID')->unsigned();
          $table->foreign('ModuleID')->references('ModuleID')->on('modules');
          $table->string('Active')->default('No');
          $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('quizzes');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->increments('InstructorID')->unique();
            $table->string('FirstName');
            $table->string('LastName');
            $table->integer('id')->unsigned()->nullable();
            $table->foreign('id')->references('id')->on('users');
          });

            Schema::table('quizzes', function ($table) {
              $table->integer('InstructorID')->unsigned();
              $table->foreign('InstructorID')->references('InstructorID')->on('instructors');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      //Schema::dropIfExists('students');
      Schema::dropIfExists('questions');
      Schema::dropIfExists('quizzes');
        Schema::dropIfExists('instructors');

        //schema::dropIfExists('users');
    }
}

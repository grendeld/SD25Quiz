<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorIntakeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

      public function up()
      {
          Schema::create('InstructorIntakes', function (Blueprint $table) {
              $table->integer('InstructorID')->unsigned();
              $table->foreign('InstructorID')->references('InstructorID')->on('instructors');
              $table->integer('IntakeID')->unsigned();
              $table->foreign('IntakeID')->references('IntakeID')->on('intakes');
              $table->unique(['InstructorID','IntakeID']);
          });
      }

      /**
       * Reverse the migrations.
       *
       * @return void
       */
      public function down()
      {
          Schema::dropIfExists('InstructorIntakes');
      }

}

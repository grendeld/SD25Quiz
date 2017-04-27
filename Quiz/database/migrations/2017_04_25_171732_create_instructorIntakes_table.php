<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorIntakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructorIntakes', function (Blueprint $table) {
            $table->integer('IntakeID')->unsigned();
            $table->integer('InstructorID')->unsigned();
            $table->foreign('IntakeID')->references('IntakeID')->on('intakes');
            $table->foreign('InstructorID')->references('InstructorID')->on('instructors');;
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instructorIntakes');
    }
}

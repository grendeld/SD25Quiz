<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intakes', function (Blueprint $table) {
            $table->increments('IntakeID');
            $table->string('IntakeName');
            $table->integer('ProgramID')->unsigned();
            $table->integer('InstructorID')->unsigned();
            $table->foreign('ProgramID')->references('ProgramID')->on('programs');
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
        Schema::dropIfExists('intakes');
    }
}

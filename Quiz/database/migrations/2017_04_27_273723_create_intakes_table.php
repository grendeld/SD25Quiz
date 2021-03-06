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
            $table->foreign('ProgramID')->references('ProgramID')->on('programs');


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
        Schema::dropIfExists('students');
        Schema::dropIfExists('InstructorIntakes');
        Schema::dropIfExists('intakes');
        
    }
}

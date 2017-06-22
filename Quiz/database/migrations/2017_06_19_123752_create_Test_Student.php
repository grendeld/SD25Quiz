<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('TestStudent', function (Blueprint $table) {
              $table->integer('TestID')->unsigned();
              $table->foreign('TestID')->references('TestID')->on('tests');
              $table->integer('StudentID')->unsigned();
              $table->foreign('StudentID')->references('StudentID')->on('students');
              $table->unique(['TestID','StudentID']);
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('TestStudent');
    }
}

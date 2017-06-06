<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('StudentID')->unique();
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('Photo')->default('NoPhoto.gif');
            $table->integer('IntakeID')->unsigned();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
           // $table->foreign('IntakeID')->references('IntakeID')->on('intakes');
            $table->integer('id')->unsigned()->nullable();
            $table->foreign('id')->references('id')->on('users');

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
    }
}

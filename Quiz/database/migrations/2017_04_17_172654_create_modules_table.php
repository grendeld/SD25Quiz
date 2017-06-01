<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('ModuleID');
            $table->string('ModuleName');
            $table->integer('ProgramID')->unsigned();
            $table->foreign('ProgramID')->references('ProgramID')->on('programs');
<<<<<<< HEAD
            $table->string('Active')->default('Yes');
=======
            $table->string('Active');
>>>>>>> 05b55c3a9c8be72a0d51d24f723c78aaddd62cb8
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}

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
            $table->string('Active')->default('Yes');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('modules');
    }
}

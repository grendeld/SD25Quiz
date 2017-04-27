<?php

use Illuminate\Database\Seeder;

class InstructorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('instructors')->insert([
         'FirstName'=>'Doug',
         'LastName'=>'Jackson', 
      ]);
      DB::table('instructors')->insert([
         'FirstName'=>'Brian',
         'LastName'=>'Westbrook', 
      ]);
    }
}

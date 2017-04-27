<?php

use Illuminate\Database\Seeder;

class ProgramsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('programs')->insert([
          'ProgramName' => 'Software Development',
          'ProgramType' => 'Technology',
          'Active' => 'Yes'
      ]);
      DB::table('programs')->insert([
          'ProgramName' => 'Business Administration',
          'ProgramType' => 'Business',
          'Active' => 'Yes'
      ]);
    }
}

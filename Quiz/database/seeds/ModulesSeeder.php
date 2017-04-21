<?php

use Illuminate\Database\Seeder;

class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('modules')->insert([
          'ModuleName' => 'Module 1 - Intro to Programming Concepts',
          'ProgramID' => '1',
          'Active' => 'Yes'
      ]);
      DB::table('modules')->insert([
          'ModuleName' => 'Module 2 - C# & .NET Framework',
          'ProgramID' => '1',
          'Active' => 'Yes'
      ]);
      DB::table('modules')->insert([
          'ModuleName' => 'Module 3 - Databases',
          'ProgramID' => '1',
          'Active' => 'Yes'
      ]);
      DB::table('modules')->insert([
          'ModuleName' => 'Accounting',
          'ProgramID' => '2',
          'Active' => 'Yes'
      ]);
      DB::table('modules')->insert([
          'ModuleName' => 'Intro to Computers',
          'ProgramID' => '2',
          'Active' => 'Yes'
      ]);
    }
}

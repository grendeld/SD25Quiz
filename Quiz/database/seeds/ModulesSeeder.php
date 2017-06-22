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
          'ModuleName' => 'Databases.Introduction.',
          'ProgramID' => '1',
          'Active' => 'Yes'
      ]);
      DB::table('modules')->insert([
          'ModuleName' => 'JavaScript.',
          'ProgramID' => '1',
          'Active' => 'Yes'
      ]);
      DB::table('modules')->insert([
          'ModuleName' => 'XML',
          'ProgramID' => '1',
          'Active' => 'Yes'
      ]);
      DB::table('modules')->insert([
          'ModuleName' => 'Accounting',
          'ProgramID' => '2',
          'Active' => 'Yes'
      ]);
    }
}

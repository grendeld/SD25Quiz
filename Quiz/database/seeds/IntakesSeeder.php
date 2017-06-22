<?php

use Illuminate\Database\Seeder;

class IntakesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('intakes')->insert([

          'IntakeName' => 'SD25',
          'ProgramID' => '1'
      ]);
      DB::table('intakes')->insert([

        'IntakeName' => 'SD26',
        'ProgramID' => '1'
    ]);
      DB::table('intakes')->insert([     
          'IntakeName' => 'BA25',
          'ProgramID' => '2',
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('students')->insert([
          'FirstName' => 'Jane',
          'LastName' => 'Doe',
          'Photo' => '1.jpg',
          'IntakeID'=>'SD25'
      ]);
      DB::table('students')->insert([
          'FirstName' => 'David',
          'LastName' => 'Smith',
          'Photo' => '2.jpg',
          'IntakeID'=>'SD26'
      ]);
      DB::table('students')->insert([
          'FirstName' => 'Allice',
          'LastName' => 'Xu',
          'Photo' => '3.jpg',
          'IntakeID'=>'SD24'
      ]);
    }
}

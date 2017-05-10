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
          'IntakeID'=>'1'
      ]);
      DB::table('students')->insert([
            'FirstName' => 'Fred',
            'LastName' => 'Tompson',
            'Photo' => '1.jpg',
            'IntakeID'=>'1'
        ]);
      DB::table('students')->insert([
          'FirstName' => 'David',
          'LastName' => 'Smith',
          'Photo' => '2.jpg',
          'IntakeID'=>'2'
      ]);
      DB::table('students')->insert([
          'FirstName' => 'Allice',
          'LastName' => 'Xu',
          'Photo' => '3.jpg',
          'IntakeID'=>'2'
      ]);
      DB::table('students')->insert([
          'FirstName' => 'Randy',
          'LastName' => 'Lang',
          'Photo' => '3.jpg',
          'IntakeID'=>'2'
      ]);
    }
}

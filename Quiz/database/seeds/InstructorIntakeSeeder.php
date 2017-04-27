<?php

use Illuminate\Database\Seeder;

class InstructorIntakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instructorIntakes')->insert([
            'IntakeID'=>'1',
            'InstructorID'=>'1',
]);
DB::table('instructorIntakes')->insert([
    'IntakeID'=>'2',
    'InstructorID'=>'1',
]);
DB::table('instructorIntakes')->insert([
    'IntakeID'=>'3',
   'InstructorID'=>'2',
]);
    }
}

<?php

use Illuminate\Database\Seeder;

class TestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('tests')->insert([
            'QuizID' => '1',
            'StudentID'=>'1',
            'StartDateTime' => '2017-03-14 5:00:00',
            'StopDateTime' =>'2017-03-14 8:35:00'
        ]);
    }
}

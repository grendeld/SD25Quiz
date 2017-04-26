<?php

use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('quizzes')->insert([
          'ModuleID' => '1',
          'Description' => 'Quiz on Intro to Programming Concepts',
          'Active' => 'Yes'
      ]);
      DB::table('quizzes')->insert([
          'ModuleID' => '2',
          'Description' => 'Quiz on C# & .NET Framework',
          'Active' => 'Yes'
      ]);
      DB::table('quizzes')->insert([
          'ModuleID' => '3',
          'Description' => 'Quiz on Databases',
          'Active' => 'Yes'
      ]);
      DB::table('quizzes')->insert([
          'ModuleID' => '4',
          'Description' => 'Quiz on Accounting',
          'Active' => 'Yes'
      ]);
      DB::table('quizzes')->insert([
          'ModuleID' => '5',
          'Description' => 'Quiz on Intro to computers',
          'Active' => 'Yes'
      ]);

    }
}

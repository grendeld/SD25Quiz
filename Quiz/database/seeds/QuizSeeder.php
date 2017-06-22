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
          'QuizName' =>'Quiz on Intro to Programming Concepts',
          'Description' => 'Quiz on Intro to Programming Concepts',
          'InstructorID' =>'1',
          'Active' => 'Yes'
      ]);
      DB::table('quizzes')->insert([
          'ModuleID' => '2',
          'QuizName' =>'Quiz on C# & .NET Framework',
          'Description' => 'Quiz on C# & .NET Framework',
          'InstructorID' =>'1',
          'Active' => 'Yes'
      ]);
      DB::table('quizzes')->insert([
          'ModuleID' => '3',
          'QuizName' =>'Quiz on Databases',
          'Description' => 'Quiz on Databases',
          'InstructorID' =>'1',
          'Active' => 'Yes'
      ]);
      DB::table('quizzes')->insert([
          'ModuleID' => '4',
          'QuizName' =>'Quiz on Accounting',
          'Description' => 'Quiz on Accounting',
          'InstructorID' =>'2',
          'Active' => 'Yes'
      ]);

    }
}

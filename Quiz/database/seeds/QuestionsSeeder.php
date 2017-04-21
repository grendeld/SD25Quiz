<?php

use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('questions')->insert([
            'Question' => 'Question 1 for Quiz 1 Answer 1',
            'CorrectAnswer' => 1,
            'QuizID' => '1',
          ]);
        DB::table('questions')->insert([
             'Question' => 'Question 2 for Quiz 1 Answer 2',
             'CorrectAnswer' => 2,
             'QuizID' => '1',
          ]);
        DB::table('questions')->insert([
              'Question' => 'Question 3 for Quiz 1 Answer 1',
              'CorrectAnswer' => 1,
              'QuizID' => '1',
            ]);
        DB::table('questions')->insert([
               'Question' => 'Question 4 for Quiz 1 Answer 2',
               'CorrectAnswer' => 2,
               'QuizID' => '1',
            ]);

            DB::table('questions')->insert([
                'Question' => 'Question 1 for Quiz 2 Answer 1',
                'CorrectAnswer' => 1,
                'QuizID' => '2',
              ]);
            DB::table('questions')->insert([
                 'Question' => 'Question 2 for Quiz 2 Answer 2',
                 'CorrectAnswer' => 2,
                 'QuizID' => '2',
              ]);
            DB::table('questions')->insert([
                  'Question' => 'Question 3 for Quiz 2 Answer 1',
                  'CorrectAnswer' => 1,
                  'QuizID' => '2',
                ]);
            DB::table('questions')->insert([
                   'Question' => 'Question 4 for Quiz 2 Answer 2',
                   'CorrectAnswer' => 2,
                   'QuizID' => '2',
                ]);


    }
}

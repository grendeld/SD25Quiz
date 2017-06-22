<?php

use Illuminate\Database\Seeder;

class AnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('answers')->insert([
          'QuestionID' => '1',
          'Answer'=>'Answer 1 to Question 1'
          ]);
      DB::table('answers')->insert([
          'QuestionID' => '1',
          'Answer'=>'Answer 2 to Question 1'
          ]);
      DB::table('answers')->insert([
          'QuestionID' => '1',
          'Answer'=>'Answer 3 to Question 1'
              ]);
      DB::table('answers')->insert([
          'QuestionID' => '1',
          'Answer'=>'Answer 4 to Question 1'
              ]);

              DB::table('answers')->insert([
                  'QuestionID' => '2',
                  'Answer'=>'Answer 1 to Question 2'
                  ]);
              DB::table('answers')->insert([
                  'QuestionID' => '2',
                  'Answer'=>'Answer 2 to Question 2'
                  ]);
              DB::table('answers')->insert([
                  'QuestionID' => '2',
                  'Answer'=>'Answer 3 to Question 2'
                      ]);
              DB::table('answers')->insert([
                  'QuestionID' => '2',
                  'Answer'=>'Answer 4 to Question 2'
                      ]);

                      DB::table('answers')->insert([
                          'QuestionID' => '3',
                          'Answer'=>'Answer 1 to Question 3'
                          ]);
                      DB::table('answers')->insert([
                          'QuestionID' => '3',
                          'Answer'=>'Answer 2 to Question 3'
                          ]);
                      DB::table('answers')->insert([
                          'QuestionID' => '3',
                          'Answer'=>'Answer 3 to Question 3'
                              ]);
                      DB::table('answers')->insert([
                          'QuestionID' => '3',
                          'Answer'=>'Answer 4 to Question 3'
                              ]);

                              DB::table('answers')->insert([
                                  'QuestionID' => '4',
                                  'Answer'=>'Answer 1 to Question 4'
                                  ]);
                              DB::table('answers')->insert([
                                  'QuestionID' => '4',
                                  'Answer'=>'Answer 2 to Question 4'
                                  ]);
                              DB::table('answers')->insert([
                                  'QuestionID' => '4',
                                  'Answer'=>'Answer 3 to Question 4'
                                      ]);
                              DB::table('answers')->insert([
                                  'QuestionID' => '4',
                                  'Answer'=>'Answer 4 to Question 4'
                                      ]);


    }
}

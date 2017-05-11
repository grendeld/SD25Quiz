<?php

use Illuminate\Database\Seeder;
use App\Question;
use App\Answer;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::create([
            'Question' => 'Quiz#1 Question1 Correct answer B modified',
            'QuizID' => 1,
            'Active' => 'Yes'
        ])->answers()->saveMany([
            new Answer(['Answer' => 'A modified']),
            new Answer(['Answer' => 'BBB']),
            new Answer(['Answer' => 'C modified']),
            new Answer(['Answer' => 'DDD'])    
        ]);
        Question::create([
            'Question' => 'Quiz1 Question2 Correct Answer C',
            'QuizID' => 1,
            'Active' => 'Yes'
        ])->answers()->saveMany([
            new Answer(['Answer' => 'AAA1-2']),
            new Answer(['Answer' => 'BBB1-2']),
            new Answer(['Answer' => 'CCC Modified']),
            new Answer(['Answer' => 'DDD1-2 Modified'])    
        ]);
        Question::create([
            'Question' => 'Question?',
            'QuizID' => 1,
            'Active' => 'Yes'
        ])->answers()->saveMany([
            new Answer(['Answer' => 'A modified']),
            new Answer(['Answer' => 'BBB']),
            new Answer(['Answer' => 'C modified']),
            new Answer(['Answer' => 'DDD'])    
        ]);
        Question::create([
            'Question' => 'Another question',
            'QuizID' => 1,
            'Active' => 'Yes'
        ])->answers()->saveMany([
            new Answer(['Answer' => 'A modified']),
            new Answer(['Answer' => 'BBB']),
            new Answer(['Answer' => 'C modified']),
            new Answer(['Answer' => 'DDD'])    
        ]);
        Question::create([
            'Question' => 'Quiz#1 Question1 Correct answer B modified',
            'QuizID' => 1,
            'Active' => 'Yes'
        ])->answers()->saveMany([
            new Answer(['Answer' => 'A modified']),
            new Answer(['Answer' => 'BBB']),
            new Answer(['Answer' => 'C modified']),
            new Answer(['Answer' => 'DDD'])    
        ]);
        Question::create([
            'Question' => 'Quiz#1 Question1 Correct answer B modified',
            'QuizID' => 1,
            'Active' => 'Yes'
        ])->answers()->saveMany([
            new Answer(['Answer' => 'A modified']),
            new Answer(['Answer' => 'BBB']),
            new Answer(['Answer' => 'C modified']),
            new Answer(['Answer' => 'DDD'])    
        ]);
    }
}

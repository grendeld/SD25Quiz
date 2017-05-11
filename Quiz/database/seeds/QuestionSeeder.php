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
        Question::create([
            'Question' =>'Canada has three territories and how many provinces?',
            'QuizID' => 2,
            'Active' => 'Yes'
        ])->answers()->saveMany([
            new Answer(['Answer'=>'13']),
            new Answer(['Answer'=>'10']),
            new Answer(['Answer'=>'3']),
            new Answer(['Answer'=>'5'])
        ]);
        Question::create([
            'Question' =>'What does the word ‘Inuit’ means ?',
            'QuizID' => 2,
            'Active' => 'Yes'
        ])->answers()->saveMany([
            new Answer(['Answer'=>'"Eskimo" in Inuktitut language']),
            new Answer(['Answer'=>'"Home" in English language']),
            new Answer(['Answer'=>'“The people” in Inuktikut language']),
            new Answer(['Answer'=>'“The Arctic” Land in Inuktitut language'])
        ]);
        Question::create([
            'Question' =>'Whos is the Queen’s representative in Canada?',
            'QuizID' => 2,
            'Active' => 'Yes'
        ])->answers()->saveMany([
            new Answer(['Answer'=>'Premier of each provincePremier of each province']),
            new Answer(['Answer'=>'Prime Minister of Canada']),
            new Answer(['Answer'=>'Her Majesty Queen Elisabeth II']),
            new Answer(['Answer'=>'Governor General of Canada'])
        ]);
        Question::create([
            'Question' =>'Which province has the most valuable forest industry in Canada:',
            'QuizID' => 2,
            'Active' => 'Yes'
        ])->answers()->saveMany([
            new Answer(['Answer'=>'Alberta']),
            new Answer(['Answer'=>'Quebec']),
            new Answer(['Answer'=>'British-Columbia']),
            new Answer(['Answer'=>'Ontario'])
        ]);
        Question::create([
            'Question' =>'What are the three main types of industry in Canada?',
            'QuizID' => 2,
            'Active' => 'Yes'
        ])->answers()->saveMany([
            new Answer(['Answer'=>'Oil, tourism and manufacturing.']),
            new Answer(['Answer'=>'Natural resources, manufacturing and services.']),
            new Answer(['Answer'=>'Fishery, tourism and services.']),
            new Answer(['Answer'=>'Mining, services and manufacturing.'])
        ]);
        Question::create([
            'Question' =>'Which legal documents protect the rights of Canadians with regards to the official language?',
            'QuizID' => 2,
            'Active' => 'Yes'
        ])->answers()->saveMany([
            new Answer(['Answer'=>'Canadian Consitution.']),
            new Answer(['Answer'=>'British Charter of Rights and Freedoms.']),
            new Answer(['Answer'=>'Canadian Constitution and Official Language Act.']),
            new Answer(['Answer'=>'Official English Act.'])
        ]);
        Question::create([
            'Question' =>'Which was the last province to join Canada?',
            'QuizID' => 2,
            'Active' => 'Yes'
        ])->answers()->saveMany([
            new Answer(['Answer'=>'Manitoba']),
            new Answer(['Answer'=>'Yukon']),
            new Answer(['Answer'=>'Prince Edward Island']),
            new Answer(['Answer'=>'Newfoundland'])
        ]);
        Question::create([
            'Question' =>'What is the most popular spectator sport of Canada?',
            'QuizID' => 2,
            'Active' => 'Yes'
        ])->answers()->saveMany([
            new Answer(['Answer'=>'Soccer']),
            new Answer(['Answer'=>'Hockey']),
            new Answer(['Answer'=>'Canadian football']),
            new Answer(['Answer'=>'Basketball'])
            
        ]);
        Question::create([
            'Question' =>'When is Remembrance Day in Canada?',
            'QuizID' => 2,
            'Active' => 'Yes'
        ])->answers()->saveMany([
            new Answer(['Answer'=>'November 11th every year.']),
            new Answer(['Answer'=>'The second Monday of October.']),
            new Answer(['Answer'=>'The first Monday of November.']),
            new Answer(['Answer'=>'December 12th every year.'])
        ]);
        Question::create([
            'Question' =>'Which of the followings are the responsibilities of Canadian citizenship?',
            'QuizID' => 2,
            'Active' => 'Yes'
        ])->answers()->saveMany([
            new Answer(['Answer'=>'Obeying the law, getting a job in the government and serving in Canadian Forces.']),
            new Answer(['Answer'=>'Serving in an army, obeying the law and taking responsibility for oneself and one’s family.']),
            new Answer(['Answer'=>'Protecting our environment, buying a house and voting in elections.']),
            new Answer(['Answer'=>'Obeying the law, serving on a jury, voting in elections and helping others in the community.'])
        ]);
    }
}

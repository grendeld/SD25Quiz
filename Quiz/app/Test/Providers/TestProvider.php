<?php
namespace App\Test\Providers;
use DB;
use App\Quiz;
//use App\Test\Providers\Question;
/*
    <Purpose>
    A class to manage the test/quiz questions,
    possible answers and the students responses to be stored in the 
    Session
    </Purpose>
*/

class TestProvider{
    /*
        <Purpose> 
            Gets the answers and questions from the database
            and sets them as class properties
        </Purpose>
    */
    function __construct(int $quizId){
        $quiz = Quiz::find($quizId);
        $question = $quiz->questions;
        $this->questions = array();
        foreach($question as $question)
        {
            $this->questions[] = new Question($question);
        }
    }
    //array of question classes
    
    
}
?>
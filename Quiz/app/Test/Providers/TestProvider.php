<?php
namespace App\Test\Providers;
use App\Quiz;
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
            Students get exact Same questions but in different order
        </Purpose>
    */
    function __construct(int $quizId,bool $random = false){
        $quiz = Quiz::find($quizId);
        $question = $quiz->questions;
        if($random)
            $question = $question->shuffle();
        $this->questions = array();
        foreach($question as $question)
            $this->questions[] = new Question($question);
            
    }
    
    
}
?>
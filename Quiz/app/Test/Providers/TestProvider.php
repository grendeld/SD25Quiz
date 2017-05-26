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
        $this->currentQuestion = 0;
        $quiz = Quiz::find($quizId);
        $question = $quiz->questions;
        if($random)
            $question = $question->shuffle();
        $this->questions = array();
        foreach($question as $question)
            $this->questions[] = new Question($question);
            
    }
    /*
        <Purpose> 
            Gets the question at that position from the
            questions array
        </Purpose>
    */
    function get(int $position){
        if(isset($this->questions[$position])){
             $this->currentQuestion = $position;
        return $this->questions[$position];
        }
       return false;
    }
    /*
        <Purpose> 
            Gets the next unanswered Question
        </Purpose>
    */
    function next(){
        foreach($this->questions as $key => $question){
            if($question->response == null){
                $this->currentQuestion = $key;
                 return $question;
            }
               
        }      
    }
    /*
        <Purpose> 
            Checks if all questions are answered
        </Purpose>
    */
    function isComplete(){
        foreach($this->questions as $question)
        {
            if($question->response == null)
                return false;
        }
        return true;
    }
     /*
        <Purpose> 
            Answers the curent question with the answerId
        </Purpose>
    */
    function answer(int $answerID){
        if(isset($this->questions[$this->currentQuestion]->options[$answerID])){
            $this->questions[$this->currentQuestion]->response = $answerID;
            return true;
        }
        return false;
    }
    function isAnswered(int $pos){
        //dd($pos);
        //if(isset($this->questions[$pos]->reponse))
          //  dd(isset($this->questions[$pos]->reponse));
        return($this->questions[$pos]->response != null);
    }
    function questions(){
        $q = array();
        foreach($this->questions as $question){
            $q[] = $question->question;
        }
        return $q;
    }
    function getCurrentQuestionP(){
        return $this->currentQuestion;
    }
    public $questions;
    private $currentQuestion;
    
    
}
?>
<?php
namespace App\Test\Providers;
use App\Quiz;
use App\Test;
use App\Response;
use Auth;
/*
    <Purpose>
    A class to manage the test/quiz questions,
    possible answers and the students responses to be stored in the
    Session
    </Purpose>
*/

class TestProvider{
    public $questions;
    private $currentQuestion;
    private $testId;
    /*
        <Purpose>
            Gets the answers and questions from the database
            and sets them as class properties
            Students get exact Same questions but in different order
        </Purpose>
    */
    static function create(int $id=null, bool $random = false){
      if(session()->has('testProvider')){
          $provider = session()->get("testProvider");
      }
      else{
          $provider = new TestProvider($id,$random);
      }
        session(['testProvider'=>$provider]);
      return $provider;
    }
    
    /* <Purpose>
        A private constructor that gets called by the static function create
    
        </Purpose>
    
    */

    private function __construct(int $testId,bool $random = false){
        $this->currentQuestion = 0;
        $this->testId = $testId;
        $quiz = Test::find($testId)->Quiz;
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
            returns the first Question if there isn't any
        </Purpose>
    */
    function next(){
        foreach($this->questions as $key => $question){
            if($question->response == null && $key > $this->currentQuestion){
                $this->currentQuestion = $key;
                 return $question;
            }
        }
        $this->currentQuestion = 0;
        return $this->questions[0];
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
            Save the Test once it is completed
        </Purpose>
    */
    
    function save(){
        if($this->isComplete()){
            $test = Test::find($this->testId);
            foreach($this->questions as $question){
                $test->Responses()->save(new Response(['QuestionID'=> $question->id, 'AnswerID' =>$question->response, 'Correct' => 1]));
            }
            session()->forget('testProvider');
            return true;
            
        }
        else{
            return false;
        }
    }
     /*
        <Purpose>
            Answers the curent question with the answerId
        </Purpose>
    */
    function answer(int $answerID = null){
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
    
}
?>

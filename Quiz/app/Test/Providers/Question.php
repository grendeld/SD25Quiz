<?php
namespace App\Test\Providers;
class Question{
    /*
        <Purpose>
            A class for the Questions for the test
        </Purpose>
    */
    function __construct($question){
        $this->id = $question->QuestionID;
        $this->question = $question->Question;
        $this->options = $question->answers->shuffle()->pluck('Answer','AnswerID')->toArray();
    }
    public $response;
    private $id;
    
}
?>
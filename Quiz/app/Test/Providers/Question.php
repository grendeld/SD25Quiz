<?php
namespace App\Test\Providers;
class Question{
    /**
    */
    function __construct($question){
        $this->question = $question->Question;
        $this->options = array();
        foreach($question->answers as $answer)
            $this->options[] = $answer->Answer;
    }
    //student response
    public $response;
}
?>
<?php
namespace App\Test\Providers;
class Question{
    /**
    */
    function __construct(string $question, array $options){
        $this->question = $question;
        $this->options = $options;
    }
    //student response
    public $response;
}
?>
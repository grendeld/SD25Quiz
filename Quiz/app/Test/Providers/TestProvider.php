<?php
namespace App\Test\Providers;

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
    function __contruct(int $testId){
        
    }
    //array of question classes
    public $questions;
    
    
}
?>
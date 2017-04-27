<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use App\Module;
use App\Question;
use App\Answer;
use App\Test;
use DB;

class QuizController extends Controller
{
    public function showAll()
    {
$quizzes=DB::table('quizzes')
              ->join('modules','quizzes.ModuleID','=','modules.ModuleID')
              ->join('programs','modules.ProgramID','=','programs.ProgramID')
              ->select('quizzes.*','modules.ModuleID','modules.ModuleName','programs.ProgramName')
              ->get();

$modules=Module::all();
$tests= DB::table('tests')
                ->join('quizzes', 'tests.QuizID', '=', 'quizzes.QuizID')
                ->select('tests.*', 'quizzes.QuizName')
                ->get();
      return view('quizzes',compact('quizzes', 'tests','modules'));
    }

    public function showOne($q)
    {
      $quiz=Quiz::find($q);
      $questions=Question::where('QuizID','=',$q)->get();
      $answers=DB::table('answers')
                ->join('questions', 'answers.QuestionID', '=', 'questions.QuestionID')
                ->select('answers.*','questions.CorrectAnswer')
                ->where('questions.QuizID','=', $q)
                ->get();
      return view('quiz',compact('quiz','questions','answers'));

    }

    public function saveTemplate (Request $request)
    {
    $quiz= new Quiz;
    $quiz->QuizName = $request->QuizName;
    $quiz->Description = $request ->Description;
    $quiz->ModuleID = $request->ModuleID;
    $quiz->Active = "No";
    $quiz->save($request->all());

    return back();
    }


    public function newQA (Request $request, $quizID)
    {
      // $question = new Question;
      // $question->QuizID = $quizID;
      // $question->Question = $request->Question;
      // $question->CorrectAnswer = 0;
      $question=Question::create(array('QuizID'=>$quizID, 'Question' => $request->Question, 'CorrectAnswer'=>0));

      //$options=[$request->Option1,$request->Option2,$request->Option3,$request->Option4];

      //foreach ($options as $o)
    //  {
        //$a = new Answer;
      //  $a->QuestionID=$id;
      //  $a->Answer=$o
      //  $a->save();
      //}

      $option1=Answer::create(array('QuestionID'=>$question->QuestionID, 'Answer'=>$request->Option1));
      $option2=Answer::create(array('QuestionID'=>$question->QuestionID, 'Answer'=>$request->Option2));
      $option3=Answer::create(array('QuestionID'=>$question->QuestionID, 'Answer'=>$request->Option3));
      $option4=Answer::create(array('QuestionID'=>$question->QuestionID, 'Answer'=>$request->Option4));


      switch($request->Correct){
        case 'A':
        $question->CorrectAnswer = $option1->AnswerID;
        break;
        case 'B':
        $question->CorrectAnswer = $option2->AnswerID;
        break;
        case 'C':
        $question->CorrectAnswer = $option3->AnswerID;
        break;
        case 'D':
        $question->CorrectAnswer = $option4->AnswerID;
        break;
      }


      $question->save();

      return back();




     }


}

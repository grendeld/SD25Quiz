<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use App\Question;
use DB;

class QuizController extends Controller
{
    public function showAll()
    {
$quizzes=DB::table('quizzes')
              ->join('modules','quizzes.ModuleID','=','modules.ModuleID')
              ->join('programs','modules.ProgramID','=','programs.ProgramID')
              ->select('quizzes.*','modules.ModuleName','programs.ProgramName')
              ->get();

// $users = DB::table('users')
//             ->join('contacts', 'users.id', '=', 'contacts.user_id')
//             ->join('orders', 'users.id', '=', 'orders.user_id')
//             ->select('users.*', 'contacts.phone', 'orders.price')
//             ->get();
      return view('quizzes',compact('quizzes'));
    }

    public function showOne($q)
    {
      $quiz=Quiz::find($q);
      $questions=Question::where('QuizID','=',$q)->get();
      $answers=DB::table('answers')
                ->join('questions', 'answers.QuestionID', '=', 'questions.QuestionID')
                ->select('answers.*')
                ->where('questions.QuizID','=', $q)
                ->get();
      return view('quiz',compact('quiz','questions','answers'));

    }


}

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
    //$quiz->Description = $request ->Description;
    $quiz->ModuleID = $request->ModuleID;
    $quiz->Active = "No";
    $quiz->save($request->all());

    return back();
    }


public function newQA (Request $request, $quizID)
    {

if ($request->QuestionID =="new") // Create New Question
      {
      $question=Question::create(array('QuizID'=>$quizID, 'Question' => $request->Question, 'CorrectAnswer'=>0));

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
}
else // Edit existing question
{
  $question=Question::find($request->QuestionID);
  $question->Question = $request->Question;

  if ($request->txtCorrectAnswer != ''){ $question->CorrectAnswer = $request->txtCorrectAnswer;}

  $question->save();

  $answer1=Answer::find($request->Option1ID)->update(['Answer' => $request->Option1]);
  $answer2=Answer::find($request->Option2ID)->update(['Answer' => $request->Option2]);
  $answer3=Answer::find($request->Option3ID)->update(['Answer' => $request->Option3]);
  $answer4=Answer::find($request->Option4ID)->update(['Answer' => $request->Option4]);

}
      return back();
     }


public function EditQuiz(Request $request, $quizID)
{
Quiz::find($quizID)->update(['QuizName' => $request->QuizName, 'Description' => $request->Description]);
    return back();
}

public function DeleteQuestion(Question $question)
{
  $questions = $question->answers;
  foreach ($questions as $q) {
    $q->delete();}

  $question->delete();

  return back();
}

public function deleteQuiz(Quiz $quiz)
{
  $quiz->delete();
  return back();


}

public function copyQuiz(Quiz $quiz)
{
  $quizCopy = $quiz->replicate();
  //$quizcopy -> push();
  $newName = $quiz->QuizName."_".($quiz->Version + 1);
  $NewID=$quizCopy->QuizID;
  $quizCopy->QuizName = $newName;
  $quizCopy->Version = ($quiz->Version + 1);
  $quizCopy->ParentQuizID = $quiz->QuizID;
  $quizCopy->save();

  return redirect('/quizzes');
}






}

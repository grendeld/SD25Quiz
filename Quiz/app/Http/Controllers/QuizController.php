<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use App\Module;
use App\Question;
use App\Answer;
use App\Intake;
use App\Program;
use App\Test;
use DB;
use Auth;

class QuizController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:instructors',['except'=>'TakeTest']);
    $this->middleware('auth:students',['only'=>'TakeTest']);

  }

    public function showAll()
    {
$quizzes=DB::table('quizzes')
              ->join('modules','quizzes.ModuleID','=','modules.ModuleID')
              ->join('programs','modules.ProgramID','=','programs.ProgramID')
              ->select('quizzes.*','modules.ModuleID','modules.ModuleName','programs.ProgramName')
              ->get();

//$modules=Module::all();
$tests= DB::table('tests')
                ->join('quizzes', 'tests.QuizID', '=', 'quizzes.QuizID')
                ->select('tests.*', 'quizzes.QuizName')
                ->get();

                $programs = Auth::user()->programs;

                $modules = array();
                 foreach($programs as $p)
                  {
                     foreach($p->modules as $m)
                     {
                     array_push($modules,$m);
                    }
                  }
      return view('instructor.quizzes',compact('quizzes', 'tests','modules'));
    }

    public function showOne($q)
    {
      $quiz=Quiz::find($q);
      $questions=Question::where('QuizID','=',$q)->get();
      $answers=DB::table('answers')
                ->join('questions', 'answers.QuestionID', '=', 'questions.QuestionID')
                ->select('answers.*'/*,'questions.CorrectAnswer'*/)
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
    $quiz->InstructorID = Auth::user()->InstructorID;
    $quiz->save($request->all());

    return back();
    }


public function newQA (Request $request, $quizID)
    {

if ($request->QuestionID =="new") // Create New Question
      {
      $question=Question::create(array('QuizID'=>$quizID, 'Question' => $request->Question));

      foreach($request->Answer as $answer){
          $question->answers()->save(new Answer(['Answer'=>$answer]));
      }
      $question->save();

}
else // Edit existing question
{
  $question=Question::find($request->QuestionID);
  $question->Question = $request->Question;

  foreach($request->Answer as $key => $answer){
      if(isset($question->answers[$key])){

          $question->answers[$key]->update(['Answer'=>$answer]);
      }
      else{
          $question->answers()->save(new Answer(['Answer'=>$answer]));
      }
  }
    for($key++;$key < count($question->answers);$key++){
        $question->answers[$key]->delete();
    }
    $question->save();

}
    if($request->correct){
        $question->correctAnswer()->associate($question->answers[$request->correct])->save();
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

public function IntakeQuiz()
{
  $IntakeID=$_GET['IntakeID'];
  $intake= Intake::find($IntakeID);
   $intakequizzes = DB::table('quizzes')
               ->join('modules','modules.ModuleID','=','quizzes.ModuleID')
               ->select('quizzes.*')
               ->where('modules.ProgramID','=',$intake->ProgramID)
               ->get();
    return $intakequizzes;


}

public function StartTest(Request $request)
{
    //dd($request);
  date_default_timezone_set('America/Winnipeg');
  $test = Test::create(array(
        'QuizID'=>$request->SelectedQuiz,
        'StartDateTime'=>\Carbon\Carbon::now()
                        ));
    foreach($request->CheckedStudent as $s){
        $student = \App\Student::find($s);
        $test->students()->attach($student);
    }
    //dd($request->SelectedQuiz);
  return redirect("test/Instructor/".$request->SelectedQuiz);
}

public function CheckQuiz()
{
  $checkString=$_GET["q"];
  if(strlen($checkString)>0)
  {
    $result=Test::where('StudentID','=', $checkString)
                ->where('StartDateTime','=',date("Y/m/d "))
                ->where('StopDateTime','=', 'null')
      ->get();
  }
    return $result;
}

public function TakeTest(int $id){
    //dd("hey");
        $provider = \App\Test\Providers\TestProvider::create($id);

    return view('student.test',compact('provider'));
}

public function ControlTest(int $id){
 $quiz = Quiz::find($id);
   return view ('instructor.test',compact('quiz'));
 }

}

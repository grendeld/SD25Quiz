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

//     public function showAll()
//     {
// $quizzes=DB::table('quizzes')
//               ->join('modules','quizzes.ModuleID','=','modules.ModuleID')
//               ->join('programs','modules.ProgramID','=','programs.ProgramID')
//               ->select('quizzes.*','modules.ModuleID','modules.ModuleName','programs.ProgramName')
//               ->get();
//
// //$modules=Module::all();
// $tests= DB::table('tests')
//                 ->join('quizzes', 'tests.QuizID', '=', 'quizzes.QuizID')
//                 ->select('tests.*', 'quizzes.QuizName')
//                 ->get();
//
//                 $programs = Auth::user()->programs;
//
//                 $modules = array();
//                  foreach($programs as $p)
//                   {
//                      foreach($p->modules as $m)
//                      {
//                      array_push($modules,$m);
//                     }
//                   }
//       return view('instructor.quizzes',compact('quizzes', 'tests','modules'));
//     }

    public function showOne($q)
    {
      $quiz=Quiz::find($q);
      /*$questions=Question::where('QuizID','=',$q)->get();
      $answers=DB::table('answers')
                ->join('questions', 'answers.QuestionID', '=', 'questions.QuestionID')
                ->select('answers.*'/*,'questions.CorrectAnswer')
                ->where('questions.QuizID','=', $q)
                ->get();*/
      return view('instructor.quiz',compact('quiz'));

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
//dd($request);
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
    if(isset($request->correct)){
        $question->correctAnswer()->associate($question->answers[$request->correct])->save();
    }
      return back();
     }


public function EditQuiz(Request $request, $quizID)
{
  //dd($request);
Quiz::find($quizID)->update(['QuizName' => $request->QuizName,
                          'Description' => $request->Description]);
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
  $questions_count = $quiz->Questions->count();
  $tests_count = $quiz->Tests->count();
  //dd($tests);

  if ($tests_count > 0)
  {
    $quiz-> update(['Active'=>'No']);
  }
  else
  {
    if ($questions_count > 0){
      foreach($quiz->questions as $question){
        foreach ($question->answers as $answer) {
          $answer->delete();
        }
        $question->delete();
      }
     }
    $quiz->delete();
  }

  return back();
}

public function copyQuiz(Quiz $quiz)
{
  $quizCopy = $quiz->replicate();
  $newName = $quiz->QuizName."_".($quiz->Version + 1);
  $NewID=$quizCopy->QuizID;
  $quizCopy->QuizName = $newName;
  $quiz->update(['Version' => $quiz->Version ++ ]);
  $quizCopy->ParentQuizID = $quiz->QuizID;
  $quizCopy->save();

  foreach($quiz->questions as $q)
  {$qCopy = $q->replicate();
    $qCopy->QuizID = $quizCopy->QuizID;
    $qCopy->save();
  foreach($q->answers as $a)
  {$aCopy = $a->replicate();
    $aCopy->QuestionID = $qCopy->QuestionID;
    $aCopy->save();
    if($q->CorrectAnswerID == $a->AnswerID)
    {$qCopy->update(['CorrectAnswerID' => $aCopy->AnswerID]);}

  }
  }

  return redirect('/quizzes');
}

public function IntakeQuiz()
{
  if(isset($_GET['IntakeID']))
  {
  $IntakeID=$_GET['IntakeID'];
  $intake= Intake::find($IntakeID);
  $intakequizzes = DB::table('quizzes')
               ->join('modules','modules.ModuleID','=','quizzes.ModuleID')
               ->select('quizzes.*')
               ->where('modules.ProgramID','=',$intake->ProgramID)
               ->where('quizzes.Active','=','Yes')
               ->get();

    return $intakequizzes;
  }


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
    session(['currentTest' => $test->TestID]);
  return redirect("test/Instructor");
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
    if(!session()->has('port'))
        {
             $port = \WatchDog\Server::connect($provider->getTestId());
            session(['port' => $port]);
        }
    if(!session()->has('startTime')){
        session(['startTime'=>time()]);
    }

    return view('student.test',compact('provider'));
}

public function ControlTest(){
    if(session()->has('currentTest')){
        if(!session()->has('port'))
        {
             $port = \WatchDog\Server::connect(session('currentTest'),uniqid(),false);
            session(['port' => $port]);
        }

    }

   return view ('instructor.test');
 }

public function toggleActive()
{
  $quiz = Quiz::find($_GET["q"]);
  if ($quiz->Active == "Yes")
  {
    $quiz-> update(['Active'=>'No']);
  }
  else {
    $quiz-> update(['Active'=>'Yes']);
  }
  return $quiz->Active;

}

}

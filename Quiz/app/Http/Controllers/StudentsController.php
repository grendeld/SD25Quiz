<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;
use App\Student;
use App\Intake;
use App\Program;
use App\Module;
use App\Quiz;
use App\Test;

class StudentsController extends Controller
{
  public function __construct()
  {
    //$this->middleware(['auth:students']);
  }

  public function main()
    {   //config(['app.timezone' => 'America/Winnipeg']);
      //dd(Auth::user());
      //Auth::user();
        // $quizId=1;
        //$programs = Program::find($id);
        // $quizzes = Quiz::find($quizId);
        $student = Auth::user();

        $tests = Auth::user()->Tests;
        //$intakes = $student->intake;
        /*$tests = Test::where('StudentID','=', $id)
                     ->where('StartDateTime','<',date("Y/m/d H:i:s"))
                     ->where('StopDateTime','=',null)
          ->get();*/

        return view ('StudentHome', compact('student','tests'));

      }




public function StudentSearch()
{
//get the q parameter from URL
$searchString=$_GET["q"];
if (strlen($searchString)==0)
return;
$words = explode(' ',trim($searchString),2);

if(isset($words[1]))
{
   //lookup all links from the xml file if length of q>0
  $result = Student::where('FirstName','=',$words[0])
                    ->where('LastName','like',$words[1].'%')->get();
}
else{
$result = Student::where('FirstName','like','%'.$words[0].'%')
                ->orWhere('LastName','like','%'.$words[0].'%')
                ->get();
}


return $result;
//output the response

}








    public function show()
  {
      $students = Student::all();
    return view ('student', compact('students'));
  }


public function newStudent()
{
  $intakes = Intake::all();
  return view('newStudent', compact('intakes'));

}


  public function create(Request $request)
    {
      $student = new Student;
      $student->FirstName = $request->FirstName;
      $student->LastName = $request->LastName;
     $student->IntakeID = $request->IntakeID;

     if(isset($request->Photo))
     $student->Photo = $request->Photo;

     $student->save();

      return redirect('/adminHome');
    }
public function showedit($id )

    { $student = Student::find($id);
      $intakes = Intake::all();
      return view ('editStudent', compact('student', 'intakes'));
    }

public function edit(Request $request , $id )

    { $student = Student::find($id);

      $student->update($request->all());
      return redirect('/adminHome');

    }


    public function delete ()
    {
      $student = DB::table('students')->where('StudentID','=',$_POST['StudentID']);
      $student->delete();
      return "deleted";
    }







    }

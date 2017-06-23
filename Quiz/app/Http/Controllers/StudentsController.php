<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
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
    {

      $this->middleware('auth:admins', ['except'=> 'main']);
      $this->middleware('auth:students',['only'=>'main']);
    }

  }

  public function main()
    {   //config(['app.timezone' => 'America/Winnipeg']);
      //dd(Auth::user());
      //Auth::user();
        // $quizId=1;
        //$programs = Program::find($id);
        // $quizzes = Quiz::find($quizId);

        $student = Auth::guard('students')->user();

        $tests = $student->Tests;
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
      $student->email = $request->email;
      $student->password = 'password';
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
    {
      $student = Student::find($id);
if ($request->hasFile('Photo')) {
        try {
            $file = $request->file('Photo');
            $name = $file->getClientOriginalName();
            $request->file('Photo')->move("storage/", $name);
            //save image to db
            $student->update($request->all());
            $student->Photo = $name;
            $student->save();
        } catch (Illuminate\Filesystem\FileNotFoundException $e) {}
}
else{
        $student->update($request->all());
        $student->save();
}

      return redirect('/adminHome');

    }


    public function delete ()
    {
      $student = DB::table('students')->where('StudentID','=',$_POST['StudentID']);
      $student->delete();
      return "deleted";
    }







    }

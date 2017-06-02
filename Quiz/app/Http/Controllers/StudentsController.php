<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Student;
use App\Intake;
use App\Program;
use App\Module;
use App\Quiz;

class StudentsController extends Controller
{

public function StudentSearch()
{

//get the q parameter from URL
$searchString=$_GET["q"];

//lookup all links from the xml file if length of q>0

if (strlen($searchString)>0) {
  $result=Student::where('FirstName','like','%'.$searchString.'%')->orWhere('LastName','like','%'.$searchString.'%')->get();
}


return $result;
//output the response

}








    public function show()
  {
      $students = Student::all();
    return view ('student', compact('students'));
  }

public function IntakeStudents()
{
$IntakeID=$_GET['IntakeID'];
$intake= Intake::find($IntakeID);
$students=$intake->students;
return $students;
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
      $student->Photo = $request->Photo;
     $student->IntakeID = $request->IntakeID;
     $student->save();

      return redirect('/student');
    }
public function showedit($id )

    { $student = Student::find($id);
      $intakes = Intake::all();
      return view ('editStudent', compact('student', 'intakes'));
    }
public function edit(Request $request , $id )

    { $student = Student::find($id);

      $student->update($request->all());
      return redirect('/student');

    }
    public function delete(Student $student)
    {
      $student = DB::table('students')->where('StudentID','=',$student->StudentID);
      $student->delete();
      return redirect('/student');
    }







    }

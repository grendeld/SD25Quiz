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
      return view ('editStudent', compact('student'));
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

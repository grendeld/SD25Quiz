<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Student;

class StudentsController extends Controller
{
    public function show()
  {
      $students = Student::all();
        return view ('student', compact('students'));
  }
  public function create(Request $request)
    {
      $student = new Student;
      $student->FirstName = $request->FirstName;
      $student->LastName = $request->LastName;
      $student->Photo = $request->Photo;
     $student->IntakeID = $request->IntakeID;
     $student->save();

      return back();
    }
public  function upload()
{
return view('upload');
}
public  function store(Request $request)
{
 $photo = new Photo();
        $this->validate($request, [
            'Photo' => 'required'
        ]);
        
        $student->Photo = $request->Photo;
		if($request->hasFile('Photo')) {
            $file = Input::file('Photo');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            
            $name = $timestamp. '-' .$file->getClientOriginalName();
            
            $photo->filePath = $name;

            $file->move(public_path().'/images/', $name);
        }
        $image->save();
        return $this->create()->with('success', 'Image Uploaded Successfully');
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
      $student = DB::table('students')->where('StudentID','=',$student->StudentID)->count();
      
      $student->delete();
      return redirect('/student');
    }

}

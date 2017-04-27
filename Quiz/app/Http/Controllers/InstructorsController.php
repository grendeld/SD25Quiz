<?php

namespace App\Http\Controllers;
use DB;
use App\Instructor;
use Illuminate\Http\Request;

class InstructorsController extends Controller
{
    public function show()
  {
      $instructors = Instructor::all();
        return view ('instructor', compact('instructors'));
  }
  public function create(Request $request)
    {
      $instructor = new Instructor;
      $instructor->FirstName = $request->FirstName;
      $instructor->LastName = $request->LastName;
      $instructor->save();
      return redirect('/instructor');
    }
    public function showedit($id )

    { $instructor = Instructor::find($id);
      return view ('editInstructor', compact('instructor'));
    }
public function edit(Request $request , $id )

    { $instructor = Instructor::find($id);
      
      $instructor->update($request->all());
      return redirect('/instructor');

    }
    public function delete(Instructor $instructor)
    {
      $instructor = DB::table('instructors')->where('InstructorID','=',$instructor->InstructorID);
      $instructor->delete();
      return redirect('/instructor');
    }
    
}

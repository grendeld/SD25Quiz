<?php

namespace App\Http\Controllers;

use DB;
use App\InstructorIntake;
use Illuminate\Http\Request;

class InstructorIntakesController extends Controller
{
    public function show()
    {
        $instructorIntakes = InstructorIntake::all();
        return view('instructorIntake',compact('instructorIntakes'));
    }
    public function create(Request $request)
    {
        $instructorIntake = new InstructorIntake;
        $instructorIntake->IntakeID=$request->IntakeID;
        $instructorIntake->InstructorID=$request->InstructorID;
        $instructorIntake->save();
        return redirect('/instructorIntake');
     }
     public function showedit($id)
     {
         $instructorIntake= InstructorIntake::find($id);
         return view('editInstructorIntake',compact('instructorIntake'));
    }
     public function edit(Request $request,$id)
     {
      $instructorIntake=InstructorIntake::find($id);
      $instructorIntake->update($request->all());
      return redirect('instructorIntake');
     }
    //  public function delete(InstructorIntake $instructorIntake)
    //  {
    //  $instructorIntake=DB:table('instructorIntake')  
    //  }

}

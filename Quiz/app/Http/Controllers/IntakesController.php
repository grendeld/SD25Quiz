<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Intake;

class IntakesController extends Controller
{
    public function show()
  {
    $intakes = Intake::all();
    return view ('intake', compact('intakes'));
  }
  public function create(Request $request)
    {
      $intake = new Intake;
      $intake->IntakeName = $request->IntakeName;
      $intake->ProgramID = $request->ProgramID;
      $intake->InstructorID = $request->InstructorID;
 $intake->save();
return redirect('/intake');

    }
     public function showedit($id )

    { $intake = Intake::find($id);
      
      return view ('editIntake', compact('intake'));
 }
 public function edit(Request $request , $id )

    { $intake = Intake::find($id);
      
      $intake->update($request->all());
      return redirect('/intake');

    }
    public function delete(Intake $intake)
    {
      $intake = DB::table('intakes')->where('IntakeID','=',$intake->IntakeID);
      $intake->delete();
      return redirect('/intake');
    }
}

<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Program;

class ProgramsController extends Controller
{
    public function show()
  {
    $programs = program::all();
    return view ('program', compact('programs'));
  }
    public function create(Request $request)
    {
      $program = new Program;
      $program->ProgramName = $request->ProgramName;
      $program->ProgramType = $request->ProgramType;
      $program->ProgramName = $request->ProgramName;
     $program->Active = $request->Active;
     $program->save();

      return back();
    }

    public function showedit($id )

    { $program = Program::find($id);
      //$program->ProgramName = $request->ProgramName;
    //   $program->ProgramType = $request->ProgramType;

    //   $program->Active = $request->Active;
      return view ('editProgram', compact('program'));


    }
    public function edit(Request $request , $id )

    { $program = Program::find($id);
      //$program->ProgramName = $request->ProgramName;
      //$program->ProgramType = $request->ProgramType;

      //$program->Active = $request->Active;
      $program->update($request->all());
      return redirect('/program');

    }
    public function delete(Program $program)
    {
      $modules_in_program = DB::table('modules')->where('ProgramID','=',$program->ProgramID)->count();
      if ($modules_in_program > 0){
      $program->update(['Active'=>'No']);
    }
    else {
    $program->delete();}
      return redirect('/program');
    }


}

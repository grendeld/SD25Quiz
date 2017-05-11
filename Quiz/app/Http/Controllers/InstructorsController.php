<?php

namespace App\Http\Controllers;
use DB;
use App\Instructor;
use App\Program;
use App\Module;
use App\Intake;
use App\Quiz;
use App\InstructorIntake;
use Illuminate\Http\Request;

class InstructorsController extends Controller
{
    public function main()
    {
      $programs = Program::all();
      $modules = Module::all();
      $quizzes = Quiz::all();
        //dd($quizzes);
      $id=1;
      $instructor = Instructor::find($id);
      $intakes = $instructor->intakes;
      return view ('InstructorHome', compact('programs', 'modules', 'quizzes', 'intakes'));

    }



    public function show()
  {
    $instructors = DB::table('instructorIntakes')
    ->join('instructors','instructorIntakes.InstructorID','=','instructors.InstructorID')
    ->join('intakes','instructorIntakes.IntakeID','=','intakes.IntakeID')
    ->join('programs','programs.ProgramID','=','intakes.ProgramID')
    ->select('instructorIntakes.*','instructors.FirstName','instructors.LastName','intakes.IntakeName','intakes.ProgramID','programs.ProgramName')
    ->get();
      $intakes = Intake::all();
      // $programs = DB::table('programs')
      // ->join('intakes','programs.ProgramID','=','intakes.ProgramID')
      // ->select('intakes.ProgramID','programs.ProgramName')
      // ->get();
      return view ('instructor', compact('instructors','intakes','programs'));
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

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
      $id=2;
      $instructor = Instructor::find($id);
      $intakes = $instructor->intakes;
      return view ('InstructorHome', compact('programs', 'modules', 'quizzes', 'intakes'));

    }



    public function show()
  {
    $instructors = DB::table('InstructorIntakes')
    ->join('instructors','InstructorIntakes.InstructorID','=','instructors.InstructorID')
    ->join('intakes','InstructorIntakes.IntakeID','=','intakes.IntakeID')
    ->join('programs','programs.ProgramID','=','intakes.ProgramID')
    ->select('InstructorIntakes.*','instructors.FirstName','instructors.LastName','intakes.IntakeName','intakes.ProgramID','programs.ProgramName')
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
      // Retrieve flight by name, or create it with the name and delayed attributes...
      Instructor::firstOrCreate(
        ['FirstName' => $request->FirstName],
        ['LastName' => $request->LastName]
      );
      return redirect('/adminHome');
    }


    public function showedit($id )

    { $instructor = Instructor::find($id);
      return view ('editInstructor', compact('instructor'));
    }

    public function edit(Request $request , $id )

    { $instructor = Instructor::find($id);

      $instructor->update($request->all());
      return redirect('/adminHome');
    }

    public function delete(Instructor $instructor)
    {
      // $instructor->detach(Intake::all());
      // $instructor = DB::table('instructors')->where('InstructorID','=',$instructor->InstructorID);
      try{
      $instructor->delete();
      }
    catch(\Exception $e)
    {
    }
    return redirect('/adminHome');

  }

}

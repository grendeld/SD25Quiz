<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\Instructor;
use App\Program;
use App\Test;
use App\Module;
use App\Intake;
use App\Quiz;
use App\InstructorIntake;
use Illuminate\Http\Request;

class InstructorsController extends Controller
{
  public function __construct()
  {
    //$this->middleware('auth:instructors');
    $this->middleware('auth:instructors', ['except'=> ['create','showedit','edit','delete']]);
    $this->middleware('auth:admins',['only'=>['create','showedit','edit','delete']]);
  }

private function getmodules($filter=false)
{
  $modules = array();
   foreach(Auth::user()->programs as $p)
    {
      if ($filter)
      {
        foreach($p->modules as $m)
        { if ($m->Active == "Yes")
          array_push($modules,$m);
        }
      }
      else
      {
        foreach($p->modules as $m)
        {
        array_push($modules,$m);
        }
      }

    }
    return $modules;
}


    // public function main()
    // {
    //   $modules = $this->getmodules(true);
    //
    //   $quizzes = Auth::user()->quizzes;
    //   $intakes = Auth::user()->intakes;
    //   $programs = Auth::user()->programs;
    //   $instructor = Auth::user();
    //   return view ('InstructorHome', compact('instructor','programs', 'modules', 'quizzes', 'intakes'));
    //   //return view ('InstructorHome');
    // }



    public function modules()
    {
      $programs = Auth::user()->programs;

      $modules = $this->getmodules();

      return view ('instructor.moduleContainer', compact('programs','modules'));
    }

    public function quizzes()
    {
     $modules = $this->getmodules(true);
     $quizzes = Auth::user()->quizzes;

      return view ('instructor.quizzes', compact('programs','modules', 'quizzes'));
    }



    public function deploy()
    {
      $intakes = Auth::user()->intakes;


      return view ('instructor.deployQuiz', compact('intakes'));
    }

    public function tests()
    {
      //$tests = Auth::user()->intakes;
      $tests=Test::all();


      return view ('instructor.tests', compact('tests'));
    }






  //   public function show()
  // {
  //   $instructors = DB::table('InstructorIntakes')
  //   ->join('instructors','InstructorIntakes.InstructorID','=','instructors.InstructorID')
  //   ->join('intakes','InstructorIntakes.IntakeID','=','intakes.IntakeID')
  //   ->join('programs','programs.ProgramID','=','intakes.ProgramID')
  //   ->select('InstructorIntakes.*','instructors.FirstName','instructors.LastName','intakes.IntakeName','intakes.ProgramID','programs.ProgramName')
  //   ->get();
  //     $intakes = Intake::all();
  //     // $programs = DB::table('programs')
  //     // ->join('intakes','programs.ProgramID','=','intakes.ProgramID')
  //     // ->select('intakes.ProgramID','programs.ProgramName')
  //     // ->get();
  //     return view ('instructor', compact('instructors','intakes','programs'));
  // }


  public function create(Request $request) //newInstructor

    {
      $instructor = new Instructor;
      $instructor->FirstName = $request->FirstName;
      $instructor->LastName = $request->LastName;
     $instructor->email = $request->email;
     $instructor->password = 'password';
     $instructor->save();
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
     public function getStudent(Request $request){
         //dd($request);
        return \App\Student::find($request->StudentID);
    }
}

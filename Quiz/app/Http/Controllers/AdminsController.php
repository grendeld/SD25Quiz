<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Program;
use App\Instructor;
use App\Intake;

class AdminsController extends Controller
{

public function main(){
$instructors = Instructor::all();
$programs = Program::all();

  return view('AdminHome',compact ('instructors', 'programs'));
}

public function InstrIntAdd(){

$instructor=Instructor::find($_GET['InstructorID']);
$intake=Intake::find($_GET['IntakeID']);
try{
  $hey[0]=true;
  $instructor->intakes()->attach($intake); // add new intake to the instructor

//dd("hi");
}catch(\Exception $e){
  $hey[0]=false;
  //dd("hi");
}
  $hey[1]=$instructor->load('intakes');
  return $hey;


}

public function InstrIntRemove(){

$instructor=Instructor::find($_GET['InstructorID']);
$intake=Intake::find($_GET['IntakeID']);
try{
  $hey[0]=true;
  $instructor->intakes()->detach($intake); // delete intake from the instructor

//dd("hi");
}catch(\Exception $e){
  $hey[0]=false;
  //dd("hi");
}
  $hey[1]=$instructor->load('intakes');
  return $hey;


}


  public function show()
  {
    $admins=Admin::all();
    return view ('admin', compact('admins'));
  }
    public function create(Request $request)
    {
      $admin = new Admin;
      $admin->AdminNAme = $request->AdminName;
      $admin->Password = $request->Password;
      $admin->save();

      return back();
    }
}

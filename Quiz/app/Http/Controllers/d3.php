<?php
/*CHANGED this is the controller for d3(chart/graph) functions -CB */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class d3 extends Controller
{
    public function getIntakes()
    {
      //returns number of students per intake -CB
      return \App\Intake::join('students','intakes.IntakeID','=','students.IntakeID')
      ->select(DB::raw('IntakeName as x, COUNT(StudentID)as y'))
      ->groupby('x')->get()->toJson();
    }

    public function getProgramsByType()
    {
      //returns number of programs in each program type
      return DB::table('programs')->select(DB::raw('ProgramType as x, COUNT(ProgramID) as y'))->groupby('x')->get()->toJson();
    }
}

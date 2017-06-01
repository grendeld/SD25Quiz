<?php
/*CHANGED this is the controller for d3(chart/graph) functions -CB */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class d3 extends Controller
{
    public function getIntakes()
    {
      //returns number of students per intake as bar chart -CB
      return \App\Intake::join('students','intakes.IntakeID','=','students.IntakeID')
      ->select(DB::raw('IntakeName, COUNT(StudentID)as count'))
      ->groupby('IntakeName')->get()->toJson();
    }
}

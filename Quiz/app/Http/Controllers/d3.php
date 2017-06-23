<?php
/*CHANGED this is the controller for d3(chart/graph) functions -CB */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class d3 extends Controller
{

  public function getTests()
  {

     $tests = \App\Test::all();

    return view('chartTest',['tests' => $tests]);

  }
    //returns number of students per intake -CB
    public function getIntakes()
    {
      return \App\Intake::join('students','intakes.IntakeID','=','students.IntakeID')
      ->select(DB::raw('IntakeName as x, COUNT(StudentID)as y'))
      ->groupby('x')->get()->toJson();
    }

    //returns number of programs in each program type
    public function getProgramsByType()
    {
      return DB::table('programs')
      ->select(DB::raw('ProgramType as x, COUNT(ProgramID) as y'))
      ->groupby('x')->get()->toJson();
    }

    public function getAllStudentMarksByQuiz($tValue)
    {
      //dd($tValue);
      return DB::select(DB::raw(" Select students.StudentID, COUNT(students.StudentID)/(select COUNT(questions.QuizID) FROM tests
    INNER join questions on tests.QuizID=questions.QuizID where TestID = $tValue
    GROUP BY questions.QuizID)*100 as y,CONCAT(students.FirstName,students.LastName) AS x FROM students
    LEFT JOIN responses ON responses.StudentID = students.StudentID
    LEFT JOIN tests ON responses.TestID = tests.TestID
    LEFT JOIN questions ON tests.QuizID = questions.QuizID
    WHERE tests.TestID = $tValue AND responses.AnswerID=questions.CorrectAnswerID
    GROUP BY students.StudentID,students.FirstName,students.LastName"));

    }


}

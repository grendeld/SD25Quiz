<?php
/*CHANGED this is the controller for d3(chart/graph) functions -CB */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class d3 extends Controller
{
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

    public function getAllStudentMarksByQuiz()
    {

    return DB::select(DB::raw('Select COUNT(students.StudentID) FROM students
    LEFT JOIN responses ON responses.StudentID = students.StudentID
    LEFT JOIN tests ON responses.TestID = tests.TestID
    LEFT JOIN questions ON tests.QuizID = questions.QuizID
    WHERE tests.TestID = 2 AND responses.AnswerID=questions.CorrectAnswerID GROUP BY students.StudentID'));

    return DB::select(DB::raw('select COUNT(questions.QuizID) FROM tests INNER join questions on tests.QuizID=questions.QuizID where TestID = 2 GROUP BY questions.QuizID'));
    }


}

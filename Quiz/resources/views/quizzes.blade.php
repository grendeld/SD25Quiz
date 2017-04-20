@extends('layout')

@section ('content')
<h1>Quizzes:</h1>
<table>
  <tr>
    <th>Program</th>
    <th>Module</th>
    <th>Quiz</th>
  </tr>

@foreach($quizzes as $q)
  <tr>
    <td>{{$q->ProgramName}}</td>
    <td>{{$q->ModuleName}}</td>
    <td>{{$q->Description}}</td>
    <td><a href="/quiz/{{$q->QuizID}}">Show Quiz</a></td>
  </tr>
@endforeach
</table>

@stop

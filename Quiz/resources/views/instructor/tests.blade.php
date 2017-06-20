@extends('layout')

@section ('content')

<hr>
<h1>Tests:</h1>
<hr>
<table>
  <tr>
    <th>Quiz</th>
    <th>Start</th>
    <th>Stop</th>
  </tr>
@foreach($tests as $t)
<tr>
  <td>{{$t->QuizName}}</td>
  <td>{{$t->StartDateTime}}</td>
  <td>{{$t->StopDateTime}}</td>
</tr>
@endforeach
</table>
<hr>

@stop

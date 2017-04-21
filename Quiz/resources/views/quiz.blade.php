@extends('layout')

@section ('content')
<h1>{{$quiz->QuizName}}</h1>
<table>
@foreach($questions as $q)
  <tr>
    <td>{{$q->Question}}</td>
    <td>
        <ul>
        @foreach($answers as $a)
        @if($a->QuestionID == $q->QuestionID)
        <li>{{$a->Answer}}</li>
        @endif
        @endforeach
      </ul>
      </td>
  </tr>
@endforeach
</table>
<table>
</table>
@stop

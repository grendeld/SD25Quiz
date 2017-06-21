@extends('layout')

@section ('content')


<div id="divQuizzez" class="AdminTables">
<h1>Quizze:</h1>
<hr>
<table>
  <tr>
    <th>Program</th>
    <th>Module</th>
    <th>Quiz</th>
    <th>Description</th>
    <th>Active</th>
  </tr>

@foreach($quizzes as $q)
  <tr>
    <td>{{$q->ProgramName}}</td>
    <td>{{$q->ModuleName}}</td>
    <td>{{$q->QuizName}}</td>
    <td>{{$q->Description}}</td>
    <td>{{$q->Active}}</td>
    <td><a href="/quiz/{{$q->QuizID}}" class="quizbutton">Edit</a></td>
    <td><a href="/quiz/{{$q->QuizID}}/delete" class="quizbutton">Delete</a></td>
  </tr>
@endforeach
</table>
<br/>



</div>


<div id='divNewQuiz' style="display:none">
  <br/>
  <form method="POST" action="/newQuiz">
  <select name='ModuleID'>
    @foreach($modules as $m)
      <option value="{{$m->ModuleID}}"> {{$m->ModuleName}}</option>
    @endforeach
  </select>
<br/>
<br/>
Quiz Name:
<input type="text" name="QuizName">
<br/>
Description:
<textarea name="Description"></textarea>
<br/>
<button type="submit">Save Template</button>
<button onclick="return hideNewQuiz()">Cancel</button>
{!! csrf_field() !!}
</form>
</div>



<script type="text/javascript">

function showNewQuiz(){
divQuizzez.style.display = "none";
divNewQuiz.style.display = "block";
return false;
}

function hideNewQuiz(){
divQuizzez.style.display = "block";
divNewQuiz.style.display = "none";
return false;
}
</script>


@stop

@extends('layout')

@section ('content')
<div id="divQuiz">

<h1>{{$quiz->QuizName}}</h1>
<table>
@foreach($questions as $q)
  <tr>
    <td>{{$q->Question}}</td>
    <td>
        <ul>
        @foreach($answers as $a)
        @if($a->QuestionID == $q->QuestionID)
        <li <?php if($a->AnswerID == $q->CorrectAnswer) echo('style="color:red;"'); ?> >{{$a->Answer}}</li>
        @endif
        @endforeach
      </ul>
      </td>
<td><button type="button" name="button" onclick="return showEditQA({{$q->QuestionID}})">Modify question</button></td>
  </tr>
@endforeach
</table>
<button onclick="return showNewQA()">Add new question</button>
</div>

<div id="divNewQA" style="display:none;">
<form action="/quiz/{{$quiz->QuizID}}/newQA" method="post">

              <table>
              <tr>
              <td colspan="2" >Type Your Question Below</td>
              </tr>
              <tr>
              <td></td>
              <td colspan="2"><textarea type="textarea" rows="5" cols="50" row="5" placeholder="Question" name="Question"></textarea><td>
              </tr>
              <tr>
              <td>A)</td>
              <td><input id='Option1' type="Text" placeholder="Option 1" name="Option1" /></td>
              <td><input type="radio" name="Correct" value="A"></td>
              </tr>
              <tr>
              <td>B)</td>
              <td><input id='Option2' type="Text" placeholder="Option 2" name="Option2" /></td>
              <td><input type="radio" name="Correct" value="B"></td>
              </tr>
              <tr>
              <td>C)</td>
              <td><input id='Option3' type="Text" placeholder="Option 3" name="Option3" /></td>
              <td><input type="radio" name="Correct" value="C"></td>
              </tr>
              <tr>
              <td>D)</td>
              <td><input id='Option4' type="Text" placeholder="Option 4" name="Option4" /></td>
              <td><input type="radio" name="Correct" value="D"></td>
              </tr>
              </table>

  <button type="submit">Save</button>
  <button onclick="return hideNewQA()">Cancel</button>
  {!! csrf_field() !!}
</form>
</div>

<script type="text/javascript">

function showNewQA(){
divQuiz.style.display = "none";
divNewQA.style.display = "block";
return false;
}
function showEditQA($QuestionID){
divQuiz.style.display = "none";
divNewQA.style.display = "block";
alert($QuestionID);

var options = ['First','Second','',''];

for (var i=0, i<4, i++)
{
   if($answers->QuestionID == $QuestionID)
      options[i] = $answers->Answer;
}
// foreach($answers as $a){
// if($a->QuestionID == $QuestionID)
// options = options + $a->Answer;
// }

Option1.value = options[0];


return false;
}

function hideNewQA(){
divQuiz.style.display = "block";
divNewQA.style.display = "none";
return false;
}
</script>

@stop

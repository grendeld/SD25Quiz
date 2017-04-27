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
<form action="/quiz/{{$quiz->QuizID}}/newQA" method="post" name="formQA">

              <table>
              <tr>
              <td colspan="2" >Type Your Question Below</td>
              </tr>
              <tr>
              <td></td>
              <td colspan="2"><textarea id="Question" type="textarea" rows="5" cols="50" row="5" placeholder="Question" name="Question"></textarea><td>
              </tr>
              <tr>
              <td>A)</td>
              <td><input id='Option1ID' type="hidden" name="Option1ID" />
                <input id='Option1' type="Text" placeholder="Option 1" name="Option1" /></td>
              <td><input id = 'Correct1' type="radio" onclick='return Radio()' name="Correct" value="A"></td>
              </tr>
              <tr>
              <td>B)</td>
              <td><input id='Option2ID' type="hidden" name="Option2ID"/>
                <input id='Option2' type="Text" placeholder="Option 2" name="Option2" /></td>
              <td><input id = 'Correct2'type="radio" onclick='return Radio()' name="Correct" value="B"></td>
              </tr>
              <tr>
              <td>C)</td>
              <td><input id='Option3ID' type="hidden" name="Option3ID"/>
                <input id='Option3' type="Text" placeholder="Option 3" name="Option3" /></td>
              <td><input id = 'Correct3' type="radio" onclick='return Radio()' name="Correct" value="C"></td>
              </tr>
              <tr>
              <td>D)</td>
              <td><input id='Option4ID' type="hidden" name="Option4ID"/>
                <input id='Option4' type="Text" placeholder="Option 4" name="Option4" /></td>
              <td><input id = 'Correct4' type="radio" onclick='return Radio()' name="Correct" value="D"></td>
              </tr>
              </table>

              <input id = 'QuestionID' type="hidden" name="QuestionID" value="new">
              <input id = 'txtCorrectAnswer' type="hidden" name="txtCorrectAnswer" value="">

  <button type="submit">Save</button>
  <button onclick="return hideNewQA()">Cancel</button>
  {!! csrf_field() !!}
</form>
</div>

<script type="text/javascript">

function showNewQA(){
divQuiz.style.display = "none";
QuestionID.value = "new";
Question.value = '';
Option1.value = '';
Option2.value = '';
Option3.value = '';
Option4.value = '';

Option1ID.value = '';
Option2ID.value = '';
Option3ID.value = '';
Option4ID.value = '';

document.formQA.Correct[0].checked = false;
document.formQA.Correct[1].checked = false;
document.formQA.Correct[2].checked = false;
document.formQA.Correct[3].checked = false;


divNewQA.style.display = "block";
return false;
}



function showEditQA($QuestionID){
divQuiz.style.display = "none";
divNewQA.style.display = "block";
QuestionID.value = $QuestionID;

var questions = <?php echo json_encode($questions); ?>;

var answers = <?php echo json_encode($answers); ?>;
//alert("Array QuestionID: "+ questions[0].QuestionID + "QuestionID: " + $QuestionID);

var CorrectAnswerID = -1;

for (var k=0; k<questions.length; k++)
{
  if (questions[k].QuestionID == $QuestionID)
    {
      Question.value = questions[k].Question;
      CorrectAnswerID = questions[k].CorrectAnswer;
    }
}

var A = [];

for (var i=0; i<answers.length; i++)
{

  if (answers[i].QuestionID == $QuestionID)
  {
    var obj={};
    obj['Answer'] = answers[i].Answer;
    obj['AnswerID'] = answers[i].AnswerID;
    A.push(obj);
  }

}
Option1.value = A[0].Answer; Option1ID.value = A[0].AnswerID;
Option2.value = A[1].Answer; Option2ID.value = A[1].AnswerID;
Option3.value = A[2].Answer; Option3ID.value = A[2].AnswerID;
Option4.value = A[3].Answer; Option4ID.value = A[3].AnswerID;

for (var i = 0; i<4; i++){
  if (A[i].AnswerID == CorrectAnswerID)
  document.formQA.Correct[i].checked = true;
  document.formQA.Correct[i].value = A[i].AnswerID;
}
return false;
}


function Radio()
{
  txtCorrectAnswer.value = document.formQA.Correct.value;
}



function hideNewQA(){
divQuiz.style.display = "block";
divNewQA.style.display = "none";
return false;
}
</script>

@stop

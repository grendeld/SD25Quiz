@extends('layout')

@section ('content')
<!-- Show Quiz with questions and answers -->
<div id="divQuiz">
<div id="divQuizHead">

<h2>{{$quiz->QuizName}}</h2>
<br/>
<h5>{{$quiz->Description}}</h5>
<br/>
<div class="editquiztop">
  <div class="editcontroll">
    <button class="quizbutton" onclick="return showEditQuiz()">Edit Quiz</button> <form method="get">
  </div>
  <div class="editcontroll">
    <button class="quizbutton" formaction="/quiz/{{$quiz->QuizID}}/copy">Copy Quiz</button> </form>
  </div>
</div>

</div>
<div class="quiznamedescrip">
<form name="edit" action="/quiz/{{$quiz->QuizID}}/editQuiz" method="post" style="display:none">
  <h4>Quiz Name:</h4><br/>
  <input type="text" name="QuizName" value="{{$quiz->QuizName}}"/><br/><br/>
  <h4>Description:</h4><br/>
  <textarea name="Description" rows="3" cols="30">{{$quiz->Description}}</textarea><br/><br/>
  <button class="quizbutton" type="submit">Save</button>
  <button class="quizbutton" type="button" onclick="return hideEditQuiz()">Cancel</button>
{{method_field('PATCH')}}
{!! csrf_field() !!}
</form>
</div>
<div class="quiizeditt">
  @foreach($questions as $q)
      <div class="quizeditquestiontop">
              <h3>{{$q->Question}}</h3>
      </div>
      <div class="quizeditanswerrcell">
            <div class="quizeditAnswerlist">
                <ul>
                  @foreach($answers as $a)
                    @if($a->QuestionID == $q->QuestionID)
                    <li <?php //if($a->AnswerID == $q->CorrectAnswer) echo('style="color:red;"'); ?> >{{$a->Answer}}</li>
                  @endif
                  @endforeach
                </ul>
            </div>
            <div class="quizeditbuttons">
                <div class="questioncontrol">
                      <button class="quizbutton" id="EditQuestion"
                      type="button" name="edit" style="display:none"
                      onclick="return showEditQA({{$q->QuestionID}})">Edit</button>
                </div>
                <div class="questioncontrol">
                        <form method="get">
                        <button class="quizbutton" id = "DeleteQuestion"
                        type="submit" name="edit" style="display:none"
                        formaction="/question/{{$q->QuestionID}}/delete">Delete</button>
                        </form>
                </div>
            </div>
      </div>
  @endforeach
</div>
<button name="edit" class="quizbutton" style="display:none" onclick="return showNewQA()">Add new question</button>
</div>

<!-- Add or edit question with answers -->
<div id="divNewQA" style="display:none;" class="AdminTables">
<form action="/quiz/{{$quiz->QuizID}}/newQA" method="post" name="formQA">

              <table>
              <tr>  </tr>
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

  <button type="submit">Save</button>   <button onclick="return hideNewQA()">Cancel</button>
  {!! csrf_field() !!}
</form>
</div>

<!--                                        JAVASCRIPT                                                         -->
<script type="text/javascript">

function showEditQuiz()
{
divQuizHead.style.display = "none";

var x = document.getElementsByName("edit");

for (var i = 0; i < x.length; i++)
 {
   x[i].style.display = "block";
  }

}

function hideEditQuiz()
{
divQuizHead.style.display = "block";

var x = document.getElementsByName("edit");

for (var i = 0; i < x.length; i++)
 {
   x[i].style.display = "none";
  }

}





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

@extends('layout')

@section ('content')
<!-- Show Quiz with questions and answers -->

<div class="row">
      <!---QUIZ EDIT LEFT START--->
          <div class="col-md-6">
            <h3>{{$quiz->QuizName}}</h3>
            <p>{{$quiz->Description}}</p>
            <div class="Quizedit">

                <div class="QuizBuildStartCell">
                  <button onclick="return showEditQuiz()">Edit Quiz</button>
                </div>
                <div class="QuizBuildStartCell">
                  <form method="get">
                    <button formaction="/quiz/{{$quiz->QuizID}}/copy">
                      Copy Quiz
                    </button>
                  </form>
                </div>

            </div>
            <div class="Quizedit">
                <button name="edit" onclick="return showNewQA()">Add new question</button>
            </div>
            <div class="QuestionListSection">
                  @foreach($questions as $q)

                        <div class="QeditQnA">
                            <p>{{$q->Question}}</p>
                        </div>
                        <div class="QeditQnA">
                          <ul>
                            @foreach($answers as $a)
                            @if($a->QuestionID == $q->QuestionID)
                            <li <?php if($a->AnswerID == $q->CorrectAnswer) echo('style="color:red;"'); ?> >
                              {{$a->Answer}}
                            </li>
                            @endif
                            @endforeach
                          </ul>
                        </div>

                        <div class="QeditButtons">
                          <div class="QeditAnswers">
                            <button id="EditQuestion" type="button" name="edit" style="display:none" onclick="return showEditQA({{$q->QuestionID}})">
                              Edit question
                            </button>
                          </div>
                          <div class="QeditAnswers">
                            <form method="get">
                              <button id = "DeleteQuestion" type="submit" name="edit"
                              style="display:none"
                              formaction="/question/{{$q->QuestionID}}/delete">Delete question</button>
                            </form>
                          </div>
                        </div>
                  @endforeach
            </div>
          </div>
      <!---QUIZ EDIT LEFT END--->
      <!---QUIZ EDIT RIGHT START--->
          <div class="col-md-6">
            <div id="divQuizHead">
                <form name="edit" action="/quiz/{{$quiz->QuizID}}/editQuiz" method="post" style="display:none">
                  <p>Quiz Name:</p>
                  <input type="text" name="QuizName" value="{{$quiz->QuizName}}"/><br/>
                  <p>Description:</p>
                  <textarea name="Description" rows="3" cols="30">{{$quiz->Description}}</textarea><br/>
                  <button type="submit">Save</button>
                  <button type="button" onclick="return hideEditQuiz()">Cancel</button>
                  {{method_field('PATCH')}}
                  {!! csrf_field() !!}
                </form>
            </div>

            <!-- Add or edit question with answers -->
            <div class="divNewQAA">
              <!-- Add or edit question with answers -->
              <div id="divNewQA" style="display:none;">
              <form action="/quiz/{{$quiz->QuizID}}/newQA" method="post" name="formQA">

                <div class="QuestBuildCelll">
                  <textarea id="Question" type="textarea" rows="5" cols="50" row="5"
                  placeholder="Question" name="Question"></textarea>
                </div>

                <div class="QuestBuildCell">
                      <div class="QuizeditCell1">
                        A)
                      </div>
                      <div class="QuizeditCell1">
                        <input id='Option1ID' type="hidden" name="Option1ID" />
                          <input id='Option1' type="Text" placeholder="Option 1" name="Option1" />
                      </div>
                      <div class="QuizeditCell1">
                        <input id = 'Correct1' type="radio" onclick='return Radio()' name="Correct" value="A">
                      </div>
                </div>

              <div class="QuestBuildCell">
                <div class="QuizeditCell1">
                      B)
                </div>
                <div class="QuizeditCell1">
                  <input id='Option2ID' type="hidden" name="Option2ID"/>
                    <input id='Option2' type="Text" placeholder="Option 2" name="Option2" />
                </div>
                <div class="QuizeditCell1">
                    <input id = 'Correct2'type="radio" onclick='return Radio()' name="Correct" value="B">
                </div>
              </div>

              <div class="QuestBuildCell">
                <div class="QuizeditCell1">
                      C)
                </div>
                <div class="QuizeditCell1">
                  <input id='Option3ID' type="hidden" name="Option3ID"/>
                    <input id='Option3' type="Text" placeholder="Option 3" name="Option3" />
                </div>
                <div class="QuizeditCell1">
                      <input id = 'Correct3' type="radio" onclick='return Radio()' name="Correct" value="C">
                </div>
              </div>

              <div class="QuestBuildCell">
                  <div class="QuizeditCell1">
                    D)
                  </div>
                  <div class="QuizeditCell1">
                      <input id='Option4ID' type="hidden" name="Option4ID"/>
                      <input id='Option4' type="Text" placeholder="Option 4" name="Option4" />
                  </div>
                  <div class="QuizeditCell1">
                      <input id = 'Correct4' type="radio" onclick='return Radio()' name="Correct" value="D">
                  </div>
              </div>

                <input id = 'QuestionID' type="hidden" name="QuestionID" value="new">
                <input id = 'txtCorrectAnswer' type="hidden" name="txtCorrectAnswer" value="">

                <div class="QuestBuildCell">
                  <div class="QuizeditCell">
                      <button type="submit">Save</button>
                  </div>
                  <div class="QuizeditCell">
                      <button onclick="return hideNewQA()">Cancel</button>
                  </div>
                </div>

                {!! csrf_field() !!}
              </form>
              </div>


            </div>


          </div>
      <!---QUIZ EDIT RIGHT END--->
</div>

<!--                                        JAVASCRIPT                                                         -->
<script type="text/javascript">

function showEditQuiz()
{
divQuizHead.style.display = "block";

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
divQuiz.style.display = "block";
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
//divQuiz.style.display = "block";
divNewQA.style.display = "none";
return false;
}
</script>

@stop

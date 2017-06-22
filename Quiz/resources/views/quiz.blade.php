@extends('layout')

@section ('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
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
        @foreach($questions as $key => $q)
            <div class="quizeditquestiontop">
                    <h3>{{$q->Question}}</h3>
            </div>
            <div class="quizeditanswerrcell">
                  <div class="quizeditAnswerlist">
                      <ul>
                        @foreach($q->answers as $a)
                          <li @if($q->CorrectAnswer == $a) style="color:red;" @endif>{{$a->Answer}}</li>
                        @endforeach
                      </ul>
                  </div>
                  <div class="quizeditbuttons">
                      <div class="questioncontrol">
                            <button class="quizbutton" id="EditQuestion"
                            type="button" name="edit" style="display:none"
                            onclick="return showEditQA({{$q->QuestionID}},{{$key}})">Edit</button>
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
      <div id="divNewQA" style="display:none;" class="AdminTables Panelbkg">
        <h3>Question Editor:</h3><br/><br/>
      <form action="/quiz/{{$quiz->QuizID}}/newQA" method="post" name="formQA">

                   <textarea id="Question" type="textarea" rows="5" cols="50" row="5" placeholder="Question" name="Question"></textarea>
                    <input id = 'QuestionID' type="hidden" name="QuestionID" value="new">
            <style>
                  ol#list{
                      display:inline;

                  }
              ol#list li{
          list-style: none;
                  margin-top: 5px;
      height: 4em;
      width: 100%;
      float: left;
          counter-increment: myIndex;

      }

      ol#list li:before{
          content:counter(myIndex,upper-alpha)" ";
          font-size: 1.75rem;
          margin-bottom: 0.5rem;
      font-family: inherit;
      font-weight: 500;
      line-height: 1.1;
      color: inherit;

      }
              </style>
          <div>
              <ol id="list">
              </ol>
              </div>
              <script>
            var list = document.getElementById('list');
            function loader(textBox){
                      if(!list){
                          var list = document.getElementById('list');
                      }
                      textBox.oninput = null;
                      list.appendChild(createItem());
                      var q = [document.createElement('button'),
                              document.createElement('input')];
                      q[0].setAttribute('class','btn btn-danger btn-sm');
                      q[0].innerHTML="Delete";
                      q[0].setAttribute('onclick','del(this)');
                      q[1].setAttribute('type','radio');
                      q[1].setAttribute('name','correct');
                      var par = textBox.parentElement;
                      par.insertBefore(q[1],textBox);
                      par.appendChild(q[0]);
            }
                  function createItem(input,correct){
                      console.log(correct);
                      var item = document.createElement('li');
                      var q = document.createElement('input');
                      q.setAttribute('type','text');
                      q.setAttribute('name','Answer[]');

                      q.setAttribute('placeholder','Next Option');
                      if(input){
                          var z = document.createElement('input');
                          var x= document.createElement('button');
                          x.setAttribute('class','btn btn-danger btn-sm');
                      x.innerHTML="Delete";
                      x.setAttribute('onclick','del(this)');
                      z.setAttribute('type','radio');
                      z.setAttribute('name','correct');
                          if(correct)
                          z.setAttribute('checked','checked');
                      //par.insertBefore(q[1],textBox);
                      //par.appendChild(q[0]);
                          q.value = input;
                          item.appendChild(z);
                          item.appendChild(q);
                          item.appendChild(x);
                          return item;
                      }
                      else{
                          q.setAttribute('oninput','loader(this)');
                      }
                      item.appendChild(q);
                      return item;
                  }
                  function del(check){
                      var li = check.parentElement;
                      var ul = li.parentElement;
                      li.parentElement.removeChild(li);
                  }
                  function sub(){
                      var radio = document.getElementsByName('correct');
                      for(rad in radio){
                          if(radio[rad].checked == true)
                              {
                                  radio[rad].value = rad;
                                  break;
                              }
                      }
                      var par = radio[0].parentElement.parentElement;
                      par.removeChild(par.lastElementChild);
                  }
                  //createItem();
          </script>
          <!---ANSWERSET SECTION END--->
          <!---CORRECTANSWERSET SECTION START--->
        <button class="quizbutton" type="submit" onclick="sub()">Save</button>
        <button class="quizbutton" onclick="return hideNewQA()">Cancel</button>
        {!! csrf_field() !!}
      </form>
      </div>
    </div>
    <div class="col-md-3"></div>
  </div>
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
if(!list){
    var list = document.getElementById('list');
}
list.innerHTML = '<li><input oninput="loader(this)" placeholder="First Option" name="Answer[]" type="text"></li>';


divNewQA.style.display = "block";
return false;
}

function showEditQA($QuestionID,offset){
divQuiz.style.display = "none";
divNewQA.style.display = "block";
QuestionID.value = $QuestionID;
var questions = <?php echo json_encode($questions); ?>;

//alert("Array QuestionID: "+ questions[0].QuestionID + f"QuestionID: " + $QuestionID);
    if(!list){
        var list =document.getElementById('list');
    }
    list.innerHTML = "";
if(!Question){
    var Question = document.getElementById('Question');
}
    Question.innerHTML = questions[offset].Question;
    if(!questions[offset].correct_answer){
        questions[offset].correct_answer = null;
    }
for(an of questions[offset].answers){
    console.log(an);
    console.log(questions[offset].correct_answer);

    var som = createItem(an.Answer,(an.AnswerID == questions[offset].correct_answer));
    if(!list){
                    var list = document.getElementById('list');
                }
    list.appendChild(som);
}
    list.appendChild(createItem());
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

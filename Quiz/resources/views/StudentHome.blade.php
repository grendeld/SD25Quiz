@extends('layout')
@section ('header')
<title>Student home</title>
<link rel="icon" href="images/cap.ico">

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
</head>
@stop
@section ('content')
<div class="container-fluid">
<div class="row">
        <div class="banner">

          top banner display logged in username, program-name and date<br/>
          TEST SESSION PAGE and LOG OUT PAGE - link buttons will be here
        </div>



          <div class="col-md-3">
          <img width='200' height='250' src='storage/{{$student->Photo}}'/>

          </div>

          <div class="col-md-3">
            <h3>{{$student->FirstName}} {{$student->LastName}}</h3>

StudentID: {{$student->StudentID}} <br/>
Program: {{$student->intake->program->ProgramName}} <br/>
Intake: {{$student->intake->IntakeName}}
          </div>

<div class="col-md-12">
<br/>
<hr>
<h4>Available quizzes:</h4>
@foreach($tests as $t)
{{$t->TestID}}
{{$t->quiz->QuizName}}<input type="button" onclick = "StartQuiz({{$t->TestID}})" value="Start Quiz" />
<br/>
@endforeach

<br/>
<hr>
</div>
      </div>
            </div>

      @stop


<script>


function StartQuiz(QuizID)
{
  window.location.href="test/Student/" + QuizID;
}

function CheckQuiz()
{
  $('#divCheckResult').empty();
  $.ajax({
    url:'/QuizCheck',
    type:'get',
    data:{q:1},
    success:function(data){
      console.log(data);
      if(data.length>0)
      {
        $.each(data,function(i,test){
          var p = document.createElement("p");
          p.onclick = function(object){
            return function(){
              divCheckResult(object);
            }
          }(test);

          $('#divCheckResult').append(p);
          $(location).attr('href', 'http://127.0.0.1:8000/test/Student')
        });

      }
      else
      {
        $('#divCheckResult').append('No test available');
      }
    }
    });
}
</script>

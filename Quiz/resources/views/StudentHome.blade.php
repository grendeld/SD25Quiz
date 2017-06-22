@extends('layout')
@section ('header')
<title>Student home</title>
<link rel="icon" href="images/cap.ico">

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
</head>
@stop
@section ('content')
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<div class="container-fluid BKG">
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10 Panelbkg">
=======
=======
>>>>>>> Stashed changes
<div class="container-fluid">
<div class="row BKG">

>>>>>>> Stashed changes
          <div class="col-md-3">
            <img width='200' height='250' src='storage/{{$student->Photo}}'/>
          </div>

          <div class="col-md-3">
<<<<<<< Updated upstream
<<<<<<< Updated upstream
            <h3>{{$student->FirstName}} {{$student->LastName}}</h3>
            <br/>
            <h5>StudentID: {{$student->StudentID}}</h5> <br/>
=======
            <h3>{{$student->FirstName}} {{$student->LastName}}</h3><br/>

            <h5>StudentID: {{$student->StudentID}} </h5><br/>
>>>>>>> Stashed changes
            <h5>Program: {{$student->intake->program->ProgramName}}</h5> <br/>
            <h5>Intake: {{$student->intake->IntakeName}}</h5>
          </div>

          <div class="col-md-12">
<<<<<<< Updated upstream
            <div class="AdminTables">
              <h4>Available quizzes:</h4>

              <table>
                <tr>
                  <th>
                    Quiz
                  </th>
                  <th>
                    Name
                  </th>
                <th>

                </th>
              </tr>
              @foreach($tests as $t)
                <tr>
                    <td>
                      {{$t->TestID}}
                    </td>
                    <td>
                      {{$t->quiz->QuizName}}
                    </td>
                    <td>
                      <input type="button" onclick = "StartQuiz({{$t->TestID}})" value="Start Quiz" />
                    </td>
                </tr>
              @endforeach
            </table>
          </div>

              <hr>
          </div>
        <div class="col-md-1"></div>
        </div>
      </div>
=======
=======
            <h3>{{$student->FirstName}} {{$student->LastName}}</h3><br/>

            <h5>StudentID: {{$student->StudentID}} </h5><br/>
            <h5>Program: {{$student->intake->program->ProgramName}}</h5> <br/>
            <h5>Intake: {{$student->intake->IntakeName}}</h5>
          </div>

          <div class="col-md-12">
>>>>>>> Stashed changes
          <br/>
          <hr>
          <h4>Available quizzes:</h4>
          @foreach($tests as $t)
          {{$t->TestID}}
          {{$t->quiz->QuizName}}<input class="quizbutton" type="button" onclick = "StartQuiz({{$t->TestID}})" value="Start Quiz" />
          <br/>
          @endforeach

          <br/>
          <hr>
          </div>
    </div>
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
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

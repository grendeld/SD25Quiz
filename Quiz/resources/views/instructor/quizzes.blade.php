@extends('layout')

@section ('content')
<div class="container-fluid">
<div class="row BKG">
<div class="col-md-1"></div>
    <div class="col-md-10 Panelbkg">
      <div id="divQuizzez" class="AdminTables">

      <br/>
      <h1>Quizzes:</h1>
      <hr>

      <table>
        <tr>

          <th>Quiz</th>
          <th>Description</th>
          <th>Active</th>
          <th>
                <input type="submit" class="quizbutton" onclick="showNewQuiz()" value="Create New Quiz" />
          </th>
        </tr>

      @foreach($quizzes as $q)
        <tr>
          <td>{{$q->QuizName}}</td>
          <td>{{$q->Description}}</td>
          <td><span id="Active{{$q->QuizID}}" class="quizbutton" onclick="toggleActive({{$q}})">{{$q->Active}}</span></td>
          <td><button type="button" onclick="window.location.href='/quiz/{{$q->QuizID}}'" class="quizbutton">View</button>
          <button type="button" onclick="deleteQuiz({{$q}},{{$q->Tests->count()}})" class="quizbutton">Delete/Hide</button></td>
        </tr>
      @endforeach
      </table>
      <br/>

    </div>





        <div id='divNewQuiz' style="display:none">

          <!---QUIZ BUILDER CONTAINER START--->
            <div class="quizbuildcontainer" id="quizbuildcontainer">
              <!---MODULE  SELECT QUIZ CREATE SECTION START--->
              <div class="quizCreateStart" id="quizCreateStart">


                  <form action="/saveTemplate" method="post">
                        <div class="QBsections1">
                          <h4>Build Template</h4>
                              <div class="QBSelectors">
                                <select class="quizbuttonn" id="QModuleSelect" name="ModuleID" required>
                                  <option value=" " disabled selected>--Select Module--</option>
                                  @foreach($modules as $m)
                                  <option value="{{$m->ModuleID}}">{{$m->ModuleName}}</option>
                                  @endforeach
                                </select>
                              </div>

                              <div class="QBSelectors">
                                <label for="testname">Quiz Name: </label>
                                <input type="text" id="testName" name="QuizName" required/>
                              </div>
                        </div>
                      </div>
                        <!---MODULE  SELECT QUIZ CREATE SECTION END--->
                        <!---CREATE QUIZ TEMPLATE BUTTON START--->
                        <div class="QBsections1" id="createQuizButton">
                              <div class="QBSelectorss">
                                <input type="submit" class="quizbutton" value="Create Quiz Template"/>
                              </div>
                        </div>
                        <!---CREATE QUIZ TEMPLATE BUTTON END--->
                  {!! csrf_field() !!}
                  </form>

          <!-- <br/>
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
        </form> -->
        </div>
  </div>
<div class="col-md-1"></div>
</div>
</div>




<script type="text/javascript">

function toggleActive(quiz){

  $.ajax({
    url:'/quizToggleActive',
    type:'get',
    data:{'q':quiz.QuizID},
    success:function(data)
    {alert(data);
      document.getElementById("Active" + quiz.QuizID).innerHTML=data;
    }
    });
}

function deleteQuiz(quiz,tests_count){

alert(tests_count);
   if (tests_count > 0)
 {
   dialog.setAttribute("title","Delete Quiz");
   dialog.innerHTML = "Cannot delete deployed quiz. Do you want to hide it?";
   $( "#dialog" ).dialog({
    modal:true,
    buttons: [
      { text: "No",
        click: function() {
          $( this ).dialog( "close" );
        }},
        { text:"Yes",
      click:function(){
        $( this ).dialog( "close" );
        window.location.replace('/quiz/' + quiz.QuizID + '/delete');
      }}
    ] // buttons
    });
 }
 // else {
//   divQuizHead.style.display = "none";
//   var x = document.getElementsByName("edit");
//   for (var i = 0; i < x.length; i++)
//   {
//    x[i].style.display = "block";
//   }
}



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

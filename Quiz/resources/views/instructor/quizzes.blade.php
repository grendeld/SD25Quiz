@extends('layout')

@section ('content')




<div id="divQuizzez" class="AdminTables">
  <div >
    <input type="submit" class="quizbutton" onclick="showNewQuiz()" value="Create New Quiz" />
  </div>
<br/>
<h1>Quizzes:</h1>
<hr>

<table>
  <tr>

    <th>Quiz</th>
    <th>Description</th>
    <th>Active</th>
  </tr>

@foreach($quizzes as $q)
  <tr>
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

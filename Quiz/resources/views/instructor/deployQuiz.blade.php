
@extends('layout')

@section ('content')

<div class="container-fluid">
  <div class="row BKG">
      <div class="col-md-2"></div>
      <div class="col-md-8 Panelbkg">
        <div id="quizdeployTABcontainer" class="AdminTables" style="display:block">

          My intakes:
          <select class="quizbuttonn" name="" id="selectIntake" autocomplete="off" onchange="javascript:getQuizzesAndStudents()">
            <option value="-1" selected disabled> Choose intake </option>
            @foreach($intakes as $i)
            <option value="{{$i->load('students')}}">{{$i->IntakeName}}</option>

        }]);
            @endforeach
            </select>
            <br/><br/>
            <form name = "formDeployTest" action='/startTest' method='post'>
        <h3>Quizzes:</h3>

            <div id="divQuizForTest">

            </div>

        <h3>Students:</h3>
            <div id="divStudentsForTest" >

            </div>
<<<<<<< Updated upstream
            <br/>
            <button type="submit" onclick='javascript: StartTest();' id="btnStart" style="display:none;">Start test</button>
=======

            <button class="quizbutton" type="submit" onclick='javascript: StartTest();' id="btnStart" style="display:none;">Start test</button>
>>>>>>> Stashed changes
                {{ csrf_field() }}

        </form>
        </div>
      </div>
      <div class="col-md-2"></div>
  </div>
</div>

@stop

<div id="quizdeployTABcontainer">

  My intakes:
  <select class="" name="" id="selectIntake" autocomplete="off" onchange="javascript:getQuizzesAndStudents()">
    <option value="-1" selected disabled> Choose intake </option>
    @foreach($intakes as $i)
    <option value="{{$i->load('students')}}">{{$i->IntakeName}}</option>

}]);
    @endforeach
    </select>
    <form name = "formDeployTest" action='/startTest' method='post'>
<h3>Quizzes:</h3>

    <div id="divQuizForTest">

    </div>

<h3>Students:</h3>
    <div id="divStudentsForTest" >

    </div>

    <button type="submit" onclick='javascript: StartTest();' id="btnStart" style="display:none;">Start test</button>
        {{ csrf_field() }}

</form>
</div>

<div id="quizdeployTABcontainer">

  My intakes:
  <select class="" name="" id="selectIntake" autocomplete="off" onchange="javascript:getQuizzesAndStudents()">
    <option value="-1" selected disabled> Choose intake </option>
    @foreach($intakes as $i)
    <option value="{{$i->load('students')}}">{{$i->IntakeName}}</option>

}]);
    @endforeach
    </select>
    <form name = "formDeployTest">
<h3>Quizzes:</h3>

    <div id="divQuizForTest">

    </div>

<h3>Students:</h3>
    <div id="divStudentsForTest" >

    </div>

    <button type="button" onclick='javascript: StartTest();' id="btnStart" style="display:none;">Start test</button>

</form>
</div>

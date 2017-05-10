<div id="quizdeployTABcontainer">

  My intakes:
  <select class="" name="" id="selectIntake">
    @foreach($intakes as $i)
    <option value="{{$i->IntakeID}}" onclick="javascript: getQuizzesAndStudents();">{{$i->IntakeName}}</option>
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

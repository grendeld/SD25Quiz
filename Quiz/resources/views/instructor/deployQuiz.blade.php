<div id="quizdeployTABcontainer">

  My intakes:
  <select class="" name="" id="selectIntake">
    @foreach($intakes as $i)
    <option value="{{$i->IntakeID}}" onclick="javascript: getStudents();">{{$i->IntakeName}}</option>
    @endforeach
    </select>

    <div id="divStudents" >

    </div>


</div>

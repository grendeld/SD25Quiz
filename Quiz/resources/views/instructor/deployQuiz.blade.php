<div id="quizdeployTABcontainer">

  My intakes:
  <select class="" name="">
    @foreach($intakes as $i)
    <option value="{{$i->IntakeID}}">{{$i->IntakeName}}</option>
    @endforeach
  </select>

</div>

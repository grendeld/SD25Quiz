<head>
<script type="text/javascript" src="js/adminHome.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
</head>

<div id="divIntakes" >

  <button onclick="javascript:Add_new_intake()">Add new intake</button>

  <table>
    <tr>
      <th>Intake</th><th>Program</th>
    </tr>
    @foreach($intakes as $in)
      <tr>
        <td>{{$in->IntakeName}}</td><td>{{$in->program->ProgramName}}</td>
        <td><button onclick="javascript:divOneIntakeShow({{$in->load('students')}})">Students</button></td>
      </tr>
      @endforeach
  </table>
</div>

<div id="divOneIntake" style="display:none">
<ul id = "StudentsList"></ul>
<button onclick="javascript:Add_new_student_to_intake()">Add new student to intake</button>
</div>

<div id="divNewIntake" style="display:none">
  <form action="/newintake" method="post">
    Program:
    <select id="selectProgramID" name="ProgramID" autocomplete="off" required="">
      <option value="-1" selected disabled>--Select Program--</option>
      @foreach($programs as $p)
      <option value="{{$p->ProgramID}}">{{$p->ProgramName}}</option>
      @endforeach
    </select>
    <br/>
    Intake Name: <input type = "text" id="txtIntakeName" name="IntakeName" required>
    <br/>
    {!! csrf_field() !!}
    <button type="submit">Save</button>
    <button type = "button" onclick="javascript:Add_new_intake()">Cancel</button>
  </form>

</div>

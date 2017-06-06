@extends('layout')
@section ('header')
<title>Admin home</title>
<link rel="stylesheet" href="css/adminstyles.css">
<script type="text/javascript" src="js/adminHome.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<!--[if IE]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<style >
.divSearchResult:empty{
  border:none;
}

.divSearchResult{
  border:1px solid black;
  background-color: lightgrey;
  margin:0;
  padding:0;
}
.SearchResultString:hover {
  color:navy;
  background-color:grey;
}

.AddNewIntake{
  color:blue;
}

.AddNewIntake:hover{
  text-decoration: underline;
}

#imgStudent{
  width:200px;
  height: 250px;
}



</style>
</head>
@stop
@section ('content')



  <div class="row">
    <div class="selectPanel">
        <div class="col-md-3">
          <input type="button" value="Programs"
          onclick="javascript: showProgramsPanel()"/>
        </div>
        <div class="col-md-3">
            <input type="button" value="Instructors"
            onclick="javascript: showInstructorsPanel()" />
        </div>
        <div class="col-md-3">
            <input type="button" value="Intakes"
            onclick="javascript: showIntakesPanel()"/>
        </div>
        <div class="col-md-3">
            <input type="button" value="Students"
            onclick="javascript: showStudentsPanel()"/>
        </div>

    </div>
  </div>
            <!---PANEL SELECT AREA START--->
            <div class="col-md-4 AdminLeftSide">
                <div class="col-md-12 AdminSidePanelInput">

<div id="ProgramsPanel" style="display:none">
                      <label for="selectProgram">Programs:</label>
                      <select id="selectProgram" autocomplete="off" onchange="javascript:divProgramShow(this.value)" >
                        <option value="-1" selected disabled>Choose program...</option>
                        @foreach ($programs as $p)
                        <option value="{{$p->load('modules')}}">
                          {{$p->ProgramName}}
                        </option>
                      @endforeach
                      </select>
                      <br/>
                      <a href="/program/add">Add new progam</a>
                      <br/>

</div>
<div id="InstructorsPanel" style="display:none">
                    <label for="selectInstructor">Instructors:</label>
                    <select id="selectInstructor" autocomplete="off" onchange="javascript:divInstructorShow(this.value)" >
                      <option value="-1" selected disabled>Choose instructor...</option>
                      @foreach ($instructors as $i)
                      <option value="{{$i->load('intakes')}}">
                        {{$i->FirstName}} {{$i->LastName}}
                      </option>
                    @endforeach
                    </select>
                    <br/>
                    <a href="/instructor/add">Add new instructor</a>
                    <br/>
</div>

<div id="IntakesPanel" style="display:none">
                    <label for="selectIntake">Intakes:</label>
                    <select id="selectIntake" autocomplete="off" onchange="javascript:divIntakeShow(this.value)" >
                      <option value="-1" selected disabled>Choose intake...</option>
                      @foreach ($intakes as $int)
                      <option value="{{$int->load('students')}}">
                        {{$int->IntakeName}}
                      </option>
                    @endforeach
                    </select>
                    <br/>
                    <span class="AddNewIntake" onclick="Add_new_intake()">Add new intake</span>
                    <br/>
</div>


<div id="StudentsPanel" style="display:none">
  <br/>
                    <input type="text" id="txtSearchStudent" value="" onkeyup="javascript:SearchStudent()" placeholder="Search for a student...">
                    <button type="button" onclick="javascript:SearchStudent()">Search</button>
                    <div id="divSearchResult" class="divSearchResult"></div>
                    <br/>
                    <a href="/newStudent">Add new student</a>
                    <br/>


</div>


</div>
                <div class="col-md-12 AdminSidePanelView">
                    <p>Select View Instructor Details and Reports Panel</p>
                </div>
                <div class="col-md-12">
                    <p>Extra panel</p>
                </div>
            </div>
              <!---PANEL SELECT AREA END--->
            <!---PANEL VIEW AREA START--->
            <div id="divs" class="col-md-8">

              <div id="divProgram" style="display:none">
                <h3 id='h3ProgramName'></h3>
                <br/>
                <label for="ModulesList">Modules:</label>
                <ul id="ModulesList"></ul>
                <button onclick="javascript:EditProgram()" >Edit Program</button>
                <button onclick="javascript:DeleteProgram()">Delete/Hide Program</button>
                </div>

              <div id="divInstructor" style="display:none">
                <h3 id='h3instructorName'></h3>
                <br/>
                <label for="IntakesList">Intakes:</label>
                <ul id="IntakesList"></ul>
                <button onclick="javascript:showdivEditIntructorIntake()">Edit Intakes</button>                <button onclick="javascript:EditInstructor()" >Edit Instructor</button>
                <button onclick="javascript:DeleteInstructor()"> Delete Instructor</button>
              </div>

                <div id="divIntake" style="display:block">
                <h3 id='h3IntakeName'></h3>
                <ul id = "StudentsList"></ul>
                </div>

                <div id="divStudent" style="display:none">
                  <h3 id='h3StudentName'></h3>
                  <br/>
                  <img id='imgStudent'/>

                  <button onclick="javascript:EditStudent()">Edit Student</button>
                  <button onclick="javascript:DeleteStudent()"> Delete Student</button>
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
                    <button type="submit" >Save</button>
                    <button type = "button" onclick="javascript:hideDivNewIntake()">Cancel</button>
                  </form>

                </div>


              <div id="divEditIntructorIntake" style="display:none">
                <select id="selectIntake" autocomplete="off" >
                  <option value="-1" selected disabled>--Select Intake--</option>
                  @foreach($programs as $p)
                  <option disabled>--{{$p->ProgramName}}--</option>
                  @foreach($p->intakes as $int)
                  <option value = "{{$int}}">{{$int->IntakeName}}</option>
                  @endforeach
                  @endforeach
                </select>

              <button onclick ="javascript:AddInstructorIntake(selectIntake.value)">Add</button>
              <button onclick ="javascript:RemoveInstructorIntake(selectIntake.value)">Remove</button>
            </div>
          </div>



<!-- <div id="divIntakes" style="display:none">
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
</div> -->





              <div id="dialog" title="Message"></div>
</div>
            <!---PANEL VIEW AREA END--->
</div>
</div>

  @stop

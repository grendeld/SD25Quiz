@extends('layout')
@section ('header')
<title>Admin home</title>
<link rel="stylesheet" href="css/adminstyles.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="icon" href="images/cap.ico">
<!--[if IE]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<style >
@font-face{
  font-family:"marzo-w00-regular";
  src: url("https://static.parastorage.com/services/third-party/fonts/user-site-fonts/fonts/e947b76a-edcf-4519-bc3d-c2da35865717.woff");
  }
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

.StudentsList:hover
{
  color:grey;
}

#imgStudent{
  height: 250px;
  width:220px;
}
</style>



<script>
window.onload = function(){
  <?php
  if (isset ($_GET["p"]))
  switch ($_GET["p"])
  {
    case "1" :
          echo "divProgramShow();";
          break;
    case "2" :
          echo "divInstructorShow();";
          break;
    case "3":
          echo "divIntakeShow();";
          break;
    case "4":
          echo "divStudentShow();";
          break;
      }
  ?>
};
</script>

@stop

@section ('content')
<div class="container-fluid">
  <div class="row BKG">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="col-md-5 Panelbkgg">
        <div id="ProgramsPanel" style="display:none">
              <label for="selectProgram">Programs:</label>
              <select class="quizbuttonn" id="selectProgram" autocomplete="off" onchange="javascript:divProgramShow(this.value)" >
                <option value="-1" selected disabled>Choose program...</option>
                @foreach ($programs as $p)
                <option value="{{$p->load('modules')}}">
                  {{$p->ProgramName}}
                </option>
              @endforeach
              </select>
              <br/><br/>
              <a class="quizbutton" href="/program/add">Add Progam</a>
              <br/>

          </div>
        <div id="InstructorsPanel" style="display:none">
            <label for="selectInstructor">Instructors:</label>
            <select class="quizbuttonn" id="selectInstructor" autocomplete="off" onchange="javascript:divInstructorShow(this.value)" >
              <option value="-1" selected disabled>Choose instructor...</option>
              @foreach ($instructors as $i)
              <option value="{{$i->load('intakes')}}">
                {{$i->FirstName}} {{$i->LastName}}
              </option>
            @endforeach
            </select>
            <br/><br/>
            <a class="quizbutton" href="/instructor/add">Add Instructor</a>
            <br/>
        </div>

        <div id="IntakesPanel" style="display:none">
            <label for="selectIntake">Intakes:</label>
            <select class="quizbuttonn" id="selectIntake" autocomplete="off" onchange="javascript:divIntakeShow(this.value)" >
              <option value="-1" selected disabled>Choose intake...</option>
              @foreach ($intakes as $int)
              <option value="{{$int->load('students')}}">
                {{$int->IntakeName}}
              </option>
            @endforeach
            </select>
            <br/><br/>
            <span class="quizbutton" onclick="Add_new_intake()">Add intake</span>
            <br/>
       </div>


       <div id="StudentsPanel" style="display:none">

            <input type="text" id="txtSearchStudent" value="" onkeyup="javascript:SearchStudent()" placeholder="Search for a student...">
            <button type="button" onclick="javascript:SearchStudent()">Search</button>
            <div id="divSearchResult" class="divSearchResult"></div>
            <br/><br/>
            <a class="quizbutton" href="/newStudent">Add Student</a>
            <br/>
        </div>

      </div>
      <div class="col-md-7">
        <div class="Panelbkg" id="divProgram" style="display:none">
          <h3 id='h3ProgramName'></h3>
          <br/>
          <label for="ModulesList">Modules:</label>
          <ul id="ModulesList"></ul>
          <button class="quizbutton" onclick="javascript:EditProgram()" >Edit Program</button>
          <button class="quizbutton" onclick="javascript:DeleteProgram()">Delete/Hide Program</button>
        </div>

        <div class="Panelbkg" id="divInstructor" style="display:none">
          <h3 id='h3instructorName'></h3>
          <button class="quizbutton" onclick="javascript:EditInstructor()" >Edit Instructor</button>
          <button class="quizbutton" onclick="javascript:DeleteInstructor()"> Delete Instructor</button>
          <br/>
          <label for="IntakesList">Intakes:</label>
          <p id="IntakesList"></p>

          <button class="quizbutton" onclick ="javascript:RemoveInstructorIntake()">Remove</button>
              <br/><br/>
          <button class="quizbutton" onclick="javascript:showdivEditIntructorIntake()">Add Intake</button>

        </div>

          <div class="Panelbkg" id="divIntake" style="display:none">
          <h3 id='h3IntakeName'></h3>
          <ul id = "StudentsList"></ul>
          </div>

          <div class="Panelbkg" id="divStudent" style="display:none">
            <h3 id='h3StudentName'></h3>
            <div id="divEmail"></div>
            <br/>
            <img id='imgStudent'/>
            <br/>
            <br/>

            <button class="quizbutton" onclick="javascript:EditStudent()">Edit Student</button>
            <button class="quizbutton" onclick="javascript:DeleteStudent()"> Delete Student</button>
            <br/>
          </div>


          <div class="Panelbkg" id="divNewIntake" style="display:none">
            <form action="/newintake" method="post">
              Program:
              <select class="quizbuttonn" id="selectProgramID" name="ProgramID" autocomplete="off" required="">
                <option value="-1" selected disabled>--Select Program--</option>
                @foreach($programs as $p)
                <option value="{{$p->ProgramID}}">{{$p->ProgramName}}</option>
                @endforeach
              </select>
              <br/><br/>
              Intake Name: <input type = "text" id="txtIntakeName" name="IntakeName" required>
              <br/><br/>
              {!! csrf_field() !!}
              <button class="quizbutton" type="submit" >Save</button>
              <button class="quizbutton" type = "button" onclick="javascript:hideDivNewIntake()">Cancel</button>
            </form>

          </div>


        <div class="Panelbkg" id="divEditIntructorIntake" style="display:none">
          <select class="quizbuttonn" id="Intake_to_edit" autocomplete="off" >
            <option value="-1" selected disabled>--Select Intake--</option>
            @foreach($programs as $p)
            <option disabled>--{{$p->ProgramName}}--</option>
            @foreach($p->intakes as $int)
            <option value = "{{$int}}">{{$int->IntakeName}}</option>
            @endforeach
            @endforeach
          </select>

        <button class="quizbutton" onclick ="javascript:AddInstructorIntake(Intake_to_edit.value)">Add</button>
      </div>

      </div>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>
  @stop

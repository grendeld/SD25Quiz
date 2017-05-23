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
@stop
@section ('content')
  </head>
            <!---PANEL SELECT AREA START--->
            <div class="col-md-4 AdminLeftSide">
                <div class="col-md-12 AdminSidePanelInput">

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
            <div class="col-md-8">

              <div id="divProgram" style="display:none">
                <h3 id='h3ProgramName'></h3>
                <br/>
                <label for="ModulesList">Modules:</label>
                <ul id="ModulesList"></ul>
                <button onclick="">Add Module</button>
                <button onclick="" >Edit Program</button>
                <button onclick=""> Delete Program</button>
                </div>

              <div id="divInstructor" style="display:none">
                <h3 id='h3instructorName'></h3>
                <br/>
                <label for="IntakesList">Intakes:</label>
                <ul id="IntakesList"></ul>
                <button onclick="javascript:showAddIntake()">Add Intake</button>
                <button onclick="javascript:EditInstructor()" >Edit Instructor</button>
                <button onclick="javascript:DeleteInstructor()"> Delete Instructor</button>
                </div>

              <div id="divSelectIntake" style="display:none">
                <select id="selectIntake" autocomplete="off" >
                  <option value="-1" selected disabled>--Select Intake--</option>
                  @foreach($programs as $p)
                  <option disabled>--{{$p->ProgramName}}--</option>
                  @foreach($p->intakes as $int)
                  <option value = "{{$int}}">{{$int->IntakeName}}</option>
                  @endforeach
                  @endforeach
                </select>

              <button onclick ="javascript:AddIntake(selectIntake.value)">Add</button>
              <button onclick ="javascript:RemoveIntake(selectIntake.value)">Remove</button>
</div>
              <div id="dialog" title="Message"></div>




<hr>
                View selected functions in individual panels
                <br/><br/>
                  1  Add/Remove Programs
                    <br/><br/>
                  2  Add/Remove Instructors and Associate to Program
                    <br/><br/>

                  3  View Selected Instructor details
                    1- Quiz List
                    2- Student pass/fail stats associated with selected instructor
                    3- Other info to be determined
                    <br/>
            </div>
            <!---PANEL VIEW AREA END--->

          </div>
      </div>

  @stop

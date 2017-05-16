@extends('layout')
@section ('header')
<title>Admin home</title>
<link rel="stylesheet" href="css/adminstyles.css">
<script type="text/javascript" src="js/adminHome.js"></script>

<!--[if IE]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
@stop
@section ('content')
  </head>
            <!---PANEL SELECT AREA START--->
            <div class="col-md-4 AdminLeftSide">
                <div class="col-md-12 AdminSidePanelInput">
                    <p>Select Input/edit Programs List Panel</p>
                    <p>Select Input/edit Instructor List Panel</p>
                    <select id="selectInstructor" >
                      <option value="-1" selected>--Instructors--</option>
                      @foreach ($instructors as $i)
                      <option value="{{$i->InstructorID}}" onclick="javascript:divInstructorShow({{$i->load('intakes')}})">
                        {{$i->FirstName}} {{$i->LastName}}
                        @foreach ($i->intakes as $b)
                           {{$b->IntakeName}}
                        @endforeach
                      </option>
                    @endforeach
                    </select>
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


              <div id="divInstructor" style="display:none">
                <h3 id='h3instructorName'></h3>
                <br/>
                <ul id="IntakesList"></ul>
                <button onclick="javascript:showAddIntake()">Add Intake</button>
                <br/>
              </div>

              <div id="divSelectIntake" style="display:none">
                <select>
                  <option value="-1">--Select Intake--</option>
                  @foreach($programs as $p)
                  <option disabled>--{{$p->ProgramName}}--</option>
                  @foreach($p->intakes as $int)
                  <option value = "{{$int->IntakeID}}">{{$int->IntakeName}}</option>
                  @endforeach
                  @endforeach
                </select>
              </div>
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

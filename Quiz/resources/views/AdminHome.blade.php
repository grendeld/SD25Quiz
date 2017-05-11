@extends('layout')
@section ('header')
<title>Admin home</title>
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

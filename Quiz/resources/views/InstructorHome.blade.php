

  @extends('layout')
  @section ('header')
  <title>InstructorHome</title>
  <link rel="icon" href="images/cap.ico">
  <style>
  @font-face{
    font-family:"marzo-w00-regular";
    src: url("https://static.parastorage.com/services/third-party/fonts/user-site-fonts/fonts/e947b76a-edcf-4519-bc3d-c2da35865717.woff");
    }
  </style>
  <!--[if IE]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  @stop
  @section ('content')
    <?php
    $Panel = Session::get('Panel');
    ?>
  <div class="container-fluid">

    <div class="row">
        <div class="selectPanel">
            <div class="col-md-3 TopMenuInstructor">
                    <button class="InstructMenu" onclick="modulebuilder(event, 'moduleTABcontainer')" id="Modulebuilder">
    	             		<span>
    	               		<h4><font face="marzo-w00-regular, fantasy">
                          Create Modules
                      </font></h4>
    	             		</span>
    	             	</button>
            </div>
            <div class="col-md-3 TopMenuInstructor">
                    <button class="InstructMenu" onclick="quizbuilder(event, 'quizadminTABcontainer')" id="Quizbuilder">
                      <span>
                        <h4><font face="marzo-w00-regular, fantasy">
                           Create Quiz
                      </font></h4>

                      </span>
                    </button>
            </div>
            <div class="col-md-3 TopMenuInstructor">
                    <button class="InstructMenu" onclick="quizviewshare(event, 'quizshareTABcontainer')" id="QuizView">
                      <span>
                        <h4><font face="marzo-w00-regular, fantasy">
                          Edit Quizzes
                      </font></h4>
                      </span>
                    </button>
            </div>
            <div class="col-md-3 TopMenuInstructor">
                    <button class="InstructMenu" onclick="quizdeploy(event, 'quizdeployTABcontainer')" id="QuizDeploy">
                      <span>
                        <h4><font face="marzo-w00-regular, fantasy">
                          Deploy Quiz
                      </font></h4>
                      </span>
                    </button>
            </div>
        </div>
      </div>
      <!---MENU PANEL END--->
        <!---INSTRUCTOR HOME PAGE START--->
        <div class="row">
            <!---WORK AREA START--->
            <div class="col-md-6">
              <div class="workarea">
                  <!---MODULE TAB START--->
                  @include('instructor.moduleContainer')
                  <!---MODULE TAB END--->

                  <!---QUIZ ADMIN START--->
                  @include('instructor.quizAdmin')

                  <!---QUIZ ADMIN END--->
                  <!---QUIZ VIEW SHARE START--->
                  <div id="quizshareTABcontainer">
                      <div class="AdminPanell">
                          @foreach($quizzes as $q)
                          <p>{{$q->QuizName}}</p>

                          @endforeach
                      </div>
                  </div>
                  <!---QUIZ VIEW SHARE END--->
                  <!---QUIZ DEPLOY START--->
                  @include('instructor.deployQuiz')
                  <!---QUIZ DEPLOY END--->
              </div>
            </div>
            <!---WORK AREA END--->
            <!---WORK VIEW START--->
            <div class="col-md-6">
              <div id="divWorkView" class="workview">
                  <!---MODULE LIST VIEW START--->
                  @include('instructor.moduleList')
                  <!---MODULE LIST VIEW END--->

                  <!---QUESTIONLIST VIEW START--->
                  @include('instructor.questionList')
                  <!---QUESTIONLIST VIEW END--->
                  <!---TEMPLATE LIST VIEW START--->
                  <div id="TemplateListViewTABcontainer">
Templates:
                      <div id="divQuizzez">
<h1>Quizzes:</h1>
<hr>
<table>
  <tr>
    <th>Program</th>
    <th>Module</th>
    <th>Quiz</th>
    <th>Description</th>
    <th>Active</th>
  </tr>

@foreach(Auth::user()->quizzes as $q)
  <tr>
    <td>{{$q->Module->Program->ProgramName}}</td>
    <td>{{$q->Module->ModuleName}}</td>
    <td>{{$q->QuizName}}</td>
    <td>{{$q->Description}}</td>
    <td>{{$q->Active}}</td>
    <td><a href="/quiz/{{$q->QuizID}}">Show Quiz</a></td>
    <td><a href="/quiz/{{$q->QuizID}}/delete">Delete Quiz</a></td>
  </tr>
@endforeach
</table>

<button onclick="return showNewQuiz()">Add new quiz</button>

<hr>
</div>
                  </div>
                  <!---TEMPLATE LIST VIEW END--->
                  <!----QUESTIONANSWER BUILDER START---->
                  @include('instructor.QAbuilder')
                  <!------QUESTIONANSWER BUILDER END---->
                  <!---STUDENT LIST VIEW START---->
                  <div id="StudentListViewTABcontainer">

                  </div>
                  <!---STUDENT LIST VIEW END--->
              </div>
            </div>
            <!---WORK VIEW END--->

        </div>
  <!---INSTRUCTOR HOME PAGE END--->
</div>
  @stop



  @extends('layout')
  @section ('header')
  <title>InstructorHome</title>
  <link rel="icon" href="images/cap.ico">
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
    	               		<h4>Create Modules</h4>
    	             		</span>
    	             	</button>
            </div>
            <div class="col-md-3 TopMenuInstructor">
                    <button class="InstructMenu" onclick="quizbuilder(event, 'quizadminTABcontainer')" id="Quizbuilder">
                      <span>
                        <h4>Quiz Admin</h4>
                      </span>
                    </button>
            </div>
            <div class="col-md-3 TopMenuInstructor">
                    <button class="InstructMenu" onclick="quizviewshare(event, 'quizshareTABcontainer')" id="QuizView">
                      <span>
                        <h4>View Quizes</h4>
                      </span>
                    </button>
            </div>
            <div class="col-md-3 TopMenuInstructor">
                    <button class="InstructMenu" onclick="quizdeploy(event, 'quizdeployTABcontainer')" id="QuizDeploy">
                      <span>
                        <h4>Deploy Quiz</h4>
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
                  </div>
                  <!---TEMPLATE LIST VIEW END--->
                  <!---QUIZ LIST VIEW START--->
                  <div id="QuizListViewTABcontainer">
Quizzes:
                  </div>
                  <!---QUIZ LIST VIEW END--->
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

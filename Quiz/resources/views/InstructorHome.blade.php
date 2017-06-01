@extends('layout')
  @section ('header')
  <title>InstructorHome</title>
  <!--[if IE]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  @stop
  @section ('content')
    <?php
    $Panel = Session::get('Panel');
    ?>
  <div class="container-fluid">

  <!---MENU PANEL START--->
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

  <!---QUIZ ADMIN START--->
      @include('instructor.quizAdmin')
  <!---QUIZ ADMIN END--->

  <!---MODULE ADMIN START--->
      @include('instructor.moduleContainer')
  <!---MODULE ADMIN END--->

  <!---DEPLOY ADMIN START--->
      @include('instructor.deployQuiz')
  <!---DEPLOY ADMIN END--->

  <script type="text/javascript">

  function showNewQuiz(){
  divQuizzez.style.display = "none";
  divNewQuiz.style.display = "block";
  return false;
  }

  function hideNewQuiz(){
  divQuizzez.style.display = "block";
  divNewQuiz.style.display = "none";
  return false;
  }
  </script>


  @stop

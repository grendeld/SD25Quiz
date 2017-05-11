<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Quiz Builder</title>
  	<link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/quizeditViewerPanel.css">
    <link rel="stylesheet" href="css/ModuleBuilder.css">
  	<link rel="stylesheet" href="css/bootstrap.min.css">
  	<link rel="stylesheet" href="css/bootstrap.css">
  	<link rel="stylesheet" href="css/bootstrap-grid.css">
  	<link rel="stylesheet" href="css/bootstrap-grid.min.css">

	<script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/quizAPP.js"></script>

    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php
    $Panel = Session::get('Panel');
    ?>
  <div class="container-fluid">
    <!---INSTRUCTOR HOME PAGE START--->
        <div class="row">
          <div class="banner">
            top banner display logged in username, program-name and date<br/>
            TEST SESSION PAGE and LOG OUT PAGE - link buttons will be here
          </div>
        </div>
        <!---MENU PANEL START--->
        <div class="row">
          <div class="selectPanel">
              <div class="col-md-3">
                <input type="button" value="Create Modules" id="Modulebuilder"
                onclick="javascript: modulebuilder();"/>
              </div>
              <div class="col-md-3">
                  <input type="button" value="Create Quiz" id="Quizbuilder"
                  onclick="javascript: quizbuilder();" />
              </div>
              <div class="col-md-3">
                  <input type="button" value="View Quizes" id="QuizView"
                  onclick="javascript: quizviewshare();"/>
              </div>
              <div class="col-md-3">
                  <input type="button" value="Deploy Quiz" id="QuizDeploy"
                  onclick="javascript: quizdeploy();"/>
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
                      

@foreach($quizzes as $q)                  
<p>{{$q->QuizName}}</p>

@endforeach
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
              <div class="workview">
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
  </body>
  </html>

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1"/>
      <meta name="description" content="">
      <meta name="keywords" content="">
      <link rel="stylesheet" href="/css/styles.css">
      <link rel="stylesheet" href="/css/bootstrap.min.css">
      <link rel="stylesheet" href="/css/bootstrap.css">
      <link rel="stylesheet" href="/css/bootstrap-grid.css">
      <link rel="stylesheet" href="/css/bootstrap-grid.min.css">

<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/quizAPP.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>


@yield('header')
<title>SD25Quize app</title>
    </head>
    <body>

        <div class="container-fluid">
            <div class="row MainMenu">
              <div class="selectPanell">
                  <div class="col-md-4">
                      <h1><b>Quiz Master 2000</b></h1>
                  </div>

                  <div class="col-md-2 TopMenuInstructor">
                          <a href="/student" class="InstructMenu" id="MMStudentLink">
          	             		<span class="MainMenuItem">
          	               		<h4>Students</h4>
          	             		</span>
          	             	</a>
                  </div>
                  <div class="col-md-2 TopMenuInstructor">
                          <a href="/quizzes" class="InstructMenu" id="MMQuizzesLink">
                            <span class="MainMenuItem">
                              <h4>Quizzes</h4>
                            </span>
                          </a>
                  </div>
                  <div class="col-md-2 TopMenuInstructor">
                          <a href="/adminHome" class="InstructMenu" id="MMAdminLink">
                            <span class="MainMenuItem">
                              <h4>Admin Home</h4>
                            </span>
                          </a>
                  </div>
                  <div class="col-md-2 TopMenuInstructor">
                          <a href="/instructorHome" class="InstructMenu"  id="MMInstructorHomeLink">
                            <span class="MainMenuItem">
                              <h4>Instructor Home</h4>
                            </span>
                          </a>
                  </div>
              </div>

            </div>


@yield('content')
@yield('footer')
<hr>
footer from Master Page
    </body>
</html>

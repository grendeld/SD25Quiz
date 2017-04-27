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

        <title>SD25Quize app</title>
@yield('header')
    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 banner">
                <a href="/student">Students</a>
                <a href="/quizzes">Quizzes</a>
                <a href="/instructor">Instructors</a>
                <a href="/program">Programs</a>
              </div>
            </div>


@yield('content')
@yield('footer')
<hr>
footer from Master Page
    </body>
</html>

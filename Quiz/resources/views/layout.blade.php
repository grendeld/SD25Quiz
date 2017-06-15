<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1"/>
      <meta name="description" content="">
      <meta name="keywords" content="">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="stylesheet" href="/css/styles.css">
      <link rel="stylesheet" href="/css/adminstyles.css">
      <link rel="stylesheet" href="/css/ModuleBuilder.css">
      <link rel="stylesheet" href="/css/bootstrap.min.css">
      <link rel="stylesheet" href="/css/bootstrap.css">
      <link rel="stylesheet" href="/css/bootstrap-grid.css">
      <link rel="stylesheet" href="/css/bootstrap-grid.min.css">

<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/quizAPP.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>

<style>
@font-face{
  font-family:"marzo-w00-regular";
  src: url("https://static.parastorage.com/services/third-party/fonts/user-site-fonts/fonts/e947b76a-edcf-4519-bc3d-c2da35865717.woff");
  }
</style>

@yield('header')
<title>SD25Quize app</title>
    </head>
    <body>

        <div class="container-fluid">

            <div class="row MainMenu">
              <div class="selectPanell">
                <div class="col-md-12">
                  <div class="col-md-9"></div>
                  <div class="col-md-3">
                    {{date("Y/m/d H:i:s")}}
                    {{config('app.timezone')}}
                  </div>

                </div>
                  <div class="col-md-2">
                    <img src="images/owlEdit1.png" height="150" width="150"/>
                  </div>
                  <div class="col-md-8">
                      <p style="font-size:82px;"><font face="marzo-w00-regular, fantasy">
                        Quizard
                    </font></p>
                  </div>
                  <div class="col-md-2 ">
                    <a href="{{ route('logout') }}" class="InstructMenu"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                          <span class="MainMenuItem">
                            <h5 ><font face="marzo-w00-regular, fantasy">
                              Log Out
                          </font></h5>
                          </span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                        </form>
                  </div>

              </div>

            </div>


    </div>
       @if(Auth::guard('admins')->check())
         Hello {{Auth::guard('admins')->user()->FirstName}}
        @elseif(Auth::guard('instructors')->check())
          Hello {{Auth::guard('instructors')->user()->FirstName}}
        @elseif(Auth::guard('students')->check())
          Hello {{Auth::guard('students')->user()->FirstName}}
        @endif

@yield('content')
@yield('footer')
<hr>
footer from Master Page
    </body>
</html>

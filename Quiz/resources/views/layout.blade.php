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
<link rel="icon" href="images/cap.ico">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>

<style>
@font-face{
  font-family:"marzo-w00-regular";
  src: url("https://static.parastorage.com/services/third-party/fonts/user-site-fonts/fonts/e947b76a-edcf-4519-bc3d-c2da35865717.woff");
  }
</style>

@yield('header')
<title>Quizard</title>
    </head>
    <body>

        <div class="container-fluid">

            <div class="row MainMenu">

              <div class="selectPanell">

                  <div class="col-md-9 quizBKG">
                      <!--<img src="images/owlEdit1.png" class="scale-image"/>-->
                      <p style="font-size:82px;"><font face="marzo-w00-regular, fantasy" style="color:black; padding-left:3em;">
                        Quizard
                    </font></p>
                  </div>
                <div class="col-md-3">
                  <div class="BannerTop">
                  {{date("F j, Y, g:i:s a")}}
                </div>

                  <br/>
                  <div class="BannerTop">
                  @if(Auth::guard('admins')->check())
                    Hello {{Auth::guard('admins')->user()->FirstName}}
                   @elseif(Auth::guard('instructors')->check())
                     Hello {{Auth::guard('instructors')->user()->FirstName}}
                   @elseif(Auth::guard('students')->check())
                     Hello {{Auth::guard('students')->user()->FirstName}}
                   @endif
                 </div>


                    <a href="{{ route('logout') }}" class="InstructMenu"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                          <span class="MainMenuItem">
                            <h5 >

                            <font face="marzo-w00-regular, fantasy" style="color:black;"><strong>
                              Log Out
                          </strong></font></h5>
                          </span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                        </form>


                  </div>


              </div>

            </div>
            @if (Auth::guard('admins')->user())
            @include('AdminMenu')
            @endif


            @if (Auth::guard('instructors')->user())
            @include('InstructorMenu')
            @endif

    </div>

@yield('content')
@yield('footer')
<div id="dialog" title="Message"></div>
    </body>
    <script>
        var dateDiv = document.getElementsByClassName("BannerTop")[0];
        var time = new Date(dateDiv.innerHTML);
        var monthsf = ["January","February","March","April","May","June","July","August","September","October","November","December"];
        setInterval(function(){
         time.setSeconds(time.getSeconds() +1);
            dateDiv.innerHTML = monthsf[time.getMonth()]+ " " + time.getDate() + ", "+  time.getFullYear() + ", " + (((h=time.getHours())>12)? (h-12):(h==0)?12:h)+ ":" + (((m = time.getMinutes()) < 10)? ("0" + m): m) + ":" + (((s = time.getSeconds()) < 10)? ("0" + s): s) + " " + ((h<12)?"am":"pm");
        },1000);
    </script>
</html>

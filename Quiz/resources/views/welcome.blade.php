<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Quizard</title>
        <link rel="stylesheet" href="/css/styles.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="icon" href="images/cap.ico">
        <style>
        @font-face{
          font-family:"marzo-w00-regular";
          src: url("https://static.parastorage.com/services/third-party/fonts/user-site-fonts/fonts/e947b76a-edcf-4519-bc3d-c2da35865717.woff");
          }
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            h1{
              background: #636b6f;
              background: -webkit-linear-gradient(top, #878787, #000,#00001a);
	            background: linear-gradient(top, #878787, #000,#00001a);
              background: -o-linear-gradient(top, #878787, #000,#00001a);
              background: -moz-linear-gradient(top, #878787, #000,#00001a);
	            -webkit-background-clip: text;
	             -webkit-text-fill-color: transparent;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
      <div class="BKG">
        <div class="flex-center position-ref full-height frontBKG">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}"><font face="marzo-w00-regular, fantasy" style="color:black;">
                      Login
                  </font></a>
                    <a href="{{ url('/register') }}"><font face="marzo-w00-regular, fantasy" style="color:black;">
                      Register
                  </font></a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                  <h2>
                    <font face="marzo-w00-regular, fantasy" style="margin-left:350px;">
                      Quizard
                  </font>
                </h2>


                </div>

                <div class="links">

                </div>
            </div>
        </div>
      </div>
    </body>
  </div>
</html>

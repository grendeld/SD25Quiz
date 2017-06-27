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
        svg {
          position:absolute;
          top:0;
          left:0;
        }
        path {
          fill: rgba(5,5,178,0.4);
          /*fill: rgba(100,80,60,0.5);
          stroke: rgba(255,215,0,0.6);*/
          stroke:rgba(5,5,128,0.3);
          stroke-width: 580.5px;
        }
        @font-face{
          font-family:"marzo-w00-regular";
          src: url("https://static.parastorage.com/services/third-party/fonts/user-site-fonts/fonts/e947b76a-edcf-4519-bc3d-c2da35865717.woff");
          }
          .frontBKG{

            background-image: url('../images/OWLBKGfront.png');
            background-size: contain;
            background-repeat: no-repeat;

          }

          /*.BKG{
              min-height: 100vh;

              background-color: rgb(46, 134, 193);
              background: -webkit-linear-gradient(-75deg, rgba(169, 204, 227,0.2), rgba(46, 134, 193,1));
              background: -o-linear-gradient(-75deg, rgba(169, 204, 227,0.2), rgba(46, 134, 193,1));
              background: -moz-linear-gradient(-75deg, rgba(169, 204, 227,0.2), rgba(46, 134, 193,1));
              background: linear-gradient(-75deg, rgba(169, 204, 227,0.2), rgba(46, 134, 193,1));

          }*/

            html, body {
                background-color: rgba(5,5,178,0.4);
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                padding:0;
                overflow: hidden;
            }
            h2{
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
            .logLink {
              padding: 0 25px;
              font-size: 16px;
              font-weight: 600;
              letter-spacing: .1rem;
              position: absolute;
              right: 30px;
              top: 18px;
            }
            .logLink:hover{
              -ms-transform: scale(2,2); /* IE 9 */
              -webkit-transform: scale(2,2); /* Safari */
              transform: scale(2,2); /* Standard syntax */
              border-style: solid;
              border-color: #636b6f;
            }
            .logLink > a {
              color: #636b6f;
              text-decoration: none;
              text-transform: uppercase;
            }
            .regLink{
              color: #636b6f;
              padding: 0 25px;
              font-size: 16px;
              font-weight: 600;
              letter-spacing: .1rem;
              text-decoration: none;
              text-transform: uppercase;
              position: absolute;
              left: 30px;
              top: 18px;
            }
            .regLink:hover{
              -ms-transform: scale(2,2); /* IE 9 */
              -webkit-transform: scale(2,2); /* Safari */
              transform: scale(2,2); /* Standard syntax */
              border-style: solid;
              border-color: #636b6f;
            }
            .regLink > a {
              color: #636b6f;
              text-decoration: none;
              text-transform: uppercase;
            }
        </style>
    </head>
    <body>
      <script src="//d3js.org/d3.v3.min.js"></script>
      <script>

      var width = 1364,
          height = 765;

      var start = Date.now(),
          points = [];

      var bounds = d3.geom.polygon([
        [-width / 2, -height / 2],
        [-width / 2, +height / 2],
        [+width / 2, +height / 2],
        [+width / 2, -height / 2]
      ]);

      circle(0, 0, 60, 96, -.001); //120
      circle(0, 0, 90, 10, .03);
      circle(0, 0, 60, 3, -.05); //60
      circle(0, 0, 0, 1, -.02);


      var line = d3.svg.line()
          .interpolate("basis-closed");

      var svg = d3.select("body").append("svg")
          .attr("width", width)
          .attr("height", height)
          .append("g")
          .attr("transform", "translate(" + (width / 2) + "," + (height / 2) + ")");


      var path = svg.selectAll("path")
          .data(points)
        .enter().append("path");


      d3.timer(function() {
        var voronoi = d3.geom.voronoi(points).map(function(cell) { return bounds.clip(cell); });
        path.attr("d", function(point, i) { return line(resample(voronoi[i]));
      });
      });
      function circle(cx, cy, r, n, δθ) {
        d3.range(1e-6, 1.1 * Math.PI, 2.8 * Math.PI / n).map(function(θ, i) {
          var point = [cx + Math.cos(θ) * r, cy + Math.sin(θ) * r];
          d3.timer(function(elapsed) {
            var angle = θ + δθ * elapsed / 1000;
            point[0] = cx + Math.cos(angle) * r;
            point[1] = cy + Math.sin(angle) * r;
          }, 0, start);
          points.push(point);
          return point;
        });
      }

      function resample(points) {
        var i = -1,
            n = points.length,
            p0 = points[n - 1], x0 = p0[0], y0 = p0[1], p1, x1, y1,
            points2 = [];
        while (++i < n) {
          p1 = points[i], x1 = p1[0], y1 = p1[1];
          points2.push(
            [(x0 * 2 + x1) / 3, (y0 * 2 + y1) / 3],
            [(x0 + x1 * 2) / 3, (y0 + y1 * 2) / 3],
            p1
          );
          p0 = p1, x0 = x1, y0 = y1;
        }
        return points2;
      }

      </script>
        <div class="flex-center position-ref full-height frontBKG">
            @if (Route::has('login'))
                <div class="links">
                  <div class="logLink">
                    <a href="{{ url('/login') }}"><font face="marzo-w00-regular, fantasy" style="color:black;">
                      Login
                  </font></a>
                </div>
                <div class="regLink">
                    <a href="{{ url('/register') }}"><font face="marzo-w00-regular, fantasy" style="color:black;">
                      Register
                  </font></a>
                </div>
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
    </body>
  </div>
</html>

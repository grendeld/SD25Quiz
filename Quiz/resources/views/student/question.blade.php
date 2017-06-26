<!DOCTYPE html>
<html lang="en">
    <?php $question = ($get = isset($quest)? $quest : session()->get("testProvider")->current());?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Student Testing Page</title>
	<link rel="stylesheet" href="css/styles.css">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-grid.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">

	<script src="js/bootstrap.min.js"></script>

    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container-fluid">
      <div class="row BKG">
        <form method="post" action="/test/Page">
          <div class="QuestionPanel">
            <div class="col-md-7 TestQuestion">
                <div class="CurrentTestQuestion">
                      <h3>{{$question->question}}</h3>
                </div>
            </div>
            <div class="col-md-5 AnswerSet">
                @foreach($question->options as $key => $option)
                <div class="TestAnswerListCell">
                    <div class="TestAnswerName">
                      <h5>{{$option}}</h5>
                    </div>
                    <div class="TestAnswerSelect">
                      <input type="radio" value="{{$key}}" name="answer"
                             {{($key == $question->response)?"checked" : ""}}/>
                    </div>

                </div>
                @endforeach
                <div class="col-md-12 TestNavSet">

                    <input type="submit" id="sub" value="Save Answer"/>

                </div>
                {{ csrf_field() }}
                <script>
                  var QuestionNum = {{session()->get("testProvider")->getCurrentQuestionP()}};
                parent.currentQuestion = QuestionNum;
                parent.getCurrent();
                  document.getElementById("sub").onclick= function(){
                      var Qlist = window.parent.document.getElementsByClassName('TestListCell');
                      parent.prevQuestion[1] = 'background-color: blue';
                      return true;
                  }
            </script>
            </div>
          </div>
          </div>
        </form>
      </div>
    </div>

  </body>
  </html>

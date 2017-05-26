<!DOCTYPE html>
<html lang="en">
    <?php $question = ($get = isset($quest)? $quest : session()->get("testProvider")->next());?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Student Testing Page</title>
	<link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/quizeditViewerPanel.css">
  <link rel="stylesheet" href="css/ModuleBuilder.css">
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

      <form method="post" action="/test/Page">
        <div class="QuestionPanel">
            <div class="col-md-7 TestQuestion">
                <div class="CurrentTestQuestion">
                      <h1>{{$question->question}}</h1>
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
              </div>

              <div class="col-md-12 TestNavSet">
                
                  <input type="submit" id="sub" value="Next"/>

              </div>
          </div>
          {{ csrf_field() }}
          <script>
            var QuestionNum = {{session()->get("testProvider")->getCurrentQuestionP()}};
          parent.currentQuestion = QuestionNum;
            document.getElementById("sub").onclick= function(){
                var Qlist = window.parent.document.getElementsByClassName('TestListCell');
                Qlist[QuestionNum].getElementsByClassName('TestQuestionStatus')[0].setAttribute('style','background-color: blue');
                return true;
            }
      </script>
          
      </form>
      

  </body>
  </html>
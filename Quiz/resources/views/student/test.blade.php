@extends('layout')

@section('header')
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
<script>
    var currentQuestion;
    var prevQuestion;
    var frame = document.getElementsByTagName("iframe")[0];
    function getQuestion(div){
        if(!frame){
           var frame = document.getElementsByTagName("iframe")[0];
        }
        frame.src="/test/Page/" + div.attributes['questionId'].value;
    }
    function getCurrent(){
      var ques = document.getElementsByClassName("TestQuestionStatus")[currentQuestion];
      if(!prevQuestion)
      {
        prevQuestion = [];

      }
      else{
          document.getElementsByClassName("TestQuestionStatus")[prevQuestion[0]].setAttribute("style",prevQuestion[1]);

      }
      prevQuestion[0] = currentQuestion;
      prevQuestion[1] = ques.getAttribute("style");
      ques.setAttribute("style","background-color: red;");
    }
</script>
@stop
@section ('content')
@if(session('error'))
<h1>{{session('error')}}</h1>
@endif
 <div class="row">
                <div class="col-md-4">
                      <div class="TestQuestionSelect" style="overflow:auto;">
                            <p>Question Set</p>

                            <div class="TestListTop">
                              <input type="submit" form="saveTest" id="SubmitTest" value="Submit Test"/>
                            </div>
                        @foreach($provider->questions() as $key => $question)
                            <div class="TestListCell" questionId='{{$key}}' onclick="getQuestion(this)">
                                <div class="TestQuestionName" >
                                    <p>{{$question}}</p>
                                </div>
                                <div class="TestQuestionStatus"
                                     <?php if($provider->isAnswered($key)){
                                echo 'style="background-color: blue;"';}
                                    ?>></div>

                                </div>
                          @endforeach


                            </div>

                      </div>
                <form id='saveTest' action='/test/Save' method="post">
                    {{ csrf_field() }}
     </form>

                <div class="col-md-8">
                      <div class="QuestionPanell">
                        <iframe src="/test/Page/" class="questionframe"/>
                      </div>
                </div>
@stop

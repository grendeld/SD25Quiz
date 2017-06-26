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
            var ws;
	var write;
           
        window.onblur = function(){
            ws.send(JSON.stringify(new Message(null,null,"Focus","false")));
        };
        window.onfocus = function(){
            ws.send(JSON.stringify(new Message(null,null,"Focus","true")));
        };
        window.onunload = function(){
            ws.send(JSON.stringify(new Message(null,null,"Page","Student is trying to leave the page")));
            alert("you are leaving page");
            return false;
        };
            window.onbeforeunload = function(){
                ws.send(JSON.stringify(new Message(null,null,"Page","left page")));
                //ws.close();
              return false;  
            };
	write=document.getElementById("sum");
        ws = new WebSocket("ws://{{Request::server ("SERVER_NAME")}}:{{session('port')['port']}}/id/{{Auth::guard('students')->user()->StudentID}}");
        ws.onclose = function(event){
            alert(event.code);
        };
        ws.onmessage = function(mes){
	       var obj = JSON.parse(mes.data);
            if(obj.type == "broadcast"){
                alert(obj.data);
            }
            console.log(mes.data);
            //ws.send("I Got you message bro we goood to go!!");
        };
       /* ws.onopen(){
            ws.send("Succes!");
        }; */
            function sendMes(self){
                var mes = self.previousElementSibling.value;
                ws.send(mes);
            }
        function Message(from,to,type,data){
            this.from = from;
            this.to = to;
            this.type = type;
            this.data = data;
        }
</script>
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
                            <p id="timeElapse"></p>
                             
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
                          <iframe src="/test/Page/" class="questionframe"> </iframe>
                      </div>
                </div>
     <script>
        var timeElapse = document.getElementById("timeElapse");
         var dif = (new Date()) -(new Date({{session('startTime')*1000}}));
         var counter;
                                 (counter = new Date(0,0,0,0,0,0)).setMilliseconds(counter.getMilliseconds() + dif);
         function setTime(){
             timeElapse.innerHTML = (((h = counter.getHours())<10)? ("0" + h): h )+ ":" + (((m = counter.getMinutes())<10)? ("0"+m) : m )+ ":" + (((s =counter.getSeconds())<10) ? ("0"+
             s) : s);
         }
         setTime();
         setInterval(function(){
             counter.setSeconds(counter.getSeconds() +1);
             setTime();
         },1000);
     </script>
  
@stop



<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/event.js"></script>
    <script>
            var panels = [];
            var ws;
        var studentPanel;

        ws = new patWeb("ws://{{Request::server ("SERVER_NAME")}}:{{session('port')['port']}}");
            function sendMes(self){
                var mes = self.previousElementSibling.value;

                ws.send(JSON.stringify(new Message(null,null,"broadcast",mes)));
            }
            function Message(from,to,type,data){
            this.from = from;
            this.to = to;
            this.type = type;
            this.data = data;
        }
    function closeTest(self,time){

    }
    function createDiv(id){
        var divEl = [];
        for(var i=0;i<4;i++){
            divEl.push(document.createElement("div"));
        }
        var im = document.createElement("img");
        divEl[0].setAttribute("class","TestAnswerListCell");
        divEl[1].setAttribute("class","TestAnswerName");
        divEl[2].setAttribute("class","TestAnswerSelect");
        divEl[3].setAttribute("class","Indicator");
        divEl[0].appendChild(divEl[1]);
        divEl[0].appendChild(divEl[2]);
        divEl[0].appendChild(divEl[3]);
        divEl[1].appendChild(im);
        panels[id] = new panel(divEl[0],divEl[1],im,divEl[2],divEl[3]);
        getStudent(id);
        if(!studentPanel){
            studentPanel = document.getElementById("studentPanel");
        }
        studentPanel.appendChild(divEl[0]);
        
        
        
    }
    
    function getStudent(id){
        var httpX = new XMLHttpRequest();
        httpX.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var temp = JSON.parse(this.responseText);
                var panel = panels[temp.StudentID];
                panel.TestAnswerSelect.innerHTML =temp.FirstName + " " + temp.LastName;
                panel.photo.src=temp.Photo;
                panel.student = temp;
            }
        }
         httpX.open("POST","/getStudent",true);
        httpX.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        httpX.setRequestHeader("X-CSRF-TOKEN","{{ csrf_token() }}");
        httpX.send("StudentID="+id);
        
    }
        
</script>
</head>
<body>
<div class="container-fluid">

    <div class="row BKG">
        <div class="col-md-12">
          <h1>{{\App\Test::find(session('currentTest'))->Quiz->QuizName}}</h1>

        </div>
        <div class="col-md-4 Panelbkg">
            <button type="button"  class="quizbutton">Send</button>
            <br/><br/>
            <textarea></textarea>
        </div>
        <div id="studentPanel" class="col-md-8 Panelbkg">
        </div>
    </div>

</div>
</body>
</html>



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
  <script src="js/jquery-3.2.1.min.js"></script>\
    <script>
            var ws;
    //window.onload= function(){

        ws = new WebSocket("ws://{{Request::server ("SERVER_NAME")}}:{{session('port')['port']}}");
        ws.onclose = function(event){
            alert(event.code);
        };
        ws.onmessage = function(mes){
            console.log(mes.data);
            //var obj = JSON.parse(mes.data);
            //for(v in obj){
              //  console.log(obj[v]);
            //}
            //ws.send("I Got you message bro we goood to go!!");
        };
       /* ws.onopen(){
            ws.send("Succes!");
        }; */
    //};
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
</script>
</head>
<body>
<div class="container-fluid">

    <div class="row BKG">
        <div class="col-md-12">
          <h1>{{\App\Test::find(session('currentTest'))->Quiz->QuizName}}</h1> 

        </div>
        <div class="col-md-4 Panelbkg">

        </div>
        <div class="col-md-8 Panelbkg">

        </div>
    </div>

</div>
</body>
</html>

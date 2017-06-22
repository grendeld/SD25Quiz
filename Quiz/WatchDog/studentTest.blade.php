@extends('layout')

@section('header')
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
        ws = new WebSocket("ws://172.16.139.86:{{$test['port']}}/id/<?php echo rand(); ?>");
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
@stop

@section('content')
<h1>CLIENT TEST</h1>
	<p id="sum"></p>
@stop
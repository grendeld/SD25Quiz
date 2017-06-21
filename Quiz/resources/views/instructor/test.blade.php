


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
</script>
<h1>{{session('currentTest')}}</h1> is running
<!-- Dynamic Pie Chart goes somewhere here -->
<h1>Hello</h1>
<input type="text" id="text" />
        <button type="button" onclick="sendMes(this);">Send</button>

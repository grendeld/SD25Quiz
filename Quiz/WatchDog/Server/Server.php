<?php
namespace WatchDog;
use Symfony\Component\Process\Process;
class Server{
    private $mainSock;
    private $portSock;
    private $port;
    private $clients;
    private $sockets;
    private $domain;
    public static function connect(string $id,string $Udomain = "", bool $student = true){
        //$Udomain = uniqid();
        $path = __DIR__."/sockets/".$id.".sock";
        $s = socket_create(AF_UNIX,SOCK_STREAM,0);
        if($student){
            //dd(__DIR__."/sockets/$id.sock");
            socket_connect($s,$path);
            
            $port = socket_read($s,256);  
        }
        else{
            $loaderPath = __DIR__."/../loader.php";
            exec("php $loaderPath $path $Udomain >> ".__DIR__."/.out.txt 2>&1 &");
            socket_bind($s,"/tmp/$Udomain.sock");
            socket_listen($s);
             $client = socket_accept($s);
            $port = socket_read($client,256);
            socket_close($client);
        }

        
        
        //setcookie("SocketID", $Udomain, time()+3600);
        //exit();
        //dd("php $loaderPath $path $Udomain >> ".__DIR__."/.out.txt 2>&1 &");
        
        //dd($s);
        
        
        
        //dispatch(new WatchDog($path,$Udomain))
;   
        //$process->run();
        //dd($loaderPath);
        
        
        //dd($path);
        
       
        //dd($port);
        socket_close($s);
        //dd($res);
        return ["port"=>$port];   
    }
    function __construct(string $path,string $Udomain){
        $this->domain = $path;
        $this->instructorID = $Udomain;
        
    }
    public function start(){
        //$this->run();
        //exit();
        $pid = pcntl_fork();
        if($pid == 0){
            $session = posix_setsid();
            cli_set_process_title ("PatrickCam");
            echo "\n\n\nBefore loop ProcessID = ".posix_getsid(posix_getpid())." My Id:".posix_getpid()." My Parent:".posix_getppid()." My Process SessionID:".$session."\n\n\n";
            posix_kill(posix_getppid(),SIGKILL);
            //exit();
            $this->run();
        }
        else{
            //echo "\n\n\n\n\ntrying to Die!!!\n\n\n\n\n";
            //dd($pid);
            exit();
            return;
        }
        
    }
    public function run(){
        
        
        $this->testHandshake();
        $write = null;
        $error = null;
        $this->sockets = array("main" => $this->mainSock, "port" => $this->portSock);
        $this->instructorID = null;
        
       //exit();
        while(true){
            //var_dump($this->sockets);
            $read = $this->sockets;
            //var_dump($read);
            //break;
            /*var_dump(($res = get_resources()));
foreach($res as $r){
    var_dump(stream_get_meta_data($r));*/
    //fclose($r);
//}
            socket_select($read,$write,$error,null);
            
            if(in_array($this->mainSock,$read)){
                echo "at handshake\n";
                $client = socket_accept($this->mainSock);
                $socketID = WS_Helper::handshake($client);
                WS_Helper::setKeepAlive($client,true,20,2,1);
                if($this->instructorID === null){
                    $this->instructorID = $socketID["socketID"];
                }
                var_dump($this->instructorID);
                if($socketID["socketID"] == $this->instructorID){
                    if(isset($this->sockets["instructor"])){
                        socket_close($this->sockets["instructor"]);
                    }
                    $this->sockets["instructor"] = $client;
                    echo "Instructor connected\n";
                }
                else{
                    if(isset($this->sockets[$socketID["socketID"]])){
                        $this->clients[$socketID["socketID"]]->socket = $client;
                        socket_close($this->sockets[$socketID["socketID"]]);
                        $this->studentCon("reconnect",$this->clients[$socketID["socketID"]]->id);
                        $sockets[$socketID["socketID"]] = $client;
                    }
                    else{
                        $this->clients[$socketID["socketID"]] = new Client($socketID["socketID"],$socketID["ID"],$client);
                        $this->studentCon("connected",$this->clients[$socketID["socketID"]]->id);
                        $this->sockets[$socketID["socketID"]] = $client;
                    }
                }
            }
            elseif(in_array($this->portSock,$read)){
                $client = socket_accept($this->portSock);
                if($client){
                    socket_write($client,$this->port);
                    socket_close($client);
                }
            }
            else{
                foreach($read as $key => $value){
                    if(socket_last_error($value) > 0){
                          $errorcode = socket_last_error($value);
        $errormsg = socket_strerror($errorcode);
                        var_dump($errormsg);
                        socket_close($value);
                        unset($this->sockets[$key]);
                    }
                    else{
                                      var_dump($value);
                    var_dump($read);
                    var_dump($this->sockets);
                        $message = socket_read($value,1024);
                        if(strlen($message) <= 1){
                           socket_close($value);
                        unset($this->sockets[$key]); 
                        }
                        else{
                            $this->processMessage($message,$key,$value);
                        }
                    } 
                }
            }
            $c = count($this->sockets);
            echo "\n\nwe have this many sockets open $c\n\n\n";
            if(count($this->sockets) <= 2)
                break;
        }
        $this->close();
    }
    private function close(){
        foreach($this->sockets as $socket){
            socket_close($socket);
        }
        socket_close($this->portSock);
        unlink($this->domain);
    }
    private function processMessage($mess, string $key,$socket){
    
        list($type,$message) = WS_Helper::decodeMessage($mess);
        if($type == "text")
        {
            echo "\n\n\nThis is the message guys ::\n$message\n\n\n";
            $hexstr = unpack('H*', $message);
            var_dump($hexstr);
            $messageBlock = json_decode($message);
            switch($messageBlock->type){
                case "broadcast":
                    $this->broadcast($messageBlock->data);
                    break;
                default:
                    $messageBlock->from = $this->clients[$key]->id;
                        if(isset($this->sockets["instructor"]))
                            socket_write($this->sockets["instructor"], WS_Helper::encodeMessage(json_encode($messageBlock),"text"));
                    break;
            }
        }
        else if($type == "close"){
            socket_close($socket);
            unset($this->sockets[$key]);
        }
    }
    function broadcast(string $mess){
        echo "\n\nbroadcasting\n\n";
        var_dump($this->clients);
        $message = new messageBlock(null,"instructor","broadcast",$mess);
        $mess = json_encode($message);
        $mess = WS_Helper::encodeMessage($mess,"text");
        foreach($this->clients as $key => $value){
            $r = $this->clients[$key];
            //var_dump($r->socket);
            socket_write($r->socket,$mess);
        }
    }
    private function findClientById($id){
        global $clients;
    
        foreach($this->clients as $client){
            if($client->id == $id)
                return $client->socketID;
        }
        return -1;
    }
    
    private function getClientList(){
        $clientList = array();
        foreach($this->clients as $client){
            $clientList[] = $client->id;
        }
        return $clientList;
    }
    function studentCon(string $type,string $id){
        $message = new MessageBlock($id,"instructor",$type);
        $mes = json_encode($message);
        $mes = WS_Helper::encodeMessage($mes,"text");
        socket_write($this->sockets["instructor"],$mes);
    }
    private function testHandshake(){
        $portSocket = socket_create(AF_UNIX,SOCK_STREAM,0);
        $this->mainSock = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
    
        socket_bind($this->mainSock,'0',0);
        socket_getsockname($this->mainSock,$address,$this->port);
        echo "\n\nConnecting\n\n";
        socket_connect($portSocket,"/tmp/$this->instructorID.sock");
        socket_write($portSocket,$this->port);
        socket_close($portSocket);
        unlink("/tmp/$this->instructorID.sock");
    
        $this->portSock = socket_create(AF_UNIX,SOCK_STREAM,0);
        unlink($this->domain);
        socket_bind($this->portSock,$this->domain);
        socket_listen($this->portSock);
        socket_listen($this->mainSock);
    }
}
class Client{
    public function __construct(string $socketID,string $id,&$socket){
        $this->socketID = $socketID;
        $this->id = $id;
        $this->socket = $socket;
        //global $sockets;
        //echo "\ndumping\n".var_dump($sockets);
    }
}
class MessageBlock{
    public function __construct($from, $to, string $type = null, string $data =null){
        $this->from = $from;
        $this->to = $to;
        $this->type = $type;
        $this->data = $data;
    }
}


?>

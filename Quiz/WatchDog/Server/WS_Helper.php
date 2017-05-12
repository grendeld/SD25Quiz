<?php
    namespace WatchDog;
        
        class WS_Helper{
		const WEB_KEY ="258EAFA5-E914-47DA-95CA-C5AB0DC85B11";
        private const TCP_KEEPIDLE = 4,
            TCP_KEEPINTVL = 5,
            TCP_KEEPCNT = 6,
            KEEP_ALIVE = 1;
		public static function handshake(&$socket){
                $data = socket_read($socket,1024);
                echo $data;
        		$headers = explode("\r\n",$data);
                preg_match("/\/id\/(?<id>[0-9]+)/",$data,$match);
                preg_match("/SocketID=(?<SocketID>[0-9a-zA-Z]+)/",$data,$SockMatch);
                $SocketID = $SockMatch["SocketID"];
              echo "\n\n".var_dump($SockMatch)."\n\n";
        		foreach($headers as $value)
        		{
            
            			if(strpos($value,"WebSocket-Key") > 0){
                		echo $value;
                		$key = explode(":",$value);
                		$accept = trim($key[1]);
                		$accept .= self::WEB_KEY;
        
                		$accept = base64_encode(sha1($accept,true));
            
                		break;
            			}
        		}
           // echo "\nSOcketID cookie $SocketID\n";
        		$return = "HTTP/1.1 101 Switching Protocols\r\n".
            		"Upgrade: websocket\r\n".
            		"Connection: Upgrade\r\n".
            		"Sec-WebSocket-Accept: $accept\r\n".
                    ((!$SocketID)? "Set-Cookie: SocketID=".($SocketID = uniqid())."\r\n" : "").
            		"\r\n";
        	//	echo $return;
        		socket_write($socket,$return);
                return ["socketID" => $SocketID,"ID" => $match["id"]];
		}
        
        public static function encodeMessage($mess, string $type){
            switch($type){
                case "cont":
                    $opcode = 0;
                    break;
                case "text":
                    $opcode = 1;
                    break;
                case "binary":
                    $opcode = 2;
                    break;
                case "close":
                    $opcode = 8;
                    break;
                case "ping":
                    $opcode = 9;
                    break;
                case "pong":
                    $opcode = 10;
                    break;
                default:
                    return -1;
            };
            $opcode = 128 | $opcode;
            $len = strlen($mess);
            if($len < 126){
                $send = pack("CC",$opcode,$len).$mess;
            }
            elseif($len < 65536){
                $send = pack("CCCn",$opcode,126,$len).$mess;
            }
            else
            {
            $send = pack("CCCJ",$opcode,127,$len).$mess;  
            } 
        
            return $send;
        }
            
        public static function decodeMessage(string $message,$socket = null){
            $bit1 = ord(substr($message,0,1));
            $bit2 = ord(substr($message,1,1));
            $lastFrame = $bit1 >> 7;
            $opcode = $bit1 & 15;
            $masked = (boolean)($bit2 >> 7);
            $payLen = $bit2 & 127;
            if($payLen < 126){
                $actPayLen = $payLen;
                $maskCode = ($masked)? substr($message,2,4) : null;
                $payLoad = substr($message,(($masked)? 6 : 2),$actPayLen);
            
            }
            elseif($payLen == 126){
                $actPayLen = unpack("n",substr($message,2,2))[1];
                $maskCode = ($masked) ? substr($message,4,4) : null;
                $payLoad = substr($message,(($masked)? 8:4),$actPayLen);
            }
            else{
                $actPayLen = unpack("J",substr($message,2,8))[1];
                $maskCode = ($masked) ? substr($message,10,4) : null;
                $payLoad = substr($message,(($masked)? 14:10),$actPayLen);
            }
            if($masked)
            {
                self::unMask($payLoad,$maskCode);
                //var_dump($payLoad);
            }
            switch($opcode)
            {
                case 0:
                    $type = "cont";
                case 1:
                    $type = "text";
                    break;
                case 2:
                    $type ="binary";
                    break;
                case 8:
                    $type ="close";
                    break;
                case 9:
                    $type ="ping";
                    socket_write($socket,self::encodeMessage($payLoad,"pong"));
                    break;
                case 10:
                    $type ="pong";
                    return array($type,microtime());
                    break;
            }
            
            return array($type,$payLoad);
        
        //echo "$lastFrame\n$opcode\n$masked\n$payLen";
        }
        private static function unMask(string &$message, string $maskCode){
            $length = strlen($message);
            for($i = 0; $i < $length; $i++){
                $message[$i] = (string)$message[$i] ^ (string)$maskCode[$i%4]; 
            }
        }
        public static function setKeepAlive($socket,bool $status,int $idleTime = null, int $interval = null, int $count = null){
            socket_set_option($socket,SOL_SOCKET,SO_KEEPALIVE,$status);
        
            if($idleTime){
                socket_set_option($socket,SOL_TCP,self::TCP_KEEPIDLE,$idleTime);
                socket_set_option($socket,SOL_TCP,self::TCP_KEEPINTVL,$interval);
                socket_set_option($socket,SOL_TCP,self::TCP_KEEPCNT,$count);
            }
            
        }
		
	}
        
	
?>

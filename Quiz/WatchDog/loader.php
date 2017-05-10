<?php
//fclose(STDIN);
//fclose(STDOUT);
//fclose(STDERR);
//$STDIN = fopen('/dev/null', 'r');
//$STDOUT = fopen(__DIR__.'/application.log', 'ab');
//$STDERR = fopen(__DIR__.'/error.log', 'ab');
    //require __DIR__.'/../../bootstrap/autoload.php';
require(__DIR__."/Server/Server.php");

require(__DIR__."/Server/WS_Helper.php");
use \App\WatchDog\Server\Server;

echo "\n\n\nProcessID = ".posix_getppid()."\n\n\n";
//posix_kill(posix_getppid(),SIGCHLD);
//echo "opening class\n";
 posix_setsid();
list($a,$a1,$a2) = $argv;
//var_dump(($res = get_resources()));
//foreach($res as $r){
  //  var_dump(stream_get_meta_data($r));
    //fclose($r);
//}
    //var_dump(($res = get_resources()));
$prossId = posix_getppid();
$pid = pcntl_fork();
echo "\n\n\n$pid\n\n\n";
        if($pid === 0){
            $sesion = posix_setsid();
            //usleep(100000);
            
            //cli_set_process_title ("PatrickCam");
            //exit();
            echo "\n\n\nProcessID = ".posix_getppid()."\n\n\n";
            $newPid = pcntl_fork();
            if($newPid === 0){
                posix_kill($prossId,SIGHUP);
                //exit();
                
                
                $server = new Server($a1,$a2);
                $server->start();
            }
            else{
                exit();
            }
            
        }
        else{
            echo "\n\n\n\n\ntrying to Die!!!\n\n\n\n\n";
            //dd($pid);
             //posix_kill(getmypid(),9);
            exit(0);
        }
    //$server = new Server();
echo "opened class\n";
    //$server->start($argv);
echo "\n\n\n\n\n\nReturning\n\n\n\n\n\n\n";
exit();
?>

<?php
set_time_limit(0);

/* Turn on implicit output flushing so we see what we're getting
 * as it comes in. */
ob_implicit_flush();
//$sock=socket_create_listen(6000);
$sock = socket_create(AF_INET,SOCK_STREAM,0);
if(!$sock)
{
    $errorcode = socket_last_error($sock);
  echo  $errormsg = socket_strerror($errorcode);
     
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}
 if (!socket_set_option($sock, SOL_SOCKET, SO_REUSEADDR, 1)) { 
    echo socket_strerror(socket_last_error($sock)); 
    exit; 
}
echo "Socket created";
$address='127.0.0.1';
$de=socket_bind($sock,$address,6010);
if(!$de)
{
    $errorcode = socket_last_error($sock);
  echo  $errormsg = socket_strerror($errorcode);
     
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}
 
echo "Socket bound";

$de2=socket_listen($sock,60);
if(!$de2)
{
    $errorcode = socket_last_error($sock);
  echo  $errormsg = socket_strerror($errorcode);
     
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}
 
echo "Socket listening";
$clients=array();
while(true)
{
    if(($newc = socket_accept($sock)) !== false)
    {
        echo "Client $newc has connected\n";
        $clients[] = $newc;
		
		$r= socket_send ( $newc,"thanks for connecting" , 30 , MSG_EOF );
    }
	
}
$b=socket_shutdown($sock);




?>
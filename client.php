<?php
$sock = socket_create(AF_INET, SOCK_STREAM, 0);
if(!$sock)
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}
 
echo "Socket created";
$addr="127.0.0.1";
$res=socket_connect($sock,$addr,6010);
if(!$res)
{
    $errorcode = socket_last_error($sock);
  echo  $errormsg = socket_strerror($errorcode);
     
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}
 
echo "connection made";
echo socket_read($sock,30);



?>
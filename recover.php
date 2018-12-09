<?php
session_start();
ob_start();
require 'config.php';
$msg="";
if(!function_exists('hash_equals')) {
  function hash_equals($str1, $str2) {
    if(strlen($str1) != strlen($str2)) {
      return false;
    } else {
      $res = $str1 ^ $str2;
      $ret = 0;
      for($i = strlen($res) - 1; $i >= 0; $i--){
       $ret |= ord($res[$i]);
       }
      return !$ret;
    }
  }
  
}  

if(!empty($_REQUEST['action'])&& $_REQUEST['action']=="recover"){
 $userid=base64_decode($_REQUEST['id']);
 $username1=base64_decode($_REQUEST['username']);
 $confirm=base64_decode($_REQUEST['confirm']);
$servername =DB_HOST;
$username = DB_USER;
$password = DB_PASSWORD;
$dbname = DB_DATABASE;
$res=null;
$out="";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt=$conn->prepare("SELECT * FROM recovery WHERE loanid=:k AND username=:l LIMIT 1");
     $stmt->bindParam(":k",$userid);
      $stmt->bindParam(":l",$username1);
     $stmt->execute();
     $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
     //echo "query executed";
     if($results){
     	foreach($results as $row){
	 $de=hash_equals($confirm,$row['email']);     		
		if($de){
		$stmt=$conn->prepare("SELECT TIMESTAMPDIFF(MINUTE,(SELECT expiration from recovery where id=:P),(SELECT NOW()))");
    		 $stmt->bindParam(":P",$row['id']);
		 $stmt->execute();
     		$res=$stmt->fetch(PDO::FETCH_NUM);
     		if($res[0]<=60){
     		//echo "not expired";
     		// $res[0];
     		}
     		else{
				$msg="token expired";
				header("Location:passwordreseterror.php?message=$msg");
     		exit();
     		}
		//echo "hash matched direct to password entry";
		$randsalt=mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
		$pass=base64_encode(crypt($row['loanid'],$randsalt));
		$_SESSION["password_verification"]=$pass;
		$_SESSION['userpassreset']=$row['loanid'];
		$loanid=base64_encode(crypt($row['loanid'],450));
		header("Location:password.php?passver=$pass&loanid=$loanid");
		}
		else{
		$msg="The password dont match.Please request a new email.";
		header("Location:passwordreseterror.php?message=$msg");
		exit();	
		}
     	
     	}//end foreach
     
     }//end if
     else{
     $msg="No entry found.";
		header("Location:passwordreseterror.php?message=$msg");
		exit();	
     }
     }//end try
     catch(PDOException $e){
		 $e;}		





}//end if
else{
		$msg="Bad request. Please make a new one.";
		header("Location:passwordreseterror.php?message=$msg");
		exit();	


}






?>
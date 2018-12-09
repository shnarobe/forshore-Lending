<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
if(isset($_SESSION['otherincomeval'])){
	unset($_SESSION['otherincomeval']);
	
}
//$fname=$_POST['lname'];
$otherarr=array();
//$arr['fname']="jack";
//header("Location:mor.php");
//$arr=$_POST['dat'];
foreach($_POST['dat'] as $key=>$value){
	if(empty($value)){
	$otherarr[$key]=$value;
	}
	else{
		$otherarr[$key]=test_input($value);	
	}
}
$_SESSION['otherincomeval']=$otherarr;
//echo json_encode($otherarr);
exit();
//echo json_encode($_SESSION['personal']["fname"]);
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}




?>
<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
if(isset($_SESSION['employment'])){
	unset($_SESSION['employment']);
	
}
//$fname=$_POST['lname'];
$employmentarr=array();
//$arr['fname']="jack";
//header("Location:mor.php");
//$arr=$_POST['dat'];
foreach($_POST['dat'] as $key=>$value){
	
	if(empty($value)){
	$employmentarr[$key]=$value;
	}
	else{
		$employmentarr[$key]=test_input($value);	
	}
}
$_SESSION['employment']=$employmentarr;
//echo json_encode($employmentarr);
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
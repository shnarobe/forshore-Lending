<?php
include("config.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";
$res=null;
$out="";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
 $a=array();
 $a['r']=24;
  $a['u']=5;
  $a['h']='2015-12-12';
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt=$conn->prepare("Insert into test (me,you,d) VALUES(?  ,?,  ?)");
	$count=1;
	foreach($a as $key=>$value){
			$stmt->bindValue($count,$value);	
			$count=$count+1;
		}
	//$stmt->bindValue(1,11);
	//$stmt->bindValue(2,12);
	$stmt->execute();
}
catch(PDOException $e){}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
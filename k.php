<?php
session_start();
global $ar;
if($_SERVER['REQUEST_METHOD']=='POST'){

$ar= $_POST['j'];
//$_SESSION['test']=$_POST['my'];

//echo $ar[1];
//echo count($ar);
foreach($ar as $key=>$value){
	//echo $key;
	//foreach($value as $k=>$v){
	echo $key;
	echo "\n";
	echo $value;
	echo "\n";	
		
	}
	store();
	//echo "<br>";
	//echo (0%4);
	//echo (4%4);
//	$ass[$key]=$value+1;
	//echo "ass array <br>";
//	echo $ass[$key] ;
	
}


function store(){
	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";
$res=null;
$out="";

try {
	$mid=6;
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   
	$stmt = $conn->prepare("Insert into asset (mortgageid,type,description,value,downpayment) values(?,?,?,	?,?)");
    $count=2;
	$flag=1;
	$stmt->bindValue(1,6);
	foreach($ar as $key=>$value){
		
	$stmt->bindValue($count,$value);
	echo "$count"." => ".$value;
	echo"<br/>";
	
	$count=$count+1;
	
	if(($flag%4)==0){
		$stmt->execute();
		$stmt->bindValue(1,6);
		$count=2;
		
	}
	$flag++;
	//echo "$count".$value;
	}	
}
catch(PDOException $e){
	echo $e;
}
	
	
	
	
} 
//echo $_POST['agree1'];

?>
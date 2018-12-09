<?php
include("config.php");
$ab=21;
	$res=null;
	$name=DB_DATABASE;
			$host=DB_HOST;
			$out="";
		try {
    			$conn = new PDO("mysql:host=$host;dbname=$name",DB_USER,DB_PASSWORD);
    			// set the PDO error mode to exception
  
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt=$conn->prepare("SELECT * FROM loanapplication where loan_applicationid=:p");	
				$stmt->bindParam(":p",$ab);
				$stmt->execute();
				$res=$stmt->fetch(PDO::FETCH_ASSOC);
				
			print_r(json_encode($res));
		}	
		catch(PDOException $e){}


?>
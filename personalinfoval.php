<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
if(isset($_SESSION['personal'])){
	unset($_SESSION['personal']);
	
}
//$fname=$_POST['lname'];
$personalarr=array();
//$arr['fname']="jack";
//header("Location:mor.php");
//$arr=$_POST['dat'];
foreach($_POST['dat'] as $key=>$value){
	//$personalarr[$key]=test_input($value);
	if(empty($value)){
	$personalarr[$key]=$value;
	}
	else{
		$personalarr[$key]=test_input($value);	
	}
}
personalinfovalidator($personalarr);
//$_SESSION['personal']=$arr;
//echo json_encode($_SESSION['personal']["fname"]);
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


function personalinfovalidator($arr){
	
	$error=array();
	//$error['coborr']=empty($arr['coborr']);
	//global $error;
$arr['home_pErr']=$arr['fnameErr']=$arr['lnameErr']=$arr['emailErr']=$arr['dobErr']=$arr['dependentsErr']="";
 if (empty($arr["fname"])) {
    // $arr['fnameErr'] = "first Name is required";
	 $error['fname']="First Name is required";
   } else {
     $arr["fname"] = test_input($arr["fname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$arr['fname'])) {
       $error['fname'] = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($arr["lname"])) {
     $error['lname'] = "Last Name is required";
   } else {
    $arr["lname"] = test_input($arr["lname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$arr["lname"])) {
       $error['lname'] = "Only letters and white space allowed"; 
     }
   }
   
   
   
   if (empty($arr["email"])) {
     $error['email'] = "Email is required";
   } else {
     $arr["email"] = test_input($arr["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($arr["email"], FILTER_VALIDATE_EMAIL)) {
      $error["email"] = "Invalid email format"; 
     }
   }
     
     if (empty($arr["home_p"])) {
     $error['home_p'] = "Home phone is required";
   } else {
     $arr['home_p']= test_input($arr["home_p"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[0-9]+$/",$arr['home_p'])) {
       $error['home_p'] = "Only numbers allowed"; 
     }
   }
   	
	
	if (empty($arr["dependents"])) {
     $error['dependents'] = "Dependents required";
   } else {
     $arr['dependents']= test_input($arr["dependents"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[0-9]+$/",$arr['dependents'])) {
       $error['dependents'] = "Only numbers allowed"; 
     }
   }
   
   if (empty($arr['dob'])) {
     $error['dob'] = "Date of birth is required";
   } 
  //coborrower
   if (!empty($arr['coborr'])) {
	  // $error["cohome_p"]=$error["coemail"]=$error["colname"]=$error["cofname"]=$error["codependents"]=$error["codob"]="";
	   if (empty($arr["codob"])) {
     $error['codob'] = "Date of birth is required";
   } 
	   
	   if (empty($arr["cofname"])) {
    // $arr['fnameErr'] = "first Name is required";
	 $error['cofname']="First Name is required";
   } else {
     $arr["cofname"] = test_input($arr["cofname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$arr['cofname'])) {
       $error['cofname'] = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($arr["colname"])) {
     $error['colname'] = "Last Name is required";
   } else {
    $arr["colname"] = test_input($arr["colname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$arr["colname"])) {
       $error['colname'] = "Only letters and white space allowed"; 
     }
   }
   
   
   
   if (empty($arr["coemail"])) {
     $error['coemail'] = "Email is required";
   } else {
     $arr["coemail"] = test_input($arr["coemail"]);
     // check if e-mail address is well-formed
     if (!filter_var($arr["coemail"], FILTER_VALIDATE_EMAIL)) {
      $error["coemail"] = "Invalid email format"; 
     }
   }
     
     if (empty($arr["cohome_p"])) {
     $error['cohome_p'] = "Home phone is required";
   } else {
     $arr['cohome_p']= test_input($arr["cohome_p"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[0-9]+$/",$arr['cohome_p'])) {
       $error['cohome_p'] = "Only numbers allowed"; 
     }
   }
   	
	
	if (empty($arr["codependents"])) {
     $error['codependents'] = "Dependents required";
   } else {
     $arr['codependents']= test_input($arr["codependents"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[0-9]+$/",$arr['codependents'])) {
       $error['codependents'] = "Only numbers allowed"; 
     }
   }
	   
	   
	   
	   
	   
	   
		
   }

	if(empty($error["home_p"])&& empty($error["email"])&&empty($error["lname"])&&empty($error["fname"])&& empty($error["dependents"])&&empty($error["dob"])&&empty($error["cohome_p"])&& empty($error["coemail"])&&empty($error["colname"])&&empty($error["cofname"])&& empty($error["codependents"])&&empty($error["codob"])){
		$_SESSION['personal']=$arr;
		$error['error']=false;
		
		echo json_encode($error);
		
	}
	else{
		$_SESSION['personal']=$arr;
		//$error=array();
		$error['error']=true;
		echo json_encode($error);
	}

	exit();
}

?>
<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
if(isset($_SESSION['address'])){
	unset($_SESSION['address']);
	
}
//$fname=$_POST['lname'];
$addressarr=array();
//$arr['fname']="jack";
//header("Location:mor.php");
//$arr=$_POST['dat'];
foreach($_POST['dat'] as $key=>$value){
	if(empty($value)){
	$addressarr[$key]=$value;
	}
	else{
		$addressarr[$key]=test_input($value);	
	}
	

}
addressinfovalidator($addressarr);
//echo json_encode($addarr['personal']["fname"]);
}


function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


function addressinfovalidator($addarr){
	
	$addressError=array();
	//$error['coborr']=empty($addarr['coborr']);
	//global$addressError;

 if (empty($addarr["address"])) {
    
	$addressError['address']="Address required";
   } else {
     $addarr["address"] = test_input($addarr["address"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-z0-9- ]+$/i",$addarr['address'])) {
      $addressError['address'] = "Only letters and numbers allowed"; 
     }
   }
   
   if (empty($addarr["city"])) {
    $addressError['city'] = "City is required";
   } else {
    $addarr["city"] = test_input($addarr["city"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$addarr["city"])) {
      $addressError['city'] = "Only letters allowed"; 
     }
   }
   
   if (empty($addarr["postal_code"])) {
    
	$addressError['postal_code']="Postal code required";
   } else {
     $addarr["postal_code"] = test_input($addarr["postal_code"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^(?!.*[DFIOQU])[A-VXY][0-9][A-Z](\s)*[0-9][A-Z][0-9]$/i",$addarr['postal_code'])) {
      $addressError['postal_code'] = "Only letters and numbers allowed"; 
     }
   }
   
   
   if (empty($addarr["province"])) {
    $addressError['province'] = "Province required";
   } else {
     $addarr["province"] = test_input($addarr["province"]);
     
   }
     
     
  //lived 3
   if (!empty($addarr['lived3'])) {
	  if (empty($addarr["pre_address"])) {
    
	$addressError['pre_address']="Address required";
   } else {
     $addarr["pre_address"] = test_input($addarr["pre_address"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-z0-9- ]+$/i",$addarr['address'])) {
      $addressError['pre_address'] = "Only letters and numbers allowed"; 
     }
   }
   
   if (empty($addarr["pre_city"])) {
    $addressError['pre_city'] = "City is required";
   } else {
    $addarr["pre_city"] = test_input($addarr["pre_city"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$addarr["pre_city"])) {
      $addressError['pre_city'] = "Only letters allowed"; 
     }
   }
   
   if (empty($addarr["pre_postal_code"])) {
    
	$addressError['pre_postal_code']="Postal code required";
   } else {
     $addarr["pre_postal_code"] = test_input($addarr["pre_postal_code"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^(?!.*[DFIOQU])[A-VXY][0-9][A-Z](\s)*[0-9][A-Z][0-9]$/i",$addarr['pre_postal_code'])) {
      $addressError['pre_postal_code'] = "Only letters and numbers allowed"; 
     }
   }
   
   
   if (empty($addarr["pre_province"])) {
    $addressError['pre_province'] = "Province required";
   } else {
     $addarr["pre_province"] = test_input($addarr["pre_province"]);
     
   }
	   
	   
	   
	   
	   
   }
	//colived
	if (!empty($addarr['colived'])) {
	  if (empty($addarr["coaddress"])) {
    
	$addressError['coaddress']="Address required";
   } else {
     $addarr["coaddress"] = test_input($addarr["coaddress"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-z0-9- ]+$/i",$addarr['address'])) {
      $addressError['coaddress'] = "Only letters and numbers allowed"; 
     }
   }
   
   if (empty($addarr["cocity"])) {
    $addressError['cocity'] = "City is required";
   } else {
    $addarr["cocity"] = test_input($addarr["cocity"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$addarr["cocity"])) {
      $addressError['cocity'] = "Only letters allowed"; 
     }
   }
   
   if (empty($addarr["copostal_code"])) {
    
	$addressError['copostal_code']="Postal code required";
   } else {
     $addarr["copostal_code"] = test_input($addarr["copostal_code"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^(?!.*[DFIOQU])[A-VXY][0-9][A-Z](\s)*[0-9][A-Z][0-9]$/i",$addarr['copostal_code'])) {
      $addressError['copostal_code'] = "Only letters and numbers allowed"; 
     }
   }
   
   
   if (empty($addarr["coprovince"])) {
    $addressError['coprovince'] = "Province required";
   } else {
     $addarr["coprovince"] = test_input($addarr["coprovince"]);
     
   }
	   
	   
	   
	   
	   
	   
		
   }
   //colived3
   
   if (!empty($addarr['colived3']) && !empty($addarr['colived']) ) {
	  if (empty($addarr["copre_address"])) {
    
	$addressError['copre_address']="Address required";
   } else {
     $addarr["copre_address"] = test_input($addarr["copre_address"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-z0-9- ]+$/i",$addarr['address'])) {
      $addressError['copre_address'] = "Only letters and numbers allowed"; 
     }
   }
   
   if (empty($addarr["copre_city"])) {
    $addressError['copre_city'] = "City is required";
   } else {
    $addarr["copre_city"] = test_input($addarr["copre_city"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$addarr["copre_city"])) {
      $addressError['copre_city'] = "Only letters allowed"; 
     }
   }
   
   if (empty($addarr["copre_postal_code"])) {
    
	$addressError['copre_postal_code']="Postal code required";
   } else {
     $addarr["copre_postal_code"] = test_input($addarr["copre_postal_code"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^(?!.*[DFIOQU])[A-VXY][0-9][A-Z](\s)*[0-9][A-Z][0-9]$/i",$addarr['copre_postal_code'])) {
      $addressError['copre_postal_code'] = "Only letters and numbers allowed"; 
     }
   }
   
   
   if (empty($addarr["copre_province"])) {
    $addressError['copre_province'] = "Province required";
   } else {
     $addarr["copre_province"] = test_input($addarr["copre_province"]);
     
   }
	   
	   
	   
	   
	   
	   
		
   }
	
	
	if(empty($addressError["address"])&& empty($addressError["city"])&&empty($addressError["postal_code"])&&empty($addressError["province"])&& empty($addressError["pre_address"])&&empty($addressError["pre_city"])&&empty($addressError["pre_postal_code"])&& empty($addressError["pre_province"])&&empty($addressError["coaddress"])&&empty($addressError["cocity"])&& empty($addressError["copostal_code"])&&empty($addressError["coprovince"])&&empty($addressError["copre_address"])&&empty($addressError["copre_city"])&& empty($addressError["copre_postal_code"])&&empty($addressError["copre_province"])){
		$_SESSION['address']=$addarr;
		$addressError['error']=false;
		echo json_encode($addressError);
		
	}
	else{
		$_SESSION['address']=$addarr;
		$addressError['error']=true;
		echo json_encode($addressError);
	}
	exit();

}
/*

}*/
?>
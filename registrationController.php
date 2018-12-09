<?php
//ob_start();
//include_once("class.smtp.php");
//include_once 'class.phpmailer.php';
include_once("PHPMailer-master\PHPMailer-master\PHPMailerAutoload.php");
require 'config.php';
 $first_Name='';
	 $last_Name='';
	 $address='';
	 $telephone='';
	 $year='';
	 $month='';
	 $day='';
	 $date_of_birth='';
	 $email;
	 $type_of_farmer='';
	 $farm_size='';
	 $username='';
	$password='';
	 $security1='';
	 $security2;
	 $answer1;
	 $answer2;
	$firstErr='';	
	$localhost=DB_HOST;
	$name=DB_DATABASE;
	$errors=array();
	
if($_SERVER['REQUEST_METHOD']=="POST"){
	
	if((isset($_POST['action']) && ($_POST['action']=="create"))){
		
		$errors['success']=true;
		$errors['error']="";
		if (empty($_POST["firstname"])) {
     $errors['error'] = "first Name is required";
	
	  } else {
     $firstname = test_input($_POST["firstname"]);
     
	 // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$_POST['firstname'])) {
       $errors['error'] = "Only letters and white space allowed"; 
	   
     }
   }
   
  
		if (empty($_POST["lastname"])) {
     $errors['error'].= "Last Name is required";
	
	  } else {
     $lastname = test_input($_POST["lastname"]);
	 
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$_POST['lastname'])) {
       $errors['error'].= "Only letters and white space allowed"; 
	   
     }
   }
   
   if (empty($_POST["loanid"])) {
    
	$errors['error'].="loanid is required";
	$errors['success']=false;
   } 
   else{
	   
	$loanid=$_POST['loanid'];   
   }
   
   if (empty($_POST["email"])) {
     $errors['error'].= "Email is required";
   } else {
     $email = test_input($_POST["email"]);
	 
     // check if e-mail address is well-formed
     if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $errors["error"].= "Invalid email format"; 
	 
     }
   }
   
   /*
    if (empty($_SESSION["applicant_email"])) {
     $loanError['applicant_emailErr'] = "Email is required";
   } else {
     $_SESSION["applicant_email"] = test_input($_SESSION["applicant_email"]);
     // check if e-mail address is well-formed
     if (!filter_var($_SESSION["applicant_email"], FILTER_VALIDATE_EMAIL)) {
      $loanError["applicant_emailErr"] = "Invalid email format"; 
     }
   }
      
   
   
   if (empty($_SESSION["applicant_city"])) {
   $loanError['applicant_cityErr'] = "applicant_city is required";
   } else {
    $_SESSION["applicant_city"] = test_input($_SESSION["applicant_city"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$_SESSION["applicant_city"])) {
     $loanError['applicant_cityErr'] = "Only letters allowed"; 
     }
   }
   
   if (empty($_SESSION["applicant_postal_code"])) {
    
	$loanError['applicant_postal_codeErr']="postal code required";
   } else {
     $_SESSION["applicant_postal_code"] = test_input($_SESSION["applicant_postal_code"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^(?!.*[DFIOQU])[A-VXY][0-9][A-Z](\s)*[0-9][A-Z][0-9]$/i",$_SESSION['applicant_postal_code'])) {
     $loanError['applicant_postal_codeErr'] = "Only letters and numbers allowed"; 
     }
   }
   
   
   if (empty($_SESSION["applicant_province"])) {
   $loanError['applicant_provinceErr'] = "province required";
   } else {
     $_SESSION["applicant_province"] = test_input($_SESSION["applicant_province"]);
     
   }
     
    if (empty($_SESSION["applicant_email"])) {
     $loanError['applicant_emailErr'] = "Email is required";
   } else {
     $_SESSION["applicant_email"] = test_input($_SESSION["applicant_email"]);
     // check if e-mail address is well-formed
     if (!filter_var($_SESSION["applicant_email"], FILTER_VALIDATE_EMAIL)) {
      $loanError["applicant_emailErr"] = "Invalid email format"; 
     }
   }
     
     if (empty($_SESSION["applicant_home_phone"])) {
     $loanError['applicant_home_phoneErr'] = "home phone is required";
   } else {
     $_SESSION['applicant_home_phone']= test_input($_SESSION["applicant_home_phone"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[0-9]+$/",$_SESSION['applicant_home_phone'])) {
       $loanError['applicant_home_phoneErr'] = "Only numbers allowed"; 
     }
   }*/
		if(!empty($errors['error'])){
			$errors['success']=false;
			echo json_encode($errors);
			exit();
		}
		//$firstname=$_POST['firstname'];
		//$lastname=$_POST['lastname'];
		//$email=$_POST['email'];
		$phone=$_POST['phone'];
		//$loanid=$_POST['loanid'];
		$temp=sha1($loanid);//mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
		$arr=str_split($temp,6);
		$password=$arr[0];
		try{ 
					
		$con=new PDO( "mysql:host=$localhost;dbname=$name",DB_USER,DB_PASSWORD);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$con->beginTransaction();
			$sth=$con->prepare("INSERT INTO register(loanid,firstname,lastname,email,phone,password)VALUES(:lid,:fn,:ln,:em,:tel,:pass)");
			//bind values to the actual $iables,nb the values can be anything we just bind them to the $iables, so whatever we put in the $iables that is what the symbols in the values will be so instead of fn we could easily have r
			$sth->bindParam(':lid',$loanid);
			$sth->bindParam(':fn',$firstname);
			$sth->bindParam(':ln',$lastname);
			$sth->bindParam(':em',$email);
			$sth->bindParam(':tel',$phone);
			$sth->bindParam(':pass',$password);
			
			
			//$sth->bindParam(':dob',$date_of_birth);
			
			//$sth->bindParam(':tof',$type_of_farmer);
			//$sth->bindParam(':fs',$farm_size);
			//$sth->bindParam(':un',$username);
			
			//$sth->bindParam(':s1',$security1);
			//$sth->bindParam(':s2',$security2);
			//$sth->bindParam(':a1',$answer1);
			//$sth->bindParam(':a2',$answer2);
			//$sth->bindParam(':alg',$avalg);
	
	
	
	//when user enters data store in db
	 //$first_Name=$_POST['firstname'];
	//$last_Name=$_POST['lastname'];
	//$address=$_POST['address'];
	//$telephone=$_POST['telephone'];
	//$day=$_POST['day'];
	//$month=$_POST['month'];
	//$year=$_POST['year'];
	//$email=$_POST['email'];
	//$type_of_farmer=$_POST['typeoffarmer'];
	//$farm_size=$_POST['farmsize'];
	//$username=$_POST['username'];
	//$password=sha1($_POST['password']);
	//$security1=$_POST['security1'];
	//$security2=$_POST['security2'];
	//$answer1=$_POST['answer1'];
	//$answer2=$_POST['answer2'];
	//$date_of_birth=$year."-".$month."-".$day;
	//$avasm=".user/default/ava-sm.jpeg";
	//$avalg=".user/default/ava-sm.png";
	//$ad=date_create($dob);
	//$ad
	//YY "/" MM "/" DD
	$sth->execute();	
	$last_id = $con->lastInsertId();
	$con->commit();
	//at the same time a user is registered fill in the user options table to store their profile using the id and fields just entered
	
	 global $last_id;
	
	
	
	$toCreate = array("user/$loanid/contract","user/$loanid/statements","user/$loanid/other");
	$permissions = 0755;

	foreach ($toCreate as $dir) {
	if(!mkdir($dir, $permissions, TRUE)){
		 $errors['error']="sorry an error occurred with file creation.";
		 $errors['success']=false;	
		echo json_encode($errors);
		exit();
	}
	}
	applymail($email,$firstname,$loanid,$password);
	 $errors["success"]=true;	
	echo json_encode($errors);
	//header("Location:registrationTemplate.php");
	 exit();
	}
	catch(PDOException $e){
	$con->rollBack();
	$errors['error']="record could not be created. Check you have not entered a duplicate loanid";
	echo json_encode($errors);
	}


	$con=null;
	exit();
}
elseif(isset($_POST['action']) && $_POST['action']=="viewall"){
	
	
	viewUsers();
	
	
	
	
}
elseif(isset($_POST['action']) && $_POST['action']=="find"){
	$k=test_input($_POST['key']);
	//echo $k;
	findUsers($k);
	
	
	
	
}
elseif(isset($_POST['action']) && $_POST['action']=="edituser"){
	$k=$_POST['loan'];
	
	editUser($k);
	
	
	
	
}
elseif(isset($_POST['action']) && $_POST['action']=="updateuser"){
	$a=$_POST['loanid'];
	$b=$_POST['firstname'];
	$c=$_POST['lastname'];
	$d=$_POST['email'];
	$f=$_POST['phone'];
	
	updateUser($a,$b,$c,$d,$f);
	
	
	
	
}
elseif(isset($_POST['action']) && $_POST['action']=="deleteuser"){
	$a=json_decode(base64_decode($_POST['loanid']));
	deleteUser($a);
	
	
	
	
}
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
function applymail($useremail,$name,$id,$enc){
	$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.forshorelending.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'loans@forshorelending.com';                 // SMTP username
$mail->Password = 'Abraham_123';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to
//$mail->confirmReadingTo='loans@forshorelending.com';
//$mail->addReplyTo('loans@forshorelending.com','reply');
$mail->setFrom('loans@forshorelending.com', 'forshorelending');
$mail->addAddress($useremail, $name);  
//$mail->addAddress($useremail, $name);  // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('a.jpg');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Your account has been created';
$mail->Body    = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Forshorelending account creation</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333; font-size:24px; color:#CCC;"><a href="http://www.forshorelending.com">forshorelending</a></div><div style="padding:24px; font-size:17px;">Hello '.$name.',<br /><br /><br /><a href="http://www.forshorelending.com/reg_login.php">Click here to login with your Account id and temporary password</a><br /><br />Login after successful password change using your Account id and new password:<br />* Account id: <b>'.$id.'</b><br>Password:<b>'.$enc.'</b></div></body></html>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
	$mail->ErrorInfo;
	$errors['error']="mail not sent";
   
	echo json_encode($errors);
} else {
	$success['mail']='Message has been sent';
    //echo json_encode($success);
}

	
}


function viewUsers(){
		$servername=DB_HOST;
		$dbname=DB_DATABASE;
		$out="";
		try {
    		$conn = new PDO("mysql:host=$servername;dbname=$dbname", DB_USER, DB_PASSWORD);
    		// set the PDO error mode to exception
  			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt=$conn->prepare("SELECT COUNT(loanid)AS d FROM register");
			$stmt->execute();
			$res1=$stmt->fetchAll(PDO::FETCH_ASSOC);
			if($res1){
			$rows=$res1[0]['d'];
			$page_rows=5;
			$last = ceil($rows/$page_rows);
			if($last < 1){
			$last = 1;
			}
			$pagenum = 1;
			if(isset($_POST['pagenum'])){
			$pagenum = preg_replace('#[^0-9]#', '', $_POST['pagenum']);
			}
			// This makes sure the page number isn't below 1, or more than our $last page
			if ($pagenum < 1) { 
			$pagenum = 1; 
			} elseif ($pagenum > $last) { 
				$pagenum = $last; 
				}
			// This sets the range of rows to query for the chosen $pagenum
			$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
			$stmt=null;
			$stmt=$conn->prepare("SELECT * from register $limit");
			$stmt->execute();
			$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
			if($res){
			
			$out="<h2>Your records</h2><table class='table table-hover table-bordered table-striped'><thead ><tr class='bg-primary'><th>Loanid</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th></tr></thead><tbody>";
			foreach($res as $row){
			 $out.= "<tr data-loanid=".$row['loanid']." ><td>"
			 .$row['loanid']."</td><td>"
			 .$row['firstname']."</td><td>"
			 .$row['lastname']."</td><td>"
			 .$row['email']."</td><td>"
			 .$row['phone']."</td>";
			 $out.="<td><button onclick='editUser(".json_encode(base64_encode($row['loanid'])).")'>Edit user</button></td>";
			$out.="<td><button class='btn btn-success' onclick='deleteUser(".json_encode(base64_encode($row['loanid'])).")'>delete user</button></td>";
			//$out.="<td><button onclick='viewUser(".$row['loanid'].")'>view user</button></td>";
			//$out.="<td><a href='contractTemplate.php?id=".base64_encode($row['loanid'])."'><button>manage contract</button></a></td>";
			$out.="<td><a href='manageLoanTemplate.php?id=".json_encode(urlencode(base64_encode($row['loanid'])))."'><button>manage contracts/statements</button></a></td>";
				}
			$out.="</tbody></table><br><br><p>Total records($rows) and you are on page:$pagenum of $last </p><br><ul class='pagination'>";
			for($i=1;$i<=$last;$i++){
			$out.="<li><a href='#' onclick='view(event,$i)'>$i</a></li>";
			}	
			$out.="</ul>";		
			echo $out;		
			}
			}
			else{
			echo "Sorry no records found";
			}
			}
		catch(PDOException $e){}	
	
	
	
	
}


function redirect($url){
$ch = curl_init();

curl_setopt_array(
    $ch, array( 
    CURLOPT_URL => $url,
     CURLOPT_RETURNTRANSFER =>false,         // return web page 
	 CURLOPT_COOKIESESSION=>true,
	 CURLOPT_FORBID_REUSE=>true,
        CURLOPT_HEADER         => false,        // don't return headers 
        CURLOPT_FOLLOWLOCATION => true,         // follow redirects 
        CURLOPT_ENCODING       => "",           // handle all encodings 
       
        CURLOPT_AUTOREFERER    => false,         // set referer on redirect 
        CURLOPT_CONNECTTIMEOUT => 120,          // timeout on connect 
        CURLOPT_TIMEOUT        => 120,          // timeout on response 
        CURLOPT_MAXREDIRS      => 10,           // stop after 10 redirects 
        CURLOPT_POST            => 0,            // i am sending post data 
             // this are my post $s 
        CURLOPT_SSL_VERIFYHOST => 0,            // don't verify ssl 
        CURLOPT_SSL_VERIFYPEER => false,        // 
       // CURLOPT_VERBOSE        => 0        
));
// execute
$output = curl_exec($ch);
echo curl_error($ch);

// free
curl_close($ch);	
	
	
	
	
	
	
}


function findUsers($key){
		$servername=DB_HOST;
		$dbname=DB_DATABASE;
		$out="";
		try {
    		$conn = new PDO("mysql:host=$servername;dbname=$dbname", DB_USER, DB_PASSWORD);
    		// set the PDO error mode to exception
  			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt=$conn->prepare("SELECT COUNT(loanid)AS d from register WHERE firstname LIKE '$key%' OR lastname LIKE '$key%'");
			$stmt->execute();
			$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
			
			if($res){
			$rows=$res[0]['d'];	
			$page_rows=5;
			$last = ceil($rows/$page_rows);
			if($last < 1){
			$last = 1;
			}
			$pagenum = 1;
			if(isset($_POST['pagenum'])){
			$pagenum = preg_replace('#[^0-9]#', '', $_POST['pagenum']);
			}
			// This makes sure the page number isn't below 1, or more than our $last page
			if ($pagenum < 1) { 
			$pagenum = 1; 
			} elseif ($pagenum > $last) { 
				$pagenum = $last; 
				}
			// This sets the range of rows to query for the chosen $pagenum
			$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
			$stmt=null;
			$stmt=$conn->prepare("SELECT * from register WHERE firstname LIKE '$key%' OR lastname LIKE '$key%' $limit");
			$stmt->execute();
			$res=null;
			$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
			$out="<h2>Your records</h2><table class='table table-hover table-bordered table-striped'><thead ><tr class='bg-primary'><th>Loanid</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th></tr></thead><tbody>";
			foreach($res as $row){
			 $out.= "<tr data-loanid=".$row['loanid']." ><td>"
			 .$row['loanid']."</td><td>"
			 .$row['firstname']."</td><td>"
			 .$row['lastname']."</td><td>"
			 .$row['email']."</td><td>"
			 .$row['phone']."</td>";
			 $out.="<td><button onclick='editUser(".json_encode(base64_encode($row['loanid'])).")'>Edit user</button></td>";
			$out.="<td><button class='btn btn-success' onclick='deleteUser(".json_encode(base64_encode($row['loanid'])).")'>delete user</button></td>";
			//$out.="<td><button onclick='viewUser(".$row['loanid'].")'>view user</button></td>";
			//$out.="<td><a href='contractTemplate.php?id=".base64_encode($row['loanid'])."'><button>manage contract</button></a></td>";
			$out.="<td><a href='manageLoanTemplate.php?id=".json_encode(urlencode(base64_encode($row['loanid'])))."'><button>manage statements/contracts</button></a></td>";
				}
			$out.="</tbody></table><br><br><p>Total records($rows) and you are on page:$pagenum of $last </p><br><ul class='pagination'>";
			for($i=1;$i<=$last;$i++){
			$out.="<li><a href='#' onclick='searchPage(event,$i)'>$i</a></li>";
			}	
			$out.="</ul>";		
			echo $out;		
			}
			else{
				echo "Sorry, no records found";
				
			}
		
			}
		catch(PDOException $e){}	
	
	
	
	
}

function editUser($id){
	$loanid=json_decode(base64_decode($id));
	$servername=DB_HOST;
	$dbname=DB_DATABASE;
	$out="";
	try {
    	$conn = new PDO("mysql:host=$servername;dbname=$dbname", DB_USER, DB_PASSWORD);
    	// set the PDO error mode to exception
  		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt=$conn->prepare("SELECT * from register WHERE loanid=:h");
		$stmt->bindParam(":h",$loanid);
		$stmt->execute();
		$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
		if($res){
			echo json_encode($res);
		}
		else{
			echo "sorry no records found";	
		}
	}
	catch(PDOException $e){
		
		
	}
	
$conn=null;	
}

function updateUser($lid,$fn,$ln,$em,$ph){
	$loanid=$lid;
	$firstname=$fn;
	$lastname=$ln;
	$email=$em;
	$phone=$ph;
	$servername=DB_HOST;
	$dbname=DB_DATABASE;
	$out="";
	try {
    	$conn = new PDO("mysql:host=$servername;dbname=$dbname", DB_USER, DB_PASSWORD);
    	// set the PDO error mode to exception
  		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt=$conn->prepare("UPDATE register SET firstname=:fn,lastname=:ln,email=:em,phone=:ph WHERE loanid=:lid");
		$stmt->bindParam(":lid",$loanid);
		$stmt->bindParam(":fn",$firstname);
		$stmt->bindParam(":ln",$lastname);
		$stmt->bindParam(":em",$email);
		$stmt->bindParam(":ph",$phone);
		$stmt->execute();
		
		
			echo ("update successful!");	
	}
	catch(PDOException $e){
		echo ("update failed. Try again");
		
	}
	
$conn=null;	
}

function deleteUser($lid){
	$loan=$lid;
	$servername=DB_HOST;
	$dbname=DB_DATABASE;
	$out="";
	try {
    	$conn = new PDO("mysql:host=$servername;dbname=$dbname", DB_USER, DB_PASSWORD);
    	// set the PDO error mode to exception
  		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt=$conn->prepare("DELETE FROM register WHERE loanid=:lid");
		$stmt->bindParam(":lid",$loan);
		$stmt->execute();
		
		$dir=$loan;
		$loanid="user/".strval($dir);
		$lo= $loanid."/contract";
		if(is_dir($lo)){
			$dh = opendir($lo) or die("error");
			while(false !== ($file = readdir($dh))){
				if(is_dir($file)){
				
				}
				else{	
					
					unlink("$lo/$file");
					
				}
			
			}
			closedir($dh);
			rmdir($lo);
			
			
		}
		$lo= $loanid."/statements";
		if(is_dir($lo)){
			$dh = opendir($lo) or die("error");
			while(false !== ($file = readdir($dh))){
				if(is_dir($file)){
				
				}
				else{	
					
					unlink("$lo/$file");
					
				}
			
			}
			closedir($dh);
			rmdir($lo);
			
			
		}
		$lo= $loanid."/other";
		if(is_dir($lo)){
			$dh = opendir($lo) or die("error");
			while(false !== ($file = readdir($dh))){
				if(is_dir($file)){
				
				}
				else{	
					
					unlink("$lo/$file");
					
				}
			
			}
			closedir($dh);
			rmdir($lo);
			rmdir("user/$dir");
			
		}
		
			echo ("delete successful!");	
	}
	catch(PDOException $e){
		echo ("delete failed. Try again");
		
	}
	
$conn=null;	
exit();
}

?>

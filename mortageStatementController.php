<?php
ob_start();
include_once("PHPMailer-master\PHPMailer-master\PHPMailerAutoload.php");
include 'config.php';
if($_SERVER['REQUEST_METHOD']=="POST"){
if(isset($_REQUEST['action']) && $_REQUEST['action']=="upload"){
	if(empty($_FILES['upload']['name'])){
		
		$errors['error']='Please select a file to upload';
		echo json_encode($errors);
		
			
		exit();
	}
	$loanid=json_decode($_POST['id']);
	if(isset($_POST['month'])){
	$month=$_POST['month'];
	}
	else{
	$month="";	
		
	}
	$dir="user/".$loanid."/statements/";
	$filename=$_FILES['upload']['name'];
	$fnom = explode(".", $filename);
	$fileExt = end($fnom);
	$i=rand(100,1000000);
	$location = $dir.$loanid."_".$i.".".$fileExt;
	$type=$_FILES['upload']['type'];
	$size=$_FILES['upload']['size'];
	$servername =DB_HOST;
	$username =DB_USER;
	$password =DB_PASSWORD;
	$dbname =DB_DATABASE;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO statements(loanid,month,location,type,size) 
    VALUES (:lid,:mt, :loc, :ty, :sz)");
    $stmt->bindParam(':lid', $loanid);
	$stmt->bindParam(':mt', $month);
    $stmt->bindParam(':loc', $location);
    $stmt->bindParam(':ty', $type);
	$stmt->bindParam(':sz', $size);
    $stmt->execute();
	$last=$conn->lastInsertId();
	if(!move_uploaded_file($_FILES['upload']['tmp_name'], $location)){
		$stmt = $conn->prepare("DELETE FROM statements WHERE statementid=$last");
		$stmt->execute();
		$errors['error']="Statement save unsuccessful.";
		echo json_encode($errors);
		exit();
	}
	$errors['success']=true;
	}
	catch(PDOException $e){
		$errors['error']=$e;
		
		}

$conn=null;
	echo json_encode($errors);
	//$re=base64_encode($loanid);
	//header("Location:manageLoanTemplate.php?id=$re");
	//var_dump(debug_backtrace());	
exit;
}
elseif(isset($_POST['action']) && $_POST['action']=="viewstatement"){
	$loanid=json_decode($_POST['id']);
	viewStatement($loanid);
	
	
	
	
	
}
elseif(isset($_POST['action']) && $_POST['action']=="sendstatement"){
	$statementid=json_decode($_POST['statement']);
	sendStatement($statementid);
	
	
	
	
	
}
elseif(isset($_POST['action']) && $_POST['action']=="deletestatement"){
$s=$_POST['id'];
	 $statementid=base64_decode($s['statementid']);
	 $loc=$s['location'];
	
	//echo $statementid=base64_decode($stat);
	
	//echo $loc=json_decode($stats['location']);
	deleteStatement($statementid,$loc);
	
	exit();
	
	
	
}
	
	
	


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


function viewStatement($id){
	$c=$id;
	$servername=DB_HOST;
		$dbname=DB_DATABASE;
		$out="";
		try {
    		$conn = new PDO("mysql:host=$servername;dbname=$dbname", DB_USER, DB_PASSWORD);
    		// set the PDO error mode to exception
  			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt=$conn->prepare("SELECT * from statements WHERE loanid=:b");
			$stmt->bindParam(":b",$c);
			$stmt->execute();
			$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
			if($res){
			
			$out="<h2>Your records</h2><table class='table table-hover table-bordered table-striped'><thead ><tr class='bg-primary'><th>Statement id</th><th>Loan id</th><th>Statement period</th><th>File type</th><th>File size</th><th>Date added</th></tr></thead><tbody>";
			foreach($res as $row){
			 $out.= "<tr data-loanid=".$row['loanid']." ><td>"
			 .$row['statementid']."</td><td>"
			 .$row['loanid']."</td><td>"
			 .$row['month']."</td><td>"
			 .$row['type']."</td><td>"
			 .$row['size']."</td><td>".
			 $row['upload_date']."</td>";
			 $arr=array("statementid"=>base64_encode($row['statementid']),"location"=>$row['location']);
			 $sendme=json_encode($arr);
			 $out.="<td><button class='btn btn-danger' onclick='deletestatement(".$sendme.")'>delete statement</button></td>";
			$out.="<td><a href='".$row['location']."'><button>view</button></a></td>";
			$out.="<td><button onclick='mailstatement(".json_encode($row['statementid']).")'>email statement</button></td>";
				}
			$out.="</tr></tbody></table>";
			echo $out;
			}
			else{
					echo "Sorry no records found.";
				
			}
		
			}
		catch(PDOException $e){
			
		}	
		exit();
	
	
	
	
}
function deleteStatement($id,$loca){
		$errrors=array();
		$errors['success']=false;
		$servername=DB_HOST;
		$dbname=DB_DATABASE;
		$out="";
		$sid=$id;
		try {
    		$loc=$loca;
			unlink($loc);	
			/*
			if(is_file($loc)){
				
			$fp=fopen($loc,"r");
			//echo $files;
			flock($fp, LOCK_EX);
			fclose($fp);
			
			}*/		
			//echo $sid;
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", DB_USER, DB_PASSWORD);
    		// set the PDO error mode to exception
  			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt=$conn->prepare("DELETE from statements WHERE statementid=:a LIMIT 1");
			$stmt->bindParam(":a",$sid);
			$stmt->execute();
			
			$errors['success']=true;
			//$r=base64_encode($loa);
			//header("Location:manageLoanTemplate.php?id=$r");
		}
		catch(PDOException $e){
			$errors['error']= $e;
			
		}
	$conn=null;
	echo json_encode($errors);
	exit();
	
}


function sendStatement($con){
	$errors=array();
	$errors['success']=true;
	$servername=DB_HOST;
		$dbname=DB_DATABASE;
		$out="";
		try {
    		$conn = new PDO("mysql:host=$servername;dbname=$dbname", DB_USER, DB_PASSWORD);
    		// set the PDO error mode to exception
  			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt=$conn->prepare("SELECT register.loanid,register.firstname,register.email,statements.location,statements.month FROM register,statements WHERE statements.loanid=register.loanid AND statements.statementid=:d LIMIT 1");
			$stmt->bindParam(":d",$con);
			$stmt->execute();
			$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
			//var_dump($row);
			if($row){
				foreach($row as $res){
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
$mail->addAddress($res['email'], $res['firstname']);  
//$mail->addAddress($useremail, $name);  // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('a.jpg');         // Add attachments
$mail->addAttachment($res['location'], 'Your contract');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Your statement';
$mail->Body    = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Forshorelending account creation</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333; font-size:24px; color:#CCC;"><a href="http://www.forshorelending.com">forshorelending</a>Forshorelending contract</div><div style="padding:24px; font-size:17px;">Hello '.$res['firstname'].',<br /><br />Please find attached your statement for the period'.$res['month'].'. Download sign and return via email to the address below:<br /><br /><br />Login after successful password change using your loanid and new password:<br />* Email: <b>loans@forshorelending.com</b></div></body></html>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
	$mail->ErrorInfo;
    $errors['error']=$mail;
	$errors['success']=false;
} else {
	$errors['success']=true;
   // echo json_encode($errors);
				}
				}
			}
			
		}
		catch(PDOException $e){
			$errors['error']=$e;
			}
		echo json_encode($errors);
		exit();	
}		
	
	

?>
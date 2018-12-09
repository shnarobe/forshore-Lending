<?php
//session_start();
ob_start();
require "config.php";
//require 'class.smtp.php';
//require 'class.phpmailer.php';
include_once("PHPMailer-master\PHPMailer-master\PHPMailerAutoload.php");
$loanarr;

//require "checklogin.php";
//$loanError=array();
// define variables and set to empty values



/*
$debt_management = $payday_loans = $own_house = $when_house = $bankruptcy = $when_bankruptcy = $amount_requested = $loan_purpose = $loan_term = $secured_collateral = $describe_collateral = "";
$name=$email=$applicant_address = $applicant_city = $applicant_province = $applicant_postalcode = $applicant_home_phone = $applicant_cell_phone = $employed_by = $position =$years_employed = $months_employed=$monthly_salary=$business_address = $business_city = $business_province = $business_postalcode = $business_phone = $website = $relative_name = $relative_relation = $relative_address = $relative_city = $relative_province = $relative_phone = $relative_name_2 = $relative_relation_2 = $relative_address_2 = $relative_city_2 = $relative_province_2 = $relative_phone_2 ="";*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	
	/*
	*/
 if(isset($_POST['action'])&& $_POST['action']=="viewall"){
 	viewAll();
 
 
 
 
 }
 elseif(isset($_POST['action'])&& $_POST['action']=="viewloan"){
 if(isset($_POST['loan'])){
 viewLoan($_POST['loan']);
 }
 }
 elseif(isset($_POST['action'])&& $_POST['action']=="printloan"){
 if(isset($_POST['loan'])){
 printLoan($_POST['loan']);
 }
 }
 elseif(isset($_POST['action'])&& $_POST['action']=="prepareContract"){
 if(isset($_POST['loan'])){
 prepareContract($_POST['loan']);
 }
 }
 elseif(isset($_POST['action'])&& $_POST['action']=="deleteloan"){
 if(isset($_POST['loan'])){
 deleteLoan($_POST['loan']);
 }
 }
 elseif(isset($_POST['action'])&& $_POST['action']=="approve"){
 if(isset($_POST['loan'])){
 approveLoan($_POST['loan']);
 }
 }
 elseif(isset($_POST['action'])&& $_POST['action']=="deletemultiple"){
 if(isset($_POST['loanselect'])){
 deleteMultiple($_POST['loanselect']);
 exit();
 //echo json_encode($_POST['loanselect']);
 }
 }

/*elseif(isset($_REQUEST['action'])&& $_REQUEST['action']=="create"){
 
 
  $loanarr=array();
  $loanarr=$_POST;
 unset($_POST);
  
  $count=0;
  foreach($loanarr as $key=>$value){
	$_SESSION[$key]=$value;
	//echo $key;
	//echo $_SESSION[$key];// $count;
	
	  $count++;
	  
  }
	createLoan($loanarr);		
	//loaninfovalidator();
	
	//global $loanError;	
	//$s1=json_encode($loanError);
	/*if(!$check_errors){
		//echo $loanarr;
		createLoan($loanarr);
	}
	else{
		//header();
		header("Location:loanAppTemplate.php");
		//die("exit scrip[t");
	}
	exit();

	
}*/
exit();
}






function createLoan($array){
	//print_r($array);
	$servername = DB_HOST;
$username =DB_USER;
$password =DB_PASSWORD;
$dbname =DB_DATABASE;
$res=null;
$out="";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 $conn->beginTransaction();
	   $stmt = $conn->prepare("INSERT INTO loanapplication(debt_management,payday_loans,own_house,when_own_house,bankruptcy,when_bankruptcy,amount_requested,loan_purpose,loan_term,secured_collateral,describe_collateral,firstname,lastname,applicant_email,applicant_address,applicant_city,applicant_province,applicant_postal_code,applicant_home_phone,applicant_cell_phone,employed_by,applicant_position,years_employed,months_employed,monthly_salary,business_address,business_city,business_province,business_postal_code,business_phone,business_website,relative_name,relative_relation,relative_address,relative_city,relative_province,relative_phone,relative_name2,relative_relation2,relative_address2,relative_city2,relative_province2,relative_phone2,loan_comment) VALUES(?,?,?,	?,	?,	?,	?,?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?)");
    
		$stmt->bindParam(1,$array['debt_management']);
 $stmt->bindParam(2,$array['payday_loans']);
 $stmt->bindParam(3,$array['own_house']);
$stmt->bindParam(4,$array['when_own_house']);
 $stmt->bindParam(5,$array['bankruptcy']); 
$stmt->bindParam(6,$array['when_bankruptcy']);
 $stmt->bindParam(7,$array['amount_requested']);
 $stmt->bindParam(8,$array['loan_purpose']);
 $stmt->bindParam(9,$array['loan_term']);
 $stmt->bindParam(10,$array['secured_collateral']);
$stmt->bindParam(11,$array['describe_collateral']);
$stmt->bindParam(12,$array['firstname']);
$stmt->bindParam(13,$array['lastname']);
$stmt->bindParam(14,$array['applicant_email']);
$stmt->bindParam(15,$array['applicant_address']);
$stmt->bindParam(16,$array['applicant_city']);
$stmt->bindParam(17,$array['applicant_province']); 
$stmt->bindParam(18,$array['applicant_postal_code']); 
$stmt->bindParam(19,$array['applicant_home_phone']);
$stmt->bindParam(20,$array['applicant_cell_phone']);
$stmt->bindParam(21,$array['employed_by']);
$stmt->bindParam(22,$array['applicant_position']);
$stmt->bindParam(23,$array['years_employed']);
$stmt->bindParam(24,$array['months_employed']);
$stmt->bindParam(25,$array['monthly_salary']);
$stmt->bindParam(26,$array['business_address']);
$stmt->bindParam(27,$array['business_city']);
$stmt->bindParam(28,$array['business_province']);
$stmt->bindParam(29,$array['business_postal_code']);
$stmt->bindParam(30,$array['business_phone']);
$stmt->bindParam(31,$array['business_website']);
$stmt->bindParam(32,$array['relative_name']);
$stmt->bindParam(33,$array['relative_relation']);
$stmt->bindParam(34,$array['relative_address']);
$stmt->bindParam(35,$array['relative_city']);
$stmt->bindParam(36,$array['relative_province']);
$stmt->bindParam(37,$array['relative_phone']);
$stmt->bindParam(38,$array['relative_name2']);
$stmt->bindParam(39,$array['relative_relation2']);
$stmt->bindParam(40,$array['relative_address2']);
$stmt->bindParam(41,$array['relative_city2']);
$stmt->bindParam(42,$array['relative_province2']);
$stmt->bindParam(43,$array['relative_phone2']);
$stmt->bindParam(44,$array['loan_comment']);
	
	/*$count=1;
	foreach($array as $key=>$value){
		
	$stmt->bindParam($count,$value);
	//echo "$count"."   ".$key." => ".$value;
	//echo"<br/>";
	$count=$count+1;
	//echo "$count".$value;
	}*/
    $stmt->execute();
	$conn->commit();
	//this has already returned an array so no need to put in another array
	//of course the while loop can be used on the receiver to output the data
	$record=$conn->lastInsertId();
	//echo "success insert";
		 
		applymail("loans@forshorelending.com",$array['applicant_email'],$array['firstname'],$record);
		
		
		
		//START
		
		
		//END
		
	//}//end inner if

	
	
}
	catch(PDOException $e){
		$conn->rollBack();
		echo $e;
		}


$conn=null;	
	
	exit();
	
	}
	
	
function approveLoan($loanid){
	$a=(int)$loanid;
	
		$res="";
		$userid=1;
		//if(logged_in() && is_admin()){ use in production
			$name=DB_DATABASE;
			$host=DB_HOST;
			$out="";
			$decis="";
		try {
    			$conn = new PDO("mysql:host=$host;dbname=$name",DB_USER,DB_PASSWORD);
    			// set the PDO error mode to exception
  
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$stmt=$conn->prepare("SELECT approved FROM loanapplication WHERE loan_applicationid=:ap");	
				$stmt->bindParam(":ap",$a);
				$stmt->execute();
				$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
				if($res){
					foreach($res as $row){
					$decis=$row['approved'];	
					}
					if($decis=='no'){
						$stmt=null;
					$stmt=$conn->prepare("UPDATE loanapplication SET approved='yes' WHERE loan_applicationid=:ap");		
					}
					else{
						$stmt=null;
					$stmt=$conn->prepare("UPDATE loanapplication SET approved='no' WHERE loan_applicationid=:ap");		
						
					}
				$stmt->bindParam(":ap",$a);
				$stmt->execute();
			
				echo "Change successful";
				}
				else{
				echo "no records found";	
					
				}
				
				
				}
				catch(PDOException $e){
				$conn->rollBack();
				echo $e;
				}
				$conn=null;
				exit();
				}		


function viewAll(){

	
		$res="";
		$userid=1;
		//if(logged_in() && is_admin()){ use in production
			$name=DB_DATABASE;
			$host=DB_HOST;
			$out="";
		try {
    			$conn = new PDO("mysql:host=$host;dbname=$name",DB_USER,DB_PASSWORD);
    			// set the PDO error mode to exception
  
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt=$conn->prepare("SELECT COUNT(loan_applicationid)AS d from loanapplication");
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
		$res=null;
		$stmt=$conn->prepare("SELECT * from loanapplication ORDER BY date DESC $limit");	
		$stmt->execute();
		$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$out="<h2>Your records</h2><table class='table table-hover table-bordered table-striped'><thead ><tr class='bg-primary'><th></th><th>Application Id</th><th>Amount</th><th>Term</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Telephone</th><th>Approved</th></tr></thead><tbody>";
		foreach($res as $row){
			 $out.= "<tr><td><input type='checkbox' name='loanselect[]' value='".$row['loan_applicationid']."'></td><td>".
        $row['loan_applicationid'].
        "</td><td>" .
        $row['amount_requested'].
        "</td><td>" .
		 $row['loan_term'].
        "</td><td>".
		 $row['firstname'].
        "</td><td>" .
		 $row['lastname'].
        "</td><td>" .
		 $row['applicant_email'].
        "</td><td>" .
		 $row['applicant_home_phone'].
           "</td><td>".
			$row['approved'].
           "</td>" ;
			//$out.="<td><button onclick='editLoan(".$row['loan_applicationid'].")'>Edit</button>";
			$out.="<td><button onclick='deleteLoan(".$row['loan_applicationid'].")'>Delete</button>";
			$out.="<td><button onclick='viewLoan(".$row['loan_applicationid'].")'>View</button>";
			$out.="<td><button onclick='approveLoan(".$row['loan_applicationid'].")'>Approve/decline</button>";
			$out.="<td><button onclick='prepareContract(".$row['loan_applicationid'].")'>Prepare contract</button>";
			$out.="<td><button class='btn btn-success' onclick='printLoan(".$row['loan_applicationid'].")'>print</button></tr>";
				
				}
			$out.="</tbody></table><br><br><p>Total records($rows) and you are on page:$pagenum of $last </p><br><ul class='pagination'>";
			for($i=1;$i<=$last;$i++){
			$out.="<li><a href='#' onclick='viewloans(event,$i)'>$i</a></li>";
			}	
			$out.="</ul>";		
			echo $out;	
		}
		else{
			echo "Sorry no records found.";
			
		}
		}
		catch(PDOException $e){}
			
			$conn=null;
			
			
			}	
	

function viewLoan($loanid){
	$ab=(int)$loanid;
	$res=null;
	$name=DB_DATABASE;
			$host=DB_HOST;
			$out="";
		try {
    			$conn = new PDO("mysql:host=$host;dbname=$name",DB_USER,DB_PASSWORD);
    			// set the PDO error mode to exception
  
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt=$conn->prepare("SELECT * FROM loanapplication where loan_applicationid=:p LIMIT 1");	
				$stmt->bindParam(":p",$ab);
				$stmt->execute();
				$res=$stmt->fetch(PDO::FETCH_ASSOC);
		if($res){
			
			echo json_encode($res);
			//foreach($res as $key=>$value){
		//$_SESSION[$key]=$value;
		//}
		}
		else{
			$error['error']="no loan found";
			
			}
		}
		catch(PDOException $e){
			
			$error['error']=$e;
		}
		$conn=null;
		exit();
	
	}
function deleteLoan($loanid){
	$res="";
		
		//if(logged_in() && is_admin()){ use in production
			$name=DB_DATABASE;
			$host=DB_HOST;
			$out="";
		try {
    			$conn = new PDO("mysql:host=$host;dbname=$name",DB_USER,DB_PASSWORD);
    			// set the PDO error mode to exception
  
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt=$conn->prepare("DELETE from loanapplication where loan_applicationid=:d");	
				$stmt->bindParam(":d",$loanid);
				$stmt->execute();
		echo "success! Application deleted.";
		}
		catch(PDOException $e){
			echo $e;
			}
		$conn=null;
	}
function deleteMultiple($loanid){
	$res="";
		
		//if(logged_in() && is_admin()){ use in production
			$name=DB_DATABASE;
			$host=DB_HOST;
			$out="";
		try {
    			$conn = new PDO("mysql:host=$host;dbname=$name",DB_USER,DB_PASSWORD);
    			// set the PDO error mode to exception
  
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt=$conn->prepare("DELETE from loanapplication where loan_applicationid=:d");	
				foreach($loanid as $key=>$value){
				$stmt->bindParam(":d",$value);
				$stmt->execute();
				}
		echo "success! Application deleted.";
		}
		catch(PDOException $e){
			echo $e;
			}
		$conn=null;
	}


	
	
function editLoan($loanid){
	$res=null;
	$name=DB_DATABASE;
			$host=DB_HOST;
			$out="";
		try {
    			$conn = new PDO("mysql:host=$host;dbname=$name",DB_USER,DB_PASSWORD);
    			// set the PDO error mode to exception
  
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt=$conn->prepare("SELECT * FROM loanapplication WHERE loan_applicationid=:o LIMIT 1");	
				$stmt->bindParam(":o",$loanid);
				$stmt->execute();
				$res=$stmt->fetch(PDO::FETCH_ASSOC);
		if($res){
			print_r(json_encode($res));
		}
		else{
			echo "no lona found";
			
			}
		}
		catch(PDOException $e){
			
			echo $e;
		}
		$conn=null;
	}

function applymail($admin,$useremail,$name,$appid){
	$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.forshorelending.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'loans@forshorelending.com';                 // SMTP username
$mail->Password = 'Abraham_123';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to
$mail->confirmReadingTo='loans@forshorelending.com';
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

$mail->Subject = 'Your application was received';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    
  //   'Message could not be sent.';
  $mail->ErrorInfo;
} else {
   // echo 'Message has been sent';
    
}


	
	
	}



function prepareContract($lid){
			$loanid=$lid;
			$name=DB_DATABASE;
			$host=DB_HOST;
			$out="";
		try {
    			$conn = new PDO("mysql:host=$host;dbname=$name",DB_USER,DB_PASSWORD);
    			// set the PDO error mode to exception
  
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt=$conn->prepare("SELECT * from loanapplication where loan_applicationid=:a LIMIT 1");	
		$stmt->bindParam(":a",$loanid);
		$stmt->execute();
		$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
		if($res){
			foreach($res as $result){
		$borname=$result['firstname'];
		$boremail=$result['applicant_email'];
		$boraddress=$result['applicant_address'];	
		$borcity=$result['applicant_city'];	
		$borphone=$result['applicant_cell_phone'];	
		$borprovince=$result['applicant_province'];	
		$borpostalcode=$result['applicant_postal_code'];		
		}
		}
		
		
		
		$out=<<<EOT
		 PROMISSORY NOTE

Account #: LOC-RMR1244
 
Borrower: $borname,$boraddress,$borcity,$borprovince,$borpostalcode.	
 (The term Borrower refers to one or more borrowers. If there is more than one borrower, they agree to be jointly and severally liable).
Phone: $borphone Email: $boremail

Lender: Forshore Lending/Abraham Robertson (The term Lender refers to any person(s) who legally holds this note)
Email: abemcneil74@gmail.com

•	New Loan amount: $1972.50
•	A deposit for the loan amount (minus any applicable fees) will be made within 24 hours upon receipt of this signed promissory note.
•	This loan bears interest of 9% per month on outstanding Balances.
•	Total loan obligation: $1972.50
Term: 6 months

(Borrower has agreed to repay the loan within 180 Calendar days from the date of the loan.  The Loan can be repaid at any given time before the due date without penalty. At such time. In the event the loan is not paid back on the due date, a $30.00 late payment fee will be charge per week on the outstanding balances pass the due date.


1.	Promise to Pay

FOR VALUE RECEIVED, the Borrower promises to pay the Lender the amount of one thousand, seven hundred and sixty five dollars and thirty cents at 27A View Green Cres, Etobicoke, On M9W7E1 Or at such address as may be later provided in writing to the Borrower.   

2.	Repayment

Borrower also agrees that this note shall be paid in the following manner:


1.	$192.50 on Dec 11th 2015
2.	$192.50 on Dec 25th 2015
3.	$181.25 on Jan 8th 2016
4.	$181.25 on Jan 22rd 2016
5.	$170.00 on Feb 5th 2016
6.	$170.00 on Feb 19th 2016
7.	$158.75 on March 4th 2016
8.	$158.75 on March 18th 2016
9.	147.50 on April 1st 2016
10.	$147.50 on April 15th 2016
11.	$136.25 on April 29th 2016
12.	$136.25 on May 13th 2016 (Final Payment)

                                                                                                                     3.	Missed payments and dishonoured cheques:

Dishonoured cheques:  $50.00
Late payment: This loan bears $30.00 interest per week on outstanding balance.

If any repayment instalment, payment due under this note is not received by the due date, the entire loan balance will become due and payable at the option of Lender without prior notice to Borrower.  In the event Lender prevails in small claims to collect on the unpaid balance, Borrower agrees to pay a late fee in addition to court fees.


         		         


I $borname agree to the terms of the loan agreement and have entered into a loan agreement with the Lender upon receipt of loan.  

CONSENT TO INFORMATION SHARING:

a) You consent to the exchange of information obtained from any source but solely for the purposes of the administration or enforcement of the loan.

b) In the event of default under this Promissory note, you authorize me to contact you employer who may release information about you for the purpose of locating you.
 

1. Borrower's Signature:	                              Signed this 4th____ day of December
                                                                             2015 at Scarborough, ON
                                                                             (City where signed)

Print Name: $borname __________________________


Address: 25 Noake Cres, Ajax, On L1T3L5


Lender Signature:                                           		Signed this 4th day of December
                                                                        2015, at Mississauga, On 

                                                                                                               

	                                                                                                         
Please email signed Promissory note: abemcneil74@gmail.com
EOT;





$out1="";
/* <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:"textarea" });</script>*/
		$out1='<form action="process.php" method="post">
<textarea rows=40 cols=170 name="content" id="content">';
 $out1.=$out;
$out1.='</textarea>
<input type="submit" value="prepare"/>
</form>';
echo $out1;
		}
		catch(PDOException $e){
			echo $e;
			
		}
		
}
	
	
	
	
	




/*

function approve($loanid){
	
	}
function deny($loanid){}
function generateContract($contract,$loanid){} 
	//user clicks generate contract
	//the application id is sent to database
	//the useremail, name etc is retrieved 
	//a call is made to fetch the contract template
	//the retrieved values are added to the template and php outputs a form with aand emailed to user

*/

?>
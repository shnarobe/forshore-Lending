<?php
include("config.php");
//require 'C:\wamp1\www\PHPMailer-master\PHPMailer-master\PHPMailerAutoload.php';
//require 'C:\Documents and Settings\krishna\Desktop\foreshore\fpdf18\fpdf.php';
//function contract($loanid){
	$loanid=15;
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
		$borname=$result['name'];
		$boraddress=$result['applicant_address'];	
		$borcity=$result['applicant_city'];	
		$borprovince=$result['applicant_province'];	
		$borpostalcode=$result['applicant_postalcode'];		
		}
		}
		
		
		
		$out=<<<EOT
		 PROMISSORY NOTE

Account #: LOC-RMR1244
 
Borrower: $borname,$boraddress,$borcity,$borprovince,$borpostalcode.	
 (The term Borrower refers to one or more borrowers. If there is more than one borrower, they agree to be jointly and severally liable).
647-835-1244 Email: rapparroberts@yahoo.ca

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


         		         


I Robert Rumble agree to the terms of the loan agreement and have entered into a loan agreement with the Lender upon receipt of loan.  

CONSENT TO INFORMATION SHARING:

a) You consent to the exchange of information obtained from any source but solely for the purposes of the administration or enforcement of the loan.

b) In the event of default under this Promissory note, you authorize me to contact you employer who may release information about you for the purpose of locating you.
 

1. Borrower's Signature:	                              Signed this 4th____ day of December
                                                                             2015 at Scarborough, ON
                                                                             (City where signed)

Print Name: Robert Rumble_______________________


Address: 25 Noake Cres, Ajax, On L1T3L5


Lender Signature:                                           Signed this 4th day of December
                                                                        2015, at Mississauga, On 

                                                                                                               

	                                                                                                         
Please email signed Promissory note: abemcneil74@gmail.com
EOT;







		//echo $out;
		}
		catch(PDOException $e){
			echo $e;
			
		}
		?>
	
<html>
<head>

</head>


<body>
<form action="process.php" method="post">
<textarea cols="150" rows="50" name="content" id="content" >
<?php echo $out;?>
</textarea>
<input type="submit" value="go"/>
</form>

</body>
</html>	
		
		
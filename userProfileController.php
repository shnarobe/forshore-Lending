<?php
include_once 'account.php';
require 'config.php';
if((!logged_in()&&!is_profile())){
	header("Location:foreshore.php");
	die("Redirecting to home page");
	
	
}



if($_SERVER['REQUEST_METHOD']=="POST"){
	if(isset($_POST['action'])&& $_POST['action']=="viewcontract"){
		$contractid=json_decode(base64_decode($_POST['id']));
		viewContract($contractid);
			 
			 
	}
	elseif(isset($_POST['action'])&& $_POST['action']=="viewstatement"){
		$statementid=json_decode(base64_decode($_POST['id']));
		viewStatement($statementid);
			 
			 
	}
	elseif(isset($_POST['action'])&& $_POST['action']=="review"){
		$comment=test_input($_POST['comment']);
		$user=json_decode(base64_decode($_POST['id']));
		review($comment,$user);
		 exit();
	}
	exit();
	
}


function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

function review($comm,$id){
	$errors=array();
	$c=$id;
	$b=$comm;
	$servername=DB_HOST;
		$dbname=DB_DATABASE;
		$out="";
		try {
    		$conn = new PDO("mysql:host=$servername;dbname=$dbname", DB_USER, DB_PASSWORD);
    		// set the PDO error mode to exception
  			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt=$conn->prepare("INSERT INTO reviews(loanid,comment) VALUES(:usr,:com)");
			$stmt->bindParam(":com",$b);
			$stmt->bindParam(":usr",$c);
			$stmt->execute();
			$errors["error"]=false;
		}
		catch(PDOException $e){
			$errors["error"]=true;
		
			
		}
		echo json_encode($errors);
		
}
function viewContract($id){
	$c=$id;
	$servername=DB_HOST;
		$dbname=DB_DATABASE;
		$out="";
		try {
    		$conn = new PDO("mysql:host=$servername;dbname=$dbname", DB_USER, DB_PASSWORD);
    		// set the PDO error mode to exception
  			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt=$conn->prepare("SELECT * from contracts WHERE loanid=:b");
			$stmt->bindParam(":b",$c);
			$stmt->execute();
			$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
			if($res){
			
			$out="<h2>Your records</h2><table class='table table-hover table-bordered table-striped'><thead ><tr class='bg-primary'><th>Contract id</th><th>Loan id</th><th>File type</th><th>File size</th><th>Date added</th></tr></thead><tbody>";
			foreach($res as $row){
			 $out.= "<tr data-loanid=".$row['contractid']." ><td>"
			 .$row['contractid']."</td><td>"
			 .$row['loanid']."</td><td>"
			 .$row['type']."</td><td>"
			 .$row['size']."</td><td>".
			 $row['date']."</td>";
			// $out.="<td><a href='contractController.php?action=delete&id=".$row['contractid']."'><button>delete contract</button></a></td>";
			$out.="<td><a href=".$row['location']." target='_blank'><button type='button'>view</button></a></td>";
			//$out.="<td><button onclick='mail(".$row['contractid'].")'>email contract</button></a></td>";
				}
			$out.="</tr></tbody></table>";
			echo $out;
			}
			else{
			echo "Sorry no records found. Your contract may not have been added as yet";
			}
			}
		catch(PDOException $e){
			echo ("There appears to be an error with your request. Admin has been notified.");
			$dt = date("Y-m-d H:i:s (T)");
		 $mess=$dt."=>".$e;
		error_log($mess, 3, "c:\wamp1\logs\php_error.txt");
		}	
		
	
	exit();
	
	
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
			$stmt=$conn->prepare("SELECT COUNT(statementid)AS d FROM statements where loanid=:n");
			$stmt->bindParam(":n",$c);
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
			$stmt=$conn->prepare("SELECT * from statements WHERE loanid=:b $limit");
			$stmt->bindParam(":b",$c);
			$stmt->execute();
			$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
			$out="<h2>Your records</h2><table class='table table-hover table-bordered table-striped'><thead ><tr class='bg-primary'><th>Statement id</th><th>Loan id</th><th>Statement period</th><th>File type</th><th>File size</th><th>Date added</th></tr></thead><tbody>";
			foreach($res as $row){
			 $out.= "<tr data-loanid=".$row['loanid']." ><td>"
			 .$row['statementid']."</td><td>"
			 .$row['loanid']."</td><td>"
			 .$row['month']."</td><td>"
			 .$row['type']."</td><td>"
			 .$row['size']."</td><td>".
			 $row['upload_date']."</td>";
			 //$out.="<td><a href='statementController.php?action=delete&id=".$row['statementid']."&location=".$row['location']."&loan=".$row['loanid']."'><button>delete statement</button></a></td>";
			$out.="<td><a href=".$row['location']." target='_blank'><button type='button'>view</button></a></td>";
			//$out.="<td><button onclick='mail(".$row['statementid'].")'>email statement</button></a></td>";
				}
			$out.="</tbody></table><br><br><p>Total records($rows) and you are on page:$pagenum of $last </p><br><ul class='pagination'>";
			
			
			
			
			for($i=1;$i<=$last;$i++){
			$out.="<li><a href='#' onclick='viewStatement(event,$i)'>$i</a></li>";
			}	
			$out.="</ul>";		
			echo $out;		
			
			}
			else{
				echo "sorry no records found";
				
			}
		}
		catch(PDOException $e){
			echo "sorry an error occured.";
			$dt = date("Y-m-d H:i:s (T)");
		 $mess=$dt."=>".$e;
		error_log($mess, 3, "c:\wamp1\logs\php_error.txt");
		}	
		
	
	
	exit();
	
}

?>
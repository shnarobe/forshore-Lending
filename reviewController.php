<?php
ob_start();
require 'check_login_admin.php';
if(!logged_in()){
header("Location:admin.php");	
	exit();
}
include_once("PHPMailer-master\PHPMailer-master\PHPMailerAutoload.php");
//include_once("class.smtp.php");
//include_once 'class.phpmailer.php';
include 'config.php';
if($_SERVER['REQUEST_METHOD']=="POST"){
if(isset($_POST['action']) && $_POST['action']=="reviews"){
fetchReview();



}
elseif(isset($_POST['action']) && $_POST['action']=="deletereview"){
deleteReview($_POST['reviewid']);



}
elseif(isset($_POST['action']) && $_POST['action']=="userreview"){
	if(isset($_POST['id'])){
$er=json_decode($_POST['id']);
userReview($er);
	}


}
exit();
}


function fetchReview(){

	$servername=DB_HOST;
		$dbname=DB_DATABASE;
		$out="";
		try {
    		$conn = new PDO("mysql:host=$servername;dbname=$dbname", DB_USER, DB_PASSWORD);
    		// set the PDO error mode to exception
  			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt=$conn->prepare("SELECT COUNT(reviewid)AS d FROM reviews");
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
			$stmt=$conn->prepare("SELECT * from reviews $limit");
			$stmt->execute();
			$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
			if($res){
			
			$out="<h2>Reviews left:</h2><table class='table table-hover table-bordered table-striped'><thead ><tr class='bg-primary'><th>Review id</th><th>Loanid</th><th>Review</th><th>Time</th></tr></thead><tbody>";
			foreach($res as $row){
			 $out.= "<tr data-reviewid=".$row['reviewid']." ><td>"
			 .$row['reviewid']."</td><td>"
			 .$row['loanid']."</td><td>"
			 .$row['comment']."</td><td>"
			 .$row['time']."</td>";
			$out.="<td><button class='btn btn-danger' onclick='deletereview(".$row['reviewid'].")'>delete review</button></td>";
			}
			$out.="</tbody></table><br><br><p>Total records($rows) and you are on page:$pagenum of $last </p><br><ul class='pagination'>";
			for($i=1;$i<=$last;$i++){
			$out.="<li><a href='#' onclick='pagereview(event,$i)'>$i</a></li>";
			}	
			$out.="</ul>";		
			echo $out;		
			}
			}
			else{
					echo "Sorry no records found.";
				
			}
		
			}
		catch(PDOException $e){
			
		}	
		exit();
	
	
	
	
}

function deleteReview($id){
		$errrors=array();
		$errors['success']=false;
		$servername=DB_HOST;
		$dbname=DB_DATABASE;
		$out="";
		$sid=$id;
		try {
    		
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", DB_USER, DB_PASSWORD);
    		// set the PDO error mode to exception
  			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt=$conn->prepare("DELETE from reviews WHERE reviewid=:a LIMIT 1");
			$stmt->bindParam(":a",$id);
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

function userReview($idd){
	$id=$idd;
	$servername=DB_HOST;
		$dbname=DB_DATABASE;
		$out="";
		try {
    		$conn = new PDO("mysql:host=$servername;dbname=$dbname", DB_USER, DB_PASSWORD);
    		// set the PDO error mode to exception
  			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt=$conn->prepare("SELECT COUNT(reviewid)AS d FROM reviews WHERE loanid=:j");
			$stmt->bindParam(":j",$id);
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
			$stmt=$conn->prepare("SELECT * from reviews WHERE loanid=:k $limit");
			$stmt->bindParam(":k",$id);
			$stmt->execute();
			$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
			if($res){
			
			$out="<h2>Reviews left:</h2><table class='table table-hover table-bordered table-striped'><thead ><tr class='bg-primary'><th>Review id</th><th>Loanid</th><th>Review</th><th>Time</th></tr></thead><tbody>";
			foreach($res as $row){
			 $out.= "<tr data-reviewid=".$row['reviewid']." ><td>"
			 .$row['reviewid']."</td><td>"
			 .$row['loanid']."</td><td>"
			 .$row['comment']."</td><td>"
			 .$row['time']."</td>";
			$out.="<td><button class='btn btn-danger' onclick='deletereview(".$row['reviewid'].")'>delete review</button></td>";
			}
			$out.="</tbody></table><br><br><p>Total records($rows) and you are on page:$pagenum of $last </p><br><ul class='pagination'>";
			for($i=1;$i<=$last;$i++){
			$out.="<li><a href='#' onclick='pagereview(event,$i)'>$i</a></li>";
			}	
			$out.="</ul>";		
			echo $out;		
			}
			}
			else{
					echo "Sorry no records found.";
				
			}
		
			}
		catch(PDOException $e){
			
		}	
		exit();
	
	
	
	
}

?>
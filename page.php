<?php
include_once("config.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(isset($_POST['action'])&& $_POST['action']=="viewall"){
		ViewAll();
		
	}

	}
// This first query is just to get the total count of rows
function ViewAll(){
$servername =DB_HOST;
$username = DB_USER;
$password =DB_PASSWORD;
$dbname = DB_DATABASE;
$res=null;
$out="";
		try {
    			$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    			// set the PDO error mode to exception
  
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt=$conn->prepare("SELECT COUNT(mortgageid)AS d FROM mortgage");
				$stmt->execute();
				$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
				if($res){
					$rows=$res[0]['d'];
					$page_rows=5;
					$last = ceil($rows/$page_rows);
					if($last < 1){
					$last = 1;
					}
				// Establish the $pagenum variable
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
					$stmt=$conn->prepare("SELECT mortgage.mortgageid,mortgage.approved,borrower.fname,borrower.lname,borrower.email,borrower.home_p,coborrower.cofname,coborrower.colname FROM mortgage LEFT JOIN borrower ON mortgage.mortgageid=borrower.mortgageid LEFT JOIN coborrower ON mortgage.mortgageid=coborrower.mortgageid ORDER by mortgage.date DESC $limit");
					
					$stmt->execute();
					$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
		if($res){
		$out="<h2>Your records</h2><table class='table table-hover table-bordered table-striped'><thead ><tr class='bg-primary'><th>Application Id</th><th>Borrower first name</th><th>Borrower last name</th><th>borrower email</th><th>borrower phone</th><th>coborrower name</th><th>coborrower lastname</th><th>Status</th></tr></thead><tbody>";
		foreach($res as $row){
			 $out.= "<tr data-mortgageid=".$row['mortgageid']." ><td>".
        $row['mortgageid'].
        "</td><td>".
		$row['fname'].
        "</td><td>".
		$row['lname'].
        "</td><td>".
		$row['email'].
        "</td><td>".
		$row['home_p'].
        "</td><td>".
		$row['cofname'].
        "</td><td>".
		$row['colname'].
        "</td><td>".
		$row['approved'].
        "</td>";
			$out.="<td><button onclick='approveMortgage(".$row['mortgageid'].")'>Approve/Deny</button>";
			$out.="<td><button onclick='deleteMortgage(".$row['mortgageid'].")'>Delete</button>";
			//$out.="<td><a href='morController.php?action=view&id=".$row['mortgageid']."'<button class='btn btn-success' type='button'>view</button></a></tr>";
			//$out.="<td><button onclick='approveMortgage(".$row['mortgageid'].")'>Approve</button>";
			//$out.="<td><button onclick='prepareContract(".$row['mortgageid'].")'>Prepare contract</button>";
			$out.="<td><button class='btn btn-success' onclick='printMortgage(".$row['mortgageid'].")' type='button'>print</button></tr>";
				
				}
			
			
			
			$out.="</tbody></table><br><br><p>Total records($rows) and you are on page:$pagenum of $last </p><br><ul class='pagination'>";
			
			
			
			
			for($i=1;$i<=$last;$i++){
			$out.="<li><a href='#' onclick='viewAll($i)'>$i</a></li>";
			}	
			$out.="</ul>";		
			echo $out;		
 
		}
				else{
						echo "No records found!";
					
					
				}
				}
		}				
				catch(PDOException $e){}
}/*
// Here we have the total row count
$rows = $row[0];
// This is the number of results we want displayed per page
$page_rows = 10;
// This tells us the page number of our last page
$last = ceil($rows/$page_rows);
// This makes sure $last cannot be less than 1
if($last < 1){
	$last = 1;
}
// Establish the $pagenum variable
$pagenum = 1;
// Get pagenum from URL vars if it is present, else it is = 1
if(isset($_GET['pn'])){
	$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}
// This makes sure the page number isn't below 1, or more than our $last page
if ($pagenum < 1) { 
    $pagenum = 1; 
} else if ($pagenum > $last) { 
    $pagenum = $last; 
}
// This sets the range of rows to query for the chosen $pagenum
$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
// This is your query again, it is for grabbing just one page worth of rows by applying $limit
$sql = "SELECT id, firstname, lastname, datemade FROM testimonials WHERE approved='1' ORDER BY id DESC $limit";
$query = mysqli_query($db_conx, $sql);
// This shows the user what page they are on, and the total number of pages
$textline1 = "Testimonials (<b>$rows</b>)";
$textline2 = "Page <b>$pagenum</b> of <b>$last</b>";
// Establish the $paginationCtrls variable
$paginationCtrls = '';
// If there is more than 1 page worth of results
if($last != 1){
	 First we check if we are on page one. If we are then we don't need a link to 
	   the previous page or the first page so we do nothing. If we aren't then we
	   generate links to the first page, and to the previous page. 
	if ($pagenum > 1) {
        $previous = $pagenum - 1;
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Previous</a> &nbsp; &nbsp; ';
		// Render clickable number links that should appear on the left of the target page number
		for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
		        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
			}
	    }
    }
	// Render the target page number, but without it being a link
	$paginationCtrls .= ''.$pagenum.' &nbsp; ';
	// Render clickable number links that should appear on the right of the target page number
	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
		if($i >= $pagenum+4){
			break;
		}
	}
	// This does the same as above, only checking if we are on the last page, and then generating the "Next"
    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a> ';
    }
}
$list = '';
while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
	$id = $row["id"];
	$firstname = $row["firstname"];
	$lastname = $row["lastname"];
	$datemade = $row["datemade"];
	$datemade = strftime("%b %d, %Y", strtotime($datemade));
	$list .= '<p><a href="testimonial.php?id='.$id.'">'.$firstname.' '.$lastname.' Testimonial</a> - Click the link to view this testimonial<br>Written '.$datemade.'</p>';
}
// Close your database connection
mysqli_close($db_conx);*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="scripts/bootstrap.min.css">
  <script src="scripts/jquery.min.js"></script>
  <script src="scripts/bootstrap.min.js"></script>
<script>
function viewAll(pn){
	if (pn === undefined) {
          var page = 1;
    } 
	else{
	var page=pn;
	}
	$.ajax({
    url: 'page.php',
    method: 'post',
	dataType:"text",
    data: {action:"viewall",pagenum:page},
    success: function(data) {
	$("#mholder").html(data);
	
	}
		   });
}


</script>
  
  </head>
<body onload="viewAll()"> 
 
<div class="container">
 <div id="mholder"></div>
</div>

</body>
</html>







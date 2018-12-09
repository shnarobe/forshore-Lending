<?php
$loanid="";
include 'account_admin.php';
if($_SERVER['REQUEST_METHOD']=="GET"){
	if(!isset($_GET['id'])){
		die("bad request");
		
		
	}
	else{
	$loanid=base64_decode($_GET['id']);	
		
	}
	
	
}

?>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
function mail(loc){
		var location=loc;
		//alert(location);
		$.ajax({
				   dataType:"text",
				   url:"contractController.php",
				   method:"POST",
				   data:{action:"sendcontract",contract:location},
				   success:function(data){
					//var f=JSON.parse(data);
					console.log(data);
			}
			});
		
		
		
		
	}
$(document).ready(function(){
	$('#contracttab li:eq(0) a').on('shown.bs.tab', function (e) {
		
		$("#createcontract").html("");
		$("#createcontract").html('<div class="container"><form role="form" action="contractController.php?action=upload&id=<?php echo $loanid;?>" method="post" enctype="multipart/form-data">	<div class="form-group"><label>Select a file</label><input type="file" name="upload"></div><input type="submit" value="upload"></form></div>');
	});
	
	
	$('#contracttab li:eq(1) a').on('shown.bs.tab', function (e) {
		$(".contractHolder").html("Loading....");
		$.ajax({
				   dataType:"text",
				   url:"contractController.php",
				   method:"POST",
				   data:{action:"viewcontract",id:<?php echo $loanid;?>},
				   success:function(data){
					   
					$(".contractHolder").html(data);
			
			}
			});	
		
	});
	
	
	
	
	
});
</script>
</head>
<body>
<?php echo $nav;?>
<ul id="contracttab" class="nav nav-tabs">
  <li><a data-toggle="tab" href="#createcontract">Add contract</a></li>
  <li><a data-toggle="tab" href="#viewcontract">View contract</a></li>
  
</ul>

<div class="tab-content">
  <div id="createcontract" class="tab-pane fade in active">
    <h3>Manage contracts for user</h3>
    
  </div>
  <div id="viewcontract" class="tab-pane fade">
    
    
	<div  class="container contractHolder"></div>
  </div>
  
  
</div>


</body>
</html>
<?php
include_once("account_admin.php");

if(!logged_in()){
header("Location:admin.php");
	exit();
}
$loanid="";
if($_SERVER['REQUEST_METHOD']=="GET"){
	if(!isset($_GET['id'])){
		die("bad request");
		
		
	}
	else{
	$loan=json_decode(urldecode(base64_decode($_GET['id'])));	
	$loanid=json_encode($loan);	
	//$token=sha1($loanid);
	//$_SESSION['contracttoken']=$token;
	}
	
	
}

?>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="scripts/bootstrap.min.css">

<!-- jQuery library -->
<script src="scripts/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="scripts/bootstrap.min.js"></script>
<script>
var loanid=<?php echo $loanid;?>;
function conup(event){
	//console.log(loanid);
	event.preventDefault();
	var form=event.target;
	console.log(form);
	var formtext=new FormData(form);
	formtext.append("action","upload");
	formtext.append("id",loanid)
	//console.log(formtext);
	$.ajax({
				   dataType:"text",
				   url:"contractController.php",
				   method:"POST",
				   processData:false,
				   contentType:false,
				   data:formtext,
				   success:function(data){
					   var res=JSON.parse(data);
					if(!res.success){
						alert(res.error);
					}
					else{
				alert("contract created!");
				var d=window.setTimeout(function(){document.location.reload(true);},100);
					}
			}
			});
	
	
	
	
	
}

function viewStatement(event,pn){
	
	event.preventDefault();
	
	var y=<?php echo $loanid;?>;
	//console.log(y);
if (pn === undefined) {
          var page = 1;
    } 
	else{
	var page=pn;
	}
	console.log(page);
	$.ajax({
    url: 'statementController.php',
    method: 'post',
	dataType:"text",
    data: {action:"viewstatement",id:y,pagenum:page},
    success: function(data) {
	$(".statementHolder").html(data);
	
	}
		   });	
	
	
	
	
	
	
}



function statecreate(event){
	console.log(loanid);
	event.preventDefault();
	var form=event.target;
	console.log(form);
	var formtext=new FormData(form);
	formtext.append("action","upload");
	formtext.append("id",loanid)
	console.log(formtext);
	$.ajax({
				   dataType:"text",
				   url:"statementController.php",
				   method:"POST",
				   processData:false,
				   contentType:false,
				   data:formtext,
				   success:function(data){
					   var res=JSON.parse(data);
					if(!res.success){
						alert(res.error);
					}
					else{
				alert("statement created!");
				var d=window.setTimeout(function(){document.location.reload(true);},100);
					}
			}
			});
	
	
	
	
	
}




function mailstatement(loc){
		var location=loc;
		//alert(location);
		$.ajax({
				   dataType:"text",
				   url:"statementController.php",
				   method:"POST",
				   data:{action:"sendstatement",statement:location},
				   success:function(data){
					var f=JSON.parse(data);
					if(!f.success){
						alert("Mail not sent. Try again");
						var d=window.setTimeout(function(){document.location.reload(true);},100);
					//console.log(f.error);
					}
					else{
					alert("mail sent!");	
					var d=window.setTimeout(function(){document.location.reload(true);},100);
					}
			}
			});
		
		
		
		
	}
	
	function mailcontract(cid){
	    //alert("called");
		var conid=cid;
		//console.log(conid);
		$.ajax({
				   dataType:"text",
				   url:"contractController.php",
				   method:"POST",
				   data:{action:"sendcontract",contract:conid},
				   success:function(data){
					var f=JSON.parse(data);
					if(!f.success){
					alert("Mail not sent. Try again");
					var d=window.setTimeout(function(){document.location.reload(true);},100);
					//alert(f.error);
					}
					else{
					alert("mail sent!");	
					//var d=window.setTimeout(function(){document.location.reload(true);},100);
						
					}
			}
			});
		
		
		
		
	}
	function deletecontract(cid){
		if (!window.confirm("Do you really want to delete? Operation can't be undone")) { 
 return;
}	
		
		
		var lo=cid;
		console.log(lo);
		$.ajax({
				   dataType:"text",
				   url:"contractController.php",
				   method:"POST",
				   data:{action:"deletecontract",contract:lo},
				   success:function(data){
					var f=JSON.parse(data);
					if(!f.success){
					alert(f.error);
					}
					else{
					alert("contract deleted!");	
					var d=window.setTimeout(function(){document.location.reload(true);},100);
						
					}
			}
			});
		
		
		
		
	}
	function deletestatement(idd){
		console.log(idd);
		//var f=JSON.parse(id);
		//console.log(f.statementid);
		if (!window.confirm("Do you really want to delete? Operation can't be undone")) { 
 return;
}	
		var statid=idd;
		
		//var lid=loan;
		//console.log(lo,loca);
		$.ajax({
				   dataType:"text",
				   url:"statementController.php",
				   method:"POST",
				   data:{action:"deletestatement",id:statid},
				   success:function(data){
					var f=JSON.parse(data);
					if(!f.success){
					alert(f.error);
					}
					else{
					alert("statement deleted!");	
					var d=window.setTimeout(function(){document.location.reload(true);},100);
						
					}
			}
			});
		
		
		
		
	}
	function deletereview(cid){
		if (!window.confirm("Do you really want to delete? Operation can't be undone")) { 
 return;
}	
		
		
		var lo=cid;
		console.log(lo);
		$.ajax({
				   dataType:"text",
				   url:"reviewController.php",
				   method:"POST",
				   data:{action:"deletereview",reviewid:lo},
				   success:function(data){
					var f=JSON.parse(data);
					if(!f.success){
					alert(f.error);
					}
					else{
					alert("Review deleted!");	
					var d=window.setTimeout(function(){document.location.reload(true);},100);
						
					}
			}
			});
		
		
		
		
	}
	
function pagereview(event,pn){
	
	event.preventDefault();
	var y=<?php echo $loanid;?>;
	if (pn === undefined) {
          var page = 1;
    } 
	else{
	var page=pn;
	}
	//console.log(page);
	$.ajax({
    url: 'reviewController.php',
    method: 'post',
	dataType:"text",
    data: {action:"userreview",pagenum:page,id:y},
    success: function(data) {
	$(".reviewHolderm").html(data);
	
	}
		   });	
	
	
	
	
	
	
}
$(document).ready(function(){
	$('#statementtab li:eq(2) a').on('shown.bs.tab', function (e) {
		
		$("#createstatement").html("");
		$("#createstatement").html('<div class="container"><form role="form" id="statementuploader" onsubmit="statecreate(event)" method="post" enctype="multipart/form-data">	<div class="form-group"><label>Select a file</label><input type="file" name="upload"></div><div class="form-group"><label>Select the period for which this statement is for:</label><input type="text" name="month" id="month"></div><input type="submit" value="upload"></form></div>');
	});
	
	
	$('#statementtab li:eq(3) a').on('shown.bs.tab', function (e) {
		$(".statementHolder").html("Loading....");
		$.ajax({
				   dataType:"text",
				   url:"statementController.php",
				   method:"POST",
				   data:{action:"viewstatement",id:<?php echo $loanid;?>},
				   success:function(data){
					   
					$(".statementHolder").html(data);
			
			}
			});	
		
	});
	
	
	$('#statementtab li:eq(4) a').on('shown.bs.tab', function (e) {
		$(".reviewHolderm").html("Loading....");
		$.ajax({
				   dataType:"text",
				   url:"reviewController.php",
				   method:"POST",
				   data:{action:"userreview",id:<?php echo $loanid;?>},
				   success:function(data){
					   
					$(".reviewHolderm").html(data);
			
			}
			});	
		
	});
	
	
	
	
	
	//CONTRACT CODE
	$('#statementtab li:eq(0) a').on('shown.bs.tab', function (e) {
		
		$("#createcontract").html("");
		$("#createcontract").html('<div class="container"><form role="form" onsubmit="conup(event)" name="contractuploader" method="post" enctype="multipart/form-data">	<div class="form-group"><label>Select a file</label><input type="file" name="upload"></div><input type="submit" value="upload"></form></div>');
	});
	
	
	$('#statementtab li:eq(1) a').on('shown.bs.tab', function (e) {
		//console.log(loanid);
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
	
	
	
	
	//CONTRACT CODE
	if(location.hash) {
        $('a[href=' + location.hash + ']').tab('show');
    }
    $(document.body).on("click", "a[data-toggle='tab']", function(event) {
        location.hash = this.getAttribute("href");
    });
});
$(window).on('popstate', function() {
    var anchor = location.hash || $("a[data-toggle=tab]").first().attr("href");
    $('a[href=' + anchor + ']').tab('show');
	
	
});
</script>
</head>
<body>
<?php echo $nav;?>
<?php if(logged_in()):?>
<div class="jumbotron"><p>Loanid:<?php echo $loanid;?></p></div>
<ul id="statementtab" class="nav nav-tabs">
 <li><a data-toggle="tab" href="#createcontract">Add a contract</a></li>
  <li><a data-toggle="tab" href="#viewcontract">View contract</a></li>
   <li><a data-toggle="tab" href="#createstatement">Add a statement</a></li>
  <li><a data-toggle="tab" href="#viewstatement">View statement</a></li>
   <li><a data-toggle="tab" href="#userreviews">User reviews</a></li>
  
  
</ul>

<div class="tab-content">
  <div id="createcontract" class="tab-pane fade in active">
    <h3>Manage user's contract and monthly statements</h3>
    
  </div>
  <div id="viewcontract" class="tab-pane fade">
    
    
	<div  class="container contractHolder"></div>
  </div>
  
  
  
  <div id="createstatement" class="tab-pane fade in">
    <h3>Manage statements for user</h3>
    
  </div>
  <div id="viewstatement" class="tab-pane fade">
    
    
	<div  class="container statementHolder"></div>
  </div>
  
  <div id="userreviews" class="tab-pane fade">
    
    
	<div  class="container reviewHolderm"></div>
  </div>
 
  
  
  
  
  
</div>

<?php endif;?>
</body>
</html>
<?php
require("account_admin.php");

if(!logged_in()){
header("Location:admin.php");
exit();
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
function create(event){
	event.preventDefault();
	$("#create p").remove();
	$("#create").append('<p>Loading...</p>');
	var form=event.target;
	var arr=$(form).serializeArray();
		//console.log(arr[0],arr[1],arr[2],arr[3],arr[4]);
		$.ajax({
				   dataType:"text",
				   url:"registrationController.php",
				   method:"POST",
				   data:{action:"create",loanid:arr[0].value,firstname:arr[1].value,lastname:arr[2].value,email:arr[3].value,phone:arr[4].value},
				   success:function(data){
					
					var result=JSON.parse(data);
					if(!result.success){
						alert(result.error);
						console.log(result);
					}
					else{
						alert("User created!");
						var d=window.setTimeout(function(){document.location.reload(true);},100);
						
					
					}
					//$('#loantab li:eq(2) a').tab('show');
					//console.log("called");
			}
			});
				
	
	
	
	
}

function editUser(id){
	$(".editHolder").remove();
	$.ajax({
				   dataType:"text",
				   url:"registrationController.php",
				   method:"POST",
				   data:{action:"edituser",loan:id},
				   success:function(data){
					console.log(data);
					var d=JSON.parse(data);
					
					var content='<div id="regis" class="container" ><form role="form" id="update"  onsubmit="update(event)" action="registrationController.php" method="post"><div class="form-group"><label for="loanid">Loanid:</label><input type="text" class="form-control" id="loanid" name="loanid" value="'+d[0].loanid+'" readonly></div><div class="form-group"><label for="firstname">First Name:</label><input type="text" class="form-control" id="firstname" name="firstname" value="'+d[0].firstname+'">  </div>  <div class="form-group"><label for="lastname">Last Name:</label> <input type="text" class="form-control" id="lastname" name="lastname" value="'+d[0].lastname+'"></div><div class="form-group"><label for="email">Email address:</label><input type="email" class="form-control" id="email" name="email" value="'+d[0].email+'"></div><div class="form-group"><label for="phone">Phone:</label><input type="text" class="form-control" id="phone" name="phone" value="'+d[0].phone+'"></div><button type="submit" class="btn btn-default">Submit</button></form></div>';
					var hol=document.createElement("div");
					$(hol).attr("class","editHolder");
					$(hol).html(content);
					document.body.appendChild(hol);
					
			
			}
			});
		
	
	
	
}

function update(event){
	event.preventDefault();
	var form=event.target;
	var arr=$(form).serializeArray();
		$.ajax({
				   dataType:"text",
				   url:"registrationController.php",
				   method:"POST",
				   data:{action:"updateuser",loanid:arr[0].value,firstname:arr[1].value,lastname:arr[2].value,email:arr[3].value,phone:arr[4].value},
				   success:function(data){
					alert(data);
					var d=window.setTimeout(function(){document.location.reload(true);},100);
					//document.location.reload(true);
					//$('#loantab li:eq(2) a').tab('show');
					//console.log("called");
			}
			});
				
	
	
	
	
}
function deleteUser(id){
		var loan=id;
		console.log(loan);
	if (!window.confirm("Do you really want to delete? Operation can't be undone")) { 
 return;
}	
		$.ajax({
				   dataType:"text",
				   url:"registrationController.php",
				   method:"POST",
				   data:{action:"deleteuser",loanid:loan},
				   success:function(data){
					alert(data);
					var d=window.setTimeout(function(){document.location.reload(true);},100);
					
					
			}
			});
				
	
	
	
	
}
function view(event,pn){
	
	event.preventDefault();
	
	
if (pn === undefined) {
          var page = 1;
    } 
	else{
	var page=pn;
	}
	
	$.ajax({
    url: 'registrationController.php',
    method: 'post',
	dataType:"text",
    data: {action:"viewall",pagenum:page},
    success: function(data) {
	$("#reg").html(data);
	
	}
		   });	
	
	
	
	
	
	
}

function searchPage(event,pn,k){
	event.preventDefault();
	if (pn === undefined) {
          var page = 1;
    } 
	else{
	var page=pn;
	}
	
	var sub=$("#searchname").val();
	console.log(sub);
	$.ajax({
    url: 'registrationController.php',
    method: 'post',
	dataType:"text",
    data:{action:"find",key:sub,pagenum:page},
    success: function(data) {
	$("#resultholder").html(data);
	
	}
		   });	
	
	
	
	
	
	
}


$(document).ready(function(){
	$('#loantab li:eq(0) a').on('shown.bs.tab', function (e) {
		//lastEvent=$(e.target);
			$(".editHolder").remove();
		$("#create").html("");
		$("#create").html('<div id="regis" class="container" ><form role="form" id="cre" onsubmit="create(event)"><div class="form-group"><label for="loanid">Loanid:</label><input type="text" class="form-control" id="loanid" name="loanid"></div><div class="form-group"><label for="firstname">First Name:</label><input type="text" class="form-control" id="firstname" name="firstname">  </div>  <div class="form-group"><label for="lastname">Last Name:</label> <input type="text" class="form-control" id="lastname" name="lastname"></div><div class="form-group"><label for="email">Email address:</label><input type="email" class="form-control" id="email" name="email"></div><div class="form-group"><label for="phone">Phone:</label><input type="text" class="form-control" id="phone" name="phone"></div><button type="submit" class="btn btn-default">Submit</button></form></div>');
	
  //e.target // newly activated tab
  //e.relatedTarget // previous active tab
});
	
	$('#loantab li:eq(1) a').on('shown.bs.tab', function (e) {
		$(".editHolder").remove();
	
	});
	
	$('#loantab li:eq(2) a').on('shown.bs.tab', function (e) {
			$(".editHolder").remove();
		$("#reg").html("Loading.....");
		$.ajax({
				   dataType:"text",
				   url:"registrationController.php",
				   method:"POST",
				   data:{action:"viewall"},
				   success:function(data){
					
					
					
					$("#reg").html(data);
			
			}
			});
		
		
		
		
	});
	$('#searchform').submit(function (event) {
			
		event.preventDefault();
		if( $("#searchname").val()==""){
			return;
		}
		$("#resultholder").html("");
		$("#resultholder").html("Searching...");
		
		
		//var id=$("#searchloanid").val();
		var name=$("#searchname").val();
		$.ajax({
				   dataType:"text",
				   url:"registrationController.php",
				   method:"POST",
				   data:{action:"find",key:name},
				   success:function(data){
					
					
					
					$("#resultholder").html(data);
			
			}
			});
		
				
	});
	
	
	
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
<ul id="loantab" class="nav nav-tabs">
  <li ><a data-toggle="tab" href="#create">Create user</a></li>
  <li><a data-toggle="tab" href="#find">Find user</a></li>
  <li><a data-toggle="tab" href="#view">View users</a></li>
  
</ul>

<div class="tab-content">
  <div id="create" class="tab-pane fade in active">
	<h4>Here you can manage loans which are already approved.</h4>
	  
    </div>
  <div id="find" class="tab-pane fade">
    <div class="container">
    <form class="form-inline" id="searchform" role="form">
  <!--<div class="form-group">
    <label for="searchloanid">loan id:</label>
    <input type="text" class="form-control" id="searchloanid" name="searchloanid">
  </div>-->
  <div class="form-group" style="margin-top:12px;">
    <label for="searchname">Search by first or last name:</label>
    <input type="text" class="form-control" id="searchname" name="searchname">
	<button type="submit" class="btn btn-default">Search</button>
  </div>
  
  
</form>
	</div>
	<div class="container"  id="resultholder"></div>
  </div>
  <div id="view" class="tab-pane fade">
    <div id="reg" class="container-fluid">
</div>
  </div>
</div>
<?php endif;?>

</body>

</html>

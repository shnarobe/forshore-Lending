<?php

include_once("account.php");
if(logged_in()){
$userid=$_SESSION['userid'];
}
else{
	$userid=null;
	}
$quantity=$price=$expenses=$time1=$time2="";	
?>

<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link rel="stylesheet" href="style.css">

<!-- jQuery library -->


<!-- Latest compiled JavaScript -->

<script src="jav.js"></script>

<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="Chart.js"></script>

<script>

$(document).ready(function(){
						   
$(window).on("load",function(event){
var username="<?php echo $_SESSION['username'];?>";	
var userid=<?php echo $_SESSION['userid'];?>;

console.log(username,userid,"called");
	$.ajax({
		   url:"farmerToolsController.php", 
		   method:"post",
		   data:{action:"viewDetails",userid:userid,username:username},
		   success:function(data){
			   $("#summary").html(data);
			   
			   
			   }
		   
		   
		   });						 
							 
							 
							 
							 
							 });



$.datepicker.setDefaults({dateFormat:"yy-mm-dd"});

$("#ttm1").datepicker();
$("#ttm2").datepicker();
$("#ttm4").datepicker();
$("#ttm3").datepicker();
$("#harvestttm1").datepicker();
$("#sub1").submit(function(event){
			event.preventDefault();
			var form=$(event.target);
			var g=document.getElementById("mySelect");
			var opt=$(g).val();
			var d=$(form).find("#quantity").val();
			var h=$(form).find("#ttm1").val();
			var i=$(form).find("#ttm2").val();
			var j=$(form).find("#price").val();
			var k=$(form).find("#expenses").val();
			var ui=$(form).find("#user").val();
			console.log(opt,d,h,i,j,k,ui);
	$.ajax({
				   method:"post",
				   url:"farmerToolsController.php",
				   dataType:"text",
				   data:{action:"insertProduceData",userid:ui,produce:opt,quantity:d,tt1:h,tt2:i,price:j,expenses:k},
				   success:function(data){
					   alert(data);
					   console.log(data);
					   
					   
				   } });
			
			
				});


$("#search_form").submit(function(event){
			event.preventDefault();
			var form=$(event.target);
			var g=document.getElementById("mySelect1");
			var opt=$(g).val();
			var h=$(form).find("#ttm3").val();
			//var i=$(form).find("#ttm4").val();
			console.log(opt,h);
	$.ajax({
				   dataType:"text",
				    url:"farmerToolsController.php",
				   
				   method:"POST",
				   data:{action:"searchProduceData",crop:opt,date1:h},
				   success:function(data){
					  //var obj=jQuery.parseJSON(data);
					   //alert(obj);
					  console.log(data);
					  $("#f").html(data);
					  
 //var ctx = document.getElementById("myChart").getContext("2d");
//var myBarChart = new Chart(ctx).Bar(data, {scaleBeginAtZero : true,scaleShowHorizontalLines: true,scaleShowVerticalLines: true,});					  
					  
				   }
				   });
			
			
				});



$("#harvestsubmit").submit(function(event){
			event.preventDefault();
			var form=$(event.target);
			var g=document.getElementById("mySelectHarvest");
			var opthar=$(g).val();
			var pro=$(form).find("#produceidholder").val();
			var dhar=$(form).find("#harvestQuantity").val();
			var hhar=$(form).find("#harvestttm1").val();
			var jhar=$(form).find("#harvestPrice").val();
			var khar=$(form).find("#harvestExpenses").val();
			//var uihar=$(form).find("#userharvest").val();
			console.log(pro,dhar,hhar,jhar,khar);
	$.ajax({
				   method:"post",
				   url:"farmerToolsController.php",
				   dataType:"text",
				   data:{action:"insertharvest",produce:pro,quantity:dhar,tt1:hhar,price:jhar,expenses:khar},
				   success:function(data){
					   //alert(data);
					   console.log("success from insertharvest",data);
					   
					   
				   } });
			
			
				});



});

</script>
</head>

<body>
<nav class="navbar-nav navbar-default">
<ul>
<?php if(logged_in() && isAdmin()):?>
<li><a href="mortgageController.php?action=viewApplications">view applications</a></li>
<?php endif;?>
<li><a href="#">another tab</a></li>
</ul>
</nav>
<div class="container" style="position:absolute; top:250px;">
<div class="row">
<div class="col-lg-5">
<div id="summary">




</div>







<?php if(logged_in()): ?>
<form id="sub1"  action="allusers.php"  method="post" enctype="multipart/form-data" role="form">
<input type="hidden" id="user" value="<?php echo $userid;?>" />
   
    <div class="form-group">
  <select class="form-control" id="mySelect"  >
    <option value="cucumbers">Cucumbers</option>
    <option value="corn">Corn</option>
    <option value="peas">Peas</option>
    <option value="banana">Banana</option>
    <option value="carrots">Carrots</option>
  </select>
  </div>
  <div class="form-group">
    <label for="quantity">Quantity:</label>
    <input type="text" class="form-control" id="quantity"  />
  </div>
  <div class="form-group">
    <label for="ttm1">Time to market(first harvest):</label>
    <input type="text" class="form-control" id="ttm1" />
  </div>
   <div class="form-group">
    <label for="ttm2">Time to market(second harvest):</label>
    <input type="text" class="form-control" id="ttm2" />
  </div>
  <div class="form-group">
    <label for="price">Price per unit:</label>
    <input type="text" class="form-control" id="price" />
  </div>
  <div class="from-group">
    <label for="expenses"> Expenses: </label> <input type="text" id="expenses"  class="form-control"/> 
  </div>
  <input type="submit"  class="btn btn-default" value="Send"/>
</form>
<?php endif;?>
</div>
</div>

<form id="search_form" class="form-inline">
<label>Find</label>

 <div class="form-group">
  <label>Crop:</label>
  <select class="form-control" id="mySelect1" >
    <option value="cucumbers">Cucumbers</option>
    <option value="corn">Corn</option>
    <option value="peas">Peas</option>
    <option value="banana">Banana</option>
    <option value="carrots">Carrots</option>
  </select>
  </div>
<label>Between</label>
<div class="form-group">
    
    <input type="text" class="form-control" id="ttm3"/>
  </div>



<button class="btn btn-default" type="submit">search</button>

</form>




				<div>
                
   				<canvas id="myChart" width="250px" height="250px" >
                
                
                </canvas>
               	
              
				</div>


<div id="f" >
</div>


</div>





<div id="harvestmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New Harvest</h4>
      </div>
      <div class="modal-body" >
    		
            <?php if(logged_in()): ?>
<form id="harvestsubmit"  action="allusers.php"  method="post" enctype="multipart/form-data" role="form">
<input type="hidden" id="userharvest" value="<?php echo $userid;?>" />
  <input type="hidden" id="produceidholder" /> 
    <div class="form-group">
  <select class="form-control" id="mySelectHarvest" >
   
   
  </select>
  </div>
  <div class="form-group">
    <label for="quantity">Quantity:</label>
    <input type="text" class="form-control" id="harvestQuantity"  />
  </div>
  <div class="form-group">
    <label for="ttm1">Time of harvest):</label>
    <input type="text" class="form-control" id="harvestttm1" />
  </div>
   
  <div class="form-group">
    <label for="price">Price per unit:</label>
    <input type="text" class="form-control" id="harvestPrice" />
  </div>
  <div class="from-group">
    <label for="expenses"> Expenses: </label> <input type="text" id="harvestExpenses"  class="form-control"/> 
  </div>
  <input type="submit"  class="btn btn-default" value="Send"/>
</form>
<?php endif;?>
            
       
      </div>
    
      <div class="modal-footer">
        
      </div>
    </div>

  </div>
</div>


</body>
</html>
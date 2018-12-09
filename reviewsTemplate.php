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
    data: {action:"reviews",pagenum:page},
    success: function(data) {
	$(".reviewHolder").html(data);
	
	}
		   });	
	
	
	
	
	
	
}
	
	
$(document).ready(function(){
	
	
		
	$('#reviewtab li:eq(0) a').on('shown.bs.tab', function (e) {
		//console.log(loanid);
		$(".reviewHolder").html("Loading....");
		$.ajax({
				   dataType:"text",
				   url:"reviewController.php",
				   method:"POST",
				   data:{action:"reviews"},
				   success:function(data){
					   
					$(".reviewHolder").html(data);
			
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
<div class="container">
<ul id="reviewtab" class="nav nav-tabs">
 <li><a data-toggle="tab" href="#managereview">Customers reviews</a></li>
  
  
</ul>

<div class="tab-content">
  <div id="managereview" class="tab-pane fade in active">
    
    <div  class="container reviewHolder"></div>
  </div>

  
  
</div>
</div>

</body>
</html>
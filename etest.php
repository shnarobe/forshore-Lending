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


	function deletereview(){
		
		
		
		
		$.ajax({
				   dataType:"text",
				   url:"error.php",
				   method:"POST",
				   data:{action:"go"},
				   success:function(data){
					   console.log(data);
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
	

	
	
$(document).ready(function(){
	
	
	
	
	
	
	
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

<div class="container">
<button onclick="deletereview()"> test<button>
<span id="h"></span>
</div>

</body>
</html>
<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
$ar= $_POST['test'];
$_SESSION['test']=$_POST['test'];
$ass=array();
/*echo count($ar);
foreach($ar as $key=>$value){
	echo $key." ".$value;
	echo "<br>";
	//echo (0%4);
	//echo (4%4);
	$ass[$key]=$value+1;
	//echo "ass array <br>";
//	echo $ass[$key] ;
	
}*/
echo $_POST['agree1'];
}
?>
<html>
<head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>

function tests(){
	var num=$("input[name='asset[]']").length;
	console.log(num);
	if(num<16){
	var hiddenField = document.createElement("div");
	$(hiddenField).html("<div id='asset2' class='form-group col-sm-12'><span class='nextto col-sm-2'><label class=''>Type:</label><input type='text' class='form-control' name='asset[]'  /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>Description</label><input type='text' name='asset[]'  class='form-control' /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>Value:</label><input type='text' class='form-control' name='asset[]'  /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>Downpayment:</label><input type='text' name='asset[]'  class='form-control' /><span class='error'>* </span></span></div>");
	
	var f=document.getElementById("o");
	f.appendChild(hiddenField);
	}
	else{
		
		alert("maximum reached");
	}
}



$(document).ready(function(){
	$("#t").submit(function (event){
		event.preventDefault();
	var formtext=$("#t").serializeArray();
			//console.log(formtext);
			  var o = {};
    //var a = this.serializeArray();
    $.each(formtext, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
	var asset={};
	var count=0;
var y=$("#t [name='asset[]']").serializeArray();
 $.each(y, function(i, field){
         asset[count]= field.value;
		 count++;
        });
		console.log(asset);
  /*for(var count=0;count<o.length;count++){
	  console.log(o[count].name+" "+o[count].value);
	  
	  
  }*/
	$.ajax({
				   dataType:"text",
				    url:"k.php",
				   
				   method:"POST",
				   data:{my:o,j:asset},
				   success:function(data){
					  //var obj=jQuery.parseJSON(data);
					   //alert(obj);
					  console.log(data);
					  //	$("body").html(data);				
					 
					 // $('#mytabs a:first').tab('show') // Select last tab
					  //$("#f").html(data);
					  
 //var ctx = document.getElementById("myChart").getContext("2d");
//var myBarChart = new Chart(ctx).Bar(data, {scaleBeginAtZero : true,scaleShowHorizontalLines: true,scaleShowVerticalLines: true,});					  
					  
				   }
				   });
	
	});
	
	
	
	
});
</script>';  



</head>
<body>

<form id="t" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<input type="text" name="test[]" />
<input type="text" name="test[]" />
<input type="text" name="ok" />
<label class="checkbox-inline"><input type="checkbox" name="ag" value="on"/>I/we agree</label>
<div id="o">
</div>
<input type="submit" value="send"/>
</form>
<button onclick="tests()" >click me</button>
</body>
</html>

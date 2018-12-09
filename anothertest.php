<?php

//$da='<script language="javascript" type="text/javascript"><p>'hhhh'</p> alert('well');</script>';
$input=<<<EOT
		var hiddenField = document.createElement('div');
		$(hiddenField).html("<div  class='form-group col-sm-12'><span class='nextto col-sm-2'><label class=''>Property value:</label><input type='text' class='form-control' name='propertyo[]' value='' /><span class='error'>*</span></span><span class='nextto col-sm-2'><label class=''>Total mortgages</label><input type='text' name='propertyo[]' value='0.00'  class='form-control' /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>mortgage payments:</label><input type='text' class='form-control' name='propertyo[]' value='0.00'  /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>total expenses:</label><input type='text' name='propertyo[]' value='0.00' class='form-control' /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>rental income:</label><input type='text' class='form-control' name='propertyo[]' value='0.00' /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>rental_expenses:</label><input type='text' name='propertyo[]' value='0.00' class='form-control' /><span class='error'>* </span></span></div>");
		var f=document.getElementById('liabilityholder');
		f.appendChild(hiddenField);
		
EOT;
$out=$input;



		if($_SERVER['REQUEST_METHOD']=="POST"){
	if(isset($_POST['action'])&& $_POST['action']=="print"){
		//if(isset($_POST['mortgage'])){
			printMortgage();
			
		//}
		
		
	}
	
	
}

function javascript_escape($str) {
    $new_str = '';

    $str_len = strlen($str);
    for($i = 0; $i < $str_len; $i++) {
        $new_str .= '\\x' . dechex(ord(substr($str, $i, 1)));
    }

    return $new_str;
}

function printMortgage(){
$r=array();
$r["me"]=7.25;
$r["m"]="7.23";
$r["me1"]="4";
		
		
//echo json_encode($r);
//ob_flush();
$u=array();
$s=array();
$s["mee"]=$r;
$s["mm"]="7.23";
$s["me11"]="    ";
$t=array_merge($r,$s,$u);
echo json_encode($t);
exit();
}

?>

<html>
<head>
<?php echo $da;?>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" relative_relation="stylesheet">
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
function printMortgage(){
	//var mid=id;
	$.ajax({
    url: 'anothertest.php',
    method: 'post',
	dataType:"text",
    data: {action:"print"},
    success: function(data) {
		 
	console.log(data);
		//var f=JSON.stringify(data);
		//console.log(f);
	var dat=JSON.parse(data);	
	console.log(dat);
	for (var key in dat) {
			if (dat.hasOwnProperty(key)) {
			//console.log(key);
			var k="#"+key;
			console.log(key+"->"+dat[key]);
			document.write(dat[key]);
			}
			//r k1=k+"Err";
			//var hid = document.createTextNode(e[key]);
			//$(k1).html(hid);
			}
	/*document.write(data);
	$("#mm").hide();
	window.print();
	$("#mm").show();*/
	}
		   });
	
	
	
}
function go(){
		$(document).html(<?php echo $out;?>);
		}
		
</script>
<script>
$(document).ready(function(){});
	</script>

</head>
<body onload="go()">
<p>out</p>

<div class="form-group col-sm-12">
		<legend>Liability</legend>
		<div id="liabilityholder">
		</div>
</body>
</html>
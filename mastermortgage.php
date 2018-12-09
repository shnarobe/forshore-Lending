<?php
require 'config.php';

include_once("account_admin.php");

if(!logged_in()){
header("Location:admin.php");
	exit();
}
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(isset($_POST['action'])&& $_POST['action']=="print"){
		if(isset($_POST['mortgage'])){
			printMortgage($_POST['mortgage']);
			
		}
		
		
	}
	
	
}
function printMortgage($id){
	$servername =DB_HOST;
$username = DB_USER;
$password =DB_PASSWORD;
$dbname = DB_DATABASE;
$res=null;
$out="";

$res1=array();
$res2=array();
$res2["allassets"]=$res2["allliabilities"]=$res2["allproperties"]="";

		try {
    			$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    			// set the PDO error mode to exception
  
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt=$conn->prepare("SELECT * from borrower where mortgageid=$id LIMIT 1");	
		$stmt->execute();
		$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
		
		if($res){
			
		/*$jsonbor=array();	
		foreach($res as $key=>$value){
			
			$jsonbor[$key]=$value;
			
			
			
			}*/
			//echo json_encode($res,JSON_HEX_QUOT|JSON_HEX_APOS|JSON_HEX_AMP|JSON_HEX_TAG|JSON_NUMERIC_CHECK|JSON_PRETTY_PRINT);
		//}
		$stmt=null;
		//$res1=null;
		$stmt=$conn->prepare("SELECT * from coborrower where mortgageid=$id LIMIT 1");	
		$stmt->execute();
		$ress=$stmt->fetchAll(PDO::FETCH_ASSOC);
		
		if($ress){
			$res1=$ress;
			
		}
		/*$jsoncobor=array();
			foreach($res1 as $key=>$value){
			 $jsoncobor[$key]=$value;
			
			
			}*/
			//echo json_encode($res1,JSON_HEX_QUOT|JSON_HEX_APOS|JSON_HEX_AMP|JSON_HEX_TAG|JSON_NUMERIC_CHECK|JSON_PRETTY_PRINT);
		
		//}
		$stmt=null;
		$res22=null;
		$stmt=$conn->prepare("SELECT * from asset where mortgageid=$id");	
		$stmt->execute();
		$res22=$stmt->fetchAll(PDO::FETCH_ASSOC);
		
		if($res22){
		$out="";
		foreach($res22 as $a){
		$out.=<<<EOT
		var hiddenField = document.createElement("div");
		hiddenField.innerHTML="<div  class='form-group col-sm-12'><span class='nextto col-sm-2'><label class=''>Type:</label><input type='text' class='form-control' name='asset[]' value='$a[type]'  /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>Description</label><input type='text' name='asset[]' value='$a[description]'  class='form-control' /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>Value:</label><input type='text' class='form-control' name='asset[]' value='$a[value]'  /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>Downpayment:</label><input type='text' name='asset[]' value='$a[downpayment]'  class='form-control' /><span class='error'>* </span></span></div>";	
		var f=document.getElementById("assetholder");
		f.appendChild(hiddenField);
		
EOT;
		}	
		
		$res2['allassets']=$out;	
		
		//echo json_encode($res2,JSON_HEX_QUOT|JSON_HEX_APOS|JSON_HEX_AMP|JSON_HEX_TAG|JSON_NUMERIC_CHECK|JSON_PRETTY_PRINT);
		}
		$stmt=null;
		$res3=null;
		$stmt=$conn->prepare("SELECT * from liability where mortgageid=$id");	
		$stmt->execute();
		$res3=$stmt->fetchAll(PDO::FETCH_ASSOC);
		if($res3){
		$out2="";
		foreach($res3 as $a){
		$out2.=<<<EOT
		var hiddenField = document.createElement("div");
		var op="<div  class=form-group col-sm-12><span class=nextto col-sm-2><label class=>Type:</label><input type=text class=form-control name=liability[] value=$a[liab_type]  /><span class=error>* </span></span><span class=nextto col-sm-2><label class=>Description</label><input type=text name=liability[] value=$a[liab_description] class=form-control /><span class=error>* </span></span><span class=nextto col-sm-2><label class=>Credit limit:</label><input type=text class=form-control name=liability[] value=$a[credit_limit] /><span class=error>* </span></span><span class=nextto col-sm-2><label class=>Outstanding balance:</label><input type=text name=liability[] value=$a[outstanding_balance]  class=form-control /><span class=error>* </span></span><span class=nextto col-sm-2><label class=>monthly payment:</label><input type=text name=liability[] value=$a[monthly_payment] class=form-control /><span class=error>* </span></span><span class=nextto col-sm-2><label class=>Liability payoff:</label><input type=text name=liability[] value=$a[liab_payoff] class=form-control /><span class=error>* </span></span><span class=nextto col-sm-2><label class=>Maturity date:</label><input type=text name=liability[] value=$a[maturity_date] class=form-control /><span class=error>* </span></span></div>";
		hiddenField.innerHTML=op;
		var f=document.getElementById('liabilityholder');
		f.appendChild(hiddenField);
		
EOT;
			}
		
		
		$res2['allliabilities']=$out2;
		}
		$stmt=null;
		$res4=null;
		$stmt=$conn->prepare("SELECT * from property_owned where mortgageid=$id");	
		$stmt->execute();
		$res4=$stmt->fetchAll(PDO::FETCH_ASSOC);
		if($res4){
			//echo json_encode($res4,JSON_HEX_QUOT|JSON_HEX_APOS|JSON_HEX_AMP|JSON_HEX_TAG|JSON_NUMERIC_CHECK|JSON_PRETTY_PRINT);
		$out4="";
		foreach($res4 as $a){
			$out4.=<<<EOT
			var hiddenField =document.createElement('div');
			hiddenField.innerHTML="<div class='form-group col-sm-12'><span class='nextto col-sm-3'><label>Property value:</label><input type='text' class='form-control' name='propertyo[]' value='$a[property_value]' ><span class=error>*</span></span><span class='nextto col-sm-3'><label>Total mortgages</label><input type='text' name='propertyo[]' value='$a[total_mortgages]'  class='form-control' ><span class='error'>* </span></span><span class='nextto col-sm-3'><label>mortgage payments:</label><input type=text class=form-control name='propertyo[]' value='$a[mortgage_payments]'  ><span class=error>* </span></span><div class='form-group col-sm-12'><span class='nextto col-sm-3'><label>total expenses:</label><input type='text'  name='propertyo[]' value='$a[total_expenses]' class='form-control' ><span class=error>* </span></span><span class='nextto col-sm-3'><label>rental income:</label><input type=text class=form-control name=propertyo[] value='$a[rental_income]' ><span class=error>* </span></span><span class='nextto col-sm-3'><label>rental_expenses:</label><input type='text' name='propertyo[]' value='$a[rental_expenses]' class='form-control' ><span class=error>* </span></span></div></div>";
			var f=document.getElementById('propertyholder');
			f.appendChild(hiddenField);
			
				
EOT;
			}
		
		
		
		$res2['allproperties']=$out4;
		}
		//echo "success";
		
		$fin=array_merge($res,$res1,$res2);
		echo json_encode($fin);
}
		}
		catch(PDOException $e){
			$error['databaseerr']=$e;
			echo json_encode($error);
			
		}
			
			$conn=null;
			exit();
			
	
	
	
	
	
}	


?>

<html>
<head>
<!-- jQuery library -->
<script src="scripts/jquery.min.js"></script>

<link rel="stylesheet" href="scripts/bootstrap.min.css">
<!-- Latest compiled JavaScript -->
<script src="scripts/bootstrap.min.js"></script>
<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" relative_relation="stylesheet">
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="mortgageHelper.js"></script>
<title>Manage mortgage applications</title>
<style>
.col-sm-12{
width:20cm;	
	
	
}
.col-sm-5{
width:9cm;	
	
	
}
.col-sm-6{
width:10cm;	
	
}
.col-sm-3{
width:4.5cm;	
	
	
}
.col-sm-2{
width:3cm;	
	
	
}
.col-sm-1{
width:1.5cm;	
	
	
}
.nextto{
float:left;
margin-right:10px;	
	
	
	
}
.hideasset{
	display:none;
}
.hideliability{
	display:none;
}
.hideproperty{
	display:none;
}
.conceal{
display:none;	
}

</style>
<script>
function printMortgage(id){
	$("#topcontain").removeClass("conceal");
	var mid=id;
	$.ajax({
    url: 'mastermortgage.php',
    method: 'post',
	dataType:"text",
    data: {action:"print",mortgage:id},
    success: function(data) {
		 
	//console.log(data);
		//var f=JSON.stringify(data);
		//console.log(f);
	var dat=JSON.parse(data);	
	//console.log(dat);
	var proceed=false;
	//for(var count=0;count<=4;count++){
	for (var key in dat) {
		if (dat.hasOwnProperty(key)){
		if(typeof dat[key]==='object'){
			var obj=dat[key];
			for(var key in obj ){
				if (obj.hasOwnProperty(key)){
				var k="#"+key;
				$(k).attr("value",obj[key]);	
				//console.log(key+"->"+obj[key]);
				}
			}
			var ef=$("select");
			//console.log(ef);
			$.each(ef, function(i, field){
			// console.log(field);
			var z1 =$(field).attr("value");
			var z3 =$(field).attr("id");
			// console.log(z1);
			var c=document.getElementById(z3);
			var y=c.length;
			//console.log(c);
			for(var count=0;count<y;count++){
    		if(z1==$(field[count]).val()){
         	c[count].setAttribute("selected",true);
			//console.log(count);
			}
			}
			});
			
			
			
			
			var comms=$("#mi_comment").attr("value");
			$("#mi_comment").html(comms);
			
			
		}
		else{
			eval(dat[key]);
			/*(function(document){
			dat[key];
			})(document);*/
			
			
			
		}
		//var f=dat[count];
			//if (dat.hasOwnProperty(key)) {
			//console.log(key);
			//var k="#"+key;
			//console.log(key+"->"+dat[key]);
			//}
			//r k1=k+"Err";
			//var hid = document.createTextNode(e[key]);
			//$(k1).html(hid);
		}
			}
	//document.write(data);
	$("#mm").hide();
	$("*").removeClass("tab-pane").removeClass("fade");
	//$("*").removeClass("tab-pane").removeClass("fade");
	
	//var w=window.open();;
	//w.document.write(w.opener);
	//w.print();
	window.print();
	//document.close();
	$("#mm").show();
	}
	//}
		   });
	
	
	
}
function go(inputs){
	document.write(inputs);
	
}
</script>

</head>
<body onload="viewAll()">
<?php echo $nav;?>



<div class="container" id="mm">
<button class="btn btn-info" onclick="viewAll()">View all mortgages</button>
<div id="mholder">
</div>
</div>


<ul id="mytabs" class="nav nav-tabs">
  <li class="active"><a  data-toggle="tab"  href="#personalinfo">Personal Information</a></li>
  <li><a  data-toggle="tab" href="#menu1">Address Information</a></li>
  <li><a  data-toggle="tab" href="#menu2">Employment Information</a></li>
  <li><a   data-toggle="tab" href="#menu3">Other Income</a></li>
	<li><a data-toggle="tab" href="#menu4">Additional Information</a></li>
  </ul>
<br>
<br>
<div id="topcontain" class="tab-content conceal">
  <div id="personalinfo" class="tab-pane fade in active">
  
   

<div class="col-sm-12">
<form id="personal"  role="form" action="formtest.php" method="post">


<div class="col-sm-6">

<legend>Borrower</legend>
<div class="col-sm-12 form-group">
<span class="nextto col-sm-5">
<label >First Name:</label>
<input type="text" class="form-control" name="fname" id="fname" value="<?php echo $_SESSION['fname'];?>" />
<span class="error">* <?php echo $_SESSION['fnameErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label >Last Name:</label>
<input type="text" name="lname" id="lname" class="form-control " value="<?php echo $_SESSION['lname'];?>"/>
<span class="error">* <?php echo $_SESSION['lnameErr'];?></span>
</span>
</div>


<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Email:</label>
<input type="text" class="form-control" name="email" id="email" value="<?php echo $_SESSION['email'];?>" />
<span class="error">* <?php echo $_SESSION['emailErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Date of Birth</label>
<input type="text" name="dob" id="dob" class="form-control" value="<?php echo $_SESSION['dob'];?> "/>
<span class="error">* <?php echo $_SESSION['dobErr'];?></span>
</span>
</div>

<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class=" ">Marital status</label>
<select class="form-control" id="mar_status" name="mar_status"  >
    <option value="married"<?php if($_SESSION['mar_status']=="married") echo "selected";?>>Married</option>
    <option value="single" <?php if($_SESSION['mar_status']=="single") echo "selected";?>>Single</option>
    <option value="divorced" <?php if($_SESSION['mar_status']=="divorced") echo "selected";?>>Divorced/separated</option>
    <option value="common" <?php if($_SESSION['mar_status']=="common") echo "selected";?>>Common Law</option>
    <option value="engaged" <?php if($_SESSION['mar_status']=="engaged") echo "selected";?>>Engaged</option>
    <option value="widow" <?php if($_SESSION['mar_status']=="widow") echo "selected";?>>Widowed</option>
  </select>
  </span>
<span class="nextto col-sm-5">
<label class="">Do you currently</label>
<select class="form-control" id="currently" name="currently" >
    <option value="own" <?php if($_SESSION['currently']=="own") echo "selected";?>>Own</option>
    <option value="rent" <?php if($_SESSION['currently']=="rent") echo "selected";?>>Rent</option>
    <option value="relatives" <?php if($_SESSION['currently']=="relatives") echo "selected";?>>Live with relatives</option>
    <option value="others" <?php if($_SESSION['currently']=="others") echo "selected";?>>live with others</option>
    </select>
  </span>
  
  </div>



<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">S.I.N:</label>
<input type="text" class="form-control" name="sin" id="sin" value="<?php echo $_SESSION['sin'];?>" />
<span class="error">*<?php echo $_SESSION['sinErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Home phone:</label>

<input type="tel"  class="form-control" name="home_p" id="home_p" value="<?php echo $_SESSION['home_p'];?>"  />
<span class="error">*<?php echo $_SESSION['home_pErr'];?></span>
</span>
</div>


 


<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Work phone:</label>
<input type="text" class="form-control" name="work_p" id="work_p" value="<?php echo $_SESSION['work_p'];?>" />
<span class="error">*<?php echo $_SESSION['work_pErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Fax:</label>

<input type="text"  class="form-control" name="fax" id="fax" value="<?php echo $_SESSION['fax'];?>"  />
<span class="error">*<?php echo $_SESSION['faxErr'];?></span>
</span>
</div>

<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Cell phone:</label>
<input type="text"  class="form-control" name="cell_p" id="cell_p" value="<?php echo $_SESSION['cell_p'];?>"  />
<span class="error">*<?php echo $_SESSION['cell_pErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Dependents:</label>
<input type="text"  class="form-control" name="dependents" id="dependents" value="<?php echo $_SESSION['dependents'];?>"  />
<span class="error">*<?php echo $_SESSION['dependentsErr'];?></span>
</span>
</div>


<div class="col-sm-12">
<span class="nextto col-sm-5">
<label >Preferred Contact</label>
<select id="preferred_contact" name="preferred_contact" class="form-control">
<option value="">Please select</option>
<option   value="email">Email</option>
<option   value="phone">Phone</option>
</select>
</span>
<span class="nextto col-sm-5">
<label >Preferred Language</label>
<select id="preferred_language" name="preferred_language" class="form-control">
<option value="">Please select</option>
<option   value="english">English</option>
<option   value="french">French</option>
</select>
</span>

</div>



<div class="form-group-12">

<span class="col-sm-8 nextto">
<!--<button type="button" style="margin-top:25px;" class="btn btn-primary form-control"  data-target="#cobor">Click if you are adding a co-borrower</button>-->
</span>
</div>
</div><!--end col-sm-6-->



<div id="cobor" class="col-sm-6 ">


<legend>coborrower</legend>

<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label >First Name:</label>
<input type="text" class="form-control" name="cofname" id="cofname" value="<?php echo $_SESSION['cofname'];?>" />
<span class="error">* <?php echo $_SESSION['cofnameErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label >Last Name:</label>
<input type="text" name="colname" id="colname" class="form-control " value="<?php echo $_SESSION['colname'];?>"/>
<span class="error">* <?php echo $_SESSION['colnameErr'];?></span>
</span>
</div>


<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Email:</label>
<input type="text" class="form-control" name="coemail" id="coemail" value="<?php echo $_SESSION['coemail'];?>" />
<span class="error">* <?php echo $_SESSION['coemailErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Date of Birth</label>
<input type="text" name="codob" id="codob" class="form-control" value="<?php echo $_SESSION['codob'];?> "/>
<span class="error">* <?php echo $_SESSION['codobErr'];?></span>
</span>
</div>

<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class=" ">Marital status</label>
<select class="form-control" id="comar_status" name="comar_status"  >
    <option value="married"<?php if($_SESSION['comar_status']=="married") echo "selected";?>>Married</option>
    <option value="single" <?php if($_SESSION['comar_status']=="single") echo "selected";?>>Single</option>
    <option value="divorced" <?php if($_SESSION['comar_status']=="divorced") echo "selected";?>>Divorced/separated</option>
    <option value="common" <?php if($_SESSION['comar_status']=="common") echo "selected";?>>Common Law</option>
    <option value="engaged" <?php if($_SESSION['comar_status']=="engaged") echo "selected";?>>Engaged</option>
    <option value="widow" <?php if($_SESSION['comar_status']=="widow") echo "selected";?>>Widowed</option>
  </select>
  </span>
<span class="nextto col-sm-5">
<label class="">Do you currently</label>
<select class="form-control" id="cocurrently" name="cocurrently" >
    <option value="own" <?php if($_SESSION['cocurrently']=="own") echo "selected";?>>Own</option>
    <option value="rent" <?php if($_SESSION['cocurrently']=="rent") echo "selected";?>>Rent</option>
    <option value="relatives" <?php if($_SESSION['cocurrently']=="relatives") echo "selected";?>>Live with relatives</option>
    <option value="others" <?php if($_SESSION['cocurrently']=="others") echo "selected";?>>live with others</option>
    </select>
  </span>
  
  </div>	



<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">S.I.N:</label>
<input type="text" class="form-control" name="cosin" id="cosin" value="<?php echo $_SESSION['cosin'];?>" />
<span class="error">*<?php echo $_SESSION['cosinErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Home phone:</label>

<input type="text"  class="form-control" name="cohome_p" id="cohome_p" value="<?php echo $_SESSION['cohome_p'];?>"  />
<span class="error">*<?php echo $_SESSION['cohome_pErr'];?></span>
</span>
</div>


 


<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Work phone:</label>
<input type="text" class="form-control" name="cowork_p" id="cowork_p" value="<?php echo $_SESSION['cowork_p'];?>" />
<span class="error">*<?php echo $_SESSION['cowork_pErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Fax:</label>

<input type="text"  class="form-control" name="cofax" id="cofax" value="<?php echo $_SESSION['cofax'];?>"  />
<span class="error">*<?php echo $_SESSION['cofaxErr'];?></span>
</span>
</div>

<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Cell phone:</label>
<input type="text"  class="form-control" name="cocell_p" id="cocell_p" value="<?php echo $_SESSION['cocell_p'];?>"  />
<span class="error">*<?php echo $_SESSION['cocell_pErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Dependents:</label>
<input type="text"  class="form-control" name="codependents" id="codependents" value="<?php echo $_SESSION['codependents'];?>"  />
<span class="error">*<?php echo $_SESSION['codependentsErr'];?></span>
</span>
</div>


<div class="col-sm-12">
<span class="nextto col-sm-5">
<label >Preferred Contact</label>
<select id="copreferred_contact" name="copreferred_contact" class="form-control">
<option value="">Please select</option>
<option   value="email">Email</option>
<option   value="phone">Phone</option>
</select>
</span>
<span class="nextto col-sm-5">
<label >Preferred Language</label>
<select id="copreferred_language" name="copreferred_language" class="form-control">
<option value="">Please select</option>
<option   value="english">English</option>
<option   value="french">French</option>
</select>
</span>

</div>

</div><!--second div containg form 2-->
<!--<button class="btn btn-success next pull-right" type="submit">Next step</button>-->
</form>
</div>
</div><!--end first tab div-->


<div id="menu1" class="tab-pane fade">
   
    <form id="addressinfo" role="form">
	
	<div class="col-sm-12">
	<div class="col-sm-6">
	<legend>Borrower</legend>
	<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Address:</label>
<input type="text" class="form-control" name="address" id="address" value="<?php echo $_SESSION['address'];?>" />
<span class="error">*<?php echo $_SESSION['addressErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">unit:</label>

<input type="tel"  class="form-control" name="unit" id="unit" value="<?php echo $_SESSION['unit'];?>"  />
<span class="error">*<?php echo $_SESSION['unitErr'];?></span>
</span>
</div>



<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">City:</label>
<input type="text" class="form-control" name="city" id="city" value="<?php echo $_SESSION['city'];?>" />
<span class="error">*<?php echo $_SESSION['cityErr'];?></span>
</span>
<span class="nextto col-sm-5">	
<label class="">Province:</label>
<select class="form-control" id="province" name="province"  >
    <option value="alberta"<?php if($_SESSION['province']=="alberta") echo "selected";?>>Alberta</option>
    <option value="british columbia" <?php if($_SESSION['province']=="british columbia") echo "selected";?>>British Columbia</option>
    <option value="manitoba" <?php if($_SESSION['province']=="manitoba") echo "selected";?>>Manitoba</option>
    <option value="new brunswick" <?php if($_SESSION['province']=="new brunswick") echo "selected";?>>New Brunswick</option>
    <option value="newfoundland" <?php if($_SESSION['province']=="newfoundland") echo "selected";?>>NewFoundland & Labrador</option>
    <option value="northwest territories" <?php if($_SESSION['province']=="northwest territories") echo "selected";?>>Northwest Territories</option>
	<option value="nova scotia" <?php if($_SESSION['province']=="nova scotia") echo "selected";?>>Nova Scotia</option>
    <option value="nunavut" <?php if($_SESSION['province']=="nunavut") echo "selected";?>>Nunavut</option>
	<option value="ontario" <?php if($_SESSION['province']=="ontario") echo "selected";?>>Ontario</option>
	<option value="prince" <?php if($_SESSION['province']=="prince") echo "selected";?>>Prince Edward Island</option>
    <option value="quebec" <?php if($_SESSION['province']=="quebec") echo "selected";?>>Quebec</option>
	<option value="Saskatchewan" <?php if($_SESSION['province']=="Saskatchewan") echo "selected";?>>Saskatchewan</option>
    <option value="yukon" <?php if($_SESSION['province']=="yukon") echo "selected";?>>Yukon</option>
  </select>

</span>
</div>


<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Postal code:</label>
<input type="text" class="form-control" name="postal_code" id="postal_code" value="<?php echo $_SESSION['postal_code'];?>" />
<span class="error">*<?php echo $_SESSION['postal_codeErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Current rent:</label>

<input type="text"  class="form-control" name="current_rent" placeholder="$" id="current_rent" value="<?php echo $_SESSION['current_rent'];?>"  />
<span class="error">*<?php echo $_SESSION['current_rentErr'];?></span>
</span>



</div>

<div class="form-group col-sm-12">

<span class="nextto col-sm-5">
<label>Time at residence:</label>
</span>
<span class=" nextto col-sm-2">

<input type="text"  class="form-control" placeholder="year" name="time_at_residence_year" id="time_at_residence_year" value="<?php echo $_SESSION['time_at_residence_year'];?>"  />
<span class="error">*<?php echo $_SESSION['time_at_residence_yearErr'];?></span>
</span>
<span class="nextto col-sm-2">

<input type="text"  class="form-control" placeholder="month" name="time_at_residence_month" id="time_at_residence_month" value="<?php echo $_SESSION['time_at_residence_month'];?>"  />
<span class="error">*<?php echo $_SESSION['time_at_residence_monthErr'];?></span>

</span>
</div>


<!--<button type="button" class="btn btn-info"  data-target="#addr"><i class="fa fa-arrow-circle-down"></i>Click if you lived there less than 3 years</button>

<button type="button" class="btn btn-primary"  data-target="#cobor-address"><i class="fa fa-plus-square-o"></i>Click if you have coborrower information</button>-->



<legend>Borrower lived less than 3 years</legend>
<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Address:</label>
<input type="text" class="form-control" name="pre_address" id="pre_address" value="<?php echo $_SESSION['pre_address'];?>" />
<span class="error">*<?php echo $_SESSION['pre_addressErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">unit:</label>

<input type="tel"  class="form-control" name="pre_unit" id="pre_unit" value="<?php echo $_SESSION['pre_unit'];?>"  />
<span class="error">*<?php echo $_SESSION['pre_unitErr'];?></span>
</span>
</div>



<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">City:</label>
<input type="text" class="form-control" name="pre_city" id="pre_city" value="<?php echo $_SESSION['pre_city'];?>" />
<span class="error">*<?php echo $_SESSION['pre_cityErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Province:</label>
<select class="form-control" id="pre_province" name="pre_province"  >
    
    <option value="alberta"<?php if($_SESSION['pre_province']=="alberta") echo "selected";?>>Alberta</option>
    <option value="british columbia" <?php if($_SESSION['pre_province']=="british columbia") echo "selected";?>>British Columbia</option>
    <option value="manitoba" <?php if($_SESSION['pre_province']=="manitoba") echo "selected";?>>Manitoba</option>
    <option value="new brunswick" <?php if($_SESSION['pre_province']=="new brunswick") echo "selected";?>>New Brunswick</option>
    <option value="newfoundland" <?php if($_SESSION['pre_province']=="newfoundland") echo "selected";?>>NewFoundland & Labrador</option>
    <option value="northwest territories" <?php if($_SESSION['pre_province']=="northwest territories") echo "selected";?>>Northwest Territories</option>
	<option value="nova scotia" <?php if($_SESSION['pre_province']=="nova scotia") echo "selected";?>>Nova Scotia</option>
    <option value="nunavut" <?php if($_SESSION['pre_province']=="nunavut") echo "selected";?>>Nunavut</option>
	<option value="ontario" <?php if($_SESSION['pre_province']=="ontario") echo "selected";?>>Ontario</option>
	<option value="prince" <?php if($_SESSION['pre_province']=="prince") echo "selected";?>>Prince Edward Island</option>
    <option value="quebec" <?php if($_SESSION['pre_province']=="quebec") echo "selected";?>>Quebec</option>
	<option value="Saskatchewan" <?php if($_SESSION['pre_province']=="Saskatchewan") echo "selected";?>>Saskatchewan</option>
    <option value="yukon" <?php if($_SESSION['pre_province']=="yukon") echo "selected";?>>Yukon</option>
  </select>

</span>
</div>


<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Postal code:</label>
<input type="text" class="form-control" name="pre_postal_code" id="pre_postal_code" value="<?php echo $_SESSION['pre_postal_code'];?>" />
<span class="error">*<?php echo $_SESSION['pre_postal_codeErr'];?></span>
</span>

<span class="nextto col-sm-5">
<label class="">Current rent:</label>

<input type="text"  class="form-control" name="pre_current_rent" id="pre_current_rent" value="<?php echo $_SESSION['pre_current_rent'];?>"  />
<span class="error">*<?php echo $_SESSION['pre_current_rentErr'];?></span>
</span>
</div>

<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label>Time at residence:</label>
</span>
<span class="nextto col-sm-2" >

<input type="text"  class="form-control" placeholder="year" name="pre_time_at_residence_year" id="pre_time_at_residence_year" value="<?php echo $_SESSION['pre_time_at_residence_year'];?>"  />
<span class="error">*<?php echo $_SESSION['pre_time_at_residence_yearErr'];?></span>
</span>

<span class="nextto col-sm-2">


<input type="text"  class="form-control" placeholder="month" name="pre_time_at_residence_month" id="pre_time_at_residence_month" value="<?php echo $_SESSION['pre_time_at_residence_month'];?>"  />
<span class="error">*<?php echo $_SESSION['pre_time_at_residence_monthErr'];?></span>
</span>
</div>






</div><!--end div collapse-->
<!--end div col-6-->

<!--coborrrower section-->
<div id="cobor-address" class=" col-sm-6">

<legend>Coborrower</legend>
	<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Address:</label>
<input type="text" class="form-control" name="coaddress" id="coaddress" value="<?php echo $_SESSION['coaddress'];?>" />
<span class="error">*<?php echo $_SESSION['coaddressErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">unit:</label>

<input type="text"  class="form-control" name="counit" id="counit" value="<?php echo $_SESSION['counit'];?>"  />
<span class="error">*<?php echo $_SESSION['counitErr'];?></span>
</span>
</div>



<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">City:</label>
<input type="text" class="form-control" name="cocity" id="cocity" value="<?php echo $_SESSION['cocity'];?>" />
<span class="error">*<?php echo $_SESSION['cocityErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Province:</label>
<select class="form-control" id="coprovince" name="coprovince"  >
    
    <option value="alberta"<?php if($_SESSION['coprovince']=="alberta") echo "selected";?>>Alberta</option>
    <option value="british columbia" <?php if($_SESSION['coprovince']=="british columbia") echo "selected";?>>British Columbia</option>
    <option value="manitoba" <?php if($_SESSION['coprovince']=="manitoba") echo "selected";?>>Manitoba</option>
    <option value="new brunswick" <?php if($_SESSION['coprovince']=="new brunswick") echo "selected";?>>New Brunswick</option>
    <option value="newfoundland" <?php if($_SESSION['coprovince']=="newfoundland") echo "selected";?>>NewFoundland & Labrador</option>
    <option value="northwest territories" <?php if($_SESSION['coprovince']=="northwest territories") echo "selected";?>>Northwest Territories</option>
	<option value="nova scotia" <?php if($_SESSION['coprovince']=="nova scotia") echo "selected";?>>Nova Scotia</option>
    <option value="nunavut" <?php if($_SESSION['coprovince']=="nunavut") echo "selected";?>>Nunavut</option>
	<option value="ontario" <?php if($_SESSION['coprovince']=="ontario") echo "selected";?>>Ontario</option>
	<option value="prince" <?php if($_SESSION['coprovince']=="prince") echo "selected";?>>Prince Edward Island</option>
    <option value="quebec" <?php if($_SESSION['coprovince']=="quebec") echo "selected";?>>Quebec</option>
	<option value="Saskatchewan" <?php if($_SESSION['coprovince']=="Saskatchewan") echo "selected";?>>Saskatchewan</option>
    <option value="yukon" <?php if($_SESSION['coprovince']=="yukon") echo "selected";?>>Yukon</option>
  </select>

</span>
</div>


<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Postal code:</label>
<input type="text" class="form-control" name="copostal_code" id="copostal_code" value="<?php echo $_SESSION['copostal_code'];?>" />
<span class="error">*<?php echo $_SESSION['copostal_codeErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Current rent:</label>

<input type="text"  class="form-control" name="cocurrent_rent" id="cocurrent_rent" value="<?php echo $_SESSION['cocurrent_rent'];?>"  />
<span class="error">*<?php echo $_SESSION['cocurrent_rentErr'];?></span>
</span>
</div>


<div class="col-sm-12 form-group">
<span class="nextto col-sm-5">
<label>Time at residence:</label>
</span>
<span class="col-sm-2 nextto" >
<input type="text"  class="form-control" placeholder="year" name="cotime_at_residence_year" id="cotime_at_residence_year" value="<?php echo $_SESSION['cotime_at_residence_year'];?>"  />
<span class="error">*<?php echo $_SESSION['cotime_at_residence_yearErr'];?></span>
</span>

<span class="nextto col-sm-2">
<input type="text"  placeholder="month" class="form-control" name="cotime_at_residence_month" id="cotime_at_residence_month" value="<?php echo $_SESSION['cotime_at_residence_month'];?>"  />
<span class="error">*<?php echo $_SESSION['cotime_at_residence_monthErr'];?></span>
</span>
</div>





<!--
<button type="button" class="btn btn-info"  data-target="#coaddr"><i class="fa fa-arrow-circle-down"></i>Click if you have lived there less than 3 years</button>-->





<legend>Coborrower lived less than 3 years</legend>
<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Address:</label>
<input type="text" class="form-control" name="copre_address" id="copre_address" value="<?php echo $_SESSION['copre_address'];?>" />
<span class="error">*<?php echo $_SESSION['copre_addressErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">unit:</label>

<input type="text"  class="form-control" name="copre_unit" id="copre_unit" value="<?php echo $_SESSION['copre_unit'];?>"  />
<span class="error">*<?php echo $_SESSION['copre_unitErr'];?></span>
</span>
</div>
<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">City:</label>
<input type="text" class="form-control" name="copre_city" id="copre_city" value="<?php echo $_SESSION['copre_city'];?>" />
<span class="error">*<?php echo $_SESSION['copre_cityErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Province:</label>
<select class="form-control" id="copre_province" name="copre_province"  >
   
    <option value="alberta"<?php if($_SESSION['copre_province']=="alberta") echo "selected";?>>Alberta</option>
    <option value="british columbia" <?php if($_SESSION['copre_province']=="british columbia") echo "selected";?>>British Columbia</option>
    <option value="manitoba" <?php if($_SESSION['copre_province']=="manitoba") echo "selected";?>>Manitoba</option>
    <option value="new brunswick" <?php if($_SESSION['copre_province']=="new brunswick") echo "selected";?>>New Brunswick</option>
    <option value="newfoundland" <?php if($_SESSION['copre_province']=="newfoundland") echo "selected";?>>NewFoundland & Labrador</option>
    <option value="northwest territories" <?php if($_SESSION['copre_province']=="northwest territories") echo "selected";?>>Northwest Territories</option>
	<option value="nova scotia" <?php if($_SESSION['copre_province']=="nova scotia") echo "selected";?>>Nova Scotia</option>
    <option value="nunavut" <?php if($_SESSION['copre_province']=="nunavut") echo "selected";?>>Nunavut</option>
	<option value="ontario" <?php if($_SESSION['copre_province']=="ontario") echo "selected";?>>Ontario</option>
	<option value="prince" <?php if($_SESSION['copre_province']=="prince") echo "selected";?>>Prince Edward Island</option>
    <option value="quebec" <?php if($_SESSION['copre_province']=="quebec") echo "selected";?>>Quebec</option>
	<option value="Saskatchewan" <?php if($_SESSION['copre_province']=="Saskatchewan") echo "selected";?>>Saskatchewan</option>
    <option value="yukon" <?php if($_SESSION['copre_province']=="yukon") echo "selected";?>>Yukon</option>
  
  </select>

</span>
</div>


<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Postal code:</label>
<input type="text" class="form-control" name="copre_postal_code" id="copre_postal_code" value="<?php echo $_SESSION['copre_postal_code'];?>" />
<span class="error">*<?php echo $_SESSION['copre_postal_codeErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Current rent:</label>
<input type="text"  class="form-control" name="copre_current_rent" id="copre_current_rent" value="<?php echo $_SESSION['copre_current_rent'];?>"  />

</span>
</div>




<div class="form-group col-sm-12">

<span class="nextto col-sm-5">
<label>Time at residence:</label>
</span>
<span class=" nextto col-sm-2">

<input type="text"  class="form-control" placeholder="year" name="copre_time_at_residence_year" id="copre_time_at_residence_year" value="<?php echo $_SESSION['copre_time_at_residence_year'];?>"  />

</span>
<span class="nextto col-sm-2">

<input type="text"  class="form-control" placeholder="month" name="copre_time_at_residence_month" id="copre_time_at_residence_month" value="<?php echo $_SESSION['copre_time_at_residence_month'];?>"  />

</span>
</div>





</div><!--end collapse container-->
</div><!--end column-sm-12-->	
<!--<button class="btn btn-success next pull-right" type="submit">next step</button>-->
<!--end column-sm-12-->

<!--coborrower section-->	
</form>
 </div>
  
  
  <div id="menu2" class="tab-pane fade">
   
    <form id="employmentinfo" role="form">
	
	<div class="col-sm-12">
		<div class="col-sm-6">	
	<legend>Borrower(Employment)</legend>
		<div class="form-group col-sm-12">
<span class="nextto col-sm-5">

<span class="nextto col-sm-5">
<label >Self employed</label>
<select id="self-employed" name="self_employed" class="form-control">
<option value="">Please select</option>
<option   value="yes">Yes</option>
<option   value="no">No</option>
</select>
</span>
<span class="nextto col-sm-5">
<label >Gross Revenue</label>
<input type="text" name="revenue" id="revenue" value="<?php echo $_SESSION['revenue'];?>" class="form-control"/>

</span>
</div>




<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>Employer Name</label>
<input type="text" id="employer" name="employer" value="<?php echo $_SESSION['employer'];?>"  class="form-control"/>
<span class="error">*<?php echo $_SESSION['employerErr'];?></span>
</span>
<span class=" nextto col-sm-5">
<label>Employer Address</label>
<input type="text" id="emp_address" name="emp_address" value="<?php echo $_SESSION['emp_address'];?>"  class="form-control"/>
<span class="error">*<?php echo $_SESSION['emp_addressErr'];?></span>
</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>city</label>
<input type="text" id="emp_city" name="emp_city" value="<?php echo $_SESSION['emp_city'];?>"  class="form-control"/>
<span class="error">*<?php echo $_SESSION['emp_cityErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Province:</label>
<select class="form-control" id="emp_province" name="emp_province"  >
    
    <option value="alberta"<?php if($_SESSION['emp_province']=="alberta") echo "selected";?>>Alberta</option>
    <option value="british columbia" <?php if($_SESSION['emp_province']=="british columbia") echo "selected";?>>British Columbia</option>
    <option value="manitoba" <?php if($_SESSION['emp_province']=="manitoba") echo "selected";?>>Manitoba</option>
    <option value="new brunswick" <?php if($_SESSION['emp_province']=="new brunswick") echo "selected";?>>New Brunswick</option>
    <option value="newfoundland" <?php if($_SESSION['emp_province']=="newfoundland") echo "selected";?>>NewFoundland & Labrador</option>
    <option value="northwest territories" <?php if($_SESSION['emp_province']=="northwest territories") echo "selected";?>>Northwest Territories</option>
	<option value="nova scotia" <?php if($_SESSION['emp_province']=="nova scotia") echo "selected";?>>Nova Scotia</option>
    <option value="nunavut" <?php if($_SESSION['emp_province']=="nunavut") echo "selected";?>>Nunavut</option>
	<option value="ontario" <?php if($_SESSION['emp_province']=="ontario") echo "selected";?>>Ontario</option>
	<option value="prince" <?php if($_SESSION['emp_province']=="prince") echo "selected";?>>Prince Edward Island</option>
    <option value="quebec" <?php if($_SESSION['emp_province']=="quebec") echo "selected";?>>Quebec</option>
	<option value="Saskatchewan" <?php if($_SESSION['emp_province']=="Saskatchewan") echo "selected";?>>Saskatchewan</option>
    <option value="yukon" <?php if($_SESSION['emp_province']=="yukon") echo "selected";?>>Yukon</option>
  </select>
</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>postal code</label>
<input type="text" id="emp_postal_code" name="emp_postal_code" value="<?php echo $_SESSION['emp_postal_code'];?>"  class="form-control"/>
<span class="error">*<?php echo $_SESSION['emp_postal_codeErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">status:</label>
<select class="form-control" id="emp_status" name="emp_status"  >
    <option value="previous"<?php if($_SESSION['emp_status']=="previous") echo "selected";?>>previous</option>
    <option value="current" <?php if($_SESSION['emp_status']=="current") echo "selected";?>>current</option>
    
  </select>

</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>Job title</label>
<input type="text" id="job_title" name="job_title" value="<?php echo $_SESSION['job_title'];?>"  class="form-control"/>
<span class="error">*<?php echo $_SESSION['job_titleErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Job type:</label>
<select class="form-control" id="job_type" name="job_type"  >
    <option value="other"<?php if($_SESSION['job_type']=="other") echo "selected";?>>Other</option>
     
	            <option value="management" <?php if($_SESSION['job_type']=="management") echo "selected";?>>Management</option>
	            <option value="clerical" <?php if($_SESSION['job_type']=="clerical") echo "selected";?>>Clerical</option>
	            <option value="trade" <?php if($_SESSION['job_type']=="trade") echo "selected";?>>Labour/Tradesperson</option>
	            <option value="retired" <?php if($_SESSION['job_type']=="retired") echo "selected";?>>Retired</option>
	            <option value="professional" <?php if($_SESSION['job_type']=="professional") echo "selected";?>>Professional</option>
	            <option value="self-employed" <?php if($_SESSION['job_type']=="self-employed") echo "selected";?>>Self-Employed</option>
  </select>

</span>
</div>

<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Industry sector:</label>
<select class="form-control" id="industry_sector" name="industry_sector"  >
    
    <option value="other" <?php if($_SESSION['industry_sector']=="other") echo "selected";?>>Other</option>
	<option value="construction" <?php if($_SESSION['industry_sector']=="construction") echo "selected";?>>Construction</option>
	<option value="government" <?php if($_SESSION['industry_sector']=="government") echo "selected";?>>Government</option>
	<option value="health" <?php if($_SESSION['industry_sector']=="health") echo "selected";?>>Health</option>
	<option value="education" <?php if($_SESSION['industry_sector']=="education") echo "selected";?>>Education</option>
	<option value="hightech" <?php if($_SESSION['industry_sector']=="hightech") echo "selected";?>>High-Tech</option>
	<option value="retail" <?php if($_SESSION['industry_sector']=="retail") echo "selected";?>>Retail Sales</option>
	<option value="leisure" <?php if($_SESSION['industry_sector']=="leisure") echo "selected";?>>Leisure/Entertainment</option>
	<option value="banking" <?php if($_SESSION['industry_sector']=="banking") echo "selected";?>>Banking/Finance</option>
	<option value="transport" <?php if($_SESSION['industry_sector']=="transportation") echo "selected";?>>Transportation</option>
	<option value="services" <?php if($_SESSION['industry_sector']=="services") echo "selected";?> >Services</option>
	<option value="manufacturing" <?php if($_SESSION['industry_sector']=="manufacturing") echo "selected";?>>Manufacturing</option>
	<option value="farming" <?php if($_SESSION['industry_sector']=="farming") echo "selected";?>>Farming/Natural Resources</option>
	<option value="varies" <?php if($_SESSION['industry_sector']=="varies") echo "selected";?>>Varies</option>
  </select>

</span>
<span class="nextto col-sm-5">
<label class="">Income type:</label>
<select class="form-control" id="income_type" name="income_type"  >
    
    <option value="salary" <?php if($_SESSION['income_type']=="salary") echo "selected";?>>Salary</option>
	<option value="hourly" <?php if($_SESSION['income_type']=="hourly") echo "selected";?>>Hourly</option>
	<option value="hc" <?php if($_SESSION['income_type']=="hc") echo "selected";?>>Hourly +Commissions</option>
	<option value="commission" <?php if($_SESSION['income_type']=="commission") echo "selected";?>>Commissions</option>
	<option value="self-employed" <?php if($_SESSION['income_type']=="self-employed") echo "selected";?>>Self-Employed</option>
	<option value="rental" <?php if($_SESSION['income_type']=="rental") echo "selected";?>>Rental Income</option>
	<option value="other" <?php if($_SESSION['income_type']=="other") echo "selected";?>>Other Employment Income</option>
  </select>

</span>
</div>

<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label>Annual income</label>
<input type="text" id="annual_income" name="annual_income" value="<?php echo $_SESSION['annual_income'];?>"  class="form-control"/>

</span>



</div>

<div class="form-group col-sm-12" style="margin-top:1cm;">
<span class="col-sm-2 nextto">

<label>Time at job:</label>
</span>

<span class=" nextto col-sm-2" >

<input type="text"  class="form-control" placeholder="year" name="time_at_job_year" id="time_at_job_year" value="<?php echo $_SESSION['time_at_job_year'];?>"  />

</span>

<span class="nextto col-sm-2" style="margin-left:-1cm;" >
<input type="text"  class="form-control" placeholder="month" name="time_at_job_month" id="time_at_job_month" value="<?php echo $_SESSION['time_at_job_month'];?>"  />
</span>
</div>






<!--<div class="col-sm-12">
<button type="button" class="btn btn-info" data-target="#emp3"  ><i class="fa fa-arrow-circle-down"></i>click if you worked there less than 3 years</button>
<button type="button" data-target="#coemp3"  class="btn btn-primary"><i class="fa fa-plus-square-o"></i>co-borrower information</button>
</div>-->

<legend>Borrower worked less than 3 years</legend>
<div class="form-group col-sm-12">

<span class="nextto col-sm-5">
<label >Self employed</label>
<select id="pre_self-employed" name="pre_self_employed" class="form-control">
<option value="">Please select</option>
<option   value="yes">Yes</option>
<option   value="no">No</option>
</select>
</span>
<span class="nextto col-sm-5">
<label >Gross Revenue</label>
<input type="text" name="pre_revenue" id="pre_revenue" value="<?php echo $_SESSION['pre_revenue'];?>" class="form-control"/>
<span class="error"><?php echo $_SESSION['pre_revenueErr'];?></span>

</span>
</div>




<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>Employer Name</label>
<input type="text" id="pre_employer" name="pre_employer" value="<?php echo $_SESSION['pre_employer'];?>"  class="form-control"/>
<span class="error">*<?php echo $_SESSION['pre_employerErr'];?></span>
</span>
<span class=" nextto col-sm-5">
<label>Employer Address</label>
<input type="text" id="pre_emp_address" name="pre_emp_address" value="<?php echo $_SESSION['pre_emp_address'];?>"  class="form-control"/>
<span class="error">*<?php echo $_SESSION['pre_emp_addressErr'];?></span>
</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>city</label>
<input type="text" id="pre_emp_city" name="pre_emp_city" value="<?php echo $_SESSION['pre_emp_city'];?>"  class="form-control"/>
<span class="error">*<?php echo $_SESSION['pre_emp_cityErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Province:</label>
<select class="form-control" id="pre_emp_province" name="pre_emp_province"  >
    <option value="alberta"<?php if($_SESSION['pre_emp_province']=="alberta") echo "selected";?>>Alberta</option>
    <option value="british columbia" <?php if($_SESSION['pre_emp_province']=="british columbia") echo "selected";?>>British Columbia</option>
    <option value="manitoba" <?php if($_SESSION['pre_emp_province']=="manitoba") echo "selected";?>>Manitoba</option>
    <option value="new brunswick" <?php if($_SESSION['pre_emp_province']=="new brunswick") echo "selected";?>>New Brunswick</option>
    <option value="newfoundland" <?php if($_SESSION['pre_emp_province']=="newfoundland") echo "selected";?>>NewFoundland & Labrador</option>
    <option value="northwest territories" <?php if($_SESSION['pre_emp_province']=="northwest territories") echo "selected";?>>Northwest Territories</option>
	<option value="nova scotia" <?php if($_SESSION['pre_emp_province']=="nova scotia") echo "selected";?>>Nova Scotia</option>
    <option value="nunavut" <?php if($_SESSION['pre_emp_province']=="nunavut") echo "selected";?>>Nunavut</option>
	<option value="ontario" <?php if($_SESSION['pre_emp_province']=="ontario") echo "selected";?>>Ontario</option>
	<option value="prince" <?php if($_SESSION['pre_emp_province']=="prince") echo "selected";?>>Prince Edward Island</option>
    <option value="quebec" <?php if($_SESSION['pre_emp_province']=="quebec") echo "selected";?>>Quebec</option>
	<option value="Saskatchewan" <?php if($_SESSION['pre_emp_province']=="Saskatchewan") echo "selected";?>>Saskatchewan</option>
    <option value="yukon" <?php if($_SESSION['pre_emp_province']=="yukon") echo "selected";?>>Yukon</option>
  </select>
</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>postal code</label>
<input type="text" id="pre_emp_postal_code" name="pre_emp_postal_code" value="<?php echo $_SESSION['pre_emp_postal_code'];?>"  class="form-control"/>
<span class="error">*<?php echo $_SESSION['pre_emp_postal_codeErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">status:</label>
<select class="form-control" id="pre_emp_status" name="pre_emp_status"  >
    <option value="previous"<?php if($_SESSION['pre_emp_status']=="previous") echo "selected";?>>previous</option>
    <option value="current" <?php if($_SESSION['pre_emp_status']=="current") echo "selected";?>>current</option>
    
  </select>

</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>Job title</label>
<input type="text" id="pre_job_title" name="pre_job_title" value="<?php echo $_SESSION['pre_job_title'];?>"  class="form-control"/>
<span class="error">*<?php echo $_SESSION['pre_job_titleErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Job type:</label>
<select class="form-control" id="pre_job_type" name="pre_job_type"  >
     <option value="other"<?php if($_SESSION['pre_job_type']=="other") echo "selected";?>>Other</option>
     
	            <option value="management" <?php if($_SESSION['pre_job_type']=="management") echo "selected";?>>Management</option>
	            <option value="clerical" <?php if($_SESSION['pre_job_type']=="clerical") echo "selected";?>>Clerical</option>
	            <option value="trade" <?php if($_SESSION['pre_job_type']=="trade") echo "selected";?>>Labour/Tradesperson</option>
	            <option value="retired" <?php if($_SESSION['pre_job_type']=="retired") echo "selected";?>>Retired</option>
	            <option value="professional" <?php if($_SESSION['pre_job_type']=="professional") echo "selected";?>>Professional</option>
	            <option value="self-employed" <?php if($_SESSION['pre_job_type']=="self-employed") echo "selected";?>>Self-Employed</option>
  </select>

</span>
</div>

<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Industry sector:</label>
<select class="form-control" id="pre_industry_sector" name="pre_industry_sector"  >
    <option value="other" <?php if($_SESSION['pre_industry_sector']=="other") echo "selected";?>>Other</option>
	<option value="construction" <?php if($_SESSION['pre_industry_sector']=="construction") echo "selected";?>>Construction</option>
	<option value="government" <?php if($_SESSION['pre_industry_sector']=="government") echo "selected";?>>Government</option>
	<option value="health" <?php if($_SESSION['pre_industry_sector']=="health") echo "selected";?>>Health</option>
	<option value="education" <?php if($_SESSION['pre_industry_sector']=="education") echo "selected";?>>Education</option>
	<option value="hightech" <?php if($_SESSION['pre_industry_sector']=="hightech") echo "selected";?>>High-Tech</option>
	<option value="retail" <?php if($_SESSION['pre_industry_sector']=="retail") echo "selected";?>>Retail Sales</option>
	<option value="leisure" <?php if($_SESSION['pre_industry_sector']=="leisure") echo "selected";?>>Leisure/Entertainment</option>
	<option value="banking" <?php if($_SESSION['pre_industry_sector']=="banking") echo "selected";?>>Banking/Finance</option>
	<option value="transport" <?php if($_SESSION['pre_industry_sector']=="transportation") echo "selected";?>>Transportation</option>
	<option value="services" <?php if($_SESSION['pre_industry_sector']=="services") echo "selected";?> >Services</option>
	<option value="manufacturing" <?php if($_SESSION['pre_industry_sector']=="manufacturing") echo "selected";?>>Manufacturing</option>
	<option value="farming" <?php if($_SESSION['pre_industry_sector']=="farming") echo "selected";?>>Farming/Natural Resources</option>
	<option value="varies" <?php if($_SESSION['pre_industry_sector']=="varies") echo "selected";?>>Varies</option>
  </select>

</span>
<span class="nextto col-sm-5">
<label class="">Income type:</label>
<select class="form-control" id="pre_income_type" name="pre_income_type"  >
    <option value="salary" <?php if($_SESSION['pre_income_type']=="salary") echo "selected";?>>Salary</option>
	<option value="hourly" <?php if($_SESSION['pre_income_type']=="hourly") echo "selected";?>>Hourly</option>
	<option value="hc" <?php if($_SESSION['pre_income_type']=="hc") echo "selected";?>>Hourly +Commissions</option>
	<option value="commission" <?php if($_SESSION['pre_income_type']=="commission") echo "selected";?>>Commissions</option>
	<option value="self-employed" <?php if($_SESSION['pre_income_type']=="self-employed") echo "selected";?>>Self-Employed</option>
	<option value="rental" <?php if($_SESSION['pre_income_type']=="rental") echo "selected";?>>Rental Income</option>
	<option value="other" <?php if($_SESSION['pre_income_type']=="other") echo "selected";?>>Other Employment Income</option>
  </select>

</span>
</div>

<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label>Annual income</label>
<input type="text" id="pre_annual_income" name="pre_annual_income" value="<?php echo $_SESSION['pre_annual_income'];?>"  class="form-control"/>
<span class="error">*<?php echo $_SESSION['pre_annual_incomeErr'];?></span>
</span>
</div>


<div class="form-group col-sm-12" style="margin-top:1cm;">
<span class="col-sm-2 nextto">

<label>Time at job:</label>
</span>

<span class=" nextto col-sm-2" >

<input type="text"  class="form-control" placeholder="year" name="pre_time_at_job_year" id="pre_time_at_job_year" value="<?php echo $_SESSION['pre_time_at_job_year'];?>"  />

</span>

<span class="nextto col-sm-2" style="margin-left:-1cm;" >
<input type="text"  class="form-control" placeholder="month" name="pre_time_at_job_month" id="pre_time_at_job_month" value="<?php echo $_SESSION['pre_time_at_job_month'];?>"  />
</span>
</div>


</div><!--end container for < 3 years employed-->
<!--end col-sm-6-->		
<div id="coemp3" class="col-sm-6 ">	<!--co-bor empp info-->
<legend>Coborrower</legend>
<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label >Self employed</label>
<select id="coself-employed" name="coself_employed" class="form-control">
<option value="">Please select</option>
<option   value="yes">Yes</option>
<option   value="no">No</option>
</select>
</span>
<span class="nextto col-sm-5">
<label >Gross Revenue</label>
<input type="text" name="corevenue" id="corevenue" value="<?php echo $_SESSION['corevenue'];?>" class="form-control"/>
<span class="error"><?php echo $_SESSION['corevenueErr'];?></span>

</span>
</div>




<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>Employer Name</label>
<input type="text" id="coemployer" name="coemployer" value="<?php echo $_SESSION['coemployer'];?>"  class="form-control"/>
<span class="error">*<?php echo $_SESSION['coemployerErr'];?></span>
</span>
<span class=" nextto col-sm-5">
<label>Employer Address</label>
<input type="text" id="coemp_address" name="coemp_address" value="<?php echo $_SESSION['coemp_address'];?>"  class="form-control"/>
<span class="error">*<?php echo $_SESSION['coemp_addressErr'];?></span>
</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>City</label>
<input type="text" id="coemp_city" name="coemp_city" value="<?php echo $_SESSION['coemp_city'];?>"  class="form-control"/>
<span class="error">*<?php echo $_SESSION['coemp_cityErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Province:</label>
<select class="form-control" id="coemp_province" name="coemp_province"  >
    <option value="alberta"<?php if($_SESSION['coemp_province']=="alberta") echo "selected";?>>Alberta</option>
    <option value="british columbia" <?php if($_SESSION['coemp_province']=="british columbia") echo "selected";?>>British Columbia</option>
    <option value="manitoba" <?php if($_SESSION['coemp_province']=="manitoba") echo "selected";?>>Manitoba</option>
    <option value="new brunswick" <?php if($_SESSION['coemp_province']=="new brunswick") echo "selected";?>>New Brunswick</option>
    <option value="newfoundland" <?php if($_SESSION['coemp_province']=="newfoundland") echo "selected";?>>NewFoundland & Labrador</option>
    <option value="northwest territories" <?php if($_SESSION['coemp_province']=="northwest territories") echo "selected";?>>Northwest Territories</option>
	<option value="nova scotia" <?php if($_SESSION['coemp_province']=="nova scotia") echo "selected";?>>Nova Scotia</option>
    <option value="nunavut" <?php if($_SESSION['coemp_province']=="nunavut") echo "selected";?>>Nunavut</option>
	<option value="ontario" <?php if($_SESSION['coemp_province']=="ontario") echo "selected";?>>Ontario</option>
	<option value="prince" <?php if($_SESSION['coemp_province']=="prince") echo "selected";?>>Prince Edward Island</option>
    <option value="quebec" <?php if($_SESSION['coemp_province']=="quebec") echo "selected";?>>Quebec</option>
	<option value="Saskatchewan" <?php if($_SESSION['coemp_province']=="Saskatchewan") echo "selected";?>>Saskatchewan</option>
    <option value="yukon" <?php if($_SESSION['coemp_province']=="yukon") echo "selected";?>>Yukon</option>
  </select>
</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>postal code</label>
<input type="text" id="coemp_postal_code" name="coemp_postal_code" value="<?php echo $_SESSION['coemp_postal_code'];?>"  class="form-control"/>
<span class="error">*<?php echo $_SESSION['coemp_postal_codeErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">status:</label>
<select class="form-control" id="coemp_status" name="coemp_status"  >
    <option value="previous"<?php if($_SESSION['coemp_status']=="previous") echo "selected";?>>previous</option>
    <option value="current" <?php if($_SESSION['coemp_status']=="current") echo "selected";?>>current</option>
    
  </select>

</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>Job title</label>
<input type="text" id="cojob_title" name="cojob_title" value="<?php echo $_SESSION['cojob_title'];?>"  class="form-control"/>
<span class="error">*<?php echo $_SESSION['cojob_titleErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Job type:</label>
<select class="form-control" id="cojob_type" name="cojob_type"  >
     <option value="other"<?php if($_SESSION['cojob_type']=="other") echo "selected";?>>Other</option>
     
	            <option value="management" <?php if($_SESSION['cojob_type']=="management") echo "selected";?>>Management</option>
	            <option value="clerical" <?php if($_SESSION['cojob_type']=="clerical") echo "selected";?>>Clerical</option>
	            <option value="trade" <?php if($_SESSION['cojob_type']=="trade") echo "selected";?>>Labour/Tradesperson</option>
	            <option value="retired" <?php if($_SESSION['cojob_type']=="retired") echo "selected";?>>Retired</option>
	            <option value="professional" <?php if($_SESSION['cojob_type']=="professional") echo "selected";?>>Professional</option>
	            <option value="self-employed" <?php if($_SESSION['cojob_type']=="self-employed") echo "selected";?>>Self-Employed</option>
  </select>

</span>
</div>

<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Industry sector:</label>
<select class="form-control" id="coindustry_sector" name="coindustry_sector"  >
    <option value="other" <?php if($_SESSION['coindustry_sector']=="other") echo "selected";?>>Other</option>
	<option value="construction" <?php if($_SESSION['coindustry_sector']=="construction") echo "selected";?>>Construction</option>
	<option value="government" <?php if($_SESSION['coindustry_sector']=="government") echo "selected";?>>Government</option>
	<option value="health" <?php if($_SESSION['coindustry_sector']=="health") echo "selected";?>>Health</option>
	<option value="education" <?php if($_SESSION['coindustry_sector']=="education") echo "selected";?>>Education</option>
	<option value="hightech" <?php if($_SESSION['coindustry_sector']=="hightech") echo "selected";?>>High-Tech</option>
	<option value="retail" <?php if($_SESSION['coindustry_sector']=="retail") echo "selected";?>>Retail Sales</option>
	<option value="leisure" <?php if($_SESSION['coindustry_sector']=="leisure") echo "selected";?>>Leisure/Entertainment</option>
	<option value="banking" <?php if($_SESSION['coindustry_sector']=="banking") echo "selected";?>>Banking/Finance</option>
	<option value="transport" <?php if($_SESSION['coindustry_sector']=="transportation") echo "selected";?>>Transportation</option>
	<option value="services" <?php if($_SESSION['coindustry_sector']=="services") echo "selected";?> >Services</option>
	<option value="manufacturing" <?php if($_SESSION['coindustry_sector']=="manufacturing") echo "selected";?>>Manufacturing</option>
	<option value="farming" <?php if($_SESSION['coindustry_sector']=="farming") echo "selected";?>>Farming/Natural Resources</option>
	<option value="varies" <?php if($_SESSION['coindustry_sector']=="varies") echo "selected";?>>Varies</option>
  </select>

</span>
<span class="nextto col-sm-5">
<label class="">Income type:</label>
<select class="form-control" id="coincome_type" name="coincome_type"  >
    <option value="salary" <?php if($_SESSION['coincome_type']=="salary") echo "selected";?>>Salary</option>
	<option value="hourly" <?php if($_SESSION['coincome_type']=="hourly") echo "selected";?>>Hourly</option>
	<option value="hc" <?php if($_SESSION['coincome_type']=="hc") echo "selected";?>>Hourly +Commissions</option>
	<option value="commission" <?php if($_SESSION['coincome_type']=="commission") echo "selected";?>>Commissions</option>
	<option value="self-employed" <?php if($_SESSION['coincome_type']=="self-employed") echo "selected";?>>Self-Employed</option>
	<option value="rental" <?php if($_SESSION['coincome_type']=="rental") echo "selected";?>>Rental Income</option>
	<option value="other" <?php if($_SESSION['coincome_type']=="other") echo "selected";?>>Other Employment Income</option>
  </select>

</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>Annual income</label>
<input type="text" id="coannual_income" name="coannual_income" value="<?php echo $_SESSION['coannual_income'];?>"  class="form-control"/></span>
</div>


<div class="form-group col-sm-12" style="margin-top:1cm;">
<span class="col-sm-2 nextto">

<label>Time at job:</label>
</span>

<span class=" nextto col-sm-2" >

<input type="text"  class="form-control" placeholder="year" name="cotime_at_job_year" id="cotime_at_job_year" value="<?php echo $_SESSION['cotime_at_job_year'];?>"  />

</span>

<span class="nextto col-sm-2" style="margin-left:-1cm;" >
<input type="text"  class="form-control" placeholder="month" name="cotime_at_job_month" id="cotime_at_job_month" value="<?php echo $_SESSION['cotime_at_job_month'];?>"  />
</span>
</div>






<!--
<div>
<button type="button" data-target="#coemp4"  class="btn btn-info">Click if you worked there less than three years.</button>
</div>-->

<legend>Coborrower worked less than 3 years</legend>
<div class="form-group col-sm-12">

<span class="nextto col-sm-5">
<label >Self employed</label>
<select id="copre_self-employed" name="copre_self_employed" class="form-control">
<option value="">Please select</option>
<option   value="yes">Yes</option>
<option   value="no">No</option>
</select>
</span>
<span class="nextto col-sm-5">
<label >Gross Revenue</label>
<input type="text" name="copre_revenue" id="copre_revenue" value="<?php echo $_SESSION['copre_revenue'];?>" class="form-control"/>
<span class="error"><?php echo $_SESSION['copre_revenueErr'];?></span>

</span>
</div>




<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>Employer Name</label>
<input type="text" id="copre_employer" name="copre_employer" value="<?php echo $_SESSION['copre_employer'];?>"  class="form-control"/>
<span class="error">*<?php echo $_SESSION['copre_employerErr'];?></span>
</span>
<span class=" nextto col-sm-5">
<label>Employer Address</label>
<input type="text" id="copre_emp_address" name="copre_emp_address" value="<?php echo $_SESSION['copre_emp_address'];?>"  class="form-control"/>
<span class="error">*<?php echo $_SESSION['copre_emp_addressErr'];?></span>
</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>city</label>
<input type="text" id="copre_emp_city" name="copre_emp_city" value="<?php echo $_SESSION['copre_emp_city'];?>"  class="form-control"/>
<span class="error">*<?php echo $_SESSION['copre_emp_cityErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Province:</label>
<select class="form-control" id="copre_emp_province" name="copre_emp_province"  >
    <option value="alberta"<?php if($_SESSION['copre_emp_province']=="alberta") echo "selected";?>>Alberta</option>
    <option value="british columbia" <?php if($_SESSION['copre_emp_province']=="british columbia") echo "selected";?>>British Columbia</option>
    <option value="manitoba" <?php if($_SESSION['copre_emp_province']=="manitoba") echo "selected";?>>Manitoba</option>
    <option value="new brunswick" <?php if($_SESSION['copre_emp_province']=="new brunswick") echo "selected";?>>New Brunswick</option>
    <option value="newfoundland" <?php if($_SESSION['copre_emp_province']=="newfoundland") echo "selected";?>>NewFoundland & Labrador</option>
    <option value="northwest territories" <?php if($_SESSION['copre_emp_province']=="northwest territories") echo "selected";?>>Northwest Territories</option>
	<option value="nova scotia" <?php if($_SESSION['copre_emp_province']=="nova scotia") echo "selected";?>>Nova Scotia</option>
    <option value="nunavut" <?php if($_SESSION['copre_emp_province']=="nunavut") echo "selected";?>>Nunavut</option>
	<option value="ontario" <?php if($_SESSION['copre_emp_province']=="ontario") echo "selected";?>>Ontario</option>
	<option value="prince" <?php if($_SESSION['copre_emp_province']=="prince") echo "selected";?>>Prince Edward Island</option>
    <option value="quebec" <?php if($_SESSION['copre_emp_province']=="quebec") echo "selected";?>>Quebec</option>
	<option value="Saskatchewan" <?php if($_SESSION['copre_emp_province']=="Saskatchewan") echo "selected";?>>Saskatchewan</option>
    <option value="yukon" <?php if($_SESSION['copre_emp_province']=="yukon") echo "selected";?>>Yukon</option>
  </select>
</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>postal code</label>
<input type="text" id="copre_emp_postal_code" name="copre_emp_postal_code" value="<?php echo $_SESSION['copre_emp_postal_code'];?>"  class="form-control"/>
<span class="error">*<?php echo $_SESSION['copre_emp_postal_codeErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">status:</label>
<select class="form-control" id="copre_emp_status" name="copre_emp_status"  >
    <option value="previous"<?php if($_SESSION['copre_emp_status']=="previous") echo "selected";?>>previous</option>
    <option value="current" <?php if($_SESSION['copre_emp_status']=="current") echo "selected";?>>current</option>
    
  </select>

</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>Job title</label>
<input type="text" id="copre_job_title" name="copre_job_title" value="<?php echo $_SESSION['copre_job_title'];?>"  class="form-control"/>
<span class="error">*<?php echo $_SESSION['copre_job_title'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Job type:</label>
<select class="form-control" id="copre_job_type" name="copre_job_type"  >
     <option value="other"<?php if($_SESSION['copre_job_type']=="other") echo "selected";?>>Other</option>
     
	            <option value="management" <?php if($_SESSION['copre_job_type']=="management") echo "selected";?>>Management</option>
	            <option value="clerical" <?php if($_SESSION['copre_job_type']=="clerical") echo "selected";?>>Clerical</option>
	            <option value="trade" <?php if($_SESSION['copre_job_type']=="trade") echo "selected";?>>Labour/Tradesperson</option>
	            <option value="retired" <?php if($_SESSION['copre_job_type']=="retired") echo "selected";?>>Retired</option>
	            <option value="professional" <?php if($_SESSION['copre_job_type']=="professional") echo "selected";?>>Professional</option>
	            <option value="self-employed" <?php if($_SESSION['copre_job_type']=="self-employed") echo "selected";?>>Self-Employed</option>
  </select>

</span>
</div>

<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Industry sector:</label>
<select class="form-control" id="copre_industry_sector" name="copre_industry_sector"  >
    <option value="other" <?php if($_SESSION['copre_industry_sector']=="other") echo "selected";?>>Other</option>
	<option value="construction" <?php if($_SESSION['copre_industry_sector']=="construction") echo "selected";?>>Construction</option>
	<option value="government" <?php if($_SESSION['copre_industry_sector']=="government") echo "selected";?>>Government</option>
	<option value="health" <?php if($_SESSION['copre_industry_sector']=="health") echo "selected";?>>Health</option>
	<option value="education" <?php if($_SESSION['copre_industry_sector']=="education") echo "selected";?>>Education</option>
	<option value="hightech" <?php if($_SESSION['copre_industry_sector']=="hightech") echo "selected";?>>High-Tech</option>
	<option value="retail" <?php if($_SESSION['copre_industry_sector']=="retail") echo "selected";?>>Retail Sales</option>
	<option value="leisure" <?php if($_SESSION['copre_industry_sector']=="leisure") echo "selected";?>>Leisure/Entertainment</option>
	<option value="banking" <?php if($_SESSION['copre_industry_sector']=="banking") echo "selected";?>>Banking/Finance</option>
	<option value="transport" <?php if($_SESSION['copre_industry_sector']=="transportation") echo "selected";?>>Transportation</option>
	<option value="services" <?php if($_SESSION['copre_industry_sector']=="services") echo "selected";?> >Services</option>
	<option value="manufacturing" <?php if($_SESSION['copre_industry_sector']=="manufacturing") echo "selected";?>>Manufacturing</option>
	<option value="farming" <?php if($_SESSION['copre_industry_sector']=="farming") echo "selected";?>>Farming/Natural Resources</option>
	<option value="varies" <?php if($_SESSION['copre_industry_sector']=="varies") echo "selected";?>>Varies</option>
  </select>

</span>
<span class="nextto col-sm-5">
<label class="">Income type:</label>
<select class="form-control" id="copre_income_type" name="copre_income_type"  >
    <option value="salary" <?php if($_SESSION['copre_income_type']=="salary") echo "selected";?>>Salary</option>
	<option value="hourly" <?php if($_SESSION['copre_income_type']=="hourly") echo "selected";?>>Hourly</option>
	<option value="hc" <?php if($_SESSION['copre_income_type']=="hc") echo "selected";?>>Hourly +Commissions</option>
	<option value="commission" <?php if($_SESSION['copre_income_type']=="commission") echo "selected";?>>Commissions</option>
	<option value="self-employed" <?php if($_SESSION['copre_income_type']=="self-employed") echo "selected";?>>Self-Employed</option>
	<option value="rental" <?php if($_SESSION['copre_income_type']=="rental") echo "selected";?>>Rental Income</option>
	<option value="other" <?php if($_SESSION['copre_income_type']=="other") echo "selected";?>>Other Employment Income</option>
  </select>

</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>Annual income</label>
<input type="text" id="copre_annual_income" name="copre_annual_income" value="<?php echo $_SESSION['copre_annual_income'];?>"  class="form-control"/>
<span class="error">*<?php echo $_SESSION['copre_annual_incomeErr'];?></span>
</span>
</div>

<div class="form-group col-sm-12" style="margin-top:1cm;">
<span class="col-sm-2 nextto">

<label>Time at job:</label>
</span>

<span class=" nextto col-sm-2" >

<input type="text"  class="form-control" placeholder="year" name="copre_time_at_job_year" id="copre_time_at_job_year" value="<?php echo $_SESSION['copre_time_at_job_year'];?>"  />

</span>

<span class="nextto col-sm-2" style="margin-left:-1cm;" >
<input type="text"  class="form-control" placeholder="month" name="copre_time_at_job_month" id="copre_time_at_job_month" value="<?php echo $_SESSION['copre_time_at_job_month'];?>"  />
</span>
</div>

</div><!-- col sm-6-->
<!--<button type="submit" class="btn btn-success pull-right">next</button>-->
</div>
</form><!--end employment section-->
</div>

<div id="menu3" class="tab-pane fade">
    
	<form id="otherincome" role="form">
	<legend>Other income</legend>
	<div class="col-sm-12">
		<div class="col-sm-6">
		<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Income:</label>
<input type="text" class="form-control" name="other_income_1" id="other_income_1" value="<?php echo $_SESSION['other_income_1'];?>" />
<span class="error">* <?php echo $_SESSION['other_income_1Err'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Description</label>
<input type="text" name="other_description_1" id="other_description_1" class="form-control" value="<?php echo $_SESSION['other_description_1'];?> "/>
<span class="error">* <?php echo $_SESSION['other_description_1Err'];?></span>
</span>
</div>
<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Income:</label>
<input type="text" class="form-control" name="other_income_2" id="other_income_2" value="<?php echo $_SESSION['other_income_2'];?>" />
<span class="error">* <?php echo $_SESSION['other_income_2Err'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Description</label>
<input type="text" name="other_description_2" id="other_description_2" class="form-control" value="<?php echo $_SESSION['other_description_2'];?> "/>
<span class="error">* <?php echo $_SESSION['other_description_2Err'];?></span>
</span>
</div>	
</div><!--end col-sm-6-->
		<div class="col-sm-6">
		<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Income:</label>
<input type="text" class="form-control" name="coother_income_1" id="coother_income_1" value="<?php echo $_SESSION['coother_income_1'];?>" />
<span class="error">* <?php echo $_SESSION['coother_income_1Err'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Description</label>
<input type="text" name="coother_description_1" id="coother_description_1" class="form-control" value="<?php echo $_SESSION['coother_description_1'];?> "/>
<span class="error">* <?php echo $_SESSION['coother_description_1Err'];?></span>
</span>
</div>
<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Income:</label>
<input type="text" class="form-control" name="coother_income_2" id="coother_income_2" value="<?php echo $_SESSION['coother_income_2'];?>" />
<span class="error">* <?php echo $_SESSION['coother_income_2Err'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Description</label>
<input type="text" name="coother_description_2" id="coother_description_2" class="form-control" value="<?php echo $_SESSION['coother_description_2'];?> "/>
<span class="error">* <?php echo $_SESSION['coother_description_2Err'];?></span>
</span>
</div>	
</div>

</div>
	</form>	
</div><!--end co-borrower-->
	
  
  
  
  
  <div id="menu4" class="tab-pane fade">
    
	<!--ASSETS-->
    <form id="otherinfo" role="form">
	
	
		<div  class="form-group col-sm-12" >
		<legend>Assets</legend>
		<div id="assetholder">
		</div>
</div>


  <div style="margin-left:10px;" ><i onclick="tests()" class="fa fa-plus-circle ">Add another asset(maximum is four(4))</i></div>
	<br/>
	<br/>
	
		<div class="form-group col-sm-12">
		<legend>Liability</legend>
		<div id="liabilityholder">
		</div>
  	

</div>


<div><i onclick="test2()" class="fa fa-plus-circle ">Add another liability(maximum is four(4))</i></div>
	<br/>
	<br/>

		<div class="form-group col-sm-12">
	<legend>Properties owned by applicant/co-applicant</legend>	
		<div id="propertyholder">
		</div>
</div>	



		



	
<div><i onclick="test3()" class="fa fa-plus-circle ">Add another property(maximum is four(4))</i></div>	

<br/>
<br/>


		<div class="form-group col-sm-12">
		<legend>New poperty information</legend>	
<span class="nextto col-sm-3">
<label class="">Street number:</label>
<input type="text" class="form-control" name="np_street_number" id="np_street_number" value="<?php echo $_SESSION['np_street_number'];?>" />
<span class="error">* <?php echo $_SESSION['np_street_numberErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">Street name</label>
<input type="text" name="np_street_name" id="np_street_name" class="form-control" value="<?php echo $_SESSION['np_street_name'];?> "/>
<span class="error">* <?php echo $_SESSION['np_street_nameErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">Street type:</label>
<select class="form-control" id="np_street_type" name="np_street_type"  >
    <option value="married"<?php if($_SESSION['np_street_type']=="married") echo "selected";?>>Married</option>
    <option value="single" <?php if($_SESSION['np_street_type']=="single") echo "selected";?>>Single</option>
    <option value="divorced" <?php if($_SESSION['np_street_type']=="divorced") echo "selected";?>>Divorced/separated</option>
    <option value="common" <?php if($_SESSION['np_street_type']=="common") echo "selected";?>>Common Law</option>
    <option value="engaged" <?php if($_SESSION['np_street_type']=="engaged") echo "selected";?>>Engaged</option>
    <option value="widow" <?php if($_SESSION['np_street_type']=="widow") echo "selected";?>>Widowed</option>
  </select>

</span>
<span class="nextto col-sm-3">
<label class="">Street direction:</label>
<select class="form-control" id="np_direction" name="np_direction"  >
    <option value="married"<?php if($_SESSION['np_direction']=="married") echo "selected";?>>Married</option>
    <option value="single" <?php if($_SESSION['np_direction']=="single") echo "selected";?>>Single</option>
    <option value="divorced" <?php if($_SESSION['np_direction']=="divorced") echo "selected";?>>Divorced/separated</option>
    <option value="common" <?php if($_SESSION['np_direction']=="common") echo "selected";?>>Common Law</option>
    <option value="engaged" <?php if($_SESSION['np_direction']=="engaged") echo "selected";?>>Engaged</option>
    <option value="widow" <?php if($_SESSION['np_direction']=="widow") echo "selected";?>>Widowed</option>
  </select>

</span>
<div class="form-group col-sm-12">
<span class="nextto col-sm-3">
<label class="">unit:</label>
<input type="text" name="np_unit" id="np_unit" class="form-control" value="<?php echo $_SESSION['np_unit'];?> "/>
<span class="error">* <?php echo $_SESSION['np_unitErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">city:</label>
<input type="text" name="np_city" id="np_city" class="form-control" value="<?php echo $_SESSION['np_city'];?> "/>
<span class="error">* <?php echo $_SESSION['np_cityErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">Province:</label>
<select class="form-control" id="np_province" name="np_province"  >
    <option value="alberta"<?php if($_SESSION['np_province']=="alberta") echo "selected";?>>Alberta</option>
    <option value="british columbia" <?php if($_SESSION['np_province']=="british columbia") echo "selected";?>>British Columbia</option>
    <option value="manitoba" <?php if($_SESSION['np_province']=="manitoba") echo "selected";?>>Manitoba</option>
    <option value="new brunswick" <?php if($_SESSION['np_province']=="new brunswick") echo "selected";?>>New Brunswick</option>
    <option value="newfoundland" <?php if($_SESSION['np_province']=="newfoundland") echo "selected";?>>NewFoundland & Labrador</option>
    <option value="northwest territories" <?php if($_SESSION['np_province']=="northwest territories") echo "selected";?>>Northwest Territories</option>
	<option value="nova scotia" <?php if($_SESSION['np_province']=="nova scotia") echo "selected";?>>Nova Scotia</option>
    <option value="nunavut" <?php if($_SESSION['np_province']=="nunavut") echo "selected";?>>Nunavut</option>
	<option value="ontario" <?php if($_SESSION['np_province']=="ontario") echo "selected";?>>Ontario</option>
	<option value="prince" <?php if($_SESSION['np_province']=="prince") echo "selected";?>>Prince Edward Island</option>
    <option value="quebec" <?php if($_SESSION['np_province']=="quebec") echo "selected";?>>Quebec</option>
	<option value="Saskatchewan" <?php if($_SESSION['np_province']=="Saskatchewan") echo "selected";?>>Saskatchewan</option>
    <option value="yukon" <?php if($_SESSION['np_province']=="yukon") echo "selected";?>>Yukon</option>
  </select>

</span>
<span class="nextto col-sm-3">
<label class="">postal code:</label>
<input type="text" name="np_postal_code" id="np_postal_code" class="form-control" value="<?php echo $_SESSION['np_postal_code'];?> "/>
<span class="error">* <?php echo $_SESSION['np_postal_codeErr'];?></span>
</span>
</div>
<div class="form-group col-sm-12">
<span class="nextto col-sm-3">
<label class="">year built:</label>
<input type="text" name="np_year_built" id="np_year_built" class="form-control" value="<?php echo $_SESSION['np_year_built'];?> "/>
<span class="error">* <?php echo $_SESSION['np_year_builtErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">occupancy:</label>
<select class="form-control" id="np_occupancy" name="np_occupancy"  >
    <option value="married"<?php if($_SESSION['np_occupancy']=="married") echo "selected";?>>Married</option>
    <option value="single" <?php if($_SESSION['np_occupancy']=="single") echo "selected";?>>Single</option>
    <option value="divorced" <?php if($_SESSION['np_occupancy']=="divorced") echo "selected";?>>Divorced/separated</option>
    <option value="common" <?php if($_SESSION['np_occupancy']=="common") echo "selected";?>>Common Law</option>
    <option value="engaged" <?php if($_SESSION['np_occupancy']=="engaged") echo "selected";?>>Engaged</option>
    <option value="widow" <?php if($_SESSION['np_occupancy']=="widow") echo "selected";?>>Widowed</option>
  </select>

</span>
<span class="nextto col-sm-3">
<label class="">Tenure:</label>
<select class="form-control" id="np_tenure" name="np_tenure"  >
    <option value="married"<?php if($_SESSION['np_tenure']=="married") echo "selected";?>>Married</option>
    <option value="single" <?php if($_SESSION['np_tenure']=="single") echo "selected";?>>Single</option>
    <option value="divorced" <?php if($_SESSION['np_tenure']=="divorced") echo "selected";?>>Divorced/separated</option>
    <option value="common" <?php if($_SESSION['np_tenure']=="common") echo "selected";?>>Common Law</option>
    <option value="engaged" <?php if($_SESSION['np_tenure']=="engaged") echo "selected";?>>Engaged</option>
    <option value="widow" <?php if($_SESSION['np_tenure']=="widow") echo "selected";?>>Widowed</option>
  </select>

</span>
<span class="nextto col-sm-3">
<label class="">Heat type:</label>
<select class="form-control" id="np_heat_type" name="np_heat_type"  >
    <option value="married"<?php if($_SESSION['np_heat_type']=="married") echo "selected";?>>Married</option>
    <option value="single" <?php if($_SESSION['np_heat_type']=="single") echo "selected";?>>Single</option>
    <option value="divorced" <?php if($_SESSION['np_heat_type']=="divorced") echo "selected";?>>Divorced/separated</option>
    <option value="common" <?php if($_SESSION['np_heat_type']=="common") echo "selected";?>>Common Law</option>
    <option value="engaged" <?php if($_SESSION['np_heat_type']=="engaged") echo "selected";?>>Engaged</option>
    <option value="widow" <?php if($_SESSION['np_heat_type']=="widow") echo "selected";?>>Widowed</option>
  </select>

</span>
</div>
<div class="col-sm-12 form-group">
<span class="nextto col-sm-3">
<label class="">Lot size:</label>
<input type="text" class="form-control" name="np_lot_size" id="np_lot_size" value="<?php echo $_SESSION['np_lot_size'];?>" />
<span class="error">* <?php echo $_SESSION['np_lot_sizeErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">style:</label>
<input type="text" class="form-control" name="np_style" id="np_style" value="<?php echo $_SESSION['np_style'];?>" />
<span class="error">* <?php echo $_SESSION['np_styleErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">Type:</label>
<input type="text" class="form-control" name="np_type" id="np_type" value="<?php echo $_SESSION['np_type'];?>" />
<span class="error">* <?php echo $_SESSION['np_typeErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">Garage size:</label>
<input type="text" class="form-control" name="np_garage_size" id="np_garage_size" value="<?php echo $_SESSION['np_garage_size'];?>" />
<span class="error">* <?php echo $_SESSION['np_garage_sizeErr'];?></span>
</span>
</div>
<div class="col-sm-12 form-group">
<span class="nextto col-sm-3">
<label class="">Garage Type:</label>
<input type="text" class="form-control" name="np_garage_type" id="np_garage_type" value="<?php echo $_SESSION['np_garage_type'];?>" />
<span class="error">* <?php echo $_SESSION['np_garage_typeErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">Property age:</label>
<input type="text" class="form-control" name="np_property_age" id="np_property_age" value="<?php echo $_SESSION['np_property_age'];?>" />
<span class="error">* <?php echo $_SESSION['np_property_ageErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">Mls:</label>
<input type="text" class="form-control" name="np_mls" id="np_mls" value="<?php echo $_SESSION['np_mls'];?>" />
<span class="error">* <?php echo $_SESSION['np_mlsErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">Legal description:</label>
<input type="text" class="form-control" name="np_legal_description" id="np_legal_description" value="<?php echo $_SESSION['np_legal_description'];?>" />
<span class="error">* <?php echo $_SESSION['np_legal_descriptionErr'];?></span>
</span>
</div>



	

		<div class="form-group col-sm-12">
		<legend>Property value</legend>	
<span class="nextto col-sm-3">
<label class="">Purchase price:</label>
<input type="text" class="form-control" name="pv_purchase_price" id="pv_purchase_price" value="<?php echo $_SESSION['pv_purchase_price'];?>" />
<span class="error">* <?php echo $_SESSION['pv_purchase_priceErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">Appraised value</label>
<input type="text" name="pv_appraised_value" id="pv_appraised_value" class="form-control" value="<?php echo $_SESSION['pv_appraised_value'];?> "/>
<span class="error">* <?php echo $_SESSION['pv_appraised_valueErr'];?></span>
</span>
</div>







	

		<div class="form-group col-sm-12">
			<legend>Property expenses</legend>	
		<span class="nextto col-sm-3">
<label class="">Annual property taxes:</label>
<input type="text" class="form-control" name="pe_annual_property_taxes" id="pe_annual_property_taxes" value="<?php echo $_SESSION['pe_annual_property_taxes'];?>" />
<span class="error">* <?php echo $_SESSION['pe_annual_property_taxesErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">Monthly condo expense</label>
<input type="text" name="pe_monthly_condo_expense" id="pe_monthly_condo_expense" class="form-control" value="<?php echo $_SESSION['pe_monthly_condo_expense'];?> "/>
<span class="error">* <?php echo $_SESSION['pe_monthly_condo_expenseErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">Monthly rental income:</label>
<input type="text" class="form-control" name="pe_monthly_rental_income" id="pe_monthly_rental_income" value="<?php echo $_SESSION['pe_monthly_rental_income'];?>" />
<span class="error">* <?php echo $_SESSION['pe_monthly_rental_incomeErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">Monthly heating cost:</label>
<input type="text" name="pe_monthly_heating_cost" id="pe_monthly_heating_cost" class="form-control" value="<?php echo $_SESSION['pe_monthly_heating_cost'];?> "/>
<span class="error">* <?php echo $_SESSION['pe_monthly_heating_costErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">Monthly insurance fees:</label>
<input type="text" name="pe_monthly_insurance_fees" id="pe_monthly_insurance_fees" class="form-control" value="<?php echo $_SESSION['pe_monthly_insurance_fees'];?> "/>
<span class="error">* <?php echo $_SESSION['pe_monthly_insurance_feesErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">Rental expenses:</label>
<input type="text" name="pe_rental_expenses" id="pe_rental_expenses" class="form-control" value="<?php echo $_SESSION['pe_rental_expenses'];?> "/>
<span class="error">* <?php echo $_SESSION['pe_rental_expensesErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">Annual repairs:</label>
<input type="text" name="pe_annual_repairs" id="pe_annual_repairs" class="form-control" value="<?php echo $_SESSION['pe_annual_repairs'];?> "/>
<span class="error">* <?php echo $_SESSION['pe_annual_repairsErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">Monthly hydro expenses:</label>
<input type="text" name="pe_monthly_hydro_expenses" id="pe_monthly_hydro_expenses" class="form-control" value="<?php echo $_SESSION['pe_monthly_hydro_expenses'];?> "/>
<span class="error">* <?php echo $_SESSION['pe_monthly_hydro_expensesErr'];?></span>
</span>
</div>



	

		<div class="form-group col-sm-12">
		<legend>Mortgage information</legend>	
		<span class="nextto col-sm-3">
<label class="">Amortization:</label>
<input type="text" class="form-control" name="mi_amortization" id="mi_amortization" value="<?php echo $_SESSION['mi_amortization'];?>" />
<span class="error">* <?php echo $_SESSION['mi_amortizationErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">First time buyer</label>
<input type="text" name="mi_first_time_buyer" id="mi_first_time_buyer" class="form-control" value="<?php echo $_SESSION['mi_first_time_buyer'];?> "/>
<span class="error">* <?php echo $_SESSION['mi_first_time_buyerErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">Closing date:</label>
<input type="text" class="form-control" name="mi_closing_date" id="mi_closing_date" value="<?php echo $_SESSION['mi_closing_date'];?>" />
<span class="error">* <?php echo $_SESSION['mi_closing_dateErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">Payment frequency:</label>
<input type="text" name="mi_payment_frequency" id="mi_payment_frequency" class="form-control" value="<?php echo $_SESSION['mi_payment_frequency'];?> "/>
<span class="error">* <?php echo $_SESSION['mi_payment_frequencyErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">term:</label>
<input type="text" name="mi_term" id="mi_term" class="form-control" value="<?php echo $_SESSION['mi_term'];?> "/>
<span class="error">* <?php echo $_SESSION['mi_termErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">Mortgage amount:</label>
<input type="text" name="mi_mortgage_amount" id="mi_mortgage_amount" class="form-control" value="<?php echo $_SESSION['mi_mortgage_amount'];?> "/>
<span class="error">* <?php echo $_SESSION['mi_mortgage_amountErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">Down payment amount:</label>
<input type="text" name="mi_down_payment_amount" id="mi_down_payment_amount" class="form-control" value="<?php echo $_SESSION['mi_down_payment_amount'];?> "/>
<span class="error">* <?php echo $_SESSION['mi_down_payment_amountErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">Product type:</label>
<input type="text" name="mi_product_type" id="mi_product_type" class="form-control" value="<?php echo $_SESSION['mi_product_type'];?>"/>
<span class="error">* <?php echo $_SESSION['mi_product_typeErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label >Insured</label>
<select id="mi_insured" name="mi_insured" class="form-control">
<option value="">Please select</option>
<option   value="yes">Yes</option>
<option   value="no">No</option>
</select>
</span>
<span class="nextto col-sm-3">
<label class="">insurer:</label>
<input type="text" name="mi_insurer" id="mi_insurer" class="form-control" value="<?php echo $_SESSION['mi_insurer'];?> "/>
<span class="error">* <?php echo $_SESSION['mi_insurerErr'];?></span>
</span>
</div>

<div class="form-group col-sm-12">
<legend>Leave a comment</legend>

<textarea class="form-control" id="mi_comment" name="mi_comment" maxlength="500"  rows=7 type="textarea">

</textarea>


</div>
	<div class="col-sm-12">
	<legend>Consent</legend>
	<p>
	Forshorelending. Privacy Statement
forshorelending LENDING CORP., ("Capital Direct") its employees, agents, or assigns, may collect personal information from me, from loan or debt arrangements I have made with or through you, from credit bureaus, appraisers and other financial institutions, and from the references I have provided you.
Capital Direct may collect, use and disclose my personal information for the following purposes:
<li>To provide me with financial services</li>
<li>To understand my financial needs</li>
<li>To facilitate the offering of third party complimentary products or services</li>
<li>To broker and administer my loan agreements</li>
<li>To develop, manage and deliver products and services to me</li>
<li>To develop and deliver marketing and promotional offers to me</li>
<li>To determine my eligibility for different products and services</li>
<li>To ensure that I receive a high standard of service</li>
<li>To meet regulatory requirements</li>
<li>To manage and transfer the assets and liabilities of Capital Direct and those assets under its administration</li>and
<li>To verify my identity</li>
Forshorelending may provide my personal information to their solicitors, to credit bureaus, to appraisers and investors and, with my consent, to other parties. Capital Direct may share my personal information with its employees, its affiliates and investors, but only as needed for the provision of products and services.
Capital Direct may also use my personal information to introduce products and services that may be of interest to me through contacting me directly (via mail, telephone calls or e-mail only), and share it, (subject to applicable law) for marketing purposes within Capital Direct.
At any time, I can choose to opt-out of receiving direct marketing or sharing my personal information for marketing purposes. To opt-out, I will contact you through 604-430-1498.
 
I have read and agree with the above.

 


	
	</p>
	<label class="checkbox-inline"><input type="checkbox" name="agree1" value="agree" checked>I/we agree</label>

	</div>
	<button class="btn btn-success" type="submit">submit</button>
	</form>
  </div>
  
  
  
  
</div>


</body>

</html>
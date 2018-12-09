<?php 
include_once("account.php");
//include_once("config.php");
//include_once("loanAppController.php");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="direct.js"></script>
<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<style>
fieldset { 
    display: block;
    margin-left: 2px;
    margin-right: 2px;
    padding-top: 0.35em;
    padding-bottom: 0.625em;
    padding-left: 0.75em;
    padding-right: 0.75em;
    border: 2px groove (internal value);
}

	body {
      font: 400 15px Lato, sans-serif;
      line-height: 1.8;
      color: #818181;
  }
  h2 {
      font-size: 24px;
      text-transform: uppercase;
      color: #303030;
      font-weight: 600;
      margin-bottom: 30px;
  }
  h4 {
      font-size: 19px;
      line-height: 1.375em;
      color: #303030;
      font-weight: 400;
      margin-bottom: 30px;
  }  
  .jumbotron {
     /* background-color: #318E31/*#8CD08C;*/
      background:url("Forest-Background.jpg");
	  color: #fff;
      padding: 100px 25px;
      font-family: Montserrat, sans-serif;
  }
  .container-fluid {
      padding: 60px 50px;
  }
  .bg-grey {
      background-color: #f6f6f6;
  }
  .logo-small {
      color: #f4511e;
      font-size: 50px;
  }
  .logo {
      color: #f4511e;
      font-size: 200px;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail img {
      width: 100%;
      height: 100%;
      margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
      background-image: none;
      color: #f4511e;
  }
  .carousel-indicators li {
      border-color: #f4511e;
  }
  .carousel-indicators li.active {
      background-color: #f4511e;
  }
  .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
  }
  .item span {
      font-style: normal;
  }
  .panel {
      border: 1px solid #f4511e; 
      border-radius:0 !important;
      transition: box-shadow 0.5s;
  }
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
      border: 1px solid #f4511e;
      background-color: #fff !important;
      color: #f4511e;
  }
  .panel-heading {
      color: #fff !important;
      background-color: #f4511e !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
  }
  .panel-footer {
      background-color: white !important;
  }
  .panel-footer h3 {
      font-size: 32px;
  }
  .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
  }
  .panel-footer .btn {
      margin: 15px 0;
      background-color: #f4511e;
      color: #fff;
  }
  .navbar {
      margin-bottom: 0;
      background-color: #318E31;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #318E31 !important;
      background-color: #fff !important;
  }
  .dropdown-menu li a{
	  color:#318E31 !important;
  }
  .dropdown-menu li a:hover{
	background-color:#318E31 !important;
	color:#fff !important;	
	  
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
  footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #f4511e;
  }
  .slideanim {visibility:hidden;}
  .slide {
      animation-name: slide;
      -webkit-animation-name: slide;	
      animation-duration: 1s;	
      -webkit-animation-duration: 1s;
      visibility: visible;			
  }
  @keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }	
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
        width: 100%;
        margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
        font-size: 150px;
    }
  }
  legend{color:green;}

span.round-tab {
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: #fff;
    border: 2px solid #318E31;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}
span.round-tab i{
    color:#318E31;
}
span i{
    color:#318E31;
}
.headicon{
	color:#0C0;	
	}
	.show{
		display:block;
		
	}
	.hide{
		display:hidden;
		
	}
	.error{
	color:red;	
		
	}

</style>


<script type='text/javascript'>


function when(a){
var id=a.getAttribute("id");
//alert(id);	
var opts=a.options;
var ans=opts.item(opts.selectedIndex).value;
//alert(ans);
var replace="#w"+id;
if (ans=="yes"){
if($(replace).hasClass("hide")){
$(replace).removeClass("hide");
$(replace).addClass("show");
}
}
else{
if($(replace).hasClass("show")){
$(replace).removeClass("show");
$(replace).addClass("hide");	
	
}	
}	
	
}

function when2(a){
var id=a.getAttribute("id");
//alert(id);	
var opts=a.options;
var ans=opts.item(opts.selectedIndex).value;
//alert(ans);
var replace="#dcollateral";
if (ans=="yes"){
if($(replace).hasClass("hide")){
$(replace).removeClass("hide");
$(replace).addClass("show");
}
}
else{
if($(replace).hasClass("show")){
$(replace).removeClass("show");
$(replace).addClass("hide");	
}	
}	
	
	
}


$(document).ready(function(){
var goahead=true;
$.datepicker.setDefaults({dateFormat:"yy-mm-dd"});

$("#when_own_house").datepicker();						 
$("#when_bankruptcy").datepicker();	
$(window).load(function(){
if($("#own_house").val()=="yes"){
	$("#wown_house").addClass("show");
	
}
if($("#bankruptcy").val()=="yes"){
	$("#wbankruptcy").addClass("show");
	
}
if($("#secured_collateral").val()=="yes"){
	$("#dcollateral").addClass("show");
	
}
	
	
});


$("#loanapp").submit(function(event){
			if(goahead){
			event.preventDefault();
			}
			var form=$(event.target);
			var formtext=$(form).serializeArray();
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
  console.log(o);
	$.ajax({
				   dataType:"text",
				    url:"loaninfoval.php",
				     method:"post",
				   data:{myo:o},
				   success:function(data){
                                        var g=JSON.parse(data);
					console.log(g);
					 $(".error").html("");
					  $("*").removeClass("has-error");
					  	if(g.error=="true"){
					  	
							for (var key in g) {
								if (g.hasOwnProperty(key)) {
								console.log(key);
								var k="#"+key;
								console.log(g[key]);
								$(k).parent().addClass("has-error");
								var hid = document.createTextNode(g[key]);
								$(k).html(hid);
								
								}
							}
						}
						else{
						//alert(g.error);
						goahead=false;
						$(form).submit();
						
						}
						
														
						
					   
				  
				   }
				   			 
						 
	});	 
});				 
						 });

</script>



</head>

<body>
<?php echo $nav;?>
<div class="container-fluid">
	<div class="row">
    <div class="col-sm-12" style="height:100px;">
    </div>
    </div>
    </div>
<div class="container">
	
<form  id="loanapp"  role="form" method="post">

<legend >Loan Application</legend>
  	
    
  
    <div class="form-group ">
	<span class="col-sm-6">
    <span class="col-sm-12">
	<label class=""  for="debt_management">Are you currently enrolled in a debt Management program?</label>
    <select class="form-control" name="debt_management" id="debt_management">
	<option value="" >Please select</option>
	<option value="yes" <?php if($_SESSION['debt_management']=="yes") echo "selected";?>>Yes</option>
	<option value="no" <?php if($_SESSION['debt_management']=="no") echo "selected";?>>No</option>
</select>	
   <span  class="error" id="debt_managementErr" >* </span>
  </span>
  <span class="col-sm-12">
  <label >Do you currently have any outstanding payday loans?</label>
    <select class="form-control" name="payday_loans" id="payday_loans">
	<option value="" >Please select</option>
	<option value="yes" <?php if($_SESSION['payday_loans']=="yes") echo "selected";?>>Yes</option>
	<option value="no" <?php if($_SESSION['payday_loans']=="no") echo "selected";?>>No</option>
</select>	
   <span  class="error" id="payday_loansErr">* </span>
  </span>
  </span>
   <span class="col-sm-6">
   <span class="col-sm-12">
   <label >Do you own a house?</label>
   <select name="own_house" onchange="when(this)" id="own_house" class="form-control">
   <option value=""></option>
    <option value="yes"  <?php if($_SESSION['own_house']=="yes") echo "selected";?>>Yes</option>
	<option value="no"  <?php if($_SESSION['own_house']=="no") echo "selected";?>>No</option>
    </select>
   <span class="error" id='own_houseErr'>* </span>
	</span>
   <span id="wown_house" class="col-sm-12 hide"> 
   <label>When did you purchase your house?</label>>
  	<input type="text" class="form-control" placeholder="when? enter a date" name="when_own_house" id="when_own_house" value="<?php echo $_SESSION['when_own_house'];?>"/><span class="error" id="when_own_houseErr">* </span>
	</span>
	
 
    <span class="col-sm-12">
   <label >Have you filed bankruptcy this past seven years</label>
   <select onchange="when(this)" name="bankruptcy" id="bankruptcy" class="form-control">
    <option value=""></option>
	<option value="yes"  <?php if($_SESSION['bankruptcy']=="yes") echo "selected";?>>yes</option>
	<option value="no"  <?php if($_SESSION['bankruptcy']=="no") echo "selected";?>>no</option>
    </select>
   <span class="error" id="bankruptcyErr">* </span>
	</span>
	<span id="wbankruptcy" class="col-sm-12 hide">
    <label>When did you file for bankruptcy?</label>
  	<input type="text" class="form-control" placeholder="when? Enter a date.." name="when_bankruptcy" id="when_bankruptcy" value="<?php echo $_SESSION['when_bankruptcy'];?>"/><span class="error" id="when_bankruptcyErr">* </span>
	</span>
  
  </span>
  </div>
  
   
  
   
  
   
   
  
   
  
    <div class="form-group">
  <legend>1.Type and loan_terms of Loan (* This loan may have a higher cost than other forms of credit)</legend>
  <span class="col-sm-6">
  <span class="col-sm-12">
  <label >Amount requested:</label>
        <input type="text" class="form-control" name="amount_requested" id="amount_requested" placeholder="xx.xx" value="<?php echo $_SESSION['amount_requested'];?>" />
   <span class="error" id="amount_requestedErr">* </span>
        </span>
		<span class="col-sm-12">
  		<label >purpose of loan:</label>
		<input type="text" id="loan_purpose" name="loan_purpose" class="form-control" placeholder="purpose of loan" value="<?php echo $_SESSION['loan_purpose'];?>">
   <span class="error" id="loan_purposeErr">* </span>
      </span>  
 	  </span>
    <span class="col-sm-6">
	<span class="col-sm-12">
	<label class="">term of loan requested:</label>
  	<input type="text" id="loan_term" name="loan_term" class="form-control" placeholder="Min:14 days, Max 28 days" value="<?php echo $_SESSION['loan_term'];?>">
   <span class="error" id='loan_termErr'>* </span>
    </span>
	<span class="col-sm-12">
	<label class=""  for="secured_collateral">To be secured by collateral?</label>
	<select name="secured_collateral" id="secured_collateral" class="form-control" onchange="when2(this)">	
	 
     <option value="yes" <?php if (isset($_SESSION['secured_collateral']) && $_SESSION['secured_collateral']=="yes") echo "selected";?>>Yes</option>
     <option value="no" <?php if (isset($_SESSION['secured_collateral']) && $_SESSION['secured_collateral']=="no") echo "selected";?> >No</option>
	 </select>
   <span class="error" id='secured_collateralErr'>* </span>
   </span>
    <span class="col-sm-12 hide" id="dcollateral">
    <label>Describe your collateral</label>
    <input   type="text"  class="form-control" placeholder="If yes, describe" name="describe_collateral" id="describe_collateral" value="<?php echo $_SESSION['describe_collateral'];?>"/><span class="error" id="describe_collateralErr">*</span>
  </span>
  
  </span>
  
  </div>
  
  
  
  
  
  
  <div class="form-group">
	<legend>Borrower Information</legend>
  <span class="col-sm-6">
  <span class="col-sm-12">
  <label >FirstName:</label>
  <input class="form-control" type="text" id="firstname" name="firstname"  value="<?php echo $_SESSION['firstname'];?>" />
   <span class="error" id='firstnameErr'>* </span>
 </span>
 <span class="col-sm-12">
  <label >Email:</label>
   <input class="form-control" type="text" id="applicant_email" name="applicant_email"  value="<?php echo $_SESSION['applicant_email'];?>" />
   <span class="error" id="applicant_emailErr">* </span>
 </span>
    <span class="col-sm-12">
  	<label >address:</label>
    <input class="form-control" type="text" name="applicant_address"  value="<?php echo $_SESSION['applicant_address'];?>" />
   <span class="error" id="applicant_addressErr">* </span>
  </span>
  <span class="col-sm-12">
  	<label>city:</label>
    <input class="form-control" type="text" name="applicant_city" id="applicant_city" value="<?php echo $_SESSION['applicant_city'];?>" />
   <span class="error" id="applicant_cityErr">* </span>
  </span>
  </span>
   <span class="col-sm-6">
   <span class="col-sm-12">
   <label>LastName</label>
   <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $_SESSION['lastname'];?>">
   <span class="error" id="lastnameErr">* </span>
   </span>
   <span class="col-sm-12">
  	<label class="">Province:</label>
<select class="form-control" id="applicant_province" name="applicant_province"  >
    <option value="">select a province</option>
    <option value="alberta"<?php if($_SESSION['applicant_province']=="alberta") echo "selected";?>>Alberta</option>
    <option value="british columbia" <?php if($_SESSION['applicant_province']=="british columbia") echo "selected";?>>British Columbia</option>
    <option value="manitoba" <?php if($_SESSION['applicant_province']=="manitoba") echo "selected";?>>Manitoba</option>
    <option value="new brunswick" <?php if($_SESSION['applicant_province']=="new brunswick") echo "selected";?>>New Brunswick</option>
    <option value="newfoundland" <?php if($_SESSION['applicant_province']=="newfoundland") echo "selected";?>>NewFoundland & Labrador</option>
    <option value="northwest territories" <?php if($_SESSION['applicant_province']=="northwest territories") echo "selected";?>>Northwest Territories</option>
	<option value="nova scotia" <?php if($_SESSION['applicant_province']=="nova scotia") echo "selected";?>>Nova Scotia</option>
    <option value="nunavut" <?php if($_SESSION['applicant_province']=="nunavut") echo "selected";?>>Nunavut</option>
	<option value="ontario" <?php if($_SESSION['applicant_province']=="ontario") echo "selected";?>>Ontario</option>
	<option value="prince" <?php if($_SESSION['applicant_province']=="prince") echo "selected";?>>Prince Edward Island</option>
    <option value="quebec" <?php if($_SESSION['applicant_province']=="quebec") echo "selected";?>>Quebec</option>
	<option value="Saskatchewan" <?php if($_SESSION['applicant_province']=="Saskatchewan") echo "selected";?>>Saskatchewan</option>
    <option value="yukon" <?php if($_SESSION['applicant_province']=="yukon") echo "selected";?>>Yukon</option>
  </select>
   <span class="error" id="applicant_provinceErr">* </span>
  </span>
  <span class="col-sm-12">
  <label>Postal Code:</label>
   <input class="form-control" type="text" name="applicant_postal_code" id="applicant_postal_code" value="<?php echo $_SESSION['applicant_postal_code'];?>" />
   <span class="error" id="applicant_postal_codeErr">* </span>
  </span>
  <span class="col-sm-6">
  	<label >Home phone:</label>
    <input class="form-control" type="text" name="applicant_home_phone" id="applicant_home_phone" value="<?php echo $_SESSION['applicant_home_phone'];?>" />
   <span class="error" id="applicant_home_phoneErr">* </span>
  	</span>
	<span class="col-sm-6">
	<label>Cell phone:</label>
  <input class="form-control" type="text" name="applicant_cell_phone" id="applicant_cell_phone" value="<?php echo $_SESSION['applicant_cell_phone'];?>" />
   
  </span>
 </span>
    </div>
  
 
  <br />
  <br />
  <div class="form-group">
 <legend>Employment Information</legend>
   <span class="col-sm-6">
  	<span class="col-sm-6">
	<label >Employed by:</label>
    <input type="text" class="form-control"  name="employed_by" id="employed_by" value="<?php echo $_SESSION['employed_by'];?>" />
   
     </span>
	 <span class="col-sm-6">
		<label>Position:</label>
    <input type="text" class="form-control"  name="applicant_position" id="applicant_position" value="<?php echo $_SESSION['applicant_position'];?>" />
  
  
  </span>  
   <span class="col-sm-12">
  	<label>How long:</label>
	</span>
    <span class="col-sm-6">
    <input type="text" class="form-control" placeholder="years"  name="years_employed" id="years_employed" value="<?php echo $_SESSION['years_employed'];?>" />
   
    </span>
    <span class="col-sm-6">
    <input type="text" class="form-control" placeholder="months" name="months_employed" id="months_employed" value="<?php echo $_SESSION['months_employed'];?>" />
  
	</span>

<span class="col-sm-6">
  	<label >Montly salary:</label>
  <input type="text" class="form-control"  name="monthly_salary" id="monthly_salary" value="<?php echo $_SESSION['monthly_salary'];?>" />
   
    </span>
	<span class="col-sm-6"> 
  	<label>Business phone:</label>
  	  <input class="form-control" type="text"name="business_phone" id="business_phone" value="<?php echo $_SESSION['business_phone'];?>" />
   
  </span>
  
	</span>
    <span class="col-sm-6">
  	<span class="col-sm-6">
	<label>address:</label>
  <input class="form-control" type="text" name="business_address" id="business_address" value="<?php echo $_SESSION['business_address'];?>" />
   
  </span>
   <span class="col-sm-6">
  	<label >city:</label>
    <input class="form-control" type="text" name="business_city" id="business_city" value="<?php echo $_SESSION['business_city'];?>" />
  
    </span>
    <span class="col-sm-6">
  	<label class="">Province:</label>
<select class="form-control" id="business_province" name="business_province"  >
    <option value="">select a province</option>
    <option value="alberta"<?php if($_SESSION['business_province']=="alberta") echo "selected";?>>Alberta</option>
    <option value="british columbia" <?php if($_SESSION['business_province']=="british columbia") echo "selected";?>>British Columbia</option>
    <option value="manitoba" <?php if($_SESSION['business_province']=="manitoba") echo "selected";?>>Manitoba</option>
    <option value="new brunswick" <?php if($_SESSION['business_province']=="new brunswick") echo "selected";?>>New Brunswick</option>
    <option value="newfoundland" <?php if($_SESSION['business_province']=="newfoundland") echo "selected";?>>NewFoundland & Labrador</option>
    <option value="northwest territories" <?php if($_SESSION['business_province']=="northwest territories") echo "selected";?>>Northwest Territories</option>
	<option value="nova scotia" <?php if($_SESSION['business_province']=="nova scotia") echo "selected";?>>Nova Scotia</option>
    <option value="nunavut" <?php if($_SESSION['business_province']=="nunavut") echo "selected";?>>Nunavut</option>
	<option value="ontario" <?php if($_SESSION['business_province']=="ontario") echo "selected";?>>Ontario</option>
	<option value="prince" <?php if($_SESSION['business_province']=="prince") echo "selected";?>>Prince Edward Island</option>
    <option value="quebec" <?php if($_SESSION['business_province']=="quebec") echo "selected";?>>Quebec</option>
	<option value="Saskatchewan" <?php if($_SESSION['business_province']=="Saskatchewan") echo "selected";?>>Saskatchewan</option>
    <option value="yukon" <?php if($_SESSION['business_province']=="yukon") echo "selected";?>>Yukon</option>
  </select>
  
    </span>
	<span class="col-sm-6">
  	<label>Postal Code:</label>
  <input class="form-control" type="text" name="business_postal_code" id="business_postal_code" value="<?php echo $_SESSION['business_postal_code'];?>" />
    </span>   
	<span class="col-sm-6">
   	<label>Website:</label>
  <input class="form-control" type="text" name="business_website" id="business_website" value="<?php echo $_SESSION['business_website'];?>" />
   
    </span>
  	
</div>	
  
 <br />
 <br />
  
  
  
  <div class="form-group">
 <legend>References</legend>
<span class="col-sm-6">
<span class="col-sm-12"> 
  <label>Name of relative not living with you:</label>
 <input type="text"  class="form-control" name="relative_name" id="relative_name" value="<?php echo $_SESSION['relative_name'];?>" />
   <span class="error" id="relative_nameErr">* </span> 
  </span>   
  <span class="col-sm-6">
    <label>address</label>
    <input type="text"  class="form-control"  name="relative_address" id="relative_address" value="<?php echo $_SESSION['relative_address'];?>" />
   <span class="error" id="relative_addressErr">* </span>
   </span>
   <span class="col-sm-6">
   <label>city:</label>
    <input class="form-control" type="text" name="relative_city" id="relative_city" value="<?php echo $_SESSION['relative_city'];?>" />
   <span class="error" id="relative_cityErr">* </span>
    </span>
   </span>
    
  <span class="col-sm-6">
  	
    <span class="col-sm-12">
	<label>Relationship:</label>	
  <input type="text"  class="form-control"  name="relative_relation" id="relative_relation" value="<?php echo $_SESSION['relative_relation'];?>" />
   <span class="error" id="relative_relationErr">* </span>
	</span>
	<span class="col-sm-6">
    <label class="">Province:</label>
<select class="form-control" id="relative_province" name="relative_province"  >
    <option value="">select a province</option>
    <option value="alberta"<?php if($_SESSION['relative_province']=="alberta") echo "selected";?>>Alberta</option>
    <option value="british columbia" <?php if($_SESSION['relative_province']=="british columbia") echo "selected";?>>British Columbia</option>
    <option value="manitoba" <?php if($_SESSION['relative_province']=="manitoba") echo "selected";?>>Manitoba</option>
    <option value="new brunswick" <?php if($_SESSION['relative_province']=="new brunswick") echo "selected";?>>New Brunswick</option>
    <option value="newfoundland" <?php if($_SESSION['relative_province']=="newfoundland") echo "selected";?>>NewFoundland & Labrador</option>
    <option value="northwest territories" <?php if($_SESSION['relative_province']=="northwest territories") echo "selected";?>>Northwest Territories</option>
	<option value="nova scotia" <?php if($_SESSION['relative_province']=="nova scotia") echo "selected";?>>Nova Scotia</option>
    <option value="nunavut" <?php if($_SESSION['relative_province']=="nunavut") echo "selected";?>>Nunavut</option>
	<option value="ontario" <?php if($_SESSION['relative_province']=="ontario") echo "selected";?>>Ontario</option>
	<option value="prince" <?php if($_SESSION['relative_province']=="prince") echo "selected";?>>Prince Edward Island</option>
    <option value="quebec" <?php if($_SESSION['relative_province']=="quebec") echo "selected";?>>Quebec</option>
	<option value="Saskatchewan" <?php if($_SESSION['relative_province']=="Saskatchewan") echo "selected";?>>Saskatchewan</option>
    <option value="yukon" <?php if($_SESSION['relative_province']=="yukon") echo "selected";?>>Yukon</option>
  </select>
   <span class="error" id="relative_provinceErr">* </span>
    </span>
		<span class="col-sm-6">
	<label>phone</label> 	
  <input type="text"  class="form-control" name="relative_phone" id="relative_phone" value="<?php echo $_SESSION['relative_phone'];?>" />
   
    </span>
</span>
</div> 	
  
  <br />
  <div class="form-group">
 <legend>References</legend>
<span class="col-sm-6">
<span class="col-sm-12"> 
  <label>Name of relative not living with you:</label>
 <input type="text"  class="form-control" name="relative_name2" id="relative_name2" value="<?php echo $_SESSION['relative_name2'];?>" />
   <span class="error" id="relative_name2Err">* </span> 
  </span>   
  <span class="col-sm-6">
    <label>address</label>
    <input type="text"  class="form-control"  name="relative_address2" id="relative_address2" value="<?php echo $_SESSION['relative_address2'];?>" />
   <span class="error" id="relative_address2Err">*</span>
   </span>
   <span class="col-sm-6">
   <label>city:</label>
    <input class="form-control" type="text" name="relative_city2" id="relative_city2" value="<?php echo $_SESSION['relative_city2'];?>" />
   <span class="error" id="relative_city2Err">* </span>
    </span>
   </span>
    
  <span class="col-sm-6">
  	
    <span class="col-sm-12">
	<label>Relationship:</label>	
  <input type="text"  class="form-control"  name="relative_relation2" id="relative_relation2" value="<?php echo $_SESSION['relative_relation2'];?>" />
   <span class="error" id="relative_relation2Err">* </span>
	</span>
	<span class="col-sm-6">
    <label class="">Province:</label>
<select class="form-control" id="relative_province2" name="relative_province2"  >
    <option value="">select a province</option>
    <option value="alberta"<?php if($_SESSION['relative_province2']=="alberta") echo "selected";?>>Alberta</option>
    <option value="british columbia" <?php if($_SESSION['relative_province2']=="british columbia") echo "selected";?>>British Columbia</option>
    <option value="manitoba" <?php if($_SESSION['relative_province2']=="manitoba") echo "selected";?>>Manitoba</option>
    <option value="new brunswick" <?php if($_SESSION['relative_province2']=="new brunswick") echo "selected";?>>New Brunswick</option>
    <option value="newfoundland" <?php if($_SESSION['relative_province2']=="newfoundland") echo "selected";?>>NewFoundland & Labrador</option>
    <option value="northwest territories" <?php if($_SESSION['relative_province2']=="northwest territories") echo "selected";?>>Northwest Territories</option>
	<option value="nova scotia" <?php if($_SESSION['relative_province2']=="nova scotia") echo "selected";?>>Nova Scotia</option>
    <option value="nunavut" <?php if($_SESSION['relative_province2']=="nunavut") echo "selected";?>>Nunavut</option>
	<option value="ontario" <?php if($_SESSION['relative_province2']=="ontario") echo "selected";?>>Ontario</option>
	<option value="prince" <?php if($_SESSION['relative_province2']=="prince") echo "selected";?>>Prince Edward Island</option>
    <option value="quebec" <?php if($_SESSION['relative_province2']=="quebec") echo "selected";?>>Quebec</option>
	<option value="Saskatchewan" <?php if($_SESSION['relative_province2']=="Saskatchewan") echo "selected";?>>Saskatchewan</option>
    <option value="yukon" <?php if($_SESSION['relative_province2']=="yukon") echo "selected";?>>Yukon</option>
  </select>
   <span class="error" id="relative_province2Err">* </span>
    </span>
		<span class="col-sm-6">
	<label>phone</label> 	
  <input type="text"  class="form-control" name="relative_phone2" id="relative_phone2" value="<?php echo $_SESSION['relative_phone2'];?>" />
   
    </span>
</span>
</div> 	`	
<br />
<br />
<br />  
  
  <div class="form-group">
  	<h4 class="form-control-static" style="color:red;">
    Please be prepared to provide: (All items ARE required for approval)
</h4>
<ul>
<li> Copy of most recent Bank account statement, showing all transactions for 3 Full
    months_employed</li>
    <li> Copy of a most recent Pay Stub-showing your regular wages and hours of work.
</li>
<li>Copy of a most recent utility/phone bill showing your current applicant_address</li>
<li> Copy of your Drivers License</li>
</ul>
  
  </div>
  
  
  
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>


</form>
</div>
<button onclick="h()">fff</button>
<script>
function h(){
	//var printContents = $("#loanapp").html();
 		//alert(printContents);
		//w=window.open();
 		//w.document.write(printContents);
 		window.print();
 		w.close();
	
	
	
	
}
function g(){
	var x = document.getElementById("loanapp").elements.length;
	alert(x);
}
</script>


</body>
</html>
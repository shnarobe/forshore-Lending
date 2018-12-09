<?php
//session_start();

require("account_admin.php");

if(!logged_in()){
header("Location:admin.php");
	exit();
}
/*$debt_managementErr = $payday_loansErr = $own_houseErr = $when_houseErr = $bankruptcyErr = $when_bankruptcyErr = $amount_requestedErr = $loan_purposeErr = $loan_termErr = $secured_collateralErr = $describe_collateralErr = "";
$nameErr=$emailErr=$applicant_addressErr = $applicant_cityErr = $applicant_provinceErr = $applicant_postalcodeErr = $applicant_home_phoneErr = $applicant_cell_phoneErr = $employed_byErr = $positionErr =$years_employedErr = $months_employedErr=$monthly_salaryErr=$business_addressErr = $business_cityErr = $business_provinceErr = $business_postalcodeErr = $business_phoneErr = $websiteErr = $relative_nameErr = $relative_relationErr = $relative_addressErr = $relative_cityErr = $relative_provinceErr = $relative_phoneErr = $relative_name_2Err = $relative_relation_2Err = $relative_address_2Err = $relative_city_2Err = $relative_province_2Err = $relative_phone_2Err ="";



$debt_management = $payday_loans = $own_house = $when_house = $bankruptcy = $when_bankruptcy = $amount_requested = $loan_purpose = $loan_term = $secured_collateral = $describe_collateral = "";
$name=$email=$applicant_address = $applicant_city = $applicant_province = $applicant_postalcode = $applicant_home_phone = $applicant_cell_phone = $employed_by = $position =$years_employed = $months_employed=$monthly_salary=$business_address = $business_city = $business_province = $business_postalcode = $business_phone = $website = $relative_name = $relative_relation = $relative_address = $relative_city = $relative_province = $relative_phone = $relative_name_2 = $relative_relation_2 = $relative_address_2 = $relative_city_2 = $relative_province_2 = $relative_phone_2 ="";

*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="helper.js" type="text/javascript"></script>
<link rel="stylesheet" href="scripts/bootstrap.min.css">

<!-- jQuery library -->
<script src="scripts/jquery.min.js"></script>

 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
<!-- Latest compiled JavaScript -->
<script src="scripts/bootstrap.min.js"></script>
<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" relative_relation="stylesheet">
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<style>
.conceal{
display:none;	
	
}
.reveal{
display:block;	
	
}

</style>
<script>
function printLoan(loanid){
	var l=parseInt(loanid);
	var ff=document.getElementById("loanapp").reset();
	if($("#loanholder").hasClass("conceal")){
	$("#loanholder").removeClass("conceal");
	}
	if(!$("#holder2").hasClass("conceal")){
	$("#holder2").addClass("conceal");
	}
	$.ajax({
    url: 'loanAppController.php',
    method: 'post',
	dataType:"text",
    data: {action:"viewloan",loan:l},
    success: function(data) {
    console.log(data);
    
	var dat="";
	dat=JSON.parse(data);
	//console.log(dat);
	for (var key in dat) {
	if (dat.hasOwnProperty(key)) {
	console.log(key+" "+dat[key]);
	var k="#"+key;
	$(k).attr("value",dat[key]);							
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
	
	var comm=$("#loan_comment").attr("value");
	$("#loan_comment").html(comm);
	
		
		$("#topmost").hide();
 		window.print();
 		$("#topmost").show();
	
		}
		
		   });
	
	
		//var printContents = $("#loanapp").html();
 		//alert(printContents);
		//w=window.open();
 		//w.document.write(printContents);
 			
}
function deleteselect(){
	var f=document.getElementsByName("loanselect[]");
	var ar=[];
	//console.log(f.length);
				for(var u=0;u<f.length;u++){
				//console.log("<br/>");
				
				if(f[u].checked==true){
				ar.push(f[u].value);
				
				}
				}
			if(ar.length!=0){
				$.ajax({
				url: 'loanAppController.php',
				method: 'post',
				dataType:"text",
				data: {action:"deletemultiple",loanselect:ar},
				success: function(data) {
				alert(data);
				location.reload();
				}
			});
			}
			else{
				alert("Please make a selection");
				return;
			}
	
	

}
	
	
	

</script>
</head>

<body onload="viewAll()">
<?php echo $nav;?>
<?php if(logged_in()):?>
<div class="container-fluid" id="topmost">
<div class="row">
<div class="col-lg-2">
<button data-h="viewloans" id="viewloans" onclick="viewAll()" class="btn btn-info">view all loans</button>
<button data-h="deleteselect" id="deleteselect" onclick="deleteselect()" class="btn btn-danger">Delete</button>
</div>
<div id="holder" class="col-lg-11">
</div>
</div>
</div>


<div id="loanholder" class="container conceal">
	
        
        
<form  id="loanapp"  role="form" >

<h2 >Loan Application</h2>
  	
    
  
   
	<div class="form-group">
	<label class=""  for="debt_management">Are you currently enrolled in a debt Management program?</label>
    <select class="form-control" name="debt_management" id="debt_management" readonly>
	<option value="" >Please select</option>
	<option value="yes" >Yes</option>
	<option value="no" >No</option>
	</select>	
   </div>
	
	<div class="form-group">
	<label >Do you currently have any outstanding payday loans?</label>
    <select class="form-control" name="payday_loans" id="payday_loans" readonly>
	<option value="" >Please select</option>
	<option value="yes" >Yes</option>
	<option value="no" >No</option>
	</select>	
     </div>
   
  <div class="form-group">
   <label >Do you own a house?</label>
   <select name="own_house" onchange="when(this)" id="own_house" class="form-control" readonly>
   <option value=""></option>
    <option value="yes"  >Yes</option>
	<option value="no" >No</option>
    </select>
   	</div>
   
   <div class="form-group">
   <label>When did you purchase your house?</label>>
  	<input readonly type="text" class="form-control" placeholder="when? enter a date" name="when_own_house" id="when_own_house" value="" readonly> 
	</div>
	
 
   <div class="form-group">
   <label >Have you filed bankruptcy this past seven years</label>
   <select onchange="when(this)" name="bankruptcy" id="bankruptcy" class="form-control" readonly>
    <option value=""></option>
	<option value="yes"  >yes</option>
	<option value="no"  >no</option>
    </select>
   	</div>
	
	<div class="form-group">
    <label>When did you file for bankruptcy?</label>
  	<input readonly type="text" class="form-control" placeholder="when? Enter a date.." name="when_bankruptcy" id="when_bankruptcy" value="" readonly>
	</div>
  
  
  
   
  
   
  
   
   
  
   
  
    
  <h3>1.Type and loan_terms of Loan (* This loan may have a higher cost than other forms of credit)</h3>
  
 <div class="form-group">
  <label >Amount requested:</label>
        <input readonly type="text" class="form-control" name="amount_requested" id="amount_requested" placeholder="xx.xx" value="" />
          </div>
	
	<div class="form-group">
  		<label >purpose of loan:</label>
		<input readonly type="text" id="loan_purpose" name="loan_purpose" class="form-control" placeholder="purpose of loan" value="">
        </div>  
 	
	<div class="form-group">
	<label class="">term of loan requested:</label>
  	<input readonly type="text" id="loan_term" name="loan_term" class="form-control" placeholder="Min:14 days, Max 28 days" value="">
       </div>
	
	<div class="form-group">
	<label class=""  for="secured_collateral">To be secured by collateral?</label>
	<select name="secured_collateral" id="secured_collateral" class="form-control" onchange="when2(this)" readonly>	
	 
     <option value="yes" >Yes</option>
     <option value="no" >No</option>
	 </select>
      </div>
   
   <div class="form-group">
    <label>Describe your collateral</label>
    <input readonly   type="text"  class="form-control" placeholder="If yes, describe" name="describe_collateral" id="describe_collateral" value=""/>
  </div>
  
   
  
  
	<h3>Borrower Information</h3>
  
 <div class="form-group">
  <label >FirstName:</label>
  <input readonly class="form-control" type="text" id="firstname" name="firstname"  value="" />
  </div>
  
<div class="form-group">
  <label >Email:</label>
   <input readonly class="form-control" type="text" id="applicant_email" name="applicant_email"  value="" />
   </div> 
   <div class="form-group">
  	<label >address:</label>
    <input readonly class="form-control" type="text" name="applicant_address"  value="" />
     </div>
 
 <div class="form-group">
  	<label>city:</label>
    <input readonly class="form-control" type="text" name="applicant_city" id="applicant_city" value="" />
     </div>
     
  <div class="form-group">
   <label>LastName</label>
   <input readonly type="text" class="form-control" id="lastname" name="lastname" value="">
      </div>
  
  <div class="form-group">
  	<label class="">Province:</label>
<select class="form-control" id="applicant_province" name="applicant_province" readonly >
    <option value="">select a province</option>
    <option value="alberta">Alberta</option>
    <option value="british columbia" >British Columbia</option>
    <option value="manitoba" >Manitoba</option>
    <option value="new brunswick" >New Brunswick</option>
    <option value="newfoundland" >NewFoundland & Labrador</option>
    <option value="northwest territories" >Northwest Territories</option>
	<option value="nova scotia" >Nova Scotia</option>
    <option value="nunavut" >Nunavut</option>
	<option value="ontario" >Ontario</option>
	<option value="prince" >Prince Edward Island</option>
    <option value="quebec" >Quebec</option>
	<option value="Saskatchewan" >Saskatchewan</option>
    <option value="yukon" >Yukon</option>
  </select>
     </div>
 
 <div class="form-group">
  <label>Postal Code:</label>
   <input readonly class="form-control" type="text" name="applicant_postal_code" id="applicant_postal_code" value="" />
    </div>
  
	<div class="form-group">
  	<label >Home phone:</label>
    <input readonly class="form-control" type="text" name="applicant_home_phone" id="applicant_home_phone" value="" />
   	</div>
	
	<div class="form-group">
	<label>Cell phone:</label>
  <input readonly class="form-control" type="text" name="applicant_cell_phone" id="applicant_cell_phone" value="" />
     </div>
  
 
 
  
 <h3>Employment Information</h3>
   
  	<div class="form-group">
	<label >Employed by:</label>
    <input readonly type="text" class="form-control"  name="employed_by" id="employed_by" value="" />
     </div>
	
	<div class="form-group">	
	<label>Position:</label>
    <input readonly type="text" class="form-control"  name="applicant_position" id="applicant_position" value="" />
    </div>  
  
	<div class="form-group">
  	<label>How long:</label>
	<input readonly type="text" class="form-control" placeholder="years"  name="years_employed" id="years_employed" value="" />
    </div>
   <div class="form-group">
	<label>months</label>
    <input readonly type="text" class="form-control" placeholder="months" name="months_employed" id="months_employed" value="" />
  	</div>

	<div class="form-group">
  	<label >Montly salary:</label>
  <input readonly type="text" class="form-control"  name="monthly_salary" id="monthly_salary" value="" />
    </div>
	
	<div class="form-group">	
  	<label>Business phone:</label>
  	  <input readonly class="form-control" type="text"name="business_phone" id="business_phone" value="" />
     </div>
  
	<div class="form-group">  	
	<label>address:</label>
  <input readonly class="form-control" type="text" name="business_address" id="business_address" value="" />
    </div>
   
  	<div class="form-group">
	<label >city:</label>
    <input readonly class="form-control" type="text" name="business_city" id="business_city" value="" />
    </div>
  
	<div class="form-group">
  	<label class="">Province:</label>
	<select class="form-control" id="business_province" name="business_province" readonly >
    <option value="">select a province</option>
    <option value="alberta">Alberta</option>
    <option value="british columbia" >British Columbia</option>
    <option value="manitoba" >Manitoba</option>
    <option value="new brunswick" >New Brunswick</option>
    <option value="newfoundland" >NewFoundland & Labrador</option>
    <option value="northwest territories" >Northwest Territories</option>
	<option value="nova scotia" >Nova Scotia</option>
    <option value="nunavut" >Nunavut</option>
	<option value="ontario" >Ontario</option>
	<option value="prince" >Prince Edward Island</option>
    <option value="quebec" >Quebec</option>
	<option value="Saskatchewan">Saskatchewan</option>
    <option value="yukon" >Yukon</option>
  </select>
      </div>
	
	<div class="form-group">
  	<label>Postal Code:</label>
	<input readonly class="form-control" type="text" name="business_postal_code" id="business_postal_code" value="" />
    </div>   
	
	<div class="form-group">
   	<label>Website:</label>
	<input readonly class="form-control" type="text" name="business_website" id="business_website" value="" />
    </div>
  	
	<legend>References</legend>
	<div class="form-group">
	<label>Name of relative not living with you:</label>
	<input readonly type="text"  class="form-control" name="relative_name" id="relative_name" value="" />
	</div>   
  
    <div class="form-group">
	<label>address</label>
    <input readonly type="text"  class="form-control"  name="relative_address" id="relative_address" value="" />
    </div>
   
   <div class="form-group">
   <label>city:</label>
    <input readonly class="form-control" type="text" name="relative_city" id="relative_city" value="" />
    </div>
   
    
   	
   <div class="form-group">
	<label>Relationship:</label>	
	<input readonly type="text"  class="form-control"  name="relative_relation" id="relative_relation" value="" />
   	</div>
	
	<div class="form-group">
    <label class="">Province:</label>
	<select class="form-control" id="relative_province" name="relative_province" readonly>
    <option value="">select a province</option>
    <option value="alberta">Alberta</option>
    <option value="british columbia" >British Columbia</option>
    <option value="manitoba" >Manitoba</option>
    <option value="new brunswick" >New Brunswick</option>
    <option value="newfoundland" >NewFoundland & Labrador</option>
    <option value="northwest territories" >Northwest Territories</option>
	<option value="nova scotia" >Nova Scotia</option>
    <option value="nunavut" >Nunavut</option>
	<option value="ontario">Ontario</option>
	<option value="prince" >Prince Edward Island</option>
    <option value="quebec">Quebec</option>
	<option value="Saskatchewan" >Saskatchewan</option>
    <option value="yukon" >Yukon</option>
  </select>
    </div>
		
	<div class="form-group">
	<label>phone</label> 	
	<input readonly type="text"  class="form-control" name="relative_phone" id="relative_phone" value="" />
     </div>

	
  
   <h3>References</h3>

	<div class="form-group"> 
  <label>Name of relative not living with you:</label>
 <input readonly type="text"  class="form-control" name="relative_name2" id="relative_name2" value="" />
   </div>   
  
	<div class="form-group">
   <label>address</label>
    <input readonly type="text"  class="form-control"  name="relative_address2" id="relative_address2" value="" />
    </div>
   
   <div class="form-group">
   <label>city:</label>
    <input readonly class="form-control" type="text" name="relative_city2" id="relative_city2" value="" />
    </div>
   
    
  
  	
   <div class="form-group">
	<label>Relationship:</label>	
  <input readonly type="text"  class="form-control"  name="relative_relation2" id="relative_relation2" value="" />
   </div>
	
	<div class="form-group">
   <label class="">Province:</label>
	<select class="form-control" id="relative_province2" name="relative_province2"  >
    <option value="">select a province</option>
    <option value="alberta">Alberta</option>
    <option value="british columbia" >British Columbia</option>
    <option value="manitoba" >Manitoba</option>
    <option value="new brunswick" >New Brunswick</option>
    <option value="newfoundland" >NewFoundland & Labrador</option>
    <option value="northwest territories" >Northwest Territories</option>
	<option value="nova scotia" >Nova Scotia</option>
    <option value="nunavut" >Nunavut</option>
	<option value="ontario" >Ontario</option>
	<option value="prince" >Prince Edward Island</option>
    <option value="quebec" >Quebec</option>
	<option value="Saskatchewan" >Saskatchewan</option>
    <option value="yukon" >Yukon</option>
  </select>
    </div>
		
	<div class="form-group">
	<label>phone</label> 	
  <input readonly type="text"  class="form-control" name="relative_phone2" id="relative_phone2" value="" />
    </div>

	
	<div class="form-group">

<legend>Leave a comment</legend>

<textarea class="form-control" id="loan_comment" name="loan_comment" maxlength="500"  rows="7" type="textarea" readonly>

</textarea>

</span>
</div>
	
	
	
	
 	`	
  
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
  
  
  
  

</form>

</div>


<div class="container" id="holder2">
</div>

<?php endif;?>
</body>
</html>
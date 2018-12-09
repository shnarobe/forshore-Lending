// JavaScript Document
function viewAll(){
	
	$.ajax({
    url: 'loanAppController.php',
    method: 'post',
	dataType:"text",
    data: {action:"viewall"},
    success: function(data) {
	$("#holder").html(data);
	
	}
		   });
}


function approveLoan(loanid){
	
	$.ajax({
    url: 'loanAppController.php',
    method: 'post',
	dataType:"text",
    data: {action:"approve",loan:loanid},
    success: function(data) {
	alert(data);
	location.reload();
	}
		   });
}

function editLoan(loanid){
	
	var l=parseInt(loanid);
	$.ajax({
    url: 'loanAppController.php',
    method: 'post',
	dataType:"text",
    data: {action:"editloan",loan:l},
    success: function(data) {
		
		var dat="";
		dat=JSON.parse(data);
	var ff=document.getElementById("loanapp").reset();
	if(dat.debt_management=="yes"){
		//alert("called");
		var one=$("[name='debt_management']");	
		$(one).filter("[value=yes]").attr('checked',true);
		}
		else{
			var one=$("[name='debt_management']");	
		$(one).filter("[value=no]").attr('checked',true);
			
			}
	//$("[name='debt']").attr('value',dat[1]);
	//$("[name='debt']").attr('checked',true);
if(dat.payday_loans=="yes"){
		//alert("called");
		var one=$("[name='payday_loans']");	
		$(one).filter("[value=yes]").attr('checked',true);
		}
		else{
			var one=$("[name='payday_loans']");	
		$(one).filter("[value=no]").attr('checked',true);
			
			}
if(dat.own_house=="yes"){
		//alert("called");
		var one=$("[name='own_house']");	
		$(one).filter("[value=yes]").attr('checked',true);
		}
		else{
			var one=$("[name='own_house']");	
		$(one).filter("[value=no]").attr('checked',true);
			
			}
$("#loanapp [name='when_house']").attr('value',dat.when_house);
if(dat.bankruptcy=="yes"){
		//alert("called");
		var one=$("[name='bankruptcy']");	
		$(one).filter("[value=yes]").attr('checked',true);
		}
		else{
			var one=$("[name='bankruptcy']");	
		$(one).filter("[value=no]").attr('checked',true);
			
			} 
 $("#loanapp [name='when_bankruptcy']").attr('value',dat.when_bankruptcy);
$("#loanapp [name='amount_requested']").attr('value',dat.amount_requested);
$("#loanapp [name='loan_purpose']").attr('value',dat.loan_purpose);
$("#loanapp [name='loan_term']").attr('value',dat.loan_term);
if(dat.secured_collateral=="yes"){
		//alert("called");
		var one=$("[name='secured_collateral']");	
		$(one).filter("[value=yes]").attr('checked',true);
		}
		else{
			var one=$("[name='secured_collateral']");	
		$(one).filter("[value=no]").attr('checked',true);
			
			}
$("#loanapp [name='describe_collateral']").attr('value',dat.describe_collateral);
$("#loanapp [name='name']").attr('value',dat.name);
$("#loanapp [name='email']").attr('value',dat.email);
$("#loanapp [name='applicant_address']").attr('value',dat.applicant_address);
$("#loanapp [name='applicant_city']").attr('value',dat.applicant_city);
$("#loanapp [name='applicant_province']").attr('value',dat.applicant_province); 
$("#loanapp [name='applicant_postalcode']").attr('value',dat.applicant_postalcode); 
$("#loanapp [name='applicant_home_phone']").attr('value',dat.applicant_home_phone);
$("#loanapp [name='applicant_cell_phone']").attr('value',dat.applicant_cell_phone);
$("#loanapp [name='employed_by']").attr('value',dat.employed_by);
$("#loanapp [name='position']").attr('value',dat.position);
$("#loanapp [name='years_employed']").attr('value',dat.employed_by);
$("#loanapp  [name='months_employed']").attr('value',dat.months_employed);
$("#loanapp [name='monthly_salary']").attr('value',dat.monthly_salary);
$("#loanapp [name='business_address']").attr('value',dat.business_address);
$("#loanapp [name='business_city']").attr('value',dat.business_city);
$("#loanapp [name='business_province']").attr('value',dat.business_province);
$("#loanapp [name='business_postalcode']").attr('value',dat.business_postalcode);
$("#loanapp [name='business_phone']").attr('value',dat.business_phone);
$("#loanapp [name='website']").attr('value',dat.website);
$("#loanapp [name='relative_name']").attr('value',dat.relative_name);
$("#loanapp [name='relative_relation']").attr('value',dat.relative_relation);
$("#loanapp [name='relative_address']").attr('value',dat.relative_address);
$("#loanapp [name='relative_city']").attr('value',dat.relative_city);
$("#loanapp [name='relative_province']").attr('value',dat.relative_province);
$("#loanapp [name='relative_phone']").attr('value',dat.relative_phone);
$("#loanapp [name='relative_name_2']").attr('value',dat.relative_name_2);
$("#loanapp [name='relative_relation_2']").attr('value',dat.relative_relation_2);
 $("#loanapp [name='relative_address_2']").attr('value',dat.relative_address_2);
 $("#loanapp [name='relative_city_2']").attr('value',dat.relative_city_2);
  $("#loanapp [name='relative_province_2']").attr('value',dat.relative_province_2);
  $("#loanapp [name='relative_phone_2']").attr('value',dat.relative_phone_2);
	//alert($("[name=refphone1]").val());
	
		//var printContents = $("#loanapp").html();
 		
	$("#loanapp").css("display","block");
	
	
	/*
	for(objectToInspect = obj2; objectToInspect !== null; objectToInspect = Object.getPrototypeOf(objectToInspect)){  
		result = result.concat(Object.getOwnPropertyNames(objectToInspect));  
	}
	*/
 
		
		/*var dat=data.split("@1gzr3q0");
		$("#sub1 #mySelect").attr('value',dat[0]);
		console.log(dat[0]);
		$("#sub1 #quantity").attr('value',dat[1]);
		$("#sub1 #ttm1").attr('value',dat[2]);
		$("#sub1 #ttm2").attr('value',dat[3]);
		$("#sub1 #price").attr('value',dat[4]);
		$("#sub1 #expenses").attr('value',dat[5]);
		var printContents = document.getElementById("sub1").innerHTML;
 		console.log(printContents);
		w=window.open();
 		w.document.write(printContents);
 		w.print();
 		w.close();
		*/
	}
		   });
}


function viewLoan(loanid){
	
	
	var l=parseInt(loanid);
	$.ajax({
    url: 'loanAppController.php',
    method: 'post',
	dataType:"text",
    data: {action:"viewloan",loan:l},
    success: function(data) {
	if($("#loanholder").hasClass("conceal")){
	$("#loanholder").removeClass("conceal");
	}
	if(!$("#holder2").hasClass("conceal")){
	$("#holder2").addClass("conceal");
	}
    console.log(data);
    var ff=document.getElementById("loanapp").reset();
	var dat="";
		dat=JSON.parse(data);
	console.log(dat);
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
	//alert(comm);
		
			
			
  //$("#loanapp").css("display","block");
	
	
 		
	
	
	
		}
		   });
		}
		
function deleteLoan(loanid){
if (!window.confirm("Do you really want to delete? Operation can't be undone")) { 
 return;
}	
var l=parseInt(loanid);
	$.ajax({
    url: 'loanAppController.php',
    method: 'post',
	dataType:"text",
    data: {action:"deleteloan",loan:l},
    success: function(data) {
		alert(data);
		location.reload();
		
		}
		   });
		   
		   }
		   
function prepareContract(id){
	if(!$("#loanholder").hasClass("conceal")){
	$("#loanholder").addClass("conceal");
	}
	if($("#holder2").hasClass("conceal")){
	$("#holder2").removeClass("conceal");
	}
	//$("#loanholder").addClass("conceal");
	
		
	
	var l=parseInt(id);
	$.ajax({
    url: 'loanAppController.php',
    method: 'post',
	dataType:"text",
    data: {action:"prepareContract",loan:l},
    success: function(data) {
	//console.log(f);
	
		//alert(data);
		$("#holder2").html("");
		$("#holder2").html(data);
		}
		   });
	
	
	
	
}


function viewloans(event,pn){
	event.preventDefault();
	if (pn === undefined) {
          var page = 1;
    } 
	else{
	var page=pn;
	}
	$.ajax({
    url: 'loanAppcontroller.php',
    method: 'post',
	dataType:"text",
    data: {action:"viewall",pagenum:page},
    success: function(data) {
	$("#holder").html(data);
	
	}
		   });
}
		   
		   
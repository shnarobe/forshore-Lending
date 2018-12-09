<?php 
//session_start();
include_once("account.php");

?>



<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mortgage application</title>
<link rel="stylesheet" href="scripts/bootstrap.min.css">
<script src="direct.js"></script>
<!-- jQuery library -->
<script src="scripts/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="scripts/jquery-ui.css" rel="stylesheet">
<script src="scripts/jquery-ui.js"></script>
<!-- Latest compiled JavaScript -->
<script src="scripts/bootstrap.min.js"></script>
<style>
.conceal{
display:hidden;	
}
.ifborrow{
display:none;	
}
.nextto{
float:left;
margin-right:10px;	
	
	
	
}
.fa-arrow-right{
	clor:#fff;
	
}
.fa-arrow-left{
	color:#fff;
}
legend{
	color:green;
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
.has-error{
color:red;	
	
}
.overlay{
/*background-image:url("texture4.JPG");*/	
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

</style>
<script>
/*$('#myTabs a[href="#profile"]').tab('show') // Select tab by name
$('#myTabs a:first').tab('show'); // Select first tab
$('#myTabs a:last').tab('show'); // Select last tab
$('#myTabs li:eq(2) a').tab('show'); // Select third tab (0-indexed)*/
$(document).ready(function(){
$.datepicker.setDefaults({dateFormat:"yy-mm-dd"});
 $("#cobor *").attr("disabled",true);
 $("#addr *").attr("disabled",true);
 $("#cobor-address *").attr("disabled",true);
 $("#coaddr *").attr("disabled",true);
 $("#emp3 *").attr("disabled",true);
 $("#coemp3 *").attr("disabled",true);
 $("#coemp4 *").attr("disabled",true);

$("#coborr").change(function(){
		var c=$("#coborr").serialize();
		if(c.length){
		 $("#cobor *").attr("disabled",false);	
		 $("#oneborr").removeClass("ifborrow");
		 $("#twoborr").removeClass("ifborrow");
		 $("#threeborr").removeClass("ifborrow");
		
		}
		else{
		$("#cobor *").attr("disabled",true);
		$("#oneborr").addClass("ifborrow");
		$("#twoborr").addClass("ifborrow");
		$("#threeborr").addClass("ifborrow");		
		}
});
$("#lived3").change(function(){
		var c=$("#lived3").serialize();
		if(c.length){
		 $("#addr *").attr("disabled",false);	
		}
		else{
		$("#addr *").attr("disabled",true);	
		}
});
$("#colived").change(function(){
		var c=$("#colived").serialize();
		if(c.length){
		 $("#cobor-address *").not("#coaddr *").attr("disabled",false);	
		}
		else{
		$("#cobor-address *").attr("disabled",true);
		$("#coaddr *").attr("disabled",true);		
		}
});
$("#colived3").change(function(){
		var c=$("#colived3").serialize();
		if(c.length){
		 $("#coaddr *").attr("disabled",false);	
		}
		else{
		$("#coaddr *").attr("disabled",true);	
		}
});
$("#preworked").change(function(){
		var c=$("#preworked").serialize();
		if(c.length){
		 $("#emp3 *").attr("disabled",false);	
		}
		else{
		$("#emp3 *").attr("disabled",true);	
		}
});
$("#cowork").change(function(){
		var c=$("#cowork").serialize();
		if(c.length){
		 $("#coemp3 *").not("#coemp4 *").attr("disabled",false);	
		}
		else{
		$("#coemp3 *").attr("disabled",true);
		$("#coemp4 *").attr("disabled",true);	
		}
});
$("#copreworked3").change(function(){
		var c=$("#copreworked3").serialize();
		if(c.length){
		 $("#coemp4 *").attr("disabled",false);	
		}
		else{
		$("#coemp4 *").attr("disabled",true);	
		}
});
$("#dob").datepicker();
$("#codob").datepicker();
$("#mi_closing_date").datepicker();							
$('a[class="tabb"]').click(function (e) {
 //e.preventDefault();
// $(this).tab('show');
 //var decide= $(e.target); // newly activated tab
 
 // e.relatedTarget // previous active tab
});	
	 $('#mytabs li:eq(0) a').tab('show');
	 
	  $(".back-address").click(function(){
		 
		$('#mytabs li:eq(0) a').tab('show'); 
		 
		 
	 });
	 
	  $(".back-employment").click(function(){
		  $('#mytabs li:eq(1) a').tab('show'); 
		  
		  
		  
	  });
	  
	   $(".back-other").click(function(){
		   $('#mytabs li:eq(2) a').tab('show'); 
		   
		   
	   });
	   
	    $(".back-additional").click(function(){
			$('#mytabs li:eq(3) a').tab('show'); 
			
			
		});
	 

$("#personal").submit(function(event){
			event.preventDefault();
			//var formtext=new FormData(form);
			//console.log(form);
			var form=event.target;
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
	//var c=$("#coborr").serialize();
   // alert(c);
	$.ajax({
				   dataType:"text",
				    url:"personalinfoval.php",
				    method:"POST",
				   data:{dat:o},
				   success:function(data){
					  //var obj=jQuery.parseJSON(data);
					   //alert(obj);
					   var e=JSON.parse(data);
					  //console.log(e);
					  $("*").removeClass("has-error");
					  $(".error").html("");
					  	if(e.error){
							for (var key in e) {
								if (e.hasOwnProperty(key)) {
								console.log(key);
								var k="#"+key;
								console.log(e[key]);
								$(k).parent().addClass("has-error"); // add the error class to show red input
								var k1=k+"Err";
								var hid = document.createTextNode(e[key]);
								$(k1).html(hid);
              //$(k).append(hid); // add the actual error message under our input
							}
							}
                
					
						}
								else{
					 $('#mytabs li:eq(1) a').tab('show');
					 // $('#mytabs li:eq(1) a').attr('data-toggle','tab');
					  // $('#mytabs li:eq(0) a').attr('data-toggle','tab');
					// $('#mytabs li:eq(1)').removeClass('disabled');
					 //location.reload();
					   //$('#mytabs li:eq(0)').removeClass('disabled');			  
								}  
				   }
				   });
});				      


$("#addressinfo").submit(function(event){
			event.preventDefault();
			var form=event.target;
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
				    url:"addressinfoval.php",
				   
				   method:"POST",
				   data:{dat:o},
				   success:function(data){
					  //var obj=jQuery.parseJSON(data);   
					   var e=JSON.parse(data);
					 // console.log(e);
					   $(".error").html("");
					  $("*").removeClass("has-error");
					  	if(e.error){
							for (var key in e) {
								if (e.hasOwnProperty(key)) {
								console.log(key);
								var k="#"+key;
								console.log(e[key]);
								$(k).parent().addClass("has-error");
								var k1=k+"Err";
								var hid = document.createTextNode(e[key]);
								$(k1).html(hid);
								}
							}
						}
							else{
					 $('#mytabs li:eq(2) a').tab('show');
					 
					 // $('#mytabs li:eq(2) a').attr('data-toggle','tab').removeClass("disabled");
					  //$('#mytabs li:eq(2)').removeClass('disabled');
					   					  
					  
				   }
						}
				   });
});				   



$("#employmentinfo").submit(function(event){
			event.preventDefault();
			var form=event.target;
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
   // console.log(o);
	$.ajax({
				   dataType:"text",
				    url:"employmentinfoval.php",
				   
				   method:"POST",
				   data:{dat:o},
				   success:function(data){
					 // var obj=JSON.parse(data);
					   //alert(obj);
					  //console.log(obj);
					  					
					$('#mytabs li:eq(3) a').tab('show');
					 
					  //$('#mytabs li:eq(3) a').attr('data-toggle','tab').removeClass("disabled");
					 //$('#mytabs li:eq(3)').removeClass('disabled');
					  	
					 // $('#mytabs a:first').tab('show') // Select last tab
					  //$("#f").html(data);
					  
 					  
					  
				   }
				   });
});				   

$("#otherincome").submit(function(event){
			event.preventDefault();
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
				    url:"otherincomeval.php",
				   
				   method:"POST",
				   data:{dat:o},
				   success:function(data){
					 // var obj=JSON.parse(data);
					   //alert(obj);
					  //console.log(obj);
					  					
					$('#mytabs li:eq(4) a').tab('show');
					 
					//  $('#mytabs li:eq(4) a').attr('data-toggle','tab').removeClass("disabled");
					 
					// $('#mytabs li:eq(4)').removeClass('disabled');
					   	
					   // $('#mytabs a:first').tab('show') // Select last tab
					  //$("#f").html(data);
					  
				  
					  
				   }
				   });
});				   


$("#otherinfo").submit(function(event){
			event.preventDefault();
			var proceed="";
			var agreement=$("#agree1").serialize();
			console.log(agreement);
		if(agreement.length){
		 proceed="agree";
		}
		else{
			proceed="disagree";
			alert("You must agree to the privacy policy!");
			return;	
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
    
	var asset={};
	var count=0;
var y=$("#otherinfo [name='asset[]']").serializeArray();
 $.each(y, function(i, field){
         asset[count]= field.value;
		 count++;
        });
		var liability={}
		var count=0;
var w=$("#otherinfo [name='liability[]']").serializeArray();
 $.each(w, function(i, field){
         liability[count]= field.value;
		 count++;
        });
		
		var propertyo={};
		var count=0;
var z=$("#otherinfo [name='propertyo[]']").serializeArray();
 $.each(z, function(i, field){
         propertyo[count]= field.value;
		 count++;
        });
	
	//console.log(asset);
	//console.log(liability);
	//console.log(propertyo);
	$("#myModal").modal("show");
	$.ajax({
				   dataType:"text",
				   url:"morController.php",
				   method:"POST",
				   data:{my:o,action:"goo",permission:proceed,assetarr:asset,liabilityarr:liability,propertyarr:propertyo},
				   success:function(data){
					   $("#myModal").modal("hide");
					  var dat=JSON.parse(data);
					  if(!dat.success){
						 $("#errorModal").modal("show");
						// console.log(dat.error); 
						  
					  }
					  else{
						  var t=dat.mortgageid;
						window.location="mortgagesuccess.php?mortgageid="+t;
						
						  
					  }
                                        
 			  
				   }
				   });
});				   
 $.fn.exists = function () {
    return this.length !== 0;
}   

$("#assetadd").click(function(event){
	 var me=$(".hideasset").first();
	if($(me).exists()){
	$(me).removeClass("hideasset");
	
	}
	else{
		alert("maximum assets reached");
		
	}
});
$("#liabilityadd").click(function(event){
	 var me=$(".hideliability").first();
	if($(me).exists()){
	$(me).removeClass("hideliability");
	
	}
	else{
		alert("maximum liability reached");
		
	}
});
$("#propertyadd").click(function(event){
	 var me=$(".hideproperty").first();
	if($(me).exists()){
	$(me).removeClass("hideproperty");
	
	}
	else{
		alert("maximum properties added");
		
	}
});







});//end jquery
function tests(){
	var num=$("input[name='asset[]']").length;
	console.log(num);
	if(num<16){
	var hiddenField = document.createElement("div");
	$(hiddenField).html("<div  class='form-group col-sm-12'><span class='nextto col-sm-2'><label class=''>Type:</label><input type='text' class='form-control' name='asset[]'  /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>Description</label><input type='text' name='asset[]'  class='form-control' /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>Value:</label><input type='text' class='form-control' name='asset[]'  /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>Downpayment:</label><input type='text' name='asset[]'  class='form-control' /><span class='error'>* </span></span></div>");
	
	var f=document.getElementById("assetholder");
	f.appendChild(hiddenField);
	}
	else{
		
		alert("maximum reached");
	}
}


function test2(){
	var num=$("input[name='liability[]']").length;
	console.log(num);
	if(num<28){
	var hiddenField = document.createElement("div");
	$(hiddenField).html("<div  class='form-group col-sm-12'><span class='nextto col-sm-2'><label class=''>Type:</label><input type='text' class='form-control' name='liability[]'  /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>Description</label><input type='text' name='liability[]'  class='form-control' /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>Credit limit:</label><input type='text' class='form-control' name='liability[]'  /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>Outstanding balance:</label><input type='text' name='liability[]'  class='form-control' /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>monthly payment:</label><input type='text' name='liability[]'  class='form-control' /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>Liability payoff:</label><input type='text' name='liability[]' class='form-control' /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>Maturity date:</label><input type='text' name='liability[]' class='form-control' /><span class='error'>* </span></span></div>");
	
	var f=document.getElementById("liabilityholder");
	f.appendChild(hiddenField);
	}
	else{
		
		alert("maximum reached");
	}
}


function test3(){
	var num=$("input[name='propertyo[]']").length;
	console.log(num);
	if(num<24){
	var hiddenField = document.createElement("div");
	$(hiddenField).html("<div  class='form-group col-sm-12'><span class='nextto col-sm-2'><label class=''>Property value:</label><input type='text' class='form-control' name='propertyo[]' /><span class='error'>*</span></span><span class='nextto col-sm-2'><label class=''>Total mortgages</label><input type='text' name='propertyo[]'  class='form-control' /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>mortgage payments:</label><input type='text' class='form-control' name='propertyo[]'  /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>total expenses:</label><input type='text' name='propertyo[]'  class='form-control' /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>rental income:</label><input type='text' class='form-control' name='propertyo[]' /><span class='error'>* </span></span><span class='nextto col-sm-2'><label class=''>rental_expenses:</label><input type='text' name='propertyo[]'  class='form-control' /><span class='error'>* </span></span></div>");
	
	var f=document.getElementById("propertyholder");
	f.appendChild(hiddenField);
	}
	else{
		
		alert("maximum reached");
	}
}






function cobor(){
	$("#cobor").toggle();
	
	
	
}


function days(ctrl) {
    var n = $(ctrl.options[ctrl.selectedIndex]).attr("d") || 0;
    var ctrl2 = $("#" + ctrl.id.replace("_M", "_D"))[0];
    var ctrl2_val = ctrl2.selectedIndex;
    while (ctrl2.options.length > 1) ctrl2.remove(1);
    for (var i = 1; i <= n; i++) ctrl2.options[ctrl2.length] = new Option(i, i, false, false);
    if (ctrl2_val <= ctrl2.length) ctrl2.selectedIndex = ctrl2_val;
}

</script>
</head>
<body>
<?php echo $nav; ?>


<ul id="mytabs" class="nav nav-tabs" style="margin-top:250px;">
  <li class="active"><a class="tabb"  href="#personalinfo">Personal Information</a></li>
  <li class="disabled"><a class="tabb" href="#menu1">Address Information</a></li>
  <li class="disabled"><a class="tabb" href="#menu2">Employment Information	</a></li>
  <li class="disabled"><a  class="tabb" href="#menu3">Other Income</a></li>
	<li class="disabled"><a class="tabb" href="#menu4">Additional Information</a></li>
  </ul>
<br>
<br>
<div class="tab-content">
  <div id="personalinfo" class="tab-pane fade in active">
  
   

<div class="col-sm-12">
    <form id="personal"  role="form" action="formtest.php" method="post">


<div class="col-sm-6">

<legend>Borrower</legend>
<div class="col-sm-12 form-group">
<span class="nextto col-sm-5">
<label >First Name:</label>
<input type="text" class="form-control" name="fname" id="fname" value="<?php echo $_SESSION['personal']['fname'];?>" />
<span id="fnameErr" class="error">* </span>
</span>
<span class="nextto col-sm-5">
<label >Last Name:</label>
<input type="text" name="lname" id="lname" class="form-control " value="<?php echo $_SESSION['personal']['lname'];?>"/>
<span id="lnameErr" class="error">* </span>
</span>
</div>


<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Email:</label>
<input type="text" class="form-control" name="email" id="email" value="<?php echo $_SESSION['personal']['email'];?>" />
<span class="error" id="emailErr">*</span>
</span>
<span class="nextto col-sm-5">
<label class="">Date of Birth</label>
<input type="text" name="dob" id="dob" class="form-control" value="<?php echo $_SESSION['personal']['dob'];?>" >
<span class="error" id="dobErr">*</span>
</span>
</div>

<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class=" ">Marital status</label>
<select class="form-control" id="mar_status" name="mar_status">
	<option value="">Please select</option>
    <option value="married"<?php if($_SESSION['personal']['mar_status']=="married") echo "selected";?>>Married</option>
    <option value="single" <?php if($_SESSION['personal']['mar_status']=="single") echo "selected";?>>Single</option>
    <option value="divorced" <?php if($_SESSION['personal']['mar_status']=="divorced") echo "selected";?>>Divorced/separated</option>
    <option value="common" <?php if($_SESSION['personal']['mar_status']=="common") echo "selected";?>>Common Law</option>
    <option value="engaged" <?php if($_SESSION['personal']['mar_status']=="engaged") echo "selected";?>>Engaged</option>
    <option value="widow" <?php if($_SESSION['personal']['mar_status']=="widow") echo "selected";?>>Widowed</option>
  </select>
  </span>
<span class="nextto col-sm-5">
<label class="">Do you currently</label>
<select class="form-control" id="currently" name="currently">
	<option value="">Please select</option>
    <option value="own" <?php if($_SESSION['personal']['currently']=="own") echo "selected";?>>Own</option>
    <option value="rent" <?php if($_SESSION['personal']['currently']=="rent") echo "selected";?>>Rent</option>
    <option value="relatives" <?php if($_SESSION['personal']['currently']=="relatives") echo "selected";?>>Live with relatives</option>
    <option value="others" <?php if($_SESSION['personal']['currently']=="others") echo "selected";?>>live with others</option>
    </select>
  </span>
  
  </div>



<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">S.I.N:</label>
<input type="text" class="form-control" name="sin" id="sin" value="<?php echo $_SESSION['personal']['sin'];?>" />
<span class="error"><?php echo $_SESSION['personal']['sinErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Home phone:</label>

<input type="text"  class="form-control" name="home_p" id="home_p" value="<?php echo $_SESSION['personal']['home_p'];?>"  />
<span id="home_pErr" class="error">*</span>
</span>
</div>


 


<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Work phone:</label>
<input type="text" class="form-control" name="work_p" id="work_p" value="<?php echo $_SESSION['personal']['work_p'];?>" />
<span class="error"><?php echo $_SESSION['personal']['work_pErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Fax:</label>

<input type="text"  class="form-control" name="fax" id="fax" value="<?php echo $_SESSION['personal']['fax'];?>"  />
<span class="error"><?php echo $_SESSION['personal']['faxErr'];?></span>
</span>
</div>

<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Cell phone:</label>
<input type="text"  class="form-control" name="cell_p" id="cell_p" value="<?php echo $_SESSION['personal']['cell_p'];?>"  />
<span class="error"><?php echo $_SESSION['personal']['cell_pErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Dependents:</label>
<input type="text"  class="form-control" name="dependents" id="dependents" value="<?php echo $_SESSION['personal']['dependents'];?>"  />
<span class="error" id="dependentsErr">*</span>
</span>
</div>


<div class="col-sm-12">
<span class="nextto col-sm-5">
<label class="radio-inline">Preferred Contact:</label>

<label class="radio-inline " >
<input type="radio" name="preferred_contact" <?php if (isset($_SESSION['personal']['preferred_contact']) && $_SESSION['personal']['preferred_contact']=="email") echo "checked";?> value="email"/>Email
</label>

<label class="radio-inline " >
<input type="radio" name="preferred_contact" <?php if (isset($_SESSION['personal']['preferred_contact']) && $_SESSION['personal']['preferred_contact']=="phone") echo "checked";?> value="phone" />Phone
</label>
</span>
<span class="nextto col-sm-5">
<label class="radio-inline">Preferred Language:</label>
<label class="radio-inline" >
<input type="radio" name="preferred_language"  <?php if (isset($_SESSION['personal']['preferred_language']) && $_SESSION['personal']['preferred_language']=="english") echo "checked";?> value="english"/>English
</label>
<label class="radio-inline " >
<input type="radio" name="preferred_language" <?php if (isset($_SESSION['personal']['preferred_language']) && $_SESSION['personal']['preferred_language']=="french") echo "checked";?> value="french" />French
</label>
</span>

</div>



<div class="form-group">

<span class="col-sm-12 nextto">
<input type="checkbox" style="margin-top:25px;" name="coborr" id="coborr" value="yes" class="" data-toggle="collapse" data-target="#cobor"><label class="text-primary">Check if you are adding a co-borrower</label>
</span>
</div>
</div><!--end col-sm-6-->



<div id="cobor" class="col-sm-6 collapse">


<legend>coborrower</legend>

<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label >First Name:</label>
<input type="text" class="form-control" name="cofname" id="cofname" value="<?php echo $_SESSION['personal']['cofname'];?>" />
<span class="error" id="cofnameErr">* </span>
</span>
<span class="nextto col-sm-5">
<label >Last Name:</label>
<input type="text" name="colname" id="colname" class="form-control " value="<?php echo $_SESSION['personal']['colname'];?>"/>
<span class="error" id="colnameErr">*</span>
</span>
</div>


<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Email:</label>
<input type="text" class="form-control" name="coemail" id="coemail" value="<?php echo $_SESSION['personal']['coemail'];?>" />
<span class="error" id="coemailErr">*</span>
</span>
<span class="nextto col-sm-5">
<label class="">Date of Birth</label>
<input type="text" name="codob" placeholder="1900-12-31" id="codob" class="form-control" value="<?php echo $_SESSION['personal']['codob'];?> "/>
<span class="error" id="codobErr">*</span>
</span>
</div>

<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class=" ">Marital status</label>
<select class="form-control" id="comar_status" name="comar_status">
	<option value="">Please select</option>
    <option value="married"<?php if($_SESSION['personal']['comar_status']=="married") echo "selected";?>>Married</option>
    <option value="single" <?php if($_SESSION['personal']['comar_status']=="single") echo "selected";?>>Single</option>
    <option value="divorced" <?php if($_SESSION['personal']['comar_status']=="divorced") echo "selected";?>>Divorced/separated</option>
    <option value="common" <?php if($_SESSION['personal']['comar_status']=="common") echo "selected";?>>Common Law</option>
    <option value="engaged" <?php if($_SESSION['personal']['comar_status']=="engaged") echo "selected";?>>Engaged</option>
    <option value="widow" <?php if($_SESSION['personal']['comar_status']=="widow") echo "selected";?>>Widowed</option>
  </select>
  </span>
<span class="nextto col-sm-5">
<label class="">Do you currently</label>
<select class="form-control" id="cocurrently" name="cocurrently">
	<option value="">Please select</option>
    <option value="own" <?php if($_SESSION['personal']['cocurrently']=="own") echo "selected";?>>Own</option>
    <option value="rent" <?php if($_SESSION['personal']['cocurrently']=="rent") echo "selected";?>>Rent</option>
    <option value="relatives" <?php if($_SESSION['personal']['cocurrently']=="relatives") echo "selected";?>>Live with relatives</option>
    <option value="others" <?php if($_SESSION['personal']['cocurrently']=="others") echo "selected";?>>live with others</option>
    </select>
  </span>
  
  </div>	



<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">S.I.N:</label>
<input type="text" class="form-control" name="cosin" id="cosin" value="<?php echo $_SESSION['personal']['cosin'];?>" />
<span class="error"><?php echo $_SESSION['personal']['cosinErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Home phone:</label>

<input type="text"  class="form-control" name="cohome_p" id="cohome_p" value="<?php echo $_SESSION['personal']['cohome_p'];?>"  />
<span class="error" id="cohome_pErr">*</span>
</span>
</div>


 


<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Work phone:</label>
<input type="text" class="form-control" name="cowork_p" id="cowork_p" value="<?php echo $_SESSION['personal']['cowork_p'];?>" />
<span class="error"><?php echo $_SESSION['personal']['cowork_pErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Fax:</label>

<input type="text"  class="form-control" name="cofax" id="cofax" value="<?php echo $_SESSION['personal']['cofax'];?>"  />
<span class="error"><?php echo $_SESSION['personal']['cofaxErr'];?></span>
</span>
</div>

<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Cell phone:</label>
<input type="text"  class="form-control" name="cocell_p" id="cocell_p" value="<?php echo $_SESSION['personal']['cocell_p'];?>"  />
<span class="error"><?php echo $_SESSION['personal']['cocell_pErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Dependents:</label>
<input type="text"  class="form-control" name="codependents" id="codependents" value="<?php echo $_SESSION['personal']['codependents'];?>"  />
<span class="error" id="codependentsErr">*</span>
</span>
</div>


<div class="col-sm-12">
<span class="nextto col-sm-5">
<label class="radio-inline">Preferred Language</label>
<label class="radio-inline" >
<input type="radio" name="copreferred_language"  <?php if (isset($_SESSION['personal']['copreferred_language']) && $_SESSION['personal']['copreferred_language']=="english") echo "checked";?> value="english"/>English
</label>
<label class="radio-inline " >
<input type="radio" name="copreferred_language" <?php if (isset($_SESSION['personal']['copreferred_language']) && $_SESSION['personal']['copreferred_language']=="french") echo "checked";?> value="french" />French
</label>
</span>
<span class="nextto col-sm-5">
<label class="radio-inline">Preferred Contact</label>

<label class="radio-inline " >
<input type="radio" name="copreferred_contact" <?php if (isset($_SESSION['personal']['copreferred_contact']) && $_SESSION['personal']['copreferred_contact']=="email") echo "checked";?> value="email"/>Email
</label>

<label class="radio-inline " >
<input type="radio" name="copreferred_contact" <?php if (isset($_SESSION['personal']['copreferred_contact']) && $_SESSION['personal']['copreferred_contact']=="phone") echo "checked";?> value="phone" />Phone
</label>
</span>
</div>



<div class="form-group-12">

</div>


</div><!--second div containg form 2-->
<button class="btn btn-success next pull-right" type="submit">Next step</button>
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
<input type="text" class="form-control" name="address" id="address" value="<?php echo $_SESSION['address']['address'];?>" />
<span class="error" id="addressErr">*</span>
</span>
<span class="nextto col-sm-5">
<label class="">unit:</label>

<input type="tel"  class="form-control" name="unit" id="unit" value="<?php echo $_SESSION['address']['unit'];?>"  />
<span class="error"><?php echo $_SESSION['address']['unitErr'];?></span>
</span>
</div>



<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">City:</label>
<input type="text" class="form-control" name="city" id="city" value="<?php echo $_SESSION['address']['city'];?>" />
<span class="error" id="cityErr">*</span>
</span>
<span class="nextto col-sm-5">
<label class="">Province:</label>
<select class="form-control" id="province" name="province">
<option value="">Select a province</option>
    <option value="alberta"<?php if($_SESSION['address']['province']=="alberta") echo "selected";?>>Alberta</option>
    <option value="british columbia" <?php if($_SESSION['address']['province']=="british columbia") echo "selected";?>>British Columbia</option>
    <option value="manitoba" <?php if($_SESSION['address']['province']=="manitoba") echo "selected";?>>Manitoba</option>
    <option value="new brunswick" <?php if($_SESSION['address']['province']=="new brunswick") echo "selected";?>>New Brunswick</option>
    <option value="newfoundland" <?php if($_SESSION['address']['province']=="newfoundland") echo "selected";?>>NewFoundland & Labrador</option>
    <option value="northwest territories" <?php if($_SESSION['address']['province']=="northwest territories") echo "selected";?>>Northwest Territories</option>
	<option value="nova scotia" <?php if($_SESSION['address']['province']=="nova scotia") echo "selected";?>>Nova Scotia</option>
    <option value="nunavut" <?php if($_SESSION['address']['province']=="nunavut") echo "selected";?>>Nunavut</option>
	<option value="ontario" <?php if($_SESSION['address']['province']=="ontario") echo "selected";?>>Ontario</option>
	<option value="prince" <?php if($_SESSION['address']['province']=="prince") echo "selected";?>>Prince Edward Island</option>
    <option value="quebec" <?php if($_SESSION['address']['province']=="quebec") echo "selected";?>>Quebec</option>
	<option value="Saskatchewan" <?php if($_SESSION['address']['province']=="Saskatchewan") echo "selected";?>>Saskatchewan</option>
    <option value="yukon" <?php if($_SESSION['address']['province']=="yukon") echo "selected";?>>Yukon</option>
  </select>
<span class="error" id="provinceErr">*</span>
</span>

</div>


<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Postal code:</label>
<input type="text" class="form-control" name="postal_code" id="postal_code" value="<?php echo $_SESSION['address']['postal_code'];?>" />
<span class="error" id="postal_codeErr">*</span>
</span>
<span class="nextto col-sm-5">
<label class="">Current rent:</label>

<input type="text"  class="form-control" name="current_rent" placeholder="$" id="current_rent" value="<?php echo $_SESSION['address']['current_rent'];?>"  />
<span class="error"><?php echo $_SESSION['address']['current_rentErr'];?></span>
</span>



</div>

<div class="form-group col-sm-12">

<span class="nextto col-sm-5">
<label>Time at residence:</label>

<input type="text"  class="form-control" placeholder="year" name="time_at_residence_year" id="time_at_residence_year" value="<?php echo $_SESSION['address']['time_at_residence_year'];?>"  />
<span class="error"><?php echo $_SESSION['address']['time_at_residence_yearErr'];?></span>

<input style="margin-top:5px;" type="text"  class="form-control" placeholder="month" name="time_at_residence_month" id="time_at_residence_month" value="<?php echo $_SESSION['address']['time_at_residence_month'];?>"  />
<span class="error"><?php echo $_SESSION['address']['time_at_residence_monthErr'];?></span>

</span>
</div>

<div class="frm-group col-sm-12">
<span class="nexto col-sm-5">
<label class="text-primary" >Check if you lived there less than 3 years</label>
<input type="checkbox" name="lived3" id="lived3" class="" data-toggle="collapse" data-target="#addr">
</span>
<span id="oneborr" class="col-sm-5 nextto ifborrow">
<label class="text-primary">Click if you have coborrower information</label>
<input type="checkbox" class="" name="colived" id="colived" data-toggle="collapse" data-target="#cobor-address">
</span>
</div>

<div id="addr" class="collapse">

<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Address:</label>
<input type="text" class="form-control" name="pre_address" id="pre_address" value="<?php echo $_SESSION['address']['pre_address'];?>" />
<span class="error" id="pre_addressErr">*</span>
</span>
<span class="nextto col-sm-5">
<label class="">unit:</label>

<input type="tel"  class="form-control" name="pre_unit" id="pre_unit" value="<?php echo $_SESSION['address']['pre_unit'];?>"  />
<span class="error"><?php echo $_SESSION['address']['pre_unitErr'];?></span>
</span>
</div>



<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">City:</label>
<input type="text" class="form-control" name="pre_city" id="pre_city" value="<?php echo $_SESSION['address']['pre_city'];?>" />
<span class="error" id="pre_cityErr">*</span>
</span>
<span class="nextto col-sm-5">
<label class="">Province:</label>
<select class="form-control" id="pre_province" name="pre_province">
    <option value="">select a province</option>
    <option value="alberta"<?php if($_SESSION['address']['pre_province']=="alberta") echo "selected";?>>Alberta</option>
    <option value="british columbia" <?php if($_SESSION['address']['pre_province']=="british columbia") echo "selected";?>>British Columbia</option>
    <option value="manitoba" <?php if($_SESSION['address']['pre_province']=="manitoba") echo "selected";?>>Manitoba</option>
    <option value="new brunswick" <?php if($_SESSION['address']['pre_province']=="new brunswick") echo "selected";?>>New Brunswick</option>
    <option value="newfoundland" <?php if($_SESSION['address']['pre_province']=="newfoundland") echo "selected";?>>NewFoundland & Labrador</option>
    <option value="northwest territories" <?php if($_SESSION['address']['pre_province']=="northwest territories") echo "selected";?>>Northwest Territories</option>
	<option value="nova scotia" <?php if($_SESSION['address']['pre_province']=="nova scotia") echo "selected";?>>Nova Scotia</option>
    <option value="nunavut" <?php if($_SESSION['address']['pre_province']=="nunavut") echo "selected";?>>Nunavut</option>
	<option value="ontario" <?php if($_SESSION['address']['pre_province']=="ontario") echo "selected";?>>Ontario</option>
	<option value="prince" <?php if($_SESSION['address']['pre_province']=="prince") echo "selected";?>>Prince Edward Island</option>
    <option value="quebec" <?php if($_SESSION['address']['pre_province']=="quebec") echo "selected";?>>Quebec</option>
	<option value="Saskatchewan" <?php if($_SESSION['address']['pre_province']=="Saskatchewan") echo "selected";?>>Saskatchewan</option>
    <option value="yukon" <?php if($_SESSION['address']['pre_province']=="yukon") echo "selected";?>>Yukon</option>
  </select>
<span id="pre_provinceErr" class="error">*</span>
</span>

</div>


<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Postal code:</label>
<input type="text" class="form-control" name="pre_postal_code" id="pre_postal_code" value="<?php echo $_SESSION['address']['pre_postal_code'];?>" />
<span class="error" id="pre_postal_codeErr">*</span>
</span>

<span class="nextto col-sm-5">
<label class="">Current rent:</label>

<input type="text"  class="form-control" name="pre_current_rent" id="pre_current_rent" value="<?php echo $_SESSION['address']['pre_current_rent'];?>"  />
<span class="error"><?php echo $_SESSION['address']['pre_current_rentErr'];?></span>
</span>
</div>

<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label>Time at residence:</label>


<input type="text"  class="form-control" placeholder="year" name="pre_time_at_residence_year" id="pre_time_at_residence_year" value="<?php echo $_SESSION['address']['pre_time_at_residence_year'];?>"  />
<span class="error"><?php echo $_SESSION['address']['pre_time_at_residence_yearErr'];?></span>



<input style="margin-top:5px;" type="text"  class="form-control" placeholder="month" name="pre_time_at_residence_month" id="pre_time_at_residence_month" value="<?php echo $_SESSION['address']['pre_time_at_residence_month'];?>"  />
<span class="error"><?php echo $_SESSION['address']['pre_time_at_residence_monthErr'];?></span>

</span>



</div>


</div><!--end div collapse-->
</div><!--end div col-6-->

<!--coborrrower section-->
<div id="cobor-address" class="collapse col-sm-6">

<legend>Coborrower</legend>
	<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Address:</label>
<input type="text" class="form-control" name="coaddress" id="coaddress" value="<?php echo $_SESSION['address']['coaddress'];?>" />
<span class="error" id="coaddress">*</span>
</span>
<span class="nextto col-sm-5">
<label class="">unit:</label>

<input type="text"  class="form-control" name="counit" id="counit" value="<?php echo $_SESSION['address']['counit'];?>"  />
<span class="error"><?php echo $_SESSION['address']['counitErr'];?></span>
</span>
</div>



<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">City:</label>
<input type="text" class="form-control" name="cocity" id="cocity" value="<?php echo $_SESSION['address']['cocity'];?>" />
<span class="error"id="cocity" >*</span>
</span>
<span class="nextto col-sm-5">
<label class="">Province:</label>
<select class="form-control" id="coprovince" name="coprovince"  >
    <option value="">Please select a province</option>
    <option value="alberta"<?php if($_SESSION['address']['coprovince']=="alberta") echo "selected";?>>Alberta</option>
    <option value="british columbia" <?php if($_SESSION['address']['coprovince']=="british columbia") echo "selected";?>>British Columbia</option>
    <option value="manitoba" <?php if($_SESSION['address']['coprovince']=="manitoba") echo "selected";?>>Manitoba</option>
    <option value="new brunswick" <?php if($_SESSION['address']['coprovince']=="new brunswick") echo "selected";?>>New Brunswick</option>
    <option value="newfoundland" <?php if($_SESSION['address']['coprovince']=="newfoundland") echo "selected";?>>NewFoundland & Labrador</option>
    <option value="northwest territories" <?php if($_SESSION['address']['coprovince']=="northwest territories") echo "selected";?>>Northwest Territories</option>
	<option value="nova scotia" <?php if($_SESSION['address']['coprovince']=="nova scotia") echo "selected";?>>Nova Scotia</option>
    <option value="nunavut" <?php if($_SESSION['address']['coprovince']=="nunavut") echo "selected";?>>Nunavut</option>
	<option value="ontario" <?php if($_SESSION['address']['coprovince']=="ontario") echo "selected";?>>Ontario</option>
	<option value="prince" <?php if($_SESSION['address']['coprovince']=="prince") echo "selected";?>>Prince Edward Island</option>
    <option value="quebec" <?php if($_SESSION['address']['coprovince']=="quebec") echo "selected";?>>Quebec</option>
	<option value="Saskatchewan" <?php if($_SESSION['address']['coprovince']=="Saskatchewan") echo "selected";?>>Saskatchewan</option>
    <option value="yukon" <?php if($_SESSION['address']['coprovince']=="yukon") echo "selected";?>>Yukon</option>
  </select>
<span class="error" id="coprovinceErr">*</span>
</span>

</div>


<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Postal code:</label>
<input type="text" class="form-control" name="copostal_code" id="copostal_code" value="<?php echo $_SESSION['address']['copostal_code'];?>" />
<span class="error" id="copostal_codeErr">*</span>
</span>
<span class="nextto col-sm-5">
<label class="">Current rent:</label>

<input type="text"  class="form-control" name="cocurrent_rent" id="cocurrent_rent" value="<?php echo $_SESSION['address']['cocurrent_rent'];?>"  />
<span class="error"><?php echo $_SESSION['address']['cocurrent_rentErr'];?></span>
</span>
</div>


<div class="col-sm-12">
<span class="nextto col-sm-5">
<label>Time at residence:</label>


<input type="text"  class="form-control" placeholder="year" name="cotime_at_residence_year" id="cotime_at_residence_year" value="<?php echo $_SESSION['address']['cotime_at_residence_year'];?>"  />
<span class="error"><?php echo $_SESSION['address']['cotime_at_residence_yearErr'];?></span>



<input style="margin-top:5px;" type="text"  placeholder="month" class="form-control" name="cotime_at_residence_month" id="cotime_at_residence_month" value="<?php echo $_SESSION['address']['cotime_at_residence_month'];?>"  />
<span class="error"><?php echo $_SESSION['address']['cotime_at_residence_monthErr'];?></span>

</span>


</div>


<div class="form-group col-sm-12" style="margin-top:12px;">
<span class="col-sm-5 nextto" >
<label class="text-primary">Check if you have lived there less than 3 years</label>
<input type="checkbox" name="colived3" id="colived3" class="" data-toggle="collapse" data-target="#coaddr">
</span>
</div>



<div id="coaddr" class="collapse">

<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Address:</label>
<input type="text" class="form-control" name="copre_address" id="copre_address" value="<?php echo $_SESSION['address']['copre_address'];?>" />
<span class="error" id="copre_addressErr">*</span>
</span>
<span class="nextto col-sm-5">
<label class="">unit:</label>

<input type="text"  class="form-control" name="copre_unit" id="copre_unit" value="<?php echo $_SESSION['address']['copre_unit'];?>"  />
<span class="error"><?php echo $_SESSION['address']['copre_unitErr'];?></span>
</span>
</div><div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">City:</label>
<input type="text" class="form-control" name="copre_city" id="copre_city" value="<?php echo $_SESSION['address']['copre_city'];?>" />
<span class="error" id="copre_city">*</span>
</span>
<span class="nextto col-sm-5">
<label class="">Province:</label>
<select class="form-control" id="copre_province" name="copre_province"  >
   <option value="">Select a province</option>
    <option value="alberta"<?php if($_SESSION['address']['copre_province']=="alberta") echo "selected";?>>Alberta</option>
    <option value="british columbia" <?php if($_SESSION['address']['copre_province']=="british columbia") echo "selected";?>>British Columbia</option>
    <option value="manitoba" <?php if($_SESSION['address']['copre_province']=="manitoba") echo "selected";?>>Manitoba</option>
    <option value="new brunswick" <?php if($_SESSION['address']['copre_province']=="new brunswick") echo "selected";?>>New Brunswick</option>
    <option value="newfoundland" <?php if($_SESSION['address']['copre_province']=="newfoundland") echo "selected";?>>NewFoundland & Labrador</option>
    <option value="northwest territories" <?php if($_SESSION['address']['copre_province']=="northwest territories") echo "selected";?>>Northwest Territories</option>
	<option value="nova scotia" <?php if($_SESSION['address']['copre_province']=="nova scotia") echo "selected";?>>Nova Scotia</option>
    <option value="nunavut" <?php if($_SESSION['address']['copre_province']=="nunavut") echo "selected";?>>Nunavut</option>
	<option value="ontario" <?php if($_SESSION['address']['copre_province']=="ontario") echo "selected";?>>Ontario</option>
	<option value="prince" <?php if($_SESSION['address']['copre_province']=="prince") echo "selected";?>>Prince Edward Island</option>
    <option value="quebec" <?php if($_SESSION['address']['copre_province']=="quebec") echo "selected";?>>Quebec</option>
	<option value="Saskatchewan" <?php if($_SESSION['address']['copre_province']=="Saskatchewan") echo "selected";?>>Saskatchewan</option>
    <option value="yukon" <?php if($_SESSION['address']['copre_province']=="yukon") echo "selected";?>>Yukon</option>
  
  </select>
<span class="error" id="copre_provinceErr">*</span>
</span>

</div>


<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Postal code:</label>
<input type="text" class="form-control" name="copre_postal_code" id="copre_postal_code" value="<?php echo $_SESSION['address']['copre_postal_code'];?>" />
<span class="error" id="copre_postal_codeErr">*</span>
</span>
<span class="nextto col-sm-5">
<label class="">Current rent:</label>
<input type="text"  class="form-control" name="copre_current_rent" id="copre_current_rent" value="<?php echo $_SESSION['address']['copre_current_rent'];?>"  />
<span class="error"><?php echo $_SESSION['address']['copre_current_rentErr'];?></span>
</span>
</div>

<div class="col-sm-12">
<span class="nextto col-sm-5">
<label>Time at residence:</label>




<input type="text"  placeholder="year" class="form-control col-sm-2" name="copre_time_at_residence_year" id="copre_time_at_residence_year" value="<?php echo $_SESSION['address']['copre_time_at_residence_year'];?>"  />
<span class="error"><?php echo $_SESSION['address']['copre_time_at_residence_yearErr'];?></span>
<input style="margin-top:5px;" type="text"  placeholder="month" class="form-control col-sm-2" name="copre_time_at_residence_month" id="copre_time_at_residence_month" value="<?php echo $_SESSION['address']['copre_time_at_residence_month'];?>"  />
<span class="error"><?php echo $_SESSION['address']['copre_time_at_residence_monthErr'];?></span>

</span>

</div>

</div><!--end collapse container-->
</div><!--end column-sm-6-->	
<span class="pull-right"><button class="btn btn-danger back-address" type="button"><i class="fa fa-arrow-left"></i>back</button> <button class="btn btn-success next" type="submit">next step <i class="fa fa-arrow-right"></i></button></span>
</div><!--end column-sm-12-->

<!--coborrower section-->	
</form>
 </div>
  
  
  <div id="menu2" class="tab-pane fade">
   
    <form id="employmentinfo" role="form">
	
	<div class="col-sm-12">
		<div class="col-sm-6">	
	<legend>Borrower</legend>
		<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label >Self-employed</label>
<select name="self_employed" id="self_employed" class="form-control">
<option value="">Please select</option>
<option value="yes" <?php if(isset($_SESSION['employment']['self_employed'])&&($_SESSION['employment']['self_employed']=="yes")) echo "selected";?>>Yes</option>
<option value="no" <?php if(isset($_SESSION['employment']['self_employed'])&&($_SESSION['employment']['self_employed']=="no")) echo "selected";?>>No</option>
</select>
</span>
<span class="nextto col-sm-5">
<label>Annual income</label>
<input type="text" id="annual_income" name="annual_income" value="<?php echo $_SESSION['employment']['annual_income'];?>"  class="form-control"/>
<span class="error"><?php echo $_SESSION['employment']['annual_incomeErr'];?></span>
</span>


<!--<span class="nextto col-sm-5">
<label >Gross Revenue</label>
<input type="text" name="revenue" id="revenue" value="<?php //echo $_SESSION['employment']['revenue'];?>" class="form-control"/>
<span class="error"><?php //echo $_SESSION['employment']['revenueErr'];?></span>

</span>-->
</div>




<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>Employer Name</label>
<input type="text" id="employer" name="employer" value="<?php echo $_SESSION['employment']['employer'];?>"  class="form-control"/>
<span class="error"><?php echo $_SESSION['employment']['employerErr'];?></span>
</span>
<span class=" nextto col-sm-5">
<label>Employer Address</label>
<input type="text" id="emp_address" name="emp_address" value="<?php echo $_SESSION['employment']['emp_address'];?>"  class="form-control"/>
<span class="error"><?php echo $_SESSION['employment']['emp_addressErr'];?></span>
</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>city</label>
<input type="text" id="emp_city" name="emp_city" value="<?php echo $_SESSION['employment']['emp_city'];?>"  class="form-control"/>
<span class="error"><?php echo $_SESSION['employment']['emp_cityErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Province:</label>
<select class="form-control" id="emp_province" name="emp_province"  >
    <option value="">Please select</option>
    <option value="alberta"<?php if($_SESSION['employment']['emp_province']=="alberta") echo "selected";?>>Alberta</option>
    <option value="british columbia" <?php if($_SESSION['employment']['emp_province']=="british columbia") echo "selected";?>>British Columbia</option>
    <option value="manitoba" <?php if($_SESSION['employment']['emp_province']=="manitoba") echo "selected";?>>Manitoba</option>
    <option value="new brunswick" <?php if($_SESSION['employment']['emp_province']=="new brunswick") echo "selected";?>>New Brunswick</option>
    <option value="newfoundland" <?php if($_SESSION['employment']['emp_province']=="newfoundland") echo "selected";?>>NewFoundland & Labrador</option>
    <option value="northwest territories" <?php if($_SESSION['employment']['emp_province']=="northwest territories") echo "selected";?>>Northwest Territories</option>
	<option value="nova scotia" <?php if($_SESSION['employment']['emp_province']=="nova scotia") echo "selected";?>>Nova Scotia</option>
    <option value="nunavut" <?php if($_SESSION['employment']['emp_province']=="nunavut") echo "selected";?>>Nunavut</option>
	<option value="ontario" <?php if($_SESSION['employment']['emp_province']=="ontario") echo "selected";?>>Ontario</option>
	<option value="prince" <?php if($_SESSION['employment']['emp_province']=="prince") echo "selected";?>>Prince Edward Island</option>
    <option value="quebec" <?php if($_SESSION['employment']['emp_province']=="quebec") echo "selected";?>>Quebec</option>
	<option value="Saskatchewan" <?php if($_SESSION['employment']['emp_province']=="Saskatchewan") echo "selected";?>>Saskatchewan</option>
    <option value="yukon" <?php if($_SESSION['employment']['emp_province']=="yukon") echo "selected";?>>Yukon</option>
  </select>
</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>postal code</label>
<input type="text" id="emp_postal_code" name="emp_postal_code" value="<?php echo $_SESSION['employment']['emp_postal_code'];?>"  class="form-control"/>
<span class="error"><?php echo $_SESSION['employment']['emp_postal_codeErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">status:</label>
<select class="form-control" id="emp_status" name="emp_status">
<option value="">Please select</option>
    <option value="previous"<?php if($_SESSION['employment']['emp_status']=="previous") echo "selected";?>>previous</option>
    <option value="current" <?php if($_SESSION['employment']['emp_status']=="current") echo "selected";?>>current</option>
    
  </select>

</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>Job title</label>
<input type="text" id="job_title" name="job_title" value="<?php echo $_SESSION['employment']['job_title'];?>"  class="form-control"/>
<span class="error"><?php echo $_SESSION['employment']['job_titleErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Job type:</label>
<select class="form-control" id="job_type" name="job_type">
<option value="">Please select</option>
    <option value="other"<?php if($_SESSION['employment']['job_type']=="other") echo "selected";?>>Other</option>
     
	            <option value="management" <?php if($_SESSION['employment']['job_type']=="management") echo "selected";?>>Management</option>
	            <option value="clerical" <?php if($_SESSION['employment']['job_type']=="clerical") echo "selected";?>>Clerical</option>
	            <option value="trade" <?php if($_SESSION['employment']['job_type']=="trade") echo "selected";?>>Labour/Tradesperson</option>
	            <option value="retired" <?php if($_SESSION['employment']['job_type']=="retired") echo "selected";?>>Retired</option>
	            <option value="professional" <?php if($_SESSION['employment']['job_type']=="professional") echo "selected";?>>Professional</option>
	            <option value="self-employed" <?php if($_SESSION['employment']['job_type']=="self-employed") echo "selected";?>>Self-Employed</option>
  </select>

</span>
</div>

<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Industry sector:</label>
<select class="form-control" id="industry_sector" name="industry_sector">
	<option value="">Please select</option>
    
    <option value="other" <?php if($_SESSION['employment']['industry_sector']=="other") echo "selected";?>>Other</option>
	<option value="construction" <?php if($_SESSION['employment']['industry_sector']=="construction") echo "selected";?>>Construction</option>
	<option value="government" <?php if($_SESSION['employment']['industry_sector']=="government") echo "selected";?>>Government</option>
	<option value="health" <?php if($_SESSION['employment']['industry_sector']=="health") echo "selected";?>>Health</option>
	<option value="education" <?php if($_SESSION['employment']['industry_sector']=="education") echo "selected";?>>Education</option>
	<option value="hightech" <?php if($_SESSION['employment']['industry_sector']=="hightech") echo "selected";?>>High-Tech</option>
	<option value="retail" <?php if($_SESSION['employment']['industry_sector']=="retail") echo "selected";?>>Retail Sales</option>
	<option value="leisure" <?php if($_SESSION['employment']['industry_sector']=="leisure") echo "selected";?>>Leisure/Entertainment</option>
	<option value="banking" <?php if($_SESSION['employment']['industry_sector']=="banking") echo "selected";?>>Banking/Finance</option>
	<option value="transport" <?php if($_SESSION['employment']['industry_sector']=="transportation") echo "selected";?>>Transportation</option>
	<option value="services" <?php if($_SESSION['employment']['industry_sector']=="services") echo "selected";?> >Services</option>
	<option value="manufacturing" <?php if($_SESSION['employment']['industry_sector']=="manufacturing") echo "selected";?>>Manufacturing</option>
	<option value="farming" <?php if($_SESSION['employment']['industry_sector']=="farming") echo "selected";?>>Farming/Natural Resources</option>
	<option value="varies" <?php if($_SESSION['employment']['industry_sector']=="varies") echo "selected";?>>Varies</option>
  </select>

</span>
<span class="nextto col-sm-5">
<label class="">Income type:</label>
<select class="form-control" id="income_type" name="income_type">
<option value="">Please select</option>
    
    <option value="salary" <?php if($_SESSION['employment']['income_type']=="salary") echo "selected";?>>Salary</option>
	<option value="hourly" <?php if($_SESSION['employment']['income_type']=="hourly") echo "selected";?>>Hourly</option>
	<option value="hc" <?php if($_SESSION['employment']['income_type']=="hc") echo "selected";?>>Hourly +Commissions</option>
	<option value="commission" <?php if($_SESSION['employment']['income_type']=="commission") echo "selected";?>>Commissions</option>
	<option value="self-employed" <?php if($_SESSION['employment']['income_type']=="self-employed") echo "selected";?>>Self-Employed</option>
	<option value="rental" <?php if($_SESSION['employment']['income_type']=="rental") echo "selected";?>>Rental Income</option>
	<option value="other" <?php if($_SESSION['employment']['income_type']=="other") echo "selected";?>>Other Employment Income</option>
  </select>

</span>
</div>

<div class="form-group col-sm-12">
<span class="col-sm-3" >
<label>Time at job:</label>
<input type="text"  class="form-control" placeholder="year" name="time_at_job_year" id="time_at_job_year" value="<?php echo $_SESSION['employment']['time_at_job_year'];?>"  />
<span class="error"><?php echo $_SESSION['employment']['time_at_job_yearErr'];?></span>
</span>

<span class="nextto col-sm-2" style="margin-top:32px; margin-left:-25px;">
<input type="text"  class="form-control" placeholder="month" name="time_at_job_month" id="time_at_job_month" value="<?php echo $_SESSION['employment']['time_at_job_month'];?>"  />
<span class="error"><?php echo $_SESSION['employment']['time_at_job_monthErr'];?></span>
</span>

</div>

<div class="col-sm-12">
<span class="nexto col-sm-5">
<label class="text-primary">Worked there less than 3 years</label>
<input type="checkbox" class="" name="preworked" id="preworked" data-target="#emp3" data-toggle="collapse" >
</span>
<span id="twoborr" class="nextto col-sm-5 ifborrow">
<label class="text-primary">Co-borrower information</label>
<input type="checkbox" name="cowork" id="cowork" data-target="#coemp3" data-toggle="collapse" class="">
</span>
</div>

<div id="emp3" class="collapse">
<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label >Self-employed</label>
<select name="pre_self_employed" id="pre_self_employed" class="form-control">
<option value="">Please select</option>
<option value="yes" <?php if(isset($_SESSION['employment']['pre_self_employed'])&&($_SESSION['employment']['pre_self_employed']=="yes")) echo "selected";?>>Yes</option>
<option value="no" <?php if(isset($_SESSION['employment']['pre_self_employed'])&&($_SESSION['employment']['pre_self_employed']=="no")) echo "selected";?>>No</option>
</select>
</span>
<span class="nextto col-sm-5">
<label>Annual income</label>
<input type="text" id="pre_annual_income" name="pre_annual_income" value="<?php echo $_SESSION['employment']['pre_annual_income'];?>"  class="form-control"/>
<span class="error"><?php echo $_SESSION['employment']['pre_annual_incomeErr'];?></span>
</span>



<!--<span class="nextto col-sm-5">
<label >Gross Revenue</label>
<input type="text" name="pre_revenue" id="pre_revenue" value="<?php //echo $_SESSION['employment']['pre_revenue'];?>" class="form-control"/>
<span class="error"><?php //echo $_SESSION['employment']['pre_revenueErr'];?></span>

</span>-->
</div>




<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>Employer Name</label>
<input type="text" id="pre_employer" name="pre_employer" value="<?php echo $_SESSION['employment']['pre_employer'];?>"  class="form-control"/>
<span class="error"><?php echo $_SESSION['employment']['pre_employerErr'];?></span>
</span>
<span class=" nextto col-sm-5">
<label>Employer Address</label>
<input type="text" id="pre_emp_address" name="pre_emp_address" value="<?php echo $_SESSION['employment']['pre_emp_address'];?>"  class="form-control"/>
<span class="error"><?php echo $_SESSION['employment']['pre_emp_addressErr'];?></span>
</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>city</label>
<input type="text" id="pre_emp_city" name="pre_emp_city" value="<?php echo $_SESSION['employment']['pre_emp_city'];?>"  class="form-control"/>
<span class="error"><?php echo $_SESSION['employment']['pre_emp_cityErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Province:</label>
<select class="form-control" id="pre_emp_province" name="pre_emp_province">
	<option value="">Please select</option>
    <option value="alberta"<?php if($_SESSION['employment']['pre_emp_province']=="alberta") echo "selected";?>>Alberta</option>
    <option value="british columbia" <?php if($_SESSION['employment']['pre_emp_province']=="british columbia") echo "selected";?>>British Columbia</option>
    <option value="manitoba" <?php if($_SESSION['employment']['pre_emp_province']=="manitoba") echo "selected";?>>Manitoba</option>
    <option value="new brunswick" <?php if($_SESSION['employment']['pre_emp_province']=="new brunswick") echo "selected";?>>New Brunswick</option>
    <option value="newfoundland" <?php if($_SESSION['employment']['pre_emp_province']=="newfoundland") echo "selected";?>>NewFoundland & Labrador</option>
    <option value="northwest territories" <?php if($_SESSION['employment']['pre_emp_province']=="northwest territories") echo "selected";?>>Northwest Territories</option>
	<option value="nova scotia" <?php if($_SESSION['employment']['pre_emp_province']=="nova scotia") echo "selected";?>>Nova Scotia</option>
    <option value="nunavut" <?php if($_SESSION['employment']['pre_emp_province']=="nunavut") echo "selected";?>>Nunavut</option>
	<option value="ontario" <?php if($_SESSION['employment']['pre_emp_province']=="ontario") echo "selected";?>>Ontario</option>
	<option value="prince" <?php if($_SESSION['employment']['pre_emp_province']=="prince") echo "selected";?>>Prince Edward Island</option>
    <option value="quebec" <?php if($_SESSION['employment']['pre_emp_province']=="quebec") echo "selected";?>>Quebec</option>
	<option value="Saskatchewan" <?php if($_SESSION['employment']['pre_emp_province']=="Saskatchewan") echo "selected";?>>Saskatchewan</option>
    <option value="yukon" <?php if($_SESSION['employment']['pre_emp_province']=="yukon") echo "selected";?>>Yukon</option>
  </select>
</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>postal code</label>
<input type="text" id="pre_emp_postal_code" name="pre_emp_postal_code" value="<?php echo $_SESSION['employment']['pre_emp_postal_code'];?>"  class="form-control"/>
<span class="error"><?php echo $_SESSION['employment']['pre_emp_postal_codeErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">status:</label>
<select class="form-control" id="pre_emp_status" name="pre_emp_status">
	<option value="">Please select</option>
    <option value="previous"<?php if($_SESSION['employment']['pre_emp_status']=="previous") echo "selected";?>>previous</option>
    <option value="current" <?php if($_SESSION['employment']['pre_emp_status']=="current") echo "selected";?>>current</option>
    
  </select>

</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>Job title</label>
<input type="text" id="pre_job_title" name="pre_job_title" value="<?php echo $_SESSION['employment']['pre_job_title'];?>"  class="form-control"/>
<span class="error"><?php echo $_SESSION['employment']['pre_job_titleErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Job type:</label>
<select class="form-control" id="pre_job_type" name="pre_job_type">
<option value="">Please select</option>
     <option value="other"<?php if($_SESSION['employment']['pre_job_type']=="other") echo "selected";?>>Other</option>
     
	            <option value="management" <?php if($_SESSION['employment']['pre_job_type']=="management") echo "selected";?>>Management</option>
	            <option value="clerical" <?php if($_SESSION['employment']['pre_job_type']=="clerical") echo "selected";?>>Clerical</option>
	            <option value="trade" <?php if($_SESSION['employment']['pre_job_type']=="trade") echo "selected";?>>Labour/Tradesperson</option>
	            <option value="retired" <?php if($_SESSION['employment']['pre_job_type']=="retired") echo "selected";?>>Retired</option>
	            <option value="professional" <?php if($_SESSION['employment']['pre_job_type']=="professional") echo "selected";?>>Professional</option>
	            <option value="self-employed" <?php if($_SESSION['employment']['pre_job_type']=="self-employed") echo "selected";?>>Self-Employed</option>
  </select>

</span>
</div>

<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Industry sector:</label>
<select class="form-control" id="pre_industry_sector" name="pre_industry_sector">
	<option value="">Please select</option>
    <option value="other" <?php if($_SESSION['employment']['pre_industry_sector']=="other") echo "selected";?>>Other</option>
	<option value="construction" <?php if($_SESSION['employment']['pre_industry_sector']=="construction") echo "selected";?>>Construction</option>
	<option value="government" <?php if($_SESSION['employment']['pre_industry_sector']=="government") echo "selected";?>>Government</option>
	<option value="health" <?php if($_SESSION['employment']['pre_industry_sector']=="health") echo "selected";?>>Health</option>
	<option value="education" <?php if($_SESSION['employment']['pre_industry_sector']=="education") echo "selected";?>>Education</option>
	<option value="hightech" <?php if($_SESSION['employment']['pre_industry_sector']=="hightech") echo "selected";?>>High-Tech</option>
	<option value="retail" <?php if($_SESSION['employment']['pre_industry_sector']=="retail") echo "selected";?>>Retail Sales</option>
	<option value="leisure" <?php if($_SESSION['employment']['pre_industry_sector']=="leisure") echo "selected";?>>Leisure/Entertainment</option>
	<option value="banking" <?php if($_SESSION['employment']['pre_industry_sector']=="banking") echo "selected";?>>Banking/Finance</option>
	<option value="transport" <?php if($_SESSION['employment']['pre_industry_sector']=="transportation") echo "selected";?>>Transportation</option>
	<option value="services" <?php if($_SESSION['employment']['pre_industry_sector']=="services") echo "selected";?> >Services</option>
	<option value="manufacturing" <?php if($_SESSION['employment']['pre_industry_sector']=="manufacturing") echo "selected";?>>Manufacturing</option>
	<option value="farming" <?php if($_SESSION['employment']['pre_industry_sector']=="farming") echo "selected";?>>Farming/Natural Resources</option>
	<option value="varies" <?php if($_SESSION['employment']['pre_industry_sector']=="varies") echo "selected";?>>Varies</option>
  </select>

</span>
<span class="nextto col-sm-5">
<label class="">Income type:</label>
<select class="form-control" id="pre_income_type" name="pre_income_type">
	<option value="">Please select</option>
    <option value="salary" <?php if($_SESSION['employment']['pre_income_type']=="salary") echo "selected";?>>Salary</option>
	<option value="hourly" <?php if($_SESSION['employment']['pre_income_type']=="hourly") echo "selected";?>>Hourly</option>
	<option value="hc" <?php if($_SESSION['employment']['pre_income_type']=="hc") echo "selected";?>>Hourly +Commissions</option>
	<option value="commission" <?php if($_SESSION['employment']['pre_income_type']=="commission") echo "selected";?>>Commissions</option>
	<option value="self-employed" <?php if($_SESSION['employment']['pre_income_type']=="self-employed") echo "selected";?>>Self-Employed</option>
	<option value="rental" <?php if($_SESSION['employment']['pre_income_type']=="rental") echo "selected";?>>Rental Income</option>
	<option value="other" <?php if($_SESSION['employment']['pre_income_type']=="other") echo "selected";?>>Other Employment Income</option>
  </select>

</span>
</div>

<div class="form-group col-sm-12">
<span class=" col-sm-3">
<label class="">Time at job:</label>
<input type="text"  class="form-control" name="pre_time_at_job_year" id="pre_time_at_job_year" placeholder="year" value="<?php echo $_SESSION['employment']['pre_time_at_job_year'];?>"  />
<span class="error"><?php echo $_SESSION['employment']['pre_time_at_job_yearErr'];?></span>
</span>

<span class="nextto col-sm-2" style="margin-top:32px; margin-left:-25px;">

<input type="text"  class="form-control" name="pre_time_at_job_month" placeholder="month" id="pre_time_at_job_month" value="<?php echo $_SESSION['employment']['pre_time_at_job_month'];?>"  />
<span class="error"><?php echo $_SESSION['employment']['pre_time_at_job_monthErr'];?></span>
</span>

</div>

</div><!--end container for < 3 years employed-->
</div><!--end col-sm-6-->		
<div id="coemp3" class="col-sm-6 collapse">	<!--co-bor empp info-->
<legend>Coborrower</legend>
<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label >Self-employed</label>
<select name="coself_employed" id="coself_employed" class="form-control">
<option value="">Please select</option>
<option value="yes" <?php if(isset($_SESSION['employment']['coself_employed'])&&($_SESSION['employment']['coself_employed']=="yes")) echo "selected";?>>Yes</option>
<option value="no" <?php if(isset($_SESSION['employment']['coself_employed'])&&($_SESSION['employment']['coself_employed']=="no")) echo "selected";?>>No</option>
</select>
</span>
<span class=" nextto col-sm-5">
<label>Annual income</label>
<input type="text" id="coannual_income" name="coannual_income" value="<?php echo $_SESSION['employment']['coannual_income'];?>"  class="form-control"/>
<span class="error"><?php echo $_SESSION['employment']['coannual_incomeErr'];?></span>
</span>


<!--
<span class="nextto col-sm-5">
<label >Gross Revenue</label>
<input type="text" name="corevenue" id="corevenue" value="<?php //echo $_SESSION['employment']['corevenue'];?>" class="form-control"/>
<span class="error"><?php //echo $_SESSION['employment']['corevenueErr'];?></span>-->

</span>
</div>




<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>Employer Name</label>
<input type="text" id="coemployer" name="coemployer" value="<?php echo $_SESSION['employment']['coemployer'];?>"  class="form-control"/>
<span class="error"><?php echo $_SESSION['employment']['coemployerErr'];?></span>
</span>
<span class=" nextto col-sm-5">
<label>Employer Address</label>
<input type="text" id="coemp_address" name="coemp_address" value="<?php echo $_SESSION['employment']['coemp_address'];?>"  class="form-control"/>
<span class="error"><?php echo $_SESSION['employment']['coemp_addressErr'];?></span>
</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>City</label>
<input type="text" id="coemp_city" name="coemp_city" value="<?php echo $_SESSION['employment']['coemp_city'];?>"  class="form-control"/>
<span class="error"><?php echo $_SESSION['employment']['coemp_cityErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Province:</label>
<select class="form-control" id="coemp_province" name="coemp_province">
	<option value="">Please select</option>
    <option value="alberta"<?php if($_SESSION['employment']['coemp_province']=="alberta") echo "selected";?>>Alberta</option>
    <option value="british columbia" <?php if($_SESSION['employment']['coemp_province']=="british columbia") echo "selected";?>>British Columbia</option>
    <option value="manitoba" <?php if($_SESSION['employment']['coemp_province']=="manitoba") echo "selected";?>>Manitoba</option>
    <option value="new brunswick" <?php if($_SESSION['employment']['coemp_province']=="new brunswick") echo "selected";?>>New Brunswick</option>
    <option value="newfoundland" <?php if($_SESSION['employment']['coemp_province']=="newfoundland") echo "selected";?>>NewFoundland & Labrador</option>
    <option value="northwest territories" <?php if($_SESSION['employment']['coemp_province']=="northwest territories") echo "selected";?>>Northwest Territories</option>
	<option value="nova scotia" <?php if($_SESSION['employment']['coemp_province']=="nova scotia") echo "selected";?>>Nova Scotia</option>
    <option value="nunavut" <?php if($_SESSION['employment']['coemp_province']=="nunavut") echo "selected";?>>Nunavut</option>
	<option value="ontario" <?php if($_SESSION['employment']['coemp_province']=="ontario") echo "selected";?>>Ontario</option>
	<option value="prince" <?php if($_SESSION['employment']['coemp_province']=="prince") echo "selected";?>>Prince Edward Island</option>
    <option value="quebec" <?php if($_SESSION['employment']['coemp_province']=="quebec") echo "selected";?>>Quebec</option>
	<option value="Saskatchewan" <?php if($_SESSION['employment']['coemp_province']=="Saskatchewan") echo "selected";?>>Saskatchewan</option>
    <option value="yukon" <?php if($_SESSION['employment']['coemp_province']=="yukon") echo "selected";?>>Yukon</option>
  </select>
</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>postal code</label>
<input type="text" id="coemp_postal_code" name="coemp_postal_code" value="<?php echo $_SESSION['employment']['coemp_postal_code'];?>"  class="form-control"/>
<span class="error"><?php echo $_SESSION['employment']['coemp_postal_codeErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">status:</label>
<select class="form-control" id="coemp_status" name="coemp_status">
	<option value="">Please select</option>
    <option value="previous"<?php if($_SESSION['employment']['coemp_status']=="previous") echo "selected";?>>previous</option>
    <option value="current" <?php if($_SESSION['employment']['coemp_status']=="current") echo "selected";?>>current</option>
    
  </select>

</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>Job title</label>
<input type="text" id="cojob_title" name="cojob_title" value="<?php echo $_SESSION['employment']['cojob_title'];?>"  class="form-control"/>
<span class="error"><?php echo $_SESSION['employment']['cojob_titleErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Job type:</label>
<select class="form-control" id="cojob_type" name="cojob_type">
	<option value="">Please select</option>
     <option value="other"<?php if($_SESSION['employment']['cojob_type']=="other") echo "selected";?>>Other</option>
     
	            <option value="management" <?php if($_SESSION['employment']['cojob_type']=="management") echo "selected";?>>Management</option>
	            <option value="clerical" <?php if($_SESSION['employment']['cojob_type']=="clerical") echo "selected";?>>Clerical</option>
	            <option value="trade" <?php if($_SESSION['employment']['cojob_type']=="trade") echo "selected";?>>Labour/Tradesperson</option>
	            <option value="retired" <?php if($_SESSION['employment']['cojob_type']=="retired") echo "selected";?>>Retired</option>
	            <option value="professional" <?php if($_SESSION['employment']['cojob_type']=="professional") echo "selected";?>>Professional</option>
	            <option value="self-employed" <?php if($_SESSION['employment']['cojob_type']=="self-employed") echo "selected";?>>Self-Employed</option>
  </select>

</span>
</div>

<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Industry sector:</label>
<select class="form-control" id="coindustry_sector" name="coindustry_sector">
	<option value="">Please select</option>
    <option value="other" <?php if($_SESSION['employment']['coindustry_sector']=="other") echo "selected";?>>Other</option>
	<option value="construction" <?php if($_SESSION['employment']['coindustry_sector']=="construction") echo "selected";?>>Construction</option>
	<option value="government" <?php if($_SESSION['employment']['coindustry_sector']=="government") echo "selected";?>>Government</option>
	<option value="health" <?php if($_SESSION['employment']['coindustry_sector']=="health") echo "selected";?>>Health</option>
	<option value="education" <?php if($_SESSION['employment']['coindustry_sector']=="education") echo "selected";?>>Education</option>
	<option value="hightech" <?php if($_SESSION['employment']['coindustry_sector']=="hightech") echo "selected";?>>High-Tech</option>
	<option value="retail" <?php if($_SESSION['employment']['coindustry_sector']=="retail") echo "selected";?>>Retail Sales</option>
	<option value="leisure" <?php if($_SESSION['employment']['coindustry_sector']=="leisure") echo "selected";?>>Leisure/Entertainment</option>
	<option value="banking" <?php if($_SESSION['employment']['coindustry_sector']=="banking") echo "selected";?>>Banking/Finance</option>
	<option value="transport" <?php if($_SESSION['employment']['coindustry_sector']=="transportation") echo "selected";?>>Transportation</option>
	<option value="services" <?php if($_SESSION['employment']['coindustry_sector']=="services") echo "selected";?> >Services</option>
	<option value="manufacturing" <?php if($_SESSION['employment']['coindustry_sector']=="manufacturing") echo "selected";?>>Manufacturing</option>
	<option value="farming" <?php if($_SESSION['employment']['coindustry_sector']=="farming") echo "selected";?>>Farming/Natural Resources</option>
	<option value="varies" <?php if($_SESSION['employment']['coindustry_sector']=="varies") echo "selected";?>>Varies</option>
  </select>

</span>
<span class="nextto col-sm-5">
<label class="">Income type:</label>
<select class="form-control" id="coincome_type" name="coincome_type">
	<option value="">Please select</option>
    <option value="salary" <?php if($_SESSION['employment']['coincome_type']=="salary") echo "selected";?>>Salary</option>
	<option value="hourly" <?php if($_SESSION['employment']['coincome_type']=="hourly") echo "selected";?>>Hourly</option>
	<option value="hc" <?php if($_SESSION['employment']['coincome_type']=="hc") echo "selected";?>>Hourly +Commissions</option>
	<option value="commission" <?php if($_SESSION['employment']['coincome_type']=="commission") echo "selected";?>>Commissions</option>
	<option value="self-employed" <?php if($_SESSION['employment']['coincome_type']=="self-employed") echo "selected";?>>Self-Employed</option>
	<option value="rental" <?php if($_SESSION['employment']['coincome_type']=="rental") echo "selected";?>>Rental Income</option>
	<option value="other" <?php if($_SESSION['employment']['coincome_type']=="other") echo "selected";?>>Other Employment Income</option>
  </select>

</span>
</div>

<div class="form-group col-sm-12">

<span class="nextto col-sm-3">
<label class="">Time at job:</label>
<input class="form-control col-sm-2" type="text" placeholder="year" name="cotime_at_job_year" id="cotime_at_job_year" value="<?php echo $_SESSION['employment']['cotime_at_job_year'];?>">
<span class="error"><?php echo $_SESSION['employment']['cotime_at_job_yearErr'];?></span>
</span>
<span class="col-sm-2" style="margin-top:32px; margin-left:-25px;">
<input class="form-control col-sm-2" type="text" placeholder="month" name="cotime_at_job_month" id="cotime_at_job_month" value="<?php echo $_SESSION['employment']['cotime_at_job_month'];
?>">
<span class="error"><?php echo $_SESSION['employment']['cotime_at_job_monthErr'];?></span>
</span>
</div>

<div class="form-group">
<label class="text-primary">Click if you worked there less than three years.</label>
<input type="checkbox" name="copreworked3" id="copreworked3" data-target="#coemp4" data-toggle="collapse" class="btn btn-info">
</div>

<div id="coemp4" class="collapse">
<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label >Self-employed</label>
<select name="copre_self_employed" id="copre_self_employed" class="form-control">
<option value="">Please select</option>
<option value="yes" <?php if(isset($_SESSION['employment']['copre_self_employed'])&&($_SESSION['employment']['copre_self_employed']=="yes")) echo "selected";?>>Yes</option>
<option value="no" <?php if(isset($_SESSION['employment']['copre_self_employed'])&&($_SESSION['employment']['copre_self_employed']=="no")) echo "selected";?>>No</option>
</select>
</span>
<span class=" nextto col-sm-5">
<label>Annual income</label>
<input type="text" id="copre_annual_income" name="copre_annual_income" value="<?php echo $_SESSION['employment']['copre_annual_income'];?>"  class="form-control"/>
<span class="error"><?php echo $_SESSION['employment']['copre_annual_incomeErr'];?></span>
</span>


<!--<span class="nextto col-sm-5">
<label >Gross Revenue</label>
<input type="text" name="copre_revenue" id="copre_revenue" value="<?php //echo $_SESSION['employment']['copre_revenue'];?>" class="form-control"/>
<span class="error"><?php //echo $_SESSION['employment']['copre_revenueErr'];?></span>

</span>-->
</div>




<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>Employer Name</label>
<input type="text" id="copre_employer" name="copre_employer" value="<?php echo $_SESSION['employment']['copre_employer'];?>"  class="form-control"/>
<span class="error"><?php echo $_SESSION['employment']['copre_employerErr'];?></span>
</span>
<span class=" nextto col-sm-5">
<label>Employer Address</label>
<input type="text" id="copre_emp_address" name="copre_emp_address" value="<?php echo $_SESSION['employment']['copre_emp_address'];?>"  class="form-control"/>
<span class="error"><?php echo $_SESSION['employment']['copre_emp_addressErr'];?></span>
</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>city</label>
<input type="text" id="copre_emp_city" name="copre_emp_city" value="<?php echo $_SESSION['employment']['copre_emp_city'];?>"  class="form-control"/>
<span class="error"><?php echo $_SESSION['employment']['copre_emp_cityErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Province:</label>
<select class="form-control" id="copre_emp_province" name="copre_emp_province">
	<option value="">Please select</option>
    <option value="alberta"<?php if($_SESSION['employment']['copre_emp_province']=="alberta") echo "selected";?>>Alberta</option>
    <option value="british columbia" <?php if($_SESSION['employment']['copre_emp_province']=="british columbia") echo "selected";?>>British Columbia</option>
    <option value="manitoba" <?php if($_SESSION['employment']['copre_emp_province']=="manitoba") echo "selected";?>>Manitoba</option>
    <option value="new brunswick" <?php if($_SESSION['employment']['copre_emp_province']=="new brunswick") echo "selected";?>>New Brunswick</option>
    <option value="newfoundland" <?php if($_SESSION['employment']['copre_emp_province']=="newfoundland") echo "selected";?>>NewFoundland & Labrador</option>
    <option value="northwest territories" <?php if($_SESSION['employment']['copre_emp_province']=="northwest territories") echo "selected";?>>Northwest Territories</option>
	<option value="nova scotia" <?php if($_SESSION['employment']['copre_emp_province']=="nova scotia") echo "selected";?>>Nova Scotia</option>
    <option value="nunavut" <?php if($_SESSION['employment']['copre_emp_province']=="nunavut") echo "selected";?>>Nunavut</option>
	<option value="ontario" <?php if($_SESSION['employment']['copre_emp_province']=="ontario") echo "selected";?>>Ontario</option>
	<option value="prince" <?php if($_SESSION['employment']['copre_emp_province']=="prince") echo "selected";?>>Prince Edward Island</option>
    <option value="quebec" <?php if($_SESSION['employment']['copre_emp_province']=="quebec") echo "selected";?>>Quebec</option>
	<option value="Saskatchewan" <?php if($_SESSION['employment']['copre_emp_province']=="Saskatchewan") echo "selected";?>>Saskatchewan</option>
    <option value="yukon" <?php if($_SESSION['employment']['copre_emp_province']=="yukon") echo "selected";?>>Yukon</option>
  </select>
</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>postal code</label>
<input type="text" id="copre_emp_postal_code" name="copre_emp_postal_code" value="<?php echo $_SESSION['employment']['copre_emp_postal_code'];?>"  class="form-control"/>
<span class="error"><?php echo $_SESSION['employment']['copre_emp_postal_codeErr'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">status:</label>
<select class="form-control" id="copre_emp_status" name="copre_emp_status">
	<option value="">Please select</option>
    <option value="previous"<?php if($_SESSION['employment']['copre_emp_status']=="previous") echo "selected";?>>previous</option>
    <option value="current" <?php if($_SESSION['employment']['copre_emp_status']=="current") echo "selected";?>>current</option>
    
  </select>

</span>
</div>

<div class="form-group col-sm-12">
<span class=" nextto col-sm-5">
<label>Job title</label>
<input type="text" id="copre_job_title" name="copre_job_title" value="<?php echo $_SESSION['employment']['copre_job_title'];?>"  class="form-control"/>
<span class="error"><?php echo $_SESSION['employment']['copre_job_title'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Job type:</label>
<select class="form-control" id="copre_job_type" name="copre_job_type">
	<option value="">Please select</option>
     <option value="other"<?php if($_SESSION['employment']['copre_job_type']=="other") echo "selected";?>>Other</option>
     
	            <option value="management" <?php if($_SESSION['employment']['copre_job_type']=="management") echo "selected";?>>Management</option>
	            <option value="clerical" <?php if($_SESSION['employment']['copre_job_type']=="clerical") echo "selected";?>>Clerical</option>
	            <option value="trade" <?php if($_SESSION['employment']['copre_job_type']=="trade") echo "selected";?>>Labour/Tradesperson</option>
	            <option value="retired" <?php if($_SESSION['employment']['copre_job_type']=="retired") echo "selected";?>>Retired</option>
	            <option value="professional" <?php if($_SESSION['employment']['copre_job_type']=="professional") echo "selected";?>>Professional</option>
	            <option value="self-employed" <?php if($_SESSION['employment']['copre_job_type']=="self-employed") echo "selected";?>>Self-Employed</option>
  </select>

</span>
</div>

<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Industry sector:</label>
<select class="form-control" id="copre_industry_sector" name="copre_industry_sector">
<option value="">Please select</option>
    <option value="other" <?php if($_SESSION['employment']['copre_industry_sector']=="other") echo "selected";?>>Other</option>
	<option value="construction" <?php if($_SESSION['employment']['copre_industry_sector']=="construction") echo "selected";?>>Construction</option>
	<option value="government" <?php if($_SESSION['employment']['copre_industry_sector']=="government") echo "selected";?>>Government</option>
	<option value="health" <?php if($_SESSION['employment']['copre_industry_sector']=="health") echo "selected";?>>Health</option>
	<option value="education" <?php if($_SESSION['employment']['copre_industry_sector']=="education") echo "selected";?>>Education</option>
	<option value="hightech" <?php if($_SESSION['employment']['copre_industry_sector']=="hightech") echo "selected";?>>High-Tech</option>
	<option value="retail" <?php if($_SESSION['employment']['copre_industry_sector']=="retail") echo "selected";?>>Retail Sales</option>
	<option value="leisure" <?php if($_SESSION['employment']['copre_industry_sector']=="leisure") echo "selected";?>>Leisure/Entertainment</option>
	<option value="banking" <?php if($_SESSION['employment']['copre_industry_sector']=="banking") echo "selected";?>>Banking/Finance</option>
	<option value="transport" <?php if($_SESSION['employment']['copre_industry_sector']=="transportation") echo "selected";?>>Transportation</option>
	<option value="services" <?php if($_SESSION['employment']['copre_industry_sector']=="services") echo "selected";?> >Services</option>
	<option value="manufacturing" <?php if($_SESSION['employment']['copre_industry_sector']=="manufacturing") echo "selected";?>>Manufacturing</option>
	<option value="farming" <?php if($_SESSION['employment']['copre_industry_sector']=="farming") echo "selected";?>>Farming/Natural Resources</option>
	<option value="varies" <?php if($_SESSION['employment']['copre_industry_sector']=="varies") echo "selected";?>>Varies</option>
  </select>

</span>
<span class="nextto col-sm-5">
<label class="">Income type:</label>
<select class="form-control" id="copre_income_type" name="copre_income_type">
	<option value="">Please select</option>
    <option value="salary" <?php if($_SESSION['employment']['copre_income_type']=="salary") echo "selected";?>>Salary</option>
	<option value="hourly" <?php if($_SESSION['employment']['copre_income_type']=="hourly") echo "selected";?>>Hourly</option>
	<option value="hc" <?php if($_SESSION['employment']['copre_income_type']=="hc") echo "selected";?>>Hourly +Commissions</option>
	<option value="commission" <?php if($_SESSION['employment']['copre_income_type']=="commission") echo "selected";?>>Commissions</option>
	<option value="self-employed" <?php if($_SESSION['employment']['copre_income_type']=="self-employed") echo "selected";?>>Self-Employed</option>
	<option value="rental" <?php if($_SESSION['employment']['copre_income_type']=="rental") echo "selected";?>>Rental Income</option>
	<option value="other" <?php if($_SESSION['employment']['copre_income_type']=="other") echo "selected";?>>Other Employment Income</option>
  </select>

</span>
</div>

<div class="form-group col-sm-12">
<span class="nextto col-sm-3">
<label class="">Time at job:</label>
<input type="text" class="form-control" placeholder="year" name="copre_time_at_job_year" id="copre_time_at_job_year" value="<?php echo $_SESSION['employment']['copre_time_at_job_year'];?>">
<span class="error"><?php echo $_SESSION['employment']['copre_time_at_job_yearErr'];?></span>
</span>
<span class="nextto col-sm-2" style="margin-top:32px; margin-left:-25px;">

<input type="text" class="form-control" placeholder="month" name="copre_time_at_job_month" id="copre_time_at_job_month" value="<?php echo $_SESSION['employment']['copre_time_at_job_month'];
?>">
<span class="error"><?php echo $_SESSION['employment']['copre_time_at_job_monthErr'];?></span>
</span>
</div>
</div>
</div><!-- col sm-6-->
<span class="pull-right"><button class="btn btn-danger back-employment" type="button"><i class="fa fa-arrow-left"></i>back</button> <button class="btn btn-success next" type="submit">next step <i class="fa fa-arrow-right"></i></button></span>
</div>
</form><!--end employment section-->
</div>

<div id="menu3" class="tab-pane fade">
    
	<form id="otherincome" role="form">
	
	<div class="col-sm-12">
		<div class="col-sm-6">
		<div class="form-group col-sm-12">
		<legend>Borrower</legend>
<span class="nextto col-sm-5">
<label class="">Income period:</label>
<select class="form-control" name="other_income_frequency1" id="other_income_frequency1">
<option value="">Please select</option>
<option value="monthly" <?php if($_SESSION['otherincomeval']['other_income_frequency1']=="monthly") echo "selected";?>>monthly</option>
<option value="annually" <?php if($_SESSION['otherincomeval']['other_income_frequency1']=="annually") echo "selected";?>>annually</option>
</select>		
</span>
</div>		
		<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Income:</label>
<input type="text" class="form-control" name="other_income_1" id="other_income_1" value="<?php echo $_SESSION['otherincomeval']['other_income_1'];?>" />
<span class="error"> <?php echo $_SESSION['otherincomeval']['other_income_1Err'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Description</label>
<input type="text" name="other_description_1" id="other_description_1" class="form-control" value="<?php echo $_SESSION['otherincomeval']['other_description_1'];?> "/>
<span class="error"> <?php echo $_SESSION['otherincomeval']['other_description_1Err'];?></span>
</span>
</div>
<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Income:</label>
<input type="text" class="form-control" name="other_income_2" id="other_income_2" value="<?php echo $_SESSION['otherincomeval']['other_income_2'];?>" />
<span class="error"> <?php echo $_SESSION['otherincomeval']['other_income_2Err'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Description</label>
<input type="text" name="other_description_2" id="other_description_2" class="form-control" value="<?php echo $_SESSION['otherincomeval']['other_description_2'];?> "/>
<span class="error"> <?php echo $_SESSION['otherincomeval']['other_description_2Err'];?></span>
</span>
</div>	
</div><!--end col-sm-6-->
		<div id="threeborr" class="col-sm-6 ifborrow">
		<div id='coborotherincome' class="form-group col-sm-12">
		<legend>Co-borrower</legend>
<span class="nextto col-sm-5">
<label class="">Income period:</label>
<select class="form-control" name="other_income_frequency2" id="other_income_frequency2">
<option value="">Please select</option>
<option value="monthly" <?php if($_SESSION['otherincomeval']['other_income_frequency2']=="monthly") echo "selected";?>>monthly</option>
<option value="annually" <?php if($_SESSION['otherincomeval']['other_income_frequency2']=="annually") echo "selected";?>>annually</option>
</select>		
</span>
</div>		
		
		
		<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Income:</label>
<input type="text" class="form-control" name="coother_income_1" id="coother_income_1" value="<?php echo $_SESSION['otherincomeval']['coother_income_1'];?>" />
<span class="error"> <?php echo $_SESSION['otherincomeval']['coother_income_1Err'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Description</label>
<input type="text" name="coother_description_1" id="coother_description_1" class="form-control" value="<?php echo $_SESSION['otherincomeval']['coother_description_1'];?> "/>
<span class="error"> <?php echo $_SESSION['otherincomeval']['coother_description_1Err'];?></span>
</span>
</div>
<div class="form-group col-sm-12">
<span class="nextto col-sm-5">
<label class="">Income:</label>
<input type="text" class="form-control" name="coother_income_2" id="coother_income_2" value="<?php echo $_SESSION['otherincomeval']['coother_income_2'];?>" />
<span class="error"> <?php echo $_SESSION['otherincomeval']['coother_income_2Err'];?></span>
</span>
<span class="nextto col-sm-5">
<label class="">Description</label>
<input type="text" name="coother_description_2" id="coother_description_2" class="form-control" value="<?php echo $_SESSION['otherincomeval']['coother_description_2'];?> "/>
<span class="error"> <?php echo $_SESSION['otherincomeval']['coother_description_2Err'];?></span>
</span>
</div>	
</div>
<span class="pull-right"><button class="btn btn-danger back-other" type="button"><i class="fa fa-arrow-left"></i>back</button> <button class="btn btn-success next " type="submit">next step <i class="fa fa-arrow-right"></i></button></span>
</div>
	</form>	
</div><!--end co-borrower-->
	
  
  
  
  
  <div id="menu4" class="tab-pane fade">
    <span class="pull-right"><button class="btn btn-danger back-additional" type="button"><i class="fa fa-arrow-left"></i>back</button> </span>
	<!--ASSETS-->
    <form id="otherinfo" role="form">
	
	
		<div  class="form-group col-sm-12" >
		<legend>Assets</legend>
		<div id="assetholder">
		</div>
		<div style="margin-left:10px;" ><i style="color:green" onclick="tests()" class="fa fa-plus-circle "></i>Add another asset(maximum is four(4))</div>

		</div>
		<br/>
		<br/>
	
		<div class="form-group col-sm-12">
		<legend>Liability</legend>
		<div id="liabilityholder">
		</div>
		<div style="margin-left:10px;"><i style="color:green;" onclick="test2()" class="fa fa-plus-circle "></i>Add another liability(maximum is four(4))</div>

		</div>
		<br/>
		<br/>

		<div class="form-group col-sm-12">
	<legend>Properties owned by applicant/co-applicant</legend>	
		<div id="propertyholder">
		</div>
		<div style="margin-left:10px;"><i style="color:green;"  onclick="test3()" class="fa fa-plus-circle "></i>Add another property(maximum is four(4))</div>	
		</div>	
		<br/>
		<br/>


		<div class="form-group col-sm-12">
		<legend>New poperty information</legend>	
<span class="nextto col-sm-2">
<label class="">Street number:</label>
<input type="text" class="form-control" name="np_street_number" id="np_street_number" value="<?php echo $_SESSION['otherinfoval']['np_street_number'];?>" />
<span class="error"> <?php echo $_SESSION['otherinfoval']['np_street_numberErr'];?></span>
</span>
<span class="nextto col-sm-2">
<label class="">Street name</label>
<input type="text" name="np_street_name" id="np_street_name" class="form-control" value="<?php echo $_SESSION['otherinfoval']['np_street_name'];?> "/>
<span class="error"> <?php echo $_SESSION['otherinfoval']['np_street_nameErr'];?></span>
</span>
<span class="nextto col-sm-2">
<label class="">Street type:</label>
<select class="form-control" id="np_street_type" name="np_street_type">
	<option value="">Please select</option>
    <option value="" selected>Select A Street Type</option>
			<option value="ave"<?php if($_SESSION['otherinfoval']['np_street_type']=="ave") echo "selected";?>>Avenue</option>
			<option value="blvd"<?php if($_SESSION['otherinfoval']['np_street_type']=="blvd") echo "selected";?>>Boulevard</option>
			<option value="crt"<?php if($_SESSION['otherinfoval']['np_street_type']=="crt") echo "selected";?>>Court</option>
			<option value="cres"<?php if($_SESSION['otherinfoval']['np_street_type']=="cres") echo "selected";?>>Crescent</option>
			<option value="dr"<?php if($_SESSION['otherinfoval']['np_street_type']=="dr") echo "selected";?>>Drive</option>
			<option value="lane"<?php if($_SESSION['otherinfoval']['np_street_type']=="lane") echo "selected";?>>Lane</option>
            <option value="pl"<?php if($_SESSION['otherinfoval']['np_street_type']=="pl") echo "selected";?>>Place</option>
			<option value="rd"<?php if($_SESSION['otherinfoval']['np_street_type']=="rd") echo "selected";?>>Road</option>
			<option value="rte"<?php if($_SESSION['otherinfoval']['np_street_type']=="rte") echo "selected";?>>Route</option>
			<option value="st"<?php if($_SESSION['otherinfoval']['np_street_type']=="st") echo "selected";?>>Street</option>
			<option value="terr"<?php if($_SESSION['otherinfoval']['np_street_type']=="terr") echo "selected";?>>Terrace</option>
			<option value="other"<?php if($_SESSION['otherinfoval']['np_street_type']=="other") echo "selected";?>>Other...</option>
  </select>

</span>
<span class="nextto col-sm-2">
<label class="">Street direction:</label>
<select class="form-control" id="np_direction" name="np_direction">
	
    <option value="" selected>Select A Direction</option>
			<option value="north"<?php if($_SESSION['otherinfoval']['np_direction']=="north") echo "selected";?> >North</option>
			<option value="south"<?php if($_SESSION['otherinfoval']['np_direction']=="south") echo "selected";?>>South</option>
			<option value="east"<?php if($_SESSION['otherinfoval']['np_direction']=="east") echo "selected";?>>East</option>
			<option value="west"<?php if($_SESSION['otherinfoval']['np_direction']=="west") echo "selected";?>>West</option>
			<option value="northeast"<?php if($_SESSION['otherinfoval']['np_direction']=="northeast") echo "selected";?>>Northeast</option>
			<option value="southeast"<?php if($_SESSION['otherinfoval']['np_direction']=="southeast") echo "selected";?>>Southeast</option>
            <option value="northwest"<?php if($_SESSION['otherinfoval']['np_direction']=="northwest") echo "selected";?>>Northwest</option>
			<option value="southwest"<?php if($_SESSION['otherinfoval']['np_direction']=="southwest") echo "selected";?>>Southwest</option>
  </select>

</span>
<span class="nextto col-sm-2">
<label class="">unit:</label>
<input type="text" name="np_unit" id="np_unit" class="form-control" value="<?php echo $_SESSION['otherinfoval']['np_unit'];?> "/>
<span class="error"> <?php echo $_SESSION['otherinfoval']['np_unitErr'];?></span>
</span>
<span class="nextto col-sm-2">
<label class="">city:</label>
<input type="text" name="np_city" id="np_city" class="form-control" value="<?php echo $_SESSION['otherinfoval']['np_city'];?> "/>
<span class="error"> <?php echo $_SESSION['otherinfoval']['np_cityErr'];?></span>
</span>
<span class="nextto col-sm-2">
<label class="">Province:</label>
<select class="form-control" id="np_province" name="np_province">
	<option value="">Please select</option>
    <option value="alberta"<?php if($_SESSION['otherinfoval']['np_province']=="alberta") echo "selected";?>>Alberta</option>
    <option value="british columbia" <?php if($_SESSION['otherinfoval']['np_province']=="british columbia") echo "selected";?>>British Columbia</option>
    <option value="manitoba" <?php if($_SESSION['otherinfoval']['np_province']=="manitoba") echo "selected";?>>Manitoba</option>
    <option value="new brunswick" <?php if($_SESSION['otherinfoval']['np_province']=="new brunswick") echo "selected";?>>New Brunswick</option>
    <option value="newfoundland" <?php if($_SESSION['otherinfoval']['np_province']=="newfoundland") echo "selected";?>>NewFoundland & Labrador</option>
    <option value="northwest territories" <?php if($_SESSION['otherinfoval']['np_province']=="northwest territories") echo "selected";?>>Northwest Territories</option>
	<option value="nova scotia" <?php if($_SESSION['otherinfoval']['np_province']=="nova scotia") echo "selected";?>>Nova Scotia</option>
    <option value="nunavut" <?php if($_SESSION['otherinfoval']['np_province']=="nunavut") echo "selected";?>>Nunavut</option>
	<option value="ontario" <?php if($_SESSION['otherinfoval']['np_province']=="ontario") echo "selected";?>>Ontario</option>
	<option value="prince" <?php if($_SESSION['otherinfoval']['np_province']=="prince") echo "selected";?>>Prince Edward Island</option>
    <option value="quebec" <?php if($_SESSION['otherinfoval']['np_province']=="quebec") echo "selected";?>>Quebec</option>
	<option value="Saskatchewan" <?php if($_SESSION['otherinfoval']['np_province']=="Saskatchewan") echo "selected";?>>Saskatchewan</option>
    <option value="yukon" <?php if($_SESSION['otherinfoval']['np_province']=="yukon") echo "selected";?>>Yukon</option>
  </select>

</span>
<span class="nextto col-sm-2">
<label class="">postal code:</label>
<input type="text" name="np_postal_code" id="np_postal_code" class="form-control" value="<?php echo $_SESSION['otherinfoval']['np_postal_code'];?> "/>
<span class="error"> <?php echo $_SESSION['otherinfoval']['np_postal_codeErr'];?></span>
</span>
<span class="nextto col-sm-2">
<label class="">year built:</label>
<input type="text" name="np_year_built" id="np_year_built" class="form-control" value="<?php echo $_SESSION['otherinfoval']['np_year_built'];?> "/>
<span class="error"> <?php echo $_SESSION['otherinfoval']['np_year_builtErr'];?></span>
</span>
<span class="nextto col-sm-2">
<label class="">occupancy:</label>
<select class="form-control" id="np_occupancy" name="np_occupancy">
    <option value="">Select a value</option>
	<option value="owner"<?php if($_SESSION['otherinfoval']['np_occupancy']=="owner") echo "selected";?>>Owner-Occupied</option>
	<option value="owner_rental"<?php if($_SESSION['otherinfoval']['np_occupancy']=="owner_rental") echo "selected";?>>Owner-Occupied &amp; Rental</option>
	<option value="rental"<?php if($_SESSION['otherinfoval']['np_occupancy']=="rental") echo "selected";?>>Rental</option>
	<option value="second_home"<?php if($_SESSION['otherinfoval']['np_occupancy']=="second_home") echo "selected";?>>Second Home</option>
  </select>

</span>
<span class="nextto col-sm-2">
<label class="">Tenure:</label>
<select class="form-control" id="np_tenure" name="np_tenure">
	
    <option value="">Select A Tenure Type</option>		
			<option value="freehold"<?php if($_SESSION['otherinfoval']['np_tenure']=="freehold") echo "selected";?>>Freehold</option>
			<option value="leasehold"<?php if($_SESSION['otherinfoval']['np_tenure']=="leasehold") echo "selected";?>>Leasehold</option>
			<option value="condo"<?php if($_SESSION['otherinfoval']['np_tenure']=="condo") echo "selected";?>>Condo / Strata</option>
			<option value="reserve"<?php if($_SESSION['otherinfoval']['np_tenure']=="reserve") echo "selected";?>>Indian Reserve</option>
			<option value="other"<?php if($_SESSION['otherinfoval']['np_tenure']=="other") echo "selected";?>>Other...</option>

  </select>

</span>
<span class="nextto col-sm-2">
<label class="">Heat type:</label>
<select class="form-control" id="np_heat_type" name="np_heat_type"  >
    <option value="">Select A Heat Type</option>
			<option value="electric_baseboard"<?php if($_SESSION['otherinfoval']['np_heat_type']=="electric_baseboard") echo "selected";?>>Electric Baseboard</option>
	        <option value="f_g_e"<?php if($_SESSION['otherinfoval']['np_heat_type']=="f_g_e") echo "selected";?>>Forced Air Gas/Oil/Electric</option>
	        <option value="hot_water"<?php if($_SESSION['otherinfoval']['np_heat_type']=="hot_water") echo "selected";?>>Hot Water Heating</option>
	        <option value="other"<?php if($_SESSION['otherinfoval']['np_heat_type']=="other") echo "selected";?>>Other</option>
  </select>

</span>
<span class="nextto col-sm-2">
<label class="">Lot size:</label>
<input type="text" class="form-control" name="np_lot_size" id="np_lot_size" value="<?php echo $_SESSION['otherinfoval']['np_lot_size'];?>" />
<span class="error"> <?php echo $_SESSION['otherinfoval']['np_lot_sizeErr'];?></span>
</span>
<span class="nextto col-sm-2">
<label class="">style:</label>
<input type="text" class="form-control" name="np_style" id="np_style" value="<?php echo $_SESSION['otherinfoval']['np_style'];?>" />
<span class="error"> <?php echo $_SESSION['otherinfoval']['np_styleErr'];?></span>
</span>
<span class="nextto col-sm-2">
<label class="">Type:</label>
<input type="text" class="form-control" name="np_type" id="np_type" value="<?php echo $_SESSION['otherinfoval']['np_type'];?>" />
<span class="error"> <?php echo $_SESSION['otherinfoval']['np_typeErr'];?></span>
</span>
<span class="nextto col-sm-2">
<label class="">Garage size:</label>
<input type="text" class="form-control" name="np_garage_size" id="np_garage_size" value="<?php echo $_SESSION['otherinfoval']['np_garage_size'];?>" />
<span class="error"> <?php echo $_SESSION['otherinfoval']['np_garage_sizeErr'];?></span>
</span>
<span class="nextto col-sm-2">
<label class="">Garage Type:</label>
<select class="form-control" name="np_garage_type" id="np_garage_type">
<option value="">Please select</option>
<option value="single"<?php if($_SESSION['otherinfoval']['np_garage_type']=="single") echo "selected";?>>Single</option>
<option value="double"<?php if($_SESSION['otherinfoval']['np_garage_type']=="double") echo "selected";?>>Double</option>
<option value="triple"<?php if($_SESSION['otherinfoval']['np_garage_type']=="triple") echo "selected";?>>Triple</option>
</select>
</span>
<span class="nextto col-sm-2">
<label class="">Property age:</label>
<input type="text" class="form-control" name="np_property_age" id="np_property_age" value="<?php echo $_SESSION['otherinfoval']['np_property_age'];?>" />
<span class="error"> <?php echo $_SESSION['otherinfoval']['np_property_ageErr'];?></span>
</span>
<span class="nextto col-sm-2">
<label class="">Mls:</label>
<input type="text" class="form-control" name="np_mls" id="np_mls" value="<?php echo $_SESSION['otherinfoval']['np_mls'];?>" />
<span class="error"> <?php echo $_SESSION['otherinfoval']['np_mlsErr'];?></span>
</span>
<span class="nextto col-sm-2">
<label class="">Legal description:</label>
<input type="text" class="form-control" name="np_legal_description" id="np_legal_description" value="<?php echo $_SESSION['otherinfoval']['np_legal_description'];?>" />
<span class="error"> <?php echo $_SESSION['otherinfoval']['np_legal_descriptionErr'];?></span>
</span>
<span class="nextto col-sm-2">
<label>Property type</label>
<select name="property_type" id="property_type" class="form-control">
<option value="">Please select</option>
<option value="detach"<?php if($_SESSION['otherinfoval']['property_type']=="detach") echo "selected";?>>Detach</option>
<option value="semidetach"<?php if($_SESSION['otherinfoval']['property_type']=="semidetach") echo "selected";?>>Semi-detach</option>
<option value="townhouse"<?php if($_SESSION['otherinfoval']['property_type']=="townhouse") echo "selected";?>>Town House</option>
<option value="townhousecondo"<?php if($_SESSION['otherinfoval']['property_type']=="townhousecondo") echo "selected";?>>Town house condo</option>
<option value="highrisec"<?php if($_SESSION['otherinfoval']['property_type']=="highrisec") echo "selected";?>>High rise condo</option>
<option value="rowtownh"<?php if($_SESSION['otherinfoval']['property_type']=="rowtownh") echo "selected";?>>Row town house</option>
<option value="bungalo"<?php if($_SESSION['otherinfoval']['property_type']=="bungalow") echo "selected";?>>Bugalow</option>
<option value="2lvlsplit"<?php if($_SESSION['otherinfoval']['property_type']=="2lvlsplit") echo "selected";?>> 2 level back split</option>
<option value="5rlvlsplit"<?php if($_SESSION['otherinfoval']['property_type']=="5rlvlsplit") echo "selected";?>>5r level back split</option>
</select>
</span>
</div>



	

		<div class="form-group col-sm-12">
		<legend>Property value</legend>	
<span class="nextto col-sm-2">
<label class="">Purchase price:</label>
<input type="text" class="form-control" name="pv_purchase_price" id="pv_purchase_price" value="<?php echo $_SESSION['otherinfoval']['pv_purchase_price'];?>" />
<span class="error"> <?php echo $_SESSION['otherinfoval']['pv_purchase_priceErr'];?></span>
</span>
<span class="nextto col-sm-2">
<label class="">Appraised value</label>
<input type="text" name="pv_appraised_value" id="pv_appraised_value" class="form-control" value="<?php echo $_SESSION['otherinfoval']['pv_appraised_value'];?> "/>
<span class="error"> <?php echo $_SESSION['otherinfoval']['pv_appraised_valueErr'];?></span>
</span>
</div>







	

		<div class="form-group col-sm-12">
			<legend>Property expenses</legend>	
		<span class="nextto col-sm-2">
<label class="">Annual property taxes:</label>
<input type="text" class="form-control" name="pe_annual_property_taxes" id="pe_annual_property_taxes" value="<?php echo $_SESSION['otherinfoval']['pe_annual_property_taxes'];?>" />
<span class="error"> <?php echo $_SESSION['otherinfoval']['pe_annual_property_taxesErr'];?></span>
</span>
<span class="nextto col-sm-2">
<label class="">Monthly condo expense</label>
<input type="text" name="pe_monthly_condo_expense" id="pe_monthly_condo_expense" class="form-control" value="<?php echo $_SESSION['otherinfoval']['pe_monthly_condo_expense'];?> "/>
<span class="error"> <?php echo $_SESSION['otherinfoval']['pe_monthly_condo_expenseErr'];?></span>
</span>
<span class="nextto col-sm-2">
<label class="">Monthly rental income:</label>
<input type="text" class="form-control" name="pe_monthly_rental_income" id="pe_monthly_rental_income" value="<?php echo $_SESSION['otherinfoval']['pe_monthly_rental_income'];?>" />
<span class="error"> <?php echo $_SESSION['otherinfoval']['pe_monthly_rental_incomeErr'];?></span>
</span>
<span class="nextto col-sm-2">
<label class="">Monthly heating cost:</label>
<input type="text" name="pe_monthly_heating_cost" id="pe_monthly_heating_cost" class="form-control" value="<?php echo $_SESSION['otherinfoval']['pe_monthly_heating_cost'];?> "/>
<span class="error"> <?php echo $_SESSION['otherinfoval']['pe_monthly_heating_costErr'];?></span>
</span>
<span class="nextto col-sm-2">
<label class="">Monthly insurance fees:</label>
<input type="text" name="pe_monthly_insurance_fees" id="pe_monthly_insurance_fees" class="form-control" value="<?php echo $_SESSION['otherinfoval']['pe_monthly_insurance_fees'];?> "/>
<span class="error"> <?php echo $_SESSION['otherinfoval']['pe_monthly_insurance_feesErr'];?></span>
</span>
<span class="nextto col-sm-2">
<label class="">Rental expenses:</label>
<input type="text" name="pe_rental_expenses" id="pe_rental_expenses" class="form-control" value="<?php echo $_SESSION['otherinfoval']['pe_rental_expenses'];?> "/>
<span class="error"> <?php echo $_SESSION['otherinfoval']['pe_rental_expensesErr'];?></span>
</span>
<span class="nextto col-sm-2">
<label class="">Annual repairs:</label>
<input type="text" name="pe_annual_repairs" id="pe_annual_repairs" class="form-control" value="<?php echo $_SESSION['otherinfoval']['pe_annual_repairs'];?> "/>
<span class="error"> <?php echo $_SESSION['otherinfoval']['pe_annual_repairsErr'];?></span>
</span>
<span class="nextto col-sm-3">
<label class="">Monthly hydro expenses:</label>
<input type="text" name="pe_monthly_hydro_expenses" id="pe_monthly_hydro_expenses" class="form-control" value="<?php echo $_SESSION['otherinfoval']['pe_monthly_hydro_expenses'];?> "/>
<span class="error"> <?php echo $_SESSION['otherinfoval']['pe_monthly_hydro_expensesErr'];?></span>
</span>
</div>



	

		<div class="form-group col-sm-12">
		<legend>Mortgage information</legend>	
		
		<span class="nextto col-sm-2">
<label class="">Amortization:</label>
<input type="text" class="form-control" name="mi_amortization" id="mi_amortization" value="<?php echo $_SESSION['otherinfoval']['mi_amortization'];?>" />
<span class="error"> <?php echo $_SESSION['otherinfoval']['mi_amortizationErr'];?></span>
</span>
<span class="nextto col-sm-2">
<label class="">First time buyer</label>
<select name="mi_first_time_buyer" id="mi_first_time_buyer" class="form-control">
<option value="">Please select</option>
<option  value="yes" <?php if($_SESSION['otherinfoval']['mi_first_time_buyer']=="yes") echo "selected";?> >Yes</option>
<option  value="no" <?php if($_SESSION['otherinfoval']['mi_first_time_buyer']=="no") echo "selected";?> >No</option>
</select>
</span>
<span class="nextto col-sm-2">
<label class="">Closing date:</label>
<input type="text" class="form-control" name="mi_closing_date" id="mi_closing_date" value="<?php echo $_SESSION['otherinfoval']['mi_closing_date'];?>" />
<span class="error"> <?php echo $_SESSION['otherinfoval']['mi_closing_dateErr'];?></span>
</span>
<span class="nextto col-sm-2">
<label class="">Payment frequency:</label>
<select name="mi_payment_frequency" id="mi_payment_frequency" class="form-control">
<option value="">Please select</option>
<option  value="monthly" <?php if($_SESSION['otherinfoval']['mi_payment_frequency']=="monthly") echo "selected";?> >Monthly</option>
<option  value="weekly" <?php if($_SESSION['otherinfoval']['mi_payment_frequency']=="weekly") echo "selected";?> >Weekly</option>
<option  value="biweekly" <?php if($_SESSION['otherinfoval']['mi_payment_frequency']=="biweekly") echo "selected";?> >Bi-weekly</option>
</select>
</span>
<span class="nextto col-sm-2">
<label class="">Term type:</label>
<select name="mi_term" id="mi_term" class="form-control">
<option value="">Please select</option>
<option value="open" <?php if($_SESSION['otherinfoval']['mi_term']=="open") echo "selected";?>>Open</option>
<option value="closed" <?php if($_SESSION['otherinfoval']['mi_term']=="closed") echo "selected";?>>Closed</option>
<option value="convertible" <?php if($_SESSION['otherinfoval']['mi_term']=="convertible") echo "selected";?>>Convertible</option>
</select>
</span>
<span class="nextto col-sm-2">
<label class="">Rate type:</label>
<select name="mi_rate_type" id="mi_rate_type" class="form-control">
<option value="">Please select</option>
<option value="fixed" <?php if($_SESSION['otherinfoval']['mi_rate_type']=="fixed") echo "selected";?>>Fixed</option>
<option value="variable" <?php if($_SESSION['otherinfoval']['mi_rate_type']=="variable") echo "selected";?>>Variable</option>
<option value="adjustable" <?php if($_SESSION['otherinfoval']['mi_rate_type']=="adjustable") echo "selected";?>>Adjustable</option>
<option value="cappedvariable" <?php if($_SESSION['otherinfoval']['mi_rate_type']=="cappedvariable") echo "selected";?>>Capped variable</option>
<option value="buydown" <?php if($_SESSION['otherinfoval']['mi_rate_type']=="buydown") echo "selected";?>>Buydown</option>
</select>
</span>
<span class="nextto col-sm-2">
<label class="">Mortgage amount:</label>
<input type="text" name="mi_mortgage_amount" id="mi_mortgage_amount" class="form-control" value="<?php echo $_SESSION['otherinfoval']['mi_mortgage_amount'];?> "/>
<span class="error"> <?php echo $_SESSION['otherinfoval']['mi_mortgage_amountErr'];?></span>
</span>
<span class="nextto col-sm-2">
<label class="">Down payment amount:</label>
<input type="text" name="mi_down_payment_amount" id="mi_down_payment_amount" class="form-control" value="<?php echo $_SESSION['otherinfoval']['mi_down_payment_amount'];?> "/>
<span class="error"> <?php echo $_SESSION['otherinfoval']['mi_down_payment_amountErr'];?></span>
</span>
<span class="nextto col-sm-2">
<label class="">Product type:</label>
<select name="mi_product_type" id="mi_product_type" class="form-control">
<option value="">Please select</option>
<option value="purchase"  <?php if($_SESSION['otherinfoval']['mi_product_type']=="purchase")echo "selected";?>>Purchase</option>
<option value="refinance"  <?php if($_SESSION['otherinfoval']['mi_product_type']=="refinance")echo "selected";?>>Refinance</option>
<option value="eto"  <?php if($_SESSION['otherinfoval']['mi_product_type']=="eto")echo "selected";?>>ETO</option>

</select>
</span>
<span class="nextto col-sm-2">
<label >Insured</label>
<select class="form-control" name="mi_insured" id="mi_insured">
<option value="">Please select</option>
<option value="yes" <?php if($_SESSION['otherinfoval']['mi_insured']=="yes") echo "selected";?>>Yes</option>
<option value="no" <?php if($_SESSION['otherinfoval']['mi_insured']=="no") echo "selected";?>>No</option>

</select>
</span>
<span class="nextto col-sm-2">
<label class="">insurer:</label>
<input type="text" name="mi_insurer" id="mi_insurer" class="form-control" value="<?php echo $_SESSION['otherinfoval']['mi_insurer'];?> "/>
<span class="error"> <?php echo $_SESSION['otherinfoval']['mi_insurerErr'];?></span>
</span>
</div>

 <div class="form-group col-sm-12">
<legend>Leave a comment</legend>
<span class="col-sm-5">
<textarea class="form-control" id="mi_comment" name="mi_comment" maxlength="500"  rows=7 type="textarea">
<?php echo $_SESSION['otherinfoval']['mi_comment'];?>
</textarea>
<span class="help-block"><p id="characterLeft" class=""></p></span> 
</span>
</div>
<script>
 $('#characterLeft').text('500 characters left');
    $('#mi_comment').keydown(function () {
        var max = 500;
        var len = $(this).val().length;
           if (len >= max) {
            $('#characterLeft').text('You have reached the limit');
         $('#characterLeft').addClass('error');
            $('#mortgagesubmission').attr('disabled',true);            
        } 
        else {
            var ch = max - len;
            $('#characterLeft').text(ch + ' characters left');
            $('#mortgagesubmission').attr('disabled',false);
            $('#characterLeft').removeClass('error');            
        }
    });    

</script>

	<div class="col-sm-12" style="font-weight:800;">
	<legend>Consent</legend>
	
	<p>
	Forshorelending. Privacy Statement
Forshorelending., ("Forshorelending") its employees, agents, or assigns, may collect personal information from me, from loan or debt arrangements I have made with or through you, from credit bureaus, appraisers and other financial institutions, and from the references I have provided you.
Forshore Lending may collect, use and disclose my personal information for the following purposes:
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
Forshorelending may provide my personal information to their solicitors, to credit bureaus, to appraisers and investors and, with my consent, to other parties.Forshorelending may share my personal information with its employees, its affiliates and investors, but only as needed for the provision of products and services.
Forshorelending may also use my personal information to introduce products and services that may be of interest to me through contacting me directly (via mail, telephone calls or e-mail only), and share it, (subject to applicable law) for marketing purposes within Forshorelending.
At any time, I can choose to opt-out of receiving direct marketing or sharing my personal information for marketing purposes. To opt-out, I will contact you through 416-712-3646.
 
I have read and agree with the above.
</p>
<label class="checkbox-inline"><input type="checkbox" name="agree1" id="agree1" value="agree" >I/we agree</label>
</div>
<button id="mortgagesubmission" class="btn btn-success" type="submit">submit</button>
</form>
</div>
 
  
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm" style="margin-top:20%;">
      <div class="modal-content">
         <div class="modal-body text-center" style="">
		 <span class="text-center">
         <i class="fa fa-spinner fa-pulse fa-3x text-success"></i>Processing...
        </span>
		</div>
        </div>
    </div>
  </div>
  
  
  
  <div class="modal fade" id="errorModal" role="dialog">
    <div class="modal-dialog modal-sm" style="margin-top:20%;">
      <div class="modal-content">
         <div class="modal-body text-center" style="">
		 <span class="text-center">
         <p>Sorry there was an error processing your application. Admin was notified.Please try again</p>
        </span>
		</div>
        </div>
    </div>
  </div>

</body>
</html>
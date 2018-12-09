<?php include("account.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
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



</head>

<body>
<?php echo $nav;?>
<div class="row" style="height:200px;">
</div>
<form class="form-horizontal" role="form">
<fieldset>
<legend>Personal Information</legend>
<div class="form-group">
<label class="control-label col-sm-2">First Name:</label>
<div class="col-sm-5">
<input type="text" class="form-control " />
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-2">Last Name:</label>
<div class="col-sm-5">
<input type="text" class="form-control " />
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-2">Email address:</label>
<div class="col-sm-5">
<input type="email" class="form-control " />
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-2">Date of birth:</label>
<div class="col-sm-5">
<input type="text" class="form-control " />
</div>
</div>


<div class="form-group ">
<label class="control-label col-sm-2">Marital status</label>
<div class="col-sm-7">
<label class="radio-inline" >
<input type="radio" class=""/>Married
</label>

<label class="radio-inline">
<input type="radio" class=""/>Single
</label>

<label class="radio-inline">
<input type="radio" class=""/>Div/Sep
</label>


<label class="radio-inline">
<input type="radio" class=""/>Common law
</label>


<label class="radio-inline">
<input type="radio" class=""/>Engaged
</label>

<label class="radio-inline">
<input type="radio" class=""/>Widowed
</label>
</div>
</div>



<div class="form-group">
<label class="control-label col-sm-2">S.I.N:</label>
<div class="col-sm-5">
<input type="text" class="form-control"/>
</div>
</div>




<br />

<div class="form-group">
<label class="control-label col-sm-2">Home#:</label>
<div class="col-sm-5" >
<input type="tel"  class="form-control" style="width:40%; float:left;"  />
<label class="control-label col-sm-2">Work#:</label>
<input type="tel"  class="form-control" style="width:40%;float:left;"/>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2">Cell#:</label>
<div class="col-sm-5" >
<input type="tel"  class="form-control" style="width:40%; float:left;"  />
<label class="control-label col-sm-2">Fax#:</label>
<input type="tel"  class="form-control" style="width:40%;float:left;"/>
</div>
</div>




<div class="form-group ">
<label class="control-label col-sm-2">Preferred Contact Method</label>
<div class="col-sm-7">
<label class="checkbox-inline" >
<input type="checkbox" class=""/>Email
</label>

<label class="checkbox-inline" >
<input type="checkbox" class=""/>Phone
</label>
</div>
</div>



<div class="form-group ">
<label class="control-label col-sm-2">Do you currently</label>
<div class="col-sm-7">
<label class="checkbox-inline" >
<input type="checkbox" class=""/>Own
</label>

<label class="checkbox-inline" >
<input type="checkbox" class=""/>Rent
</label>

<label class="checkbox-inline" >
<input type="checkbox" class=""/>Live with relatives
</label>

<label class="checkbox-inline" >
<input type="checkbox" class=""/>Live with others
</label>
</div>
</div>

<div class="form-group ">
<label class="control-label col-sm-2">Language Preferred</label>
<div class="col-sm-7">
<label class="checkbox-inline" >
<input type="checkbox" class=""/>English
</label>

<label class="checkbox-inline" >
<input type="checkbox" class=""/>French
</label>
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-2">Dependents:</label>
<div class="col-sm-5" >
<input type="tel"  class="form-control" style="width:40%; float:left;"  />

</div>
</div>

<legend>Address</legend>
<div class="form-group">
<label class="control-label col-sm-2">Address:</label>
<div class="col-sm-5" >
<input type="tel"  class="form-control"  />

</div>
</div>


<div class="form-group">
<label class="control-label col-sm-2">Unit:</label>
<div class="col-sm-5" >
<input type="tel"  class="form-control" style="width:10%; float:left;"  />
<label class="control-label col-sm-2">City:</label>
<input type="tel"  class="form-control" style="width:25%;float:left;"/>
<label class="control-label col-sm-2">Province:</label>
<input type="tel"  class="form-control" style="width:25%;"/>
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-2">Postal Code:</label>
<div class="col-sm-5" >
<input type="tel"  class="form-control" style="width:10%; float:left;"  />

<label class="control-label col-sm-4">Time at residence:</label>
<label class="control-label radio-inline col-sm-1" >Y</label>
<input type="text" class="form-control" style="width:30px; float:left;" />

<label class="control-label radio-inline col-sm-1" >M</label>
<input type="text" class="form-control" style="width:30px;"  />



</div>
</div>


<div class="form-group">
<label class="control-label col-sm-2">Current rent</label>
<div class="col-sm-5">
<input type="text" class="form-control"/>
<p class="form-control-static">If you have lived there more than three months</p>
</div>
</div>


<legend>Employment information</legend>

<div class="form-group">
<label class="control-label col-sm-2">Self-employed</label>
<div class="col-sm-5">
<label class="radio-inline"><input type="radio" />Yes</label>
<label class="radio-inline"><input type="radio" />No</label>

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2">Gross Revenue</label>
<div class="col-sm-5">
<input type="text"  class="form-control"/>

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2">Employer Name</label>
<div class="col-sm-5">
<input type="text"  class="form-control"/>

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2">Address</label>
<div class="col-sm-5">
<input type="text"  class="form-control"/>

</div>
</div>


<div class="form-group">
<label class="control-label col-sm-2">City</label>
<div class="col-sm-5">
<input type="text"  class="form-control"/>

</div>
</div>


<div class="form-group">
<label class="control-label col-sm-2">Province:</label>
<div class="col-sm-5" >
<input type="tel"  class="form-control" style="width:40%; float:left;"  />
<label class="control-label col-sm-2">Postal code:</label>
<input type="tel"  class="form-control" style="width:40%;float:left;"/>

</div>
</div>


<div class="form-group">
<label class="control-label col-sm-2">Employment status</label>
<div class="col-sm-5">
<label class="radio-inline"><input type="radio" />Current</label>
<label class="radio-inline"><input type="radio" />Previous</label>

</div>
</div>


<div class="form-group">
<label class="control-label col-sm-2">Job title</label>
<div class="col-sm-5">
<input type="text"  class="form-control"/>

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2">Job type</label>
<div class="col-sm-5">
<input type="text"  class="form-control"/>

</div>
</div>


<div class="form-group">
<label class="control-label col-sm-2">Industry Sector</label>
<div class="col-sm-5">
<input type="text"  class="form-control"/>

</div>
</div>


<div class="form-group">
<label class="control-label col-sm-2">Income type</label>
<div class="col-sm-5">
<input type="text"  class="form-control"/>

</div>
</div>


<div class="form-group">
<label class="control-label col-sm-2">Annual income:</label>
<div class="col-sm-5" >
<input type="tel"  class="form-control" style="width:10%; float:left;"  />

<label class="control-label col-sm-4">Time at job:</label>
<label class="control-label radio-inline col-sm-1" >Y</label>
<input type="text" class="form-control" style="width:30px; float:left;" />

<label class="control-label radio-inline col-sm-1" >M</label>
<input type="text" class="form-control" style="width:30px;"  />



</div>
</div>

<legend>If less than three years, where did you work previously?</legend>


<div class="form-group">
<label class="control-label col-sm-2">Self-employed</label>
<div class="col-sm-5">
<label class="radio-inline"><input type="radio" />Yes</label>
<label class="radio-inline"><input type="radio" />No</label>

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2">Gross Revenue</label>
<div class="col-sm-5">
<input type="text"  class="form-control"/>

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2">Employer Name</label>
<div class="col-sm-5">
<input type="text"  class="form-control"/>

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2">Address</label>
<div class="col-sm-5">
<input type="text"  class="form-control"/>

</div>
</div>


<div class="form-group">
<label class="control-label col-sm-2">City</label>
<div class="col-sm-5">
<input type="text"  class="form-control"/>

</div>
</div>


<div class="form-group">
<label class="control-label col-sm-2">Province:</label>
<div class="col-sm-5" >
<input type="tel"  class="form-control" style="width:40%; float:left;"  />
<label class="control-label col-sm-2">Postal code:</label>
<input type="tel"  class="form-control" style="width:40%;float:left;"/>

</div>
</div>


<div class="form-group">
<label class="control-label col-sm-2">Employment status</label>
<div class="col-sm-5">
<label class="radio-inline"><input type="radio" />Current</label>
<label class="radio-inline"><input type="radio" />Previous</label>

</div>
</div>


<div class="form-group">
<label class="control-label col-sm-2">Job title</label>
<div class="col-sm-5">
<input type="text"  class="form-control"/>

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2">Job type</label>
<div class="col-sm-5">
<input type="text"  class="form-control"/>

</div>
</div>


<div class="form-group">
<label class="control-label col-sm-2">Industry Sector</label>
<div class="col-sm-5">
<input type="text"  class="form-control"/>

</div>
</div>


<div class="form-group">
<label class="control-label col-sm-2">Income type</label>
<div class="col-sm-5">
<input type="text"  class="form-control"/>

</div>
</div>


<div class="form-group">
<label class="control-label col-sm-2">Annual income:</label>
<div class="col-sm-5" >
<input type="tel"  class="form-control" style="width:10%; float:left;"  />

<label class="control-label col-sm-4">Time at job:</label>
<label class="control-label radio-inline col-sm-1" >Y</label>
<input type="text" class="form-control" style="width:30px; float:left;" />

<label class="control-label radio-inline col-sm-1" >M</label>
<input type="text" class="form-control" style="width:30px;"  />



</div>
</div>

<legend>Other Income</legend>

<div class="form-group">
<label class="control-label col-sm-2">Income:</label>
<div class="col-sm-5" >
<input type="tel"  class="form-control" style="width:20%; float:left;"  />
<label class="control-label col-sm-3">Description:</label>
<input type="tel"  class="form-control" style="width:40%;float:left;"/>

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2">Income:</label>
<div class="col-sm-5" >
<input type="tel"  class="form-control" style="width:20%; float:left;"  />
<label class="control-label col-sm-3">Description:</label>
<input type="tel"  class="form-control" style="width:40%;float:left;"/>

</div>
</div>

<div class="container">
 <div >          
  <table class="table table-hover table-striped" >
    <thead>
      <tr>
        
        <th>Asset Type(excluding property)</th>
        <th>Asset description</th>
        <th>Asset value</th>
        <th>Downpayment</th>
        
      </tr>
    </thead>
    <tbody contenteditable="true">
      <tr>
        <td>1</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
       
      </tr>
      <tr>
        <td>1</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
       
      </tr>
      <tr>
        <td>1</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
       
      </tr>
      <tr>
        <td>1</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
       
      </tr>
    </tbody>
  </table>
</div>
</div>



<div class="container">
 <div >          
  <table class="table table-hover table-striped" >
    <thead>
      <tr>
        
        <th>Liability Types</th>
        <th>Liability Description</th>
        <th>Credit Limit</th>
        <th>Outstanding Balance</th>
         <th>Monthly Payment</th>
          <th>Liability Payoff</th>
           <th>Maturity Date</th>
        
      </tr>
    </thead>
    <tbody contenteditable="true">
      <tr>
        <td>1</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
       
      </tr>
      <tr>
        <td>1</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
       
      </tr>
      <tr>
        <td>1</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
       
      </tr>
      <tr>
        <td>1</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
       
      </tr>
    </tbody>
  </table>
</div>
</div>


<div class="container">
 <div >          
  <table class="table table-hover table-striped" >
    <thead>
      <tr>
        
        <th>Propert Value</th>
        <th>Total Mortgages</th>
        <th>Mortgage Payments</th>
        <th>Total Expenses</th>
         <th>Rental Income</th>
          <th>Rental Expenses</th>
           
        
      </tr>
    </thead>
    <tbody contenteditable="true">
      <tr>
        <td>1</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
       
      </tr>
      <tr>
        <td>1</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
       
      </tr>
      <tr>
        <td>1</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
       
      </tr>
      <tr>
        <td>1</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
       
      </tr>
    </tbody>
  </table>
</div>
</div>


<div class="container">
 <div >          
  <table class="table table-hover table-striped" >
    <thead>
      <tr>
        
        <th>Propert Value</th>
        <th>Total Mortgages</th>
        <th>Mortgage Payments</th>
        <th>Total Expenses</th>
         <th>Rental Income</th>
          <th>Rental Expenses</th>
           
        
      </tr>
    </thead>
    <tbody contenteditable="true">
      <tr>
        <td>1</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
       
      </tr>
      <tr>
        <td>1</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
       
      </tr>
      <tr>
        <td>1</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
       
      </tr>
      <tr>
        <td>1</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
       
      </tr>
    </tbody>
  </table>
</div>
</div>


<legend>New Property Information</legend>

<div class="form-group">
<label class="control-label col-sm-2">Cell#:</label>
<div class="col-sm-5" >
<input type="tel"  class="form-control" style="width:40%; float:left;"  />
<label class="control-label col-sm-2">Fax#:</label>
<input type="tel"  class="form-control" style="width:40%;float:left;"/>
</div>
</div>
</fieldset>
</form>
</body>
</html>
<?php 
include("account.php");
include("contactTemplate.php");


?>

<html>
<head>
<link rel="stylesheet" href="scripts/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- jQuery library -->
<script src="scripts/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Latest compiled JavaScript -->
<script src="scripts/bootstrap.min.js"></script>
<script src="direct.js"></script>
<script>
$(document).ready(function(){ 
    $('#characterLeft').text('140 characters left');
    $('#message').keydown(function () {
        var max = 140;
        var len = $(this).val().length;
        if (len >= max) {
            $('#characterLeft').text('You have reached the limit');
            $('#characterLeft').addClass('red');
            $('#btnSubmit').addClass('disabled');            
        } 
        else {
            var ch = max - len;
            $('#characterLeft').text(ch + ' characters left');
            $('#btnSubmit').removeClass('disabled');
            $('#characterLeft').removeClass('red');            
        }
    });    
});


</script>
<style>

	
	


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
     /*background-color: #318E31;*/
	
	
  }
  #back-wrapper{
	background-image:url("Forest-Background2.jpg");
	width:100%;	
	background-size:100%;	
	height:100%;	
	background-repeat: no-repeat;  
	opacity:.9;
	  
	  
  }
  .overlay{
	  position:absolute;
	  top:0%;
	  left:0%;
	width:100%;
	opacity:1;
	background-size:100%;	
	height:100%;	
	background:rgba(0,0,0,0.5);/*#B1B2B3 !important*/ 
	/*background-image:,url("Forest-Background2.jpg"); */
	
	  
  }
  #green{
	background-color:green;  
	color:fff;
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
      border: 1px solid #318E31; 
      border-radius:0 !important;
      transition: box-shadow 0.5s;
  }
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, 0.2);
  }
  .panel-footer .btn:hover {
      border: 1px solid #318E31;
      background-color: #fff !important;
      color: #318E31;
  }
  .panel-heading {
      color: #fff !important;
      background-color: #318E31 !important;
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
      background-color: #318E31;
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
  .headme{
	  font-size:42px;
	  margin-left:20px;
	  
  }
  .headme2{
	  
	font-size:22px;
	 
	    
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
	
	#back-wrapper{
	background-image:url("Forest-Background2.jpg");
	width:100%;	
	background-size:100%;	
	height:100%;	
	background-repeat: no-repeat;  
	opacity:.9;
	  
	  
  }
  .overlay{
	  position:absolute;
	  top:0%;
	  left:0%;
	width:100%;
	opacity:1;
	height:53%;	
	background:rgba(0,0,0,0.5);/*#B1B2B3 !important*/ 
	/*background-image:,url("Forest-Background2.jpg"); */
	
	  
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
	color:green;	
	}
#about{
background-color:#fff;	
	
}
#about p{
color:#000;
	
font-size:20px;	
}
#about li{
color:#0C0;/*0A4600;*/	
font-size:18px;	
	
}
</style>


<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar me, footer a[href='#fhome']").on('click', function(event) {

    // Prevent default anchor click behavior
    event.preventDefault();

    // Store hash
    var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 900, function(){
   
      // Add hash (#) to URL when done scrolling (default click behavior)
      window.location.hash = hash;
    });
  });
  
  
  
  
  // Slide in elements on scroll
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>


</head>
<body id="fhome" style="overflow-x:hidden;">


<?php echo $nav;?>



<div id="back-wrapper" class="container-fluid">

<div class="overlay">	
<div class="" style="margin-top:30%; margin-left:35%;  color:fff;">
<p class="headme" >Forshore Lending</p>
<p class="headme2" style="">For sure solutions to your Financial needs</p>

</div>
</div>
  
  
  
</div>



<div id="about" class="container-fluid jumbotron" style="padding-top:100px;">
  <div class="row">
    <div class="col-sm-12">
    <div  class="text-center" style="color:green;"> <i class="fa fa-pencil-square-o text-center fa-3x"  > What we do</i>
	<h4>All about us in a nushell.</h4>
	</div>
	<div class="slideanim row">
     <p>
  We are a private company that offers Financial products to solve people financial problems.</p>
  <ul class="fa-ul">
  <li><i class="fa-li fa fa-check"></i> We provide unsecured loans</li>
  <li> <i class="fa-li fa fa-check"></i>First &amp; Second Mortgages</li>
  <li><i class="fa-li fa fa-check"></i>Refinancing of existing Mortgages</li>
  <li><i class="fa-li fa fa-check"></i>Renewal of Mortgages and Investments opportunities in Real Estate</li>
   
   </ul>
   <p>Our loan products are design to provide solutions to help people get over their financial or money hurdles. Our company values are built on Honesty, Integrity and commitment to our clients.</p>
    </div>
	</div>
 </div>   
  


</div>

<!-- Container (Pricing Section) -->
<div id="products" class="container-fluid bg-grey ">
<div class="text-center">
<i class="fa fa-tags fa-3x headicon">Products</i>
<h4>Choose a loan type that works for you</h4>
</div>
<div class="row slideanim">
<div class="col-sm-4 col-xs-12">
<div class="panel panel-default text-center">
<div class="panel-heading">
<h1>Personal Loans</h1>
</div>
<div class="panel-body">
<p><strong>20</strong> Lorem</p>
<p><strong>15</strong> Ipsum</p>
<p><strong>5</strong> Dolor</p>
<p><strong>2</strong> Sit</p>
<p><strong>Endless</strong> Amet</p>
</div>
<div class="panel-footer plan">
<h3>5 % interst</h3>
<h4>per month</h4>
<a href="loanAppTemplate.php"><button class="btn btn-lg">Apply</button></a></div>
</div>
</div>
<div class="col-sm-4 col-xs-12">
<div class="panel panel-default text-center">
<div class="panel-heading">
<h1>Mortgage</h1>
</div>
<div class="panel-body">
<p><strong>50</strong> Lorem</p>
<p><strong>25</strong> Ipsum</p>
<p><strong>10</strong> Dolor</p>
<p><strong>5</strong> Sit</p>
<p><strong>Endless</strong> Amet</p>
</div>
<div class="panel-footer plan">
<h3>7 % interest</h3>
<h4>per month</h4>
<a href="mor.php"><button class="btn btn-lg">Apply</button></a></div>
</div>
</div>
<div class="col-sm-4 col-xs-12">
<div class="panel panel-default text-center">
<div class="panel-heading">
<h1>Line of credit</h1>
</div>
<div class="panel-body">
<p><strong>100</strong> Lorem</p>
<p><strong>50</strong> Ipsum</p>
<p><strong>25</strong> Dolor</p>
<p><strong>10</strong> Sit</p>
<p><strong>Endless</strong> Amet</p>
</div>
<div class="panel-footer plan">
<h3>2% interst</h3>
<h4>per month</h4>
<a href="loanAppTemplate.php"><button class="btn btn-lg">Apply</button></a></div>
</div>
</div>
</div>
</div>


<!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center">
<i class="fa fa-cogs fa-3x headicon">Partner stores and services</i>
<h4>Our affliates</h4>
<br />
<div class="row slideanim">

<div class="col-sm-4">
<i class="fa fa-plus-circle fa-4x"></i>
<h4>Want to be an affiliate?</h4>
<p>Your logo can be here!</p>
</div>



<div class="col-sm-4">
  <a href="http://www.allthingsgrenada.co"><i class="fa fa-database fa-4x"></i></a>
<h4>OTB Solutions</h4>
<p>Web developer</p>
</div>

<div class="col-sm-4">
<i class="fa fa-plus-circle fa-4x"></i>
<h4>Want to be an affiliate?</h4>
<p>Your logo can be here!</p>
</div>

<div class="col-sm-4">
<i class="fa fa-plus-circle fa-4x"></i>
<h4>Want to be an affiliate?</h4>
<p>Your logo can be here!</p>
</div>

<div class="col-sm-4">
<i class="fa fa-plus-circle fa-4x"></i>
<h4>Want to be an affiliate?</h4>
<p>Your logo can be here!</p>
</div>

<div class="col-sm-4">
<i class="fa fa-plus-circle fa-4x"></i>
<h4>Want to be an affiliate?</h4>
<p>Your logo can be here!</p>
</div>

</div>
</div>









<div id="contact" class="container-fluid bg-grey text-center">
<div class="row"><i class="fa fa-3x headicon">Contact Form</i></div>


<div class="col-sm-7" style="padding-top:50px; font-size:16px;">
<p>Contact us and we'll get back to you within 48 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span>Ontario,Canada </p>
      <p><span class="glyphicon glyphicon-phone"></span> +416-712-3646</p>
      <p><span class="glyphicon glyphicon-envelope"></span> loans@forshorelending.com</p>	 
</div>
<div class="col-sm-5" style="padding-top:20px;">
<?php echo $contact;?>
</div>

</div>

<footer class="container-fluid text-center">
  <a href="#fhome" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>copyright <a href="http://www.forshorelending.com" title="Visit forshorelending">www.forshorelending.com</a></p>		
</footer>

</body>
</html>
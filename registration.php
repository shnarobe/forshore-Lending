<?php
//ob_start();
include_once("account.php");
include_once("config.php");

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Registration</title>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>

<body>
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





<?php
//require('config.php');
//echo $_SERVER['SCRIPT_NAME'];
$user=DB_USER;
$password=DB_PASSWORD;
 $first_Name='';
	 $last_Name='';
	 $address='';
	 $telephone='';
	 $year='';
	 $month='';
	 $day='';
	 $date_of_birth='';
	 $email;
	 $type_of_farmer='';
	 $farm_size='';
	 $username='';
	$password='';
	 $security1='';
	 $security2;
	 $answer1;
	 $answer2;
	$firstErr='';	
	$localhost=DB_HOST;
	$name=DB_DATABASE;
	
if($_SERVER['REQUEST_METHOD']=="POST"){
	
	
	
	
	if (empty($_POST["firstname"])){
     $firstErr = "Name is required";
   } else {
     $first = $_POST["firstname"];
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$first)) {
       $firstErr = "Only letters and white space allowed"; 
     }
   }
	if($firstErr==''){
	try{ 
					
$con=new PDO( "mysql:host=$localhost;dbname=$name",$user,$password);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
				$sth=$con->prepare("INSERT INTO loandb (name,password,email,phone,address) 								  					VALUES(:fn,:pa,:em,:tel,:add)");
			//bind values to the actual variables,nb the values can be anything we just bind them to the variables, so whatever we put in the variables that is what the symbols in the values will be so instead of fn we could easily have r
			$sth->bindParam(':fn',$first_Name);
			$sth->bindParam(':pa',$password);
			$sth->bindParam(':em',$email);
			$sth->bindParam(':tel',$telephone);
			//$sth->bindParam(':ln',$last_Name);
			$sth->bindParam(':add',$address);
			
			//$sth->bindParam(':dob',$date_of_birth);
			
			//$sth->bindParam(':tof',$type_of_farmer);
			//$sth->bindParam(':fs',$farm_size);
			//$sth->bindParam(':un',$username);
			
			//$sth->bindParam(':s1',$security1);
			//$sth->bindParam(':s2',$security2);
			//$sth->bindParam(':a1',$answer1);
			//$sth->bindParam(':a2',$answer2);
			//$sth->bindParam(':alg',$avalg);
	
	
	
	//when user enters data store in db
	 $first_Name=$_POST['firstname'];
	//$last_Name=$_POST['lastname'];
	$address=$_POST['address'];
	$telephone=$_POST['telephone'];
	//$day=$_POST['day'];
	//$month=$_POST['month'];
	//$year=$_POST['year'];
	$email=$_POST['email'];
	//$type_of_farmer=$_POST['typeoffarmer'];
	//$farm_size=$_POST['farmsize'];
	//$username=$_POST['username'];
	$password=sha1($_POST['password']);
	//$security1=$_POST['security1'];
	//$security2=$_POST['security2'];
	//$answer1=$_POST['answer1'];
	//$answer2=$_POST['answer2'];
	//$date_of_birth=$year."-".$month."-".$day;
	//$avasm=".user/default/ava-sm.jpeg";
	//$avalg=".user/default/ava-sm.png";
	//$ad=date_create($dob);
	//$ad
	//YY "/" MM "/" DD
	$sth->execute();	
	//at the same time a user is registered fill in the user options table to store their profile using the id and fields just entered
	$last_id = $con->lastInsertId();
	echo $last_id;
	
	
	
	$toCreate = array(
  ".user/$last_id/loans",
  ".user/$last_id/mortgages"
  
);
	$permissions = 0755;

foreach ($toCreate as $dir) {
  mkdir($dir, $permissions, TRUE);
}
	
	
		
		
	
	
	
	header("Location:login.php");
	 die("Redirecting to login page");
	}
catch(PDOException $e){
	
	
	echo $e;
	}


	$con=null;
}
}
echo $nav;
?>
<div class="row" style="height:250px;" ></div>
<div class="container">
<div class="row">
<div class="col-lg-4">
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">



<fieldset>
 <legend>Register user</legend><br/>
  <label for="firstname">First Name</label><br/>
 <input class="form-control" type="text" name="firstname" value=”<?php echo $first_Name;?>”> <span class="error">* <?php echo $firstErr;?></span>

 
 <label for="address">Address</label><br/> 
 <input class="form-control" type="text" name="address" >

 <label for="telephone">Telephone</label><br/> 
 <input class="form-control" type="text" name="telephone">

 

 <div class="form-group">
 <label for="email">email</label><br/>
 <input class="form-control" type="text" name="email" >
</div>
 
 <label for="password">password</label><br/> 
 <input class="form-control" type="password" name="password" >

 
 

 
 </fieldset>

<div class="form-group">
<input class="form-control" name="SUBMIT" type="submit" />
 </div>


</form>
</div>
</div>
</div>



</body>
</html>
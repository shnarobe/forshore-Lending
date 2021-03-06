<?php
session_start();
ob_start();
include_once("account_admin.php");
include_once("config.php");
global $usererr,$passerr;

/* HERE IS AN ALTERNATIVE WHEN YOU DONT USE VARIABLES
# using the shortcut ->query() method here since there are no variable
# values in the select statement.
$STH = $DBH->query('SELECT name, addr, city from folks');
 
# setting the fetch mode
$STH->setFetchMode(PDO::FETCH_ASSOC);
 
while($row = $STH->fetch()) {
    echo $row['name'] . "\n";
    echo $row['addr'] . "\n";
    echo $row['city'] . "\n";
}


*/

if($_SERVER['REQUEST_METHOD']=="POST"){
	$usererr=$passerr="";
	echo $pass=sha1($_POST['password']);
	echo $user=$_POST['username'];
	
	
	$localhost=DB_HOST;
	$name=DB_DATABASE;
	

try{
	$con=new PDO( "mysql:host=$localhost;dbname=$name",DB_USER,DB_PASSWORD);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//user enters username and password
$sth=$con->prepare("SELECT * FROM loandb WHERE name=:u LIMIT 1");
$sth->bindParam(':u',$user);
$sth->execute();
// set the resulting array to associative and store password in result
    $result = $sth->setFetchMode(PDO::FETCH_ASSOC); 
	if($result){
	while($row = $sth->fetch()) {
    //echo $row['firstname'] . "\n";
    $pass_1=$row['password'];
	if($pass==$pass_1){
		//we can set more session variables from the database
	echo $email=$_SESSION['login_email']=$row['email'];
	echo $userid=$_SESSION['login_userid']=$row['userid'];

	$username=$_SESSION['login_username']=$row['name'];
	$_SESSION['login_userlevel']=$row['level'];
	
	header("Location:registrationTemplate.php?username=$username");
	$con=null;
	die();
	}
	else{
	$passerr="Sorry, incorrect password";
	return;
	}
   
}
	
	}
	else{
		$usererr='Sorry, username not found';
		return;
		}



}
catch(PDOException $e){
	
	
	echo $e;
	}

$con=null;


}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="direct.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<title>log in</title>
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


<?php echo $nav; ?>


<div class="container-fluid" style="height:150x;">
<div class="row">
<div class="col-sm-12" style="height:100px;">
</div>
</div>
</div>

<div class="container-fluid">
<div class="row">
<div class="col-sm-4 col-sm-offset-4">

  
  <div class="panel panel-primary">
    <div class="panel-heading">Log in</div>
    <div class="panel-body">
 

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<div class="form-group">
<label>username</label>
<input  class="form-control" name="username" type="text"  /><span><?php echo $usererr;?></span>
<label>Password</label>
<input class="form-control" name="password" type="password" /><span><?php echo $passerr;?></span>
<label></label>
<input class="form-control" name="SUBMIT" type="submit" value="Log in" /><br />
</div>
</form>

</div>

<div class="panel-footer">
<span><a href="token.php">I forgot my password.</a>
</div>
</div>

</div>
</div>
</div>
</body>
</html>
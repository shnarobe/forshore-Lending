<?php
//session_start();
ob_start();
require "config.php";
include_once 'account.php';
if(!function_exists('hash_equals')) {
  function hash_equals($str1, $str2) {
    if(strlen($str1) != strlen($str2)) {
      return false;
    } else {
      $res = $str1 ^ $str2;
      $ret = 0;
      for($i = strlen($res) - 1; $i >= 0; $i--){
       $ret |= ord($res[$i]);
       }
      return !$ret;
    }
  }
  
}  
$pass1err=$pass2err=$hid=$forward="";

if($_SERVER['REQUEST_METHOD']=='GET'){
	if(!isset($_SESSION['validtoken'])){
		header("Location:reg_login.php");
		die("Sorry! Something is not right.");
		
		
	}
	$forward=true;
	
}
elseif($_SERVER['REQUEST_METHOD']=="POST"){
	if(!isset($_SESSION['validtoken'])){
		header("Location:reg_login.php");
		die("Sorry! Something is not right.");
		
		
	}
$forward=true;
if((empty($_POST['pass1'])||empty($_POST['pass2']))){
$pass1err=$pass2err="Both fields muct be filled in";
//echo "post empty k";

}
elseif(!($_POST['pass1']==$_POST['pass2'])){
$pass1err=$pass2err="Your passwords dont match!";
//echo "mismatch";
}
else{

 $pass1=crypt($_POST['pass1'],CRYPT_BLOWFISH);
//echo "Gnow".$GLOBALS['hid'];


$servername =DB_HOST;
$username = DB_USER;
$password = DB_PASSWORD;
$dbname = DB_DATABASE;
$res=null;
$out="";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   $stmt = $conn->prepare("UPDATE register SET password=:np,new='1' WHERE loanid=:uid");
	   $stmt->bindParam(":np",$pass1);
	   $stmt->bindParam(":uid",$_SESSION['loan']);
	   $stmt->execute();
	   unset($_SESSION['validtoken']);
	   
	   header("Location:reg_login.php");
	   $conn=null;
	   exit();
	   }
	   catch(PDOException $e){}
}
}
else{
	unset($_SESSION['validtoken']);
echo "something went wrong";
exit();

}




	
	



?>
<html>
<head>
<script src="direct.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<title>change password</title>
<script>

/*
function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}  */
</script>
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
<div class="container-fluid" style="margin-top:150px;">
<div class="row">
<div class="col-sm-4 col-sm-offset-4">
<?php if($forward):?>
<div class="panel panel-success">
<div class="panel-heading">Enter new password</div>
<div class="panel-body">
<form id="passreset" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <div class="form-group">
            <label for="pass1">Password:</label>
            <input type="password" class="form-control" name="pass1" id="pass1"><span style="color:red;"> <?php echo $pass1err;?></span>
        </div>
        <div class="form-group">
            <label for="pass2">Confirm Password:</label>
            <input type="password" class="form-control" name="pass2" id="pass2" ><span style="color:red;"> <?php echo $pass2err;?></span>
            
        </div>
        <input type="hidden" name="hid" value="<?php echo $hid;?>">
        <input type="submit" value="send">
    </form>
    </div>
    </div>
    <?php endif;?>
    </div>
    </div>
    </div>
    </body>
    </html>
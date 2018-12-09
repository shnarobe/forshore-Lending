<?php
session_start();
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
$pass1err=$pass2err=$hid="";

if($_SERVER['REQUEST_METHOD']=="GET"){
	
	$pass=base64_decode($_GET['passver']);
if(hash_equals($pass,base64_decode($_SESSION['password_verification']))){
$forward=true;
 $hid=base64_decode($_GET['id']);
echo "page valid";
}
else{
$forward=false;
echo "bad request";
exit();
}	
}
elseif($_SERVER['REQUEST_METHOD']=="POST"){
$forward=true;
if((empty($_POST['pass1'])||empty($_POST['pass2']))){
$pass1err=$pass2err="both fields muct be filled in";
//echo "post empty k";

}
elseif(!($_POST['pass1']==$_POST['pass2'])){
$pass1err=$pass2err="passwords dont match";
//echo "mismatch";
}
else{

 $pass1=crypt($_POST['pass1'],CRYPT_BLOWFISH);
//echo "Gnow".$GLOBALS['hid'];
$b=crypt($_SESSION['userpassreset'],450);
$a=$_POST['hid'];
$df=hash_equals($a,$b);
if($df){

$servername =DB_HOST;
$username = DB_USER;
$password = DB_PASSWORD;
$dbname = DB_DATABASE;
$res=null;
$out="";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   $stmt = $conn->prepare("UPDATE users SET password=:np WHERE userid=:uid");
	   $stmt->bindParam(":np",$pass1);
	   $stmt->bindParam(":uid",$_SESSION['userpassreset']);
	   $stmt->execute();
	   echo "success";
	   header("Location:login.php");
	   }
	   catch(PDOException $e){}








}
else{
echo "something went wrong";


}

}


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
</head>
<body>

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
            <input type="password" class="form-control" name="pass1" id="pass1"><span> <?php echo $pass1err;?></span>
        </div>
        <div class="form-group">
            <label for="pass2">Confirm Password:</label>
            <input type="password" class="form-control" name="pass2" id="pass2" ><span> <?php echo $pass2err;?></span>
            
        </div>
        <input type="hidden" name="hid" value="<?php echo $hid;?>">
        <input type="submit" value="send">
    </form>
    </div>
    </div>
    <?endif;?>
    </div>
    </div>
    </div>
    </body>
    </html>
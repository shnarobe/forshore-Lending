<?php
session_start();
$comment="";
if($_SERVER['REQUEST_METHOD']=='POST'){
//echo $_POST['mess'];
$comment=$_POST['mess'];
echo $_POST['agree1'];
}
//$fname=$_POST['lname'];
//$_SESSION['fnameErr']="enter names";
//$_SESSION['fname']="jack";
//header("Location:mor.php");
/*$arr=$_POST['my'];
foreach($arr as $key=>$value){
	$_SESSION[$key]=$value;
echo $key." ".$value;
}
}

$query="fname=krishna&lname=robertson&email=keltic19%40yahoo.com&dob=+&mar_status=married&currently=own&sin=&home_p=4734567478&work_p=4734567478&fax=&dependents=&cofname=&colname=&coemail=&codob=+&comar_status=married&cocurrently=own&cosin=&cohome_p=&cowork_p=&cofax=&codependents=";

foreach (explode('&', $query) as $chunk) {
 echo   $param = explode("=", $chunk);
}*/
?>
<!DOCTYPE html>
<html>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<textarea name="mess" value="well well" rows="4" cols="50">
<?php echo $comment;?>
</textarea>
<label class="checkbox-inline"><input type="checkbox" name="agree1" id="agree1" value="agree" >I/we agree</label>
<input type="submit">send
</form>
</body>
</html>


<?php


include_once("account_admin.php");
if (empty($_SESSION['admin_id'])||empty($_SESSION['admin_username'])||empty($_SESSION['admin_userlevel'])){
	session_unset();
	header("Location: admin.php"); 
         
        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to admin.php"); 
	}
	else{
		unset($_SESSION['admin_id']);
		//double check user is really logged out
		//note the ways of passing data in a get request
		//header("location: user.php?u=".$_SESSION["username"]); this is a url encodeed string below is a normal name value pair
		//whe the page is called with the ge request the information is displayed in the url
		if(isset($_SESSION['admin_id'])){
			session_unset();
	header("location: message.php?msg=Error:_Logout_Failed");
} else {
	header("location:admin.php");
	exit();
}
		
		header("Location:admin.php"); 
         
        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to admin.php"); 
		
		}
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Latest compiled and minified CSS -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<title>Registration</title>
</head>

<body>
<?php echo $nav;?>








</body>
</html>
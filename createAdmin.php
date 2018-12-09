<?php
require 'config.php';
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
	$errors=array();
	
if($_SERVER['REQUEST_METHOD']=="POST"){
	
		
		try{ 
					
		$con=new PDO( "mysql:host=$localhost;dbname=$name",DB_USER,DB_PASSWORD);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$con->beginTransaction();
			$sth=$con->prepare("INSERT INTO admin(adminid,firstname,lastname,email,phone,password)VALUES(:ai,:fn,:ln,:em,:tel,:pass)");
			//bind values to the actual $iables,nb the values can be anything we just bind them to the $iables, so whatever we put in the $iables that is what the symbols in the values will be so instead of fn we could easily have r
			$sth->bindParam(':ai',$_POST['adminid']);
			$sth->bindParam(':fn',$_POST['firstname']);
			$sth->bindParam(':ln',$_POST['lastname']);
			$sth->bindParam(':em',$_POST['email']);
			$sth->bindParam(':tel',$_POST['phone']);
			$sth->bindParam(':pass',crypt($_POST['password'],CRYPT_BLOWFISH));
			
			$sth->execute();	
			$con->commit();
				
	

	
	 
	}
	catch(PDOException $e){
	$con->rollBack();
	
	}


	$con=null;
exit();
}


?>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="scripts/bootstrap.min.css">

<!-- jQuery library -->
<script src="scripts/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="scripts/bootstrap.min.js"></script>
</head>
<body>
<div id="regis" class="container" >
<form role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method='post'>
<div class="form-group">
<label for="loanid">Adminid:</label>
<input type="text" class="form-control" id="adminid" name="adminid">
</div>
<div class="form-group">
<label for="firstname">First Name:</label>
<input type="text" class="form-control" id="firstname" name="firstname">  
</div>
<div class="form-group">
<label for="lastname">Last Name:</label>
 <input type="text" class="form-control" id="lastname" name="lastname">
 </div>
 <div class="form-group">
 <label for="email">Email address:</label>
 <input type="email" class="form-control" id="email" name="email">
 </div>
<div class="form-group">
<label for="phone">Phone:</label>
<input type="text" class="form-control" id="phone" name="phone">
</div>
<div class="form-group">
<label for="phone">Password:</label>
<input type="password" class="form-control" id="password" name="password">
</div>
<button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
</body>
</html>
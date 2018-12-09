<?php
if($_SERVER['REQUEST_METHOD']=="GET"){
if(isset($_REQUEST['message'])){
$msg=$_REQUEST['message'];


}



}




?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="direct.js"></script>
<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h4><?php echo $msg;?></h4>
<a href="token.php"><button class="btn btn-danger">Back to reset page</button></a>
</body>

</html>
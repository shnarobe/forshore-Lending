<?php
$re="";
if($_SERVER['REQUEST_METHOD']=="POST"){


 if(empty($_POST['select'])){
	 echo "k";//$_POST['select'];
	 
	 
 }
if($_POST['c']){
	echo $_POST['c'];
	
}
if(false){
	echo "hhh";
}

}





?>

<html>
<head>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>


<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

<div class="form-group ">
<label class="control-label col-sm-2">Do you currently</label>
<select class="form-control" id="mySelect" name="select" >
<option selected value="">Select a Residential Status</option>
    <option value="own" <?php if($re=="own") echo "selected";?>>Own</option>
    <option value="rent" <?php if($re=="rent") echo "selected";?>>Rent</option>
    <option value="relatives" <?php if($re=="relatives") echo "selected";?> >Live with relatives</option>
    <option value="others" <?php if($re=="others") echo "selected";?>>live with others</option>
    
  </select>
</div>
<input type="checkbox" name="c" value="yes"> any
<input type="submit" value="send">
</form>


</body>

</html>
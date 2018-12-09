<?php
require 'check_login_admin.php';
//if(logged_in()&&is_admin()){
$nav='<nav class="navbar navbar-inverse">
  <div class="container-fluid">';
    if(logged_in()){
    $nav.='<ul class="nav navbar-nav">
      <li class="active"><a href="master.php">Loan applications</a></li>
     
      <li><a href="mastermortgage.php">Mortgage applications</a></li> 
      <li><a href="registrationTemplate.php">Existing loans</a></li> 
	   <li><a href="reviewsTemplate.php">Manage reviews</a></li> 
    </ul>';
	}
	$nav.='<ul class="nav navbar-nav navbar-right">
           <li><a href="admin.php">Log in</a></li>
       
          <li><a href="admin_logout.php">Log out</a></li>
          </ul>
  </div>
</nav>';
/*}
else{
header("Location:foreshore.php");	
exit();	
	
}*/
?>

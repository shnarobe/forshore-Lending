<?php
include_once("checklogin.php");
//include_once("social_header.php");
/*if (empty($_SESSION['userid'])&&empty($_REQUEST['username'])){
	header("Location: login.php"); 
         
        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to login.php"); 
	}
	
	*/

	
$nav='<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="foreshore.php">Home</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        
        <li><a href="#about" class="me" onclick="direct(event)"></i>What we do</a></li>
		
         <li><a href="#products" class="me" onclick="direct(event)">Products</a></li>
          <li><a href="#services" class="me" onclick="direct(event)">Partner stores and Services</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Apply
          <span class="caret"></span></a>
           <ul class="dropdown-menu">
            <li><a href="loanAppTemplate.php">Apply for personal loan</a></li>
            <li><a href="mor.php">Apply for mortgage</a></li>';
            $nav.='</ul>
        </li> 
        <li><a href="#contact" onclick="direct(event)">Contact us</a></li> 
		<li style="margin-top:10px; margin-left:10px;"><button class="btn btn-success" onclick="face()"><i class="fa fa-facebook-official" aria-hidden="true" > share</i></button></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">';
          if(logged_in() ){
       $nav.='<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Welcome '.$_SESSION['login_username'].'</a>
         <ul class="dropdown-menu">
        <li><a href="userProfileTemplate.php?username='.$_SESSION['login_username'].'&userid='.urlencode(sha1($_SESSION['login_userid'])).'">My profile</a></li>
        </ul>
        </li>
          <li><a href="logout.php">Log out</a></li>
          </ul>
           </div>
  </div>
</nav>';
 
		  }
        elseif(!logged_in()){
		$nav.='<li><a href="reg_login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
   		</ul>
   </div>
  </div>
</nav>';
}        

 	
?>



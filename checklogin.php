<?php
session_start();
function logged_in(){
	if(isset($_SESSION['login_userid']) && isset($_SESSION['login_username']) && $_SESSION['login_userlevel']==0){
		return true;
		}else{ 
		return false;
		}
	
	}
	
	function is_profile(){
		if((isset($_SESSION['login_userid']) && isset($_REQUEST['userid']))&& (sha1($_SESSION['login_userid'])==(urldecode($_REQUEST['userid'])))){
		return true;
		}
		else{ 
		return false;
		}
		
		
		}
		
		function is_admin(){
		if((isset($_SESSION['login_username']) && isset($_REQUEST['username']))&& (($_SESSION['login_username'])==($_REQUEST['username'])) &&(isset($_SESSION['login_userlevel'])&& $_SESSION['login_userlevel']==1)){
		return true;
		}
		else{ 
		return false;
		}
		
		
		}



?>


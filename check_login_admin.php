<?php
session_start();
function logged_in(){
	if(isset($_SESSION['admin_id']) && isset($_SESSION['admin_username']) && $_SESSION['admin_userlevel']==1){
		return true;
		}else{ 
		return false;
		}
	
	}
	
	
		
		
		



?>


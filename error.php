<?php
require 'errorHandler.php';
error_reporting(0);
$old_error_handler = set_error_handler("userErrorHandler");
if($_SERVER['REQUEST_METHOD']=='POST'){
$error['success']=false;
echo json_encode($error);
trigger_error("Ash would be sad, arrays expected", E_USER_ERROR);

}

?>
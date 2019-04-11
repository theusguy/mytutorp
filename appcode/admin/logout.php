<?php 

include("../inc/config.php");
include("../inc/functions.php");
unset($_SESSION['ADMIN_ID']);
header("location: login.php"); 
?>
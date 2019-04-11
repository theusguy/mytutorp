<?php 
session_start();
	// destroy user session , user is log out now
	session_destroy(); 
	header('location: index.php');
?>
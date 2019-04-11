<?php
// Error Reporting Turn On
//ini_set('error_reporting', E_ALL);
error_reporting(0);
// Setting up the time zone
date_default_timezone_set('Asia/Karachi');

// Session Start

ob_start();
session_start();

// Database Configre

 $site['db'] = "mytutorp_db";
 $site['username'] = "mytutorp_admin";
 $site['password'] = "i{c&~]}yorXV";
 $site['host'] = "localhost";


	$conn = new mysqli($site['host'], $site['username'], $site['password'], $site['db']);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

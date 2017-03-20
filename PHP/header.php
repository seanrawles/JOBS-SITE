<?php
error_reporting(0); // we don't want to see errors on screen
// Start a session
session_start();
require_once ('db_connect.inc.php'); // include the database connection
require_once ("functions.inc.php"); // include all the functions
$seed="0dAfghRqSTgx"; // the seed for the passwords
$domain =  "jobs.canneryresorts.com"; // the domain name without http://www.
 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Complete Member Login / System tutorial - <?php echo $domain; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body style="margin: 0; padding: 0; width: 100%; height: 100%">
	<div style="width: 100%; height: 75px; margin: auto; background-color: darkseagreen">
	</div><input type="date">
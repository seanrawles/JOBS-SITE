<!<?php
// Database settings
// database hostname or IP. default:localhost
// localhost will be correct for 99% of times
define("HOST", "localhost");
// Database user
define("DBUSER", "jobs_usr1");
// Database password
define("PASS", "atumahRkTEP6");
// Database name
define("DB", "jobs_users");
 
############## Make the mysql connection ###########
$conn = mysql_connect(HOST, DBUSER, PASS) or  die('Could not connect !<br />Please contact the site\'s administrator.');
 
$db = mysql_select_db(DB) or  die('Could not connect to database !<br />Please contact the site\'s administrator.');
 
?>
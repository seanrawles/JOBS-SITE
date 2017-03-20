<?php
ini_set('display_startup_errors', 1); 
ini_set('display_errors', 1); 
error_reporting(-1);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	$servername = "localhost";
$username = "jobs_usr1";
$password = "atumahRkTEP6";
$dbname = "jobs_users";

         // Create connection
         $conn = mysqli_connect($servername, $username, $password, $dbname);
         // Check connection
         if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            }
         $sql = "SELECT * FROM `employees` WHERE userid = 3";
				
         $results = mysqli_query($conn, $sql);
	
	    foreach($results as $row) {
		$userid = $row['userid'];
		$emp_name = $row['emp_name'];
		$emp_email = $row['emp_email'];
		$emp_role = $row['emp_role'];
	    }
	?>
	
	<div >
		<p><?php echo $emp_name;?></p><br>
		<p><?php echo $emp_email;?></p><br>
		<p><?php echo $emp_role;?></p><br>
	</div>
</body>
</html>
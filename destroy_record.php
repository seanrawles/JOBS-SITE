<?php
if( $_SERVER['REQUEST_METHOD']=='GET' && isset( $_GET['job_numb'] ) ){

        /* Get the values from the $_GET array - using a filter to help remove bad stuff */
	   	$job_numb = filter_input( INPUT_GET, 'job_numb', FILTER_SANITIZE_STRING );
    }

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
$sql = "DELETE FROM `archived_jobs` WHERE job_numb = $job_numb";
$results = mysqli_query($conn, $sql);
mysqli_close($conn);
header('Location: http://jobs.canneryresorts.com/deleted_list.php?orderBy=job_numb');
?>
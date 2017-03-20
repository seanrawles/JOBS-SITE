<?php
$job_numb = $_GET['job_numb'];
$job_name = $_GET['job_name'];
$AE = $_GET['AE'];
$property = $_GET['property'];
$assign_email = $_GET['assign_email'];
$assignee = $_GET['assignee'];
$due_date = $_GET['due_date'];
$show_date = $_GET['show_date'];
?>
<?php
//Connection
$servername = "localhost";
$username = "jobs_usr1";
$password = "atumahRkTEP6";

try {
    $conn = new PDO("mysql:host=$servername;dbname=jobs_users", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
if(isset($_POST['submit']) && !empty($_POST['submit'])) {
				//$job_numb=$_POST['job_numb'];
				$status=$_POST['status'];
				}

$sql = "UPDATE `jobs_canjobs` SET `status`='$status' WHERE job_numb = '$job_numb'";
	
$conn->exec($sql);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
$conn = null;

$current_date = date("m/d/Y");

$to = "mnarayan@canneryresorts.com, jmathews@canneryresorts.com, $assign_email";
$subject = "Status of $job_numb | $job_name has been changed";

$message = "
<html>
<head>
<title>The status of $job_numb _ $job_name has been changed to $status</title>
</head>
<body style='text-align:center;'>
	<table cellpadding='0' cellspacing='0' border='0' align='center'>
		<tr>
			<td align='center'>
				<img src='http://jobs.canneryresorts.com/images/ccr_logo.png' width='188' height='60' alt='Cannery Resorts' style='margin: auto; padding-bottom: 20px;' />
			</td>
		</tr>
		<tr>
			<td align='center'>
				<table cellpadding='10' cellspacing='0' border='0' width='600'>
					<tr>
						<td colspan='2'>
							<p style='text-align:center; font-size:16px;'>The status of $job_numb _ $job_name has been changed to $status</p>
							
							<p style='text-align:center; font-size:16px;'>
							    Edited on $current_date</p>
						</td>
					</tr>
					<tr>
						<td bgcolor='#CCCCCC' style='border: solid 1px #666666' align='center'>
							<p>Job Name</p>
						</td>
						<td style='border: solid 1px #666666'>
							<p>$job_name</p>
						</td>
					</tr>
					<tr>
						<td bgcolor='#CCCCCC' style='border: solid 1px #666666' align='center'>
							<p>Due Date, Show Date<br> and Property</p>
						</td>
						<td style='border: solid 1px #666666'>
							<p>$due_date &nbsp; $property</p>
							<p>$show_date</p>
							
						</td>
					</tr>
				</table>
			</td>
		</tr>
		
	</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <Jobstatus>' . "\r\n";

mail($to,$subject,$message,$headers);

header('Location: http://jobs.canneryresorts.com/job_list_individual.php?assignee='.$assignee);
?>
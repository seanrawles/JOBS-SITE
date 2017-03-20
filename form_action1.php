<?php
$servername = "localhost";
$username = "jobs_usr1";
$password = "atumahRkTEP6";

try {
    $conn = new PDO("mysql:host=$servername;dbname=jobs_users", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
if(isset($_POST['submit']) && !empty($_POST['submit'])) {
				$job_name = htmlspecialchars($_POST['job_name'], ENT_QUOTES, 'UTF-8');
				$comments = htmlspecialchars($_POST['comments'], ENT_QUOTES, 'UTF-8');
				$due_date = $_POST['due_date'];
				$show_date = $_POST['show_date'];
				$requestor = $_POST['requestor'];
				$status = $_POST['status'];
				$req_email = $_POST['req_email'];
				$property = $_POST['property'];
				}
	if(isset($_FILES['attachment1'])){
      $errors= array();
      $file_name = $_FILES['attachment1']['name'];
      $file_size = $_FILES['attachment1']['size'];
      $file_tmp = $_FILES['attachment1']['tmp_name'];
      $file_type = $_FILES['attachment1']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['attachment1']['name'])));
      
      $expensions= array("jpeg","jpg","png","doc","pdf","docx","tif","tiff","zip","xls","xlsx","ppt","pptx","numbers");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a different file";
      }
      
      if ( ! $errors ) {
         move_uploaded_file($file_tmp,"uploads/".$file_name);
         echo "Success";
		 echo $file_name;
      }else{
         print_r($errors);
      }
   }

$newdate = date("Y-m-d",strtotime($due_date));
$showdate = date("Y-m-d", strtotime($show_date));
$sql = "INSERT INTO `jobs_canjobs`(`job_name`, `comments`, `attachment1`, `due_date`, `show_date`, `requestor`, `status`,`req_email`, `Property`) VALUES ('$job_name','$comments','$file_name','$newdate', '$showdate', '$requestor','$status','$req_email','$property')";

$conn->exec($sql);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
$conn = null;

$to1 = "mnarayan@canneryresorts.com, jmathews@canneryresorts.com";
$subject1 = "A job has been requested for $property by $requestor";

$message1 = "
<html>
<head>
<title>Cannery Job Request</title>
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
				<table cellpadding='10' cellspacing='0' border='0' style='border:solid 1px #666666' width='600'>
					<tr>
						<td colspan='2'>
							<p style='text-align:center; font-size:16px;'><b>$requestor</b> has created a new job request</p>
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
							<p>Job Descriptions</p>
						</td>
						<td style='border: solid 1px #666666'>
							<p>$comments</p>
						</td>
					</tr>
					<tr>
						<td bgcolor='#CCCCCC' style='border: solid 1px #666666' align='center'>
							<p>Preferred Due Date<br> and Property</p>
						</td>
						<td style='border: solid 1px #666666'>
							<p>$newdate \n $property</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>To add to this job, go to URL:<br> http://jobs.canneryresorts.com/job_list-admin.php?orderBy=job_numb<br> and finish the editing</td>
		</tr>
	</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers1 = "MIME-Version: 1.0" . "\r\n";
$headers1 .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers1 .= 'From: <Jobstatus>' . "\r\n";

mail($to1,$subject1,$message1,$headers1);


$to2 = "$req_email";
$subject2 = "A job has been requested for $property by $requestor";

$message2 = "
<html>
<head>
<title>Cannery Job Request</title>
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
				<table cellpadding='10' cellspacing='0' border='0' style='border:solid 1px #666666' width='600'>
					<tr>
						<td colspan='2'>
							<p style='text-align:center; font-size:16px;'><b>$requestor</b> has created a new job request</p>
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
							<p>Job Descriptions</p>
						</td>
						<td style='border: solid 1px #666666'>
							<p>$comments</p>
						</td>
					</tr>
					<tr>
						<td bgcolor='#CCCCCC' style='border: solid 1px #666666' align='center'>
							<p>Preferred Due Date<br> and Property</p>
						</td>
						<td style='border: solid 1px #666666'>
							<p>$newdate \n $property</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<p style='text-align: center'>Your job will appear in <a href='http://jobs.canneryresorts.com/job_list-all.php?orderBy=job_numb'>this list</a></p>
			</td>
		</tr>
	</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers2 = "MIME-Version: 1.0" . "\r\n";
$headers2 .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers2 .= 'From: <Jobstatus>' . "\r\n";



mail($to2,$subject2,$message2,$headers2);

header('Location: http://jobs.canneryresorts.com/request_response.php');

?>
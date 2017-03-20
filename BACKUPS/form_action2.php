<?php
$attachment1 = $_GET['attachment1'];
$job_numb = $_GET['job_numb'];
//SERVER CALL in PDO
$servername = "localhost";
$username = "jobs_usr1";
$password = "atumahRkTEP6";

try {
    $conn = new PDO("mysql:host=$servername;dbname=jobs_users", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    	
if(isset($_POST['submit']) && !empty($_POST['submit'])) {
				//$job_numb = $_POST['job_numb'];
				$job_name = $_POST['job_name'];
				$job_name_clean = htmlspecialchars($job_name, ENT_QUOTES);
				$comments = $_POST['comments'];
				$comments_clean = htmlspecialchars($comments, ENT_QUOTES);
				//$attachment1=$_POST['attachment1'];
				$attachment2=$_POST['attachment2'];
				$due_date=$_POST['due_date'];
				$show_date=$_POST['show_date'];
				$AE=$_POST['AE'];
				$status=$_POST['status'];
				$assignee=$_POST['assignee'];
				$assign_email=$_POST['assign_email'];
				$property=$_POST['property'];
				}
	
	if(isset($_FILES['attachment2'])){
      $errors= array();
      $file_name = $_FILES['attachment2']['name'];
      $file_size = $_FILES['attachment2']['size'];
      $file_tmp = $_FILES['attachment2']['tmp_name'];
      $file_type = $_FILES['attachment2']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['attachment2']['name'])));
      
       $expensions= array("jpeg","jpg","png","doc","pdf","docx","tif","tiff","zip","xls","xlxs","ppt","pptx","numbers");
      
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
$showdate = date("Y-m-d",strtotime($show_date));
$sql = "UPDATE `jobs_canjobs` SET `job_name`='$job_name_clean',`comments`='$comments_clean',`attachment2`='$file_name',`due_date`='$newdate', `show_date`='$showdate',`status`='$status',`assignee`='$assignee',`assign_email`='$assign_email',`AE`='$AE',`Property`='$property' WHERE job_numb = $job_numb";

$conn->exec($sql);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
$conn = null;

$to = "mnarayan@canneryresorts.com, jmathews@canneryresorts.com, $assign_email";
$subject = "$assignee you have been assigned to $job_numb | $job_name";

$message = "
<html>
<head>
<title>$assignee has been assigned to $job_numb by $AE</title>
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
							<p style='text-align:center; font-size:16px;'><b>$assignee</b> has been assigned to $job_numb | $job_name</p>
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
							<p>Attachment(s)</p>
						</td>
						<td style='border: solid 1px #666666'>
							<a href='http://jobs.canneryresorts.com/uploads/$file_name' style='color: #666666 !important;'><p>$file_name</p></a>
							<a href='http://jobs.canneryresorts.com/uploads/$attachment1' style='color: #666666 !important;'><p>$attachment1</p></a>
						</td>
					</tr>
					<tr>
						<td bgcolor='#CCCCCC' style='border: solid 1px #666666' align='center'>
							<p>Due Date, Show Date<br> and Property</p>
						</td>
						<td style='border: solid 1px #666666'>
							<p>Due Date: $due_date &nbsp; Property: $property</p>
							<p>Show Date: $show_date</p>
							
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

header('Location: http://jobs.canneryresorts.com/job_list-admin.php?orderBy=job_numb');
?>
<?php
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>testing</title>
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
         $sql = "SELECT * FROM jobs_canjobs JOIN employees WHERE userid = 7";
				
         $results = mysqli_query($conn, $sql);
	?>

     <table>
          <?php
             foreach ($results as $result){
                 $job_numb = $result['job_numb'];
                 $job_name = $result['job_name'];
                 $comments = $result['comments'];
                 $due_date = $result['due_date'];
                 $show_date = $result['show_date'];
                 $attachment1 = $result['attachment1'];
                 $requestor = $result['requestor'];
                 $status = $result['status'];
                 $req_email = $result['req_email'];
                 $Property = $result['Property'];
                 $assignee = $result['assignee'];
                 $assign_email = $result['assign_email'];
                 $AE = $result['AE'];
			  $emp_name = $result['emp_name'];
          ?>
          <tr>
               <td><?php echo $job_numb;?></td>
               <td><?php echo $job_name;?></td>
               <td><?php echo $emp_name;?></td>
          </tr>
          <?php
             }
           ?>
     </table>
</body>
</html>
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
				//$attachment2=$_POST['attachment2'];
				$due_date=$_POST['due_date'];
				$show_date=$_POST['show_date'];
				$AE=$_POST['AE'];
				$status=$_POST['status'];
				$assignee=$_POST['assignee'];
				$assign_email=$_POST['assign_email'];
				$property=$_POST['property'];
				}

	if(isset($_POST['submit'])){
    if(count($_FILES['attachment2']['name']) > 0){
        //Loop through each file
        for($i=0; $i<count($_FILES['attachment2']['name']); $i++) {
          //Get the temp file path
            $tmpFilePath = $_FILES['attachment2']['tmp_name'][$i];

            //Make sure we have a filepath
            if($tmpFilePath != ""){
            
                //save the filename
                $shortname = $_FILES['attachment2']['name'][$i];

                //save the url and the file
                $filePath = date('d-m-Y-H-i-s').'-'.$_FILES['attachment2']['name'][$i];

                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath, $filePath)) {

                    $files[] = $shortname;
                    //insert into db 
                    //use $shortname for the filename
                    //use $filePath for the relative url to the file

                }
              }
        }
    }

    //show success message
    echo "<h1>Uploaded:</h1>";    
    if(is_array($files)){
        echo "<ul>";
        foreach($files as $file){
            echo "<li>$file</li>";
        }
        echo "</ul>";
    }
}

$newdate = date("Y-m-d",strtotime($due_date));
$showdate = date("Y-m-d",strtotime($show_date));
$sql = "UPDATE `jobs_canjobs` SET `job_name`='$job_name_clean',`comments`='$comments_clean',`attachment2`='$filePath',`due_date`='$newdate', `show_date`='$showdate',`status`='$status',`assignee`='$assignee',`assign_email`='$assign_email',`AE`='$AE',`Property`='$property' WHERE job_numb = $job_numb";

$conn->exec($sql);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
$conn = null;

//header('Location: http://jobs.canneryresorts.com/job_list-admin-2C.php?orderBy=job_numb');
?>
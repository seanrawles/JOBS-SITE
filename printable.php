<?php
if( $_SERVER['REQUEST_METHOD']=='GET' && isset( $_GET['job_numb'] ) ){

        /* Get the values from the $_GET array - using a filter to help remove bad stuff */
	   	$job_numb = filter_input( INPUT_GET, 'job_numb', FILTER_SANITIZE_STRING );
    }
?>
<!doctype html>
<html lang="eng">
<head>
<link rel="apple-touch-icon" sizes="57x57" href="images/favicons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="images/favicons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/favicons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="images/favicons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/favicons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="images/favicons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="images/favicons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="images/favicons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="images/favicons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="images/favicons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/images/favicons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicons/favicon-16x16.png">
<link rel="manifest" href="images/favicons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="images/favicons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<meta charset="UTF-8">
<meta charset="UTF-8">
     <meta name="robots" content="noindex">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Print version of <?php echo $job_numb;?></title>
<link href="css/bootstrap.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
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
$sql = "SELECT * FROM jobs_canjobs WHERE job_numb = $job_numb";
$results = mysqli_query($conn, $sql);
if ($row = mysqli_fetch_array($results)){
     $job_name = $row['job_name'];
     $comments = $row['comments'];
     $due_date = $row['due_date'];
	$show_date = $row['show_date'];
     $attachment1 = $row['attachment1'];
	$attachment2 = $row['attachment2'];
     $requestor = $row['requestor'];
	$status = $row['status'];
     $req_email = $row['req_email'];
     $Property = $row['Property'];
     $assignee = $row['assignee'];
     $assign_email = $row['assign_email'];
     $AE = $row['AE'];
}else{
     echo 'no records found';
}
	mysqli_close($conn);
	?>
	<div class="container-fluid" style="max-width: 90%">
  		<div class="row">
  			<div class="col-md-4">
			<img src="images/seanbohead.png" width="100" height="51" alt="Powered by Sean"/>
				<p class="small">Powered by <strong>Seanbohead</strong></p>
			</div>
			<div class="col-md-4"> <a href="http://jobs.canneryresorts.com"><img src="images/ccr_logo.png" class="img-responsive" alt="Placeholder image" style="margin: auto; padding-top: 25px;"></a> </div>
			<div class="col-md-4">
				
			</div>
		</div>
		<hr />
	  </div>
	 <div class="container-fluid" style="max-width: 90%">
	 	<div class="row" style="margin: auto">
	 		<h1><?php echo $job_numb;?> | <?php echo $job_name;?></h1>
	 		<div class="col-md-6">
				<h3>Requested by: <?php echo $requestor;?><br><?php echo $req_email;?></h3>
				<hr>
				<h5>Comments:</h5>
				<p><?php echo html_entity_decode(nl2br($comments));?></p>
				<h5>Due Date:</h5>
				<p><?php echo date("F j, Y", strtotime("$due_date"))?></p>
				<h5>Show Date:</h5>
				<p><?php echo date("F j, Y", strtotime("$show_date"))?></p>
				<h5>Attachments:</h5>
				<a href="http://jobs.canneryresorts.com/uploads/<?php echo $attachment1;?>" style="color: #666666 !important;" download="<?php echo $attachment1;?>"><?php echo $attachment1;?></a>
				<a href="http://jobs.canneryresorts.com/uploads/<?php echo $attachment2;?>" style="color: #666666 !important;" download="<?php echo $attachment2;?>"><?php echo $attachment2;?></a>
			</div>
			<div class="col-md-6">
				<h3>Assigned to: <?php echo $assignee;?><br><?php echo $assign_email;?></h3>
				<hr>
				<h5>Status:</h5>
				<p><?php echo $status;?></p>
				<h5>Property:</h5>
				<p><?php echo $Property;?></p>
				<h5>Account Exec:</h5>
				<p><?php echo $AE;?></p>
			</div>
		 </div>
	</div>	
		  	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-1.11.3.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="js/bootstrap.js"></script>
</body>
</html>
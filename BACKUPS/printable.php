<?php
if( $_SERVER['REQUEST_METHOD']=='GET' && isset( $_GET['job_numb'],$_GET['job_name'],$_GET['comments'],$_GET['due_date'],$_GET['attachment1'],$_GET['requestor'],$_GET['req_email'],$_GET['Property'],$_GET['assignee'],$_GET['assign_email'],$_GET['AE'] ) ){

	   	$job_numb = filter_input( INPUT_GET, 'job_numb', FILTER_SANITIZE_STRING );
		$job_name = filter_input( INPUT_GET, 'job_name', FILTER_SANITIZE_STRING );
    	   	$comments = filter_input( INPUT_GET, 'comments', FILTER_SANITIZE_ENCODED );
    		$due_date = filter_input( INPUT_GET, 'due_date', FILTER_SANITIZE_STRING );
    		$attachment1 = filter_input( INPUT_GET, 'attachment1', FILTER_SANITIZE_STRING );
    		$requestor = filter_input( INPUT_GET, 'requestor', FILTER_SANITIZE_STRING );
    		$req_email = filter_input( INPUT_GET, 'req_email', FILTER_SANITIZE_STRING );
    		$Property = filter_input( INPUT_GET, 'Property', FILTER_SANITIZE_STRING );
    		$assignee = filter_input( INPUT_GET, 'assignee', FILTER_SANITIZE_STRING );
    		$assign_email = filter_input( INPUT_GET, 'assign_email', FILTER_SANITIZE_STRING );
    		$AE = filter_input( INPUT_GET, 'AE', FILTER_SANITIZE_STRING );
    }
?>
<!doctype html>
<html lang="eng">
<head>
<meta charset="UTF-8">
<meta charset="UTF-8">
     <meta name="robots" content="noindex">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Print version of <?php echo ($_GET['job_numb']);?></title>
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
	 <div class="container">
	 	<div class="row" style="margin: auto">
	 		<h1><?php echo ($_GET['job_numb']);?> | <?php echo ($_GET['job_name']);?></h1>
	 		<div class="col-md-6">
				<h3>Requested by: <?php echo $requestor;?><br><?php echo ($_GET['req_email']);?></h3>
				<hr>
				<h5>Comments:</h5>
				<p><?php echo htmlspecialchars($_GET['comments']);?></p>
				<h5>Due Date:</h5>
				<p><?php echo ($_GET['due_date']);?></p>
				<h5>Attachments:</h5>
				<a href="http://jobs.canneryresorts.com/uploads/<?php echo $attachment1;?>" style="color: #666666 !important;" download="<?php echo $attachment1;?>"><?php echo $attachment1;?></a>
			</div>
			<div class="col-md-6">
				<h3>Assigned to: <?php echo ($_GET['assignee']);?><br><?php echo ($_GET['assign_email']);?></h3>
				<hr>
				<h5>Property:</h5>
				<p><?php echo $Property;?></p>
				<h5>Account Exec:</h5>
				<p><?php echo ($_GET['AE']);?></p>
			</div>
		 </div>
	</div> 	
	
		  	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-1.11.3.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="js/bootstrap.js"></script>
</body>
</html>
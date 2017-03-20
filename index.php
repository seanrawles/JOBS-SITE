<?php
?>
<!DOCTYPE html>
<html lang="en">
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
    <meta name="robots" content="noindex">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cannery Casino | Job Requests</title>
    <!-- Bootstrap -->
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
  	<div class="container-fluid" style="max-width: 90%">
  		<div class="row">
  			<div class="col-md-4">
			<img src="images/seanbohead.png" width="100" height="51" alt="Powered by Sean"/>
				<p class="small">Powered by <strong>Seanbohead</strong></p>
			</div>
			<div class="col-md-4"> <a href="http://jobs.canneryresorts.com"><img src="images/ccr_logo.png" class="img-responsive" alt="Placeholder image" style="margin: auto; padding-top: 25px;"></a> </div>
			<div class="col-md-4">
				<script type="text/javascript">
function passWord() {
var testV = 1;
var pass1 = prompt('Please Enter Your Password',' ');
while (testV < 3) {
if (!pass1) 
history.go(-1);
if (pass1.toLowerCase() == "evitaerc2017") {
alert('Correct');
window.open('http://jobs.canneryresorts.com/job_list-admin.php?orderBy=job_numb');
break;
} 
testV+=1;
var pass1 = 
prompt('Access Denied - Password Incorrect, Please Try Again.','Password');
}
if (pass1.toLowerCase()!="password" & testV ==3) 
history.go(-1);
return " ";
} 
</script>
				<div class="row">
					<div class="col-sm-12" style="margin: auto">
						<a href="http://jobs.canneryresorts.com/job_list-admin.php?orderBy=job_numb">
						<button type="button" class="btn btn-primary button-padding" style="margin: 10px auto; float: right !important;" onClick="passWord()">Admin Login</button>
					</a>					</div>
					<div class="col-sm-12">
					<a href="http://jobs.canneryresorts.com/job_list-all.php?orderBy=job_numb">
						<button type="button" class="btn btn-danger" style="margin: 10px auto; float: right !important;">Full List</button>
						</a>
					</div>
				</div>
			</div>
		</div>
		<hr />
	  </div>
	  <div class="container-fluid" style="max-width: 90%">
		  <h2>Job Request Form</h2>
		  
	  	<form method="post" action="form_action1.php" enctype="multipart/form-data">
	  		<div class="row">
	  			<div class="col-md-6">
	  				<div class="form-group">
						<label for="job_name">Job Name</label><br>
						<input type="text" class="form-control" aria-describedby="jobname" placeholder="MAX 60 Characters" id="job_name" name="job_name" required>
		  			</div>
		  			<div class="form-group">
						<label for="comments">Comments</label><br>
						<textarea class="form-control" rows="10" id="comments" required placeholder="Be as descriptive as possible" name="comments" maxlength="5000"></textarea>
					</div>
					<div class="form-group">
						<p>
							<label for="attachment1">Add file(s)</label>
							<input type="file" class="form-control-file" id="attachment1" aria-describedby="fileHelp" name="attachment1">
							<!--<input type="file" class="form-control-file" id="attachment2" aria-describedby="fileHelp" name="attachment2">
   						<input type="file" class="form-control-file" id="attachment3" aria-describedby="fileHelp" name="attachment3">-->
							<small id="fileHelp" class="form-text text-muted">PDFs, Word Docs (doc or docx) or images (PNG, JPG, etc.) Maximum 16 MB</small></p>
						<p><small class="form-text text-muted"> No special characters (', ", +_ *&amp;^$#@) or spaces on the files names. </small></p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="due_date">Due Date</label><br>
						<input type="date" class="form-control" style="max-width: 200px;" id="due_date" name="due_date" required><input type="hidden" id="show_date" name="show_date" value="01/01/2018"><br>
						
						<small id="due_date_text" class="form-text text-muted">This date may change to fit the current workloads. Contact Michelle Narayan or Janice Matthews if there are any special requests.</small>
					</div>
					<div class="form-group">
						<label for="requestor">Who is requesting?</label>
						<input type="text" class="form-control" id="requestor" placeholder="Your Name" required name="requestor">
						<input type="hidden" id="status" name="status" value="Requested">
					</div>
					<div class="form-group">
						<label for="req_email">Email</label><br>
						<input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" required style="max-width: 300px" name="req_email">
						<small id="emailHelp">The email address of the requestor. You will receive a confirmation email when you input or request a job.</small>
					</div>
					<div class="form-group">
						<label for="property">Which Property</label><br>
						<select class="form-control" id="property" name="property" style="max-width: 300px;" required>
    							<option value="Cannery">Cannery</option>
    							<option value="Eastside Cannery">Eastside Cannery</option>
    							<option value="CCR">CCR</option>
  						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-1">
					<div class="form-group">
						<button type="submit" class="btn btn-primary" value="submit" name="submit" id="submit">Submit</button>
					</div>
				</div>
				<div class="col-md-11">
					<small>Submitting this form does not mean your job has been accepted. Please follow up with Janice <b>(702) 692-4175</b> or Michelle <b>(702) 692-4183</b> via email or phone to ensure your job is in the queue.</small>
				</div>
			</div>
		</form>
		<hr />
	  </div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-1.11.3.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="js/bootstrap.js"></script>
  </body>
</html>
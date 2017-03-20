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
			<div class="col-md-4"> <a href="http://jobs.canneryresorts.com"><img src="images/ccr_logo.png" class="img-responsive" alt="Placeholder image" style="margin: auto; padding-top: 25px;"></a>
			</div>
			<div class="col-md-4">
  				<div style="padding: 15px 0; float: right">
  				<a href="http://jobs.canneryresorts.com/job_list-admin.php?orderBy=job_numb">
					<button type="button" class="btn btn-primary">Active Job List</button></a>
				</div>
			</div>
		</div>
		<hr />
	  </div>
	  <div class="container-fluid" style="max-width: 90%">
  		<div class="row">
  			<div class="col-md-12">
  				<div class="row">
  					<div class="col-md-6">
  						<h3>Archived Jobs as of <?php echo date("m/d/Y");?> </h3>
					</div>
					<div class="col-md-6">
						<div style="padding: 15px 0; float: right">
               	<div class="input-group stylish-input-group"  style="max-width: 300px" >
                    	<input type="text" class="form-control"  placeholder="Search Jobs - OFFLINE">
                    	<span class="input-group-addon">
                        		<button type="submit">
                            		<span class="glyphicon glyphicon-search"></span>
                        		</button>  
                    	</span>
               	</div>
				</div>
					</div>
				</div>
  				<div style="max-height: 860px; overflow: scroll">
  				<style>
					table { font-family: 'Roboto', sans-serif;
						font-size:13px;
						color: #666;						 	
						border-collapse: collapse;
						width: 100%;
						border: 3px solid #333;
					  }
					th {
						padding: 10px;
						color: #FFFFFF !important;
					}
			         td { border-bottom: 1px solid;
				         text-align: left;
                             padding:5px;
                                      
					   }
					a { color: #FFFFFF !important;}
					tr:nth-child(even) {background: #CCC}
				</style>
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
$sql = "SELECT * FROM archived_jobs";
				
$orderBy = array('job_numb', 'job_name', 'due_date', 'show_date', 'requestor', 'status', 'assignee', 'AE');

$order = 'type';
if (isset($_GET['orderBy']) && in_array($_GET['orderBy'], $orderBy)) {
    $order = $_GET['orderBy'];
}
$sql = "SELECT * FROM archived_jobs ORDER BY $order";
$results = mysqli_query($conn, $sql);

					?>
					<table>
<tr style="background-color: crimson">
	<th><a href="?orderBy=job_numb"><b>Job ID#</b></a></th>
	<th><a href="?orderBy=job_name"><b>Title</b></a></th>
	<th><b>Comments</b></th>
	<th><a href="?orderBy=due_date"><b>Due Date</b></a></th>
	<th><a href="?orderBy=show_date"><b>Show Date</b></a></th>
			 <th><b>Attachments</b></th>
	<th><a href="?orderBy=requestor"><b>Requested By:</b></a></th>
	<th><a href="?orderBy=status"><b>Status</b></a></th>
	<th><a href="?orderBy=assignee"><b>Assigned to</b></a></th>
	<th><a href="?orderBy=AE"><b>Account Exec</b></a></th>
	<th style="background-color: cadetblue"><b>Unarchive Record</b></th>
	<th><b>Delete Record</b><br><span style="font-size: 10px">This is permanent</span></th>
</tr>
 
<!-- here is where your repeating rows start -->
<?php
foreach ($results as $result){
    $job_numb = $result['job_numb'];
    $job_name = $result['job_name'];
    $comments = $result['comments'];
    $due_date = $result['due_date'];
    $show_date = $result['show_date'];
    $attachment1 = $result['attachment1'];
	$attachment2 = $result['attachment2'];
	$attachment3 = $result['attachment3'];
    $requestor = $result['requestor'];
    $status = $result['status'];
    $req_email = $result['req_email'];
    $Property = $result['Property'];
    $assignee = $result['assignee'];
    $assign_email = $result['assign_email'];
    $AE = $result['AE'];
	$userid = $result['userid'];
	$emp_name = $result['emp_name'];
    	$emp_email = $result['emp_email'];
    	$emp_role = $result['emp_role'];
?>
                <tr>
				 <td align="center"><a href="printable.php?job_numb=<?=$job_numb;?>" target="new" style="color: #666 !important"><p style="font-size: 16px; font-weight: bold"><?php echo $job_numb;?></p></a></td>
                                <td><?php echo $job_name;?></td>
				 		  <td>
                               	<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Comments-<?php echo $job_numb;?>">Comments</button>

<!-- Modal -->
<div id="Comments-<?php echo $job_numb;?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Comments for <?php echo "$job_name" . "&nbsp;|&nbsp;" . "$job_numb";?></h4>
      </div>
      <div class="modal-body">
        <?php echo "$comments";?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
                               </td>
				 		  <td><?php echo date("F j, Y", strtotime("$due_date"))?></td>
				 		  <td><?php echo date("F j, Y", strtotime("$show_date"))?></td>
				 		  <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#attachments-<?php echo $job_numb;?>">Attachments</button>

<!-- Modal -->
<div id="attachments-<?php echo $job_numb;?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Attachments for <?php echo "$job_name" . "&nbsp;|&nbsp;" . "$job_numb";?></h4>
      </div>
      <div class="modal-body">
		 <a href="http://jobs.canneryresorts.com/uploads/<?php echo $attachment1;?>" style="color: #666666 !important;" download="<?php echo $attachment1;?>"><?php echo $attachment1;?></a><br>
		 <a href="http://jobs.canneryresorts.com/uploads/<?php echo $attachment2;?>" style="color: #666666 !important;" download="<?php echo $attachment2;?>"><?php echo "$attachment2";?></a><br>
		 <a href="http://jobs.canneryresorts.com/uploads/<?php echo $attachment3;?>" style="color: #666666 !important;" download="<?php echo $attachment3;?>"><?php echo "$attachment3";?></a><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div></td>
				 		  <td><b><?php echo $requestor;?></b><br>
                               		<?php echo $req_email;?><br>
							  For Property: <b><?php echo $Property;?></b>
                                </td>
                                <td><?php echo $status;?></td>
                                <td><?php echo $assignee;?><br><?php echo $assign_email;?></td>
				 		  <td><?php echo $AE;?></td>
				 <td align="center" bgcolor="#C0F4FF" style="text-align: center"><a href ="restore_record.php?job_numb=<?=$job_numb;?>"><button type="button" class="btn btn-primary btn-sm" style="margin: auto !important; float: none !important;">Unarchive</button></a></td>
				 <td align="center" style="text-align: center"><a href ="destroy_record.php?job_numb=<?=$job_numb;?>"><button type="button" class="btn btn-danger btn-sm" style="margin: auto !important; float: none !important;">Delete Record</button></a></td> 
                </tr>
<?php
}
?>
<!-- here are where your repeating rows end -->
 
</table>
				</div>
			</div>
		</div>
	  </div>
	  	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-1.11.3.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="js/bootstrap.js"></script>
</body>
</html>
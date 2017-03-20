<?php
if( $_SERVER['REQUEST_METHOD']=='GET' && isset( $_GET['assignee'] ) ){

        /* Get the values from the $_GET array - using a filter to help remove bad stuff */
	   	$assignee = filter_input( INPUT_GET, 'assignee', FILTER_SANITIZE_STRING );
    }
?>
<!doctype html>
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
    <title>Individual Job list for <?php echo $assignee;?></title>
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
				<div class="row">
					<div class="col-sm-12">
					<a href="http://jobs.canneryresorts.com/job_list-all.php?orderBy=job_numb">
						<button type="button" class="btn btn-danger" style="margin: 10px auto; float: right !important;">Back to Full List</button>
						</a>
					</div>
				</div>
			</div>
		</div>
		<hr />
	  </div>
	  <div class="container-fluid" style="max-width: 90%">
  		<div class="row">
  			<div class="col-md-12">
  				<h3>Jobs for <?php echo $assignee;?>  as of <?php echo date("m/d/Y");?></h3>
  				<div style="max-height: 860px; overflow: scroll; border: 3px solid #333;">
  				<style>
					table { font-family: 'Roboto', sans-serif;
						font-size:13px;
						color: #666;						 	
						border-collapse: collapse;
						width: 100%;
						
					  }
					th {
						padding: 10px;
						color: #FFFFFF !important;
					}
					th p {
						font-size: 16px;
						font-weight: 700;
					}
			         td { border-bottom: 1px solid;
				         text-align: left;
                             padding:5px;
                                      
					   }
					td p{
						font-size: 15px;
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
         $sql = "SELECT * FROM `jobs_canjobs` WHERE assignee = \"$assignee\" ORDER BY job_numb";
				
         $results = mysqli_query($conn, $sql);
	?>

         <table>

         <tr style="background-color: cadetblue">
		    <th><p>Job ID #</p></th>
		    <th><p>Job Name</p></th>
		    <th><p>Show Date | Due Date</p></th>
		    <th><p>Attachment(s)</p></th>
		    <th><p>Status</p></th>
		    <th><p>Account Exec</p></th>
		    <th style="text-align: center"><p>Comments</p></th>
		</tr>
<?php
     foreach ($results as $result){
     	$job_numb = $result['job_numb'];
          $job_name = $result['job_name'];
          $comments = $result['comments'];
          $due_date = $result['due_date'];
          $show_date = $result['show_date'];
          $attachment1 = $result['attachment1'];
		$attachment2 = $result['attachment2'];
          $requestor = $result['requestor'];
          $status = $result['status'];
          $req_email = $result['req_email'];
          $Property = $result['Property'];
          $assignee = $result['assignee'];
          $assign_email = $result['assign_email'];
          $AE = $result['AE'];
          ?>
          <tr>
			<td><a href="printable.php?job_numb=<?=$job_numb;?>" target="_blank" style="color: #666 !important"><p style="font-size: 16px; font-weight: bold"><?php echo $job_numb;?>&nbsp;<?php echo $Property;?></p></a></td>
			<td><p><?php echo html_entity_decode($job_name);?></p></td>
			<td><p><?php echo date("F j, Y", strtotime("$show_date"))?> |
			<?php echo date("F j, Y", strtotime("$due_date"))?></p></td>
			<td><p><a href="http://jobs.canneryresorts.com/uploads/<?php echo $attachment1;?>" style="color: #666666 !important;" download="<?php echo $attachment1;?>"><?php echo $attachment1;?></a></p>
				<p><a href="http://jobs.canneryresorts.com/uploads/<?php echo $attachment2;?>" style="color: #666666 !important;" download="<?php echo $attachment2;?>"><?php echo "$attachment2";?></a></p></td>
			
			<td>
				
				<form method="post" action="form_action_status.php?job_numb=<?php echo $job_numb;?>&AE=<?=$AE;?>&job_name=<?=$job_name;?>&assign_email=<?=$assign_email;?>&assignee=<?=$assignee;?>&due_date=<?=$due_date;?>&property=<?=$Property;?>&show_date=<?=$show_date;?>" enctype="multipart/form-data">
				 		  		<div class="form-group">
									<select class="form-control small" id="status" name="status" style="max-width: 150px;">
										<option value="<?php echo $status;?>" selected><?php echo $status;?></option>
										<option value="In Revision">In Revision</option>
										<option value="Requested">Requested</option>
										<option value="OFA">OFA</option>
										<option value="On Hold">On Hold</option>
										<option value="Approved">Approved</option>
										<option value="Complete">Complete</option>
										<option value="Cancelled">Cancelled</option>
									</select>
								</div>
								<div class="form-group center-block">
									<button type="submit" class="btn btn-info btn-sm" value="submit" name="submit" id="submit">Update Record</button>
								</div>
							  </form>
				
			</td>
			<td><p><?php echo $AE;?></p></td>
                              	
                              	<td align="center">
                              	<div style="padding: 5px; text-align: center !important">
								<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Comments-<?php echo $job_numb;?>">Comments</button></div>

<!-- Modal -->
<div id="Comments-<?php echo $job_numb;?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Comments for <?php echo html_entity_decode($job_name) . "&nbsp;|&nbsp;" . $job_numb;?></h4>
      </div>
      <div class="modal-body">
        <p><?php echo html_entity_decode(nl2br($comments));?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
                               </td>
          </tr>
          <?php
             }
           ?>
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
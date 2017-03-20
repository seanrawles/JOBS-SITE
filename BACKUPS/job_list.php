<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
			</div>
			<div class="col-md-4"> <a href="http://jobs.canneryresorts.com"><img src="images/ccr_logo.png" class="img-responsive" alt="Placeholder image" style="margin: auto; padding-top: 25px;"></a>
			</div>
			<div class="col-md-4">
              		<div style="padding: 15px 0">
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
		<hr />
	  </div>
	  <div class="container-fluid" style="max-width: 90%">
  		<div class="row">
  			<div class="col-md-12">
  				<h3>Submitted Jobs</h3>
  				<div style="max-height: 500px; overflow: scroll">
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
$sql = "SELECT * FROM jobs_canjobs";
				
$orderBy = array('job_numb', 'job_name', 'due_date', 'requestor', 'assignee', 'AE');

$order = 'type';
if (isset($_GET['orderBy']) && in_array($_GET['orderBy'], $orderBy)) {
    $order = $_GET['orderBy'];
}
$sql = "SELECT * FROM jobs_canjobs ORDER BY $order";
$results = mysqli_query($conn, $sql);

					?>
					<table>
<tr style="background-color: cadetblue">
	<th><a href="?orderBy=job_numb"><b>Job ID#</b></a></th>
	<th><a href="?orderBy=job_name"><b>Title</b></a></th>
	<th><b>Comments</b></th>
	<th><a href="?orderBy=due_date"><b>Due Date</b></a></th>
			 <th><b>Attachments</b></th>
	<th><a href="?orderBy=requestor"><b>Requested By:</b></a></th>
	<th><a href="?orderBy=assignee"><b>Assigned to</b></a></th>
	<th><a href="?orderBy=AE"><b>Account Exec</b></a></th>
			 <th><b>Edit Record</b></th>
			 <th style="background-color: crimson"><b>Archive Record</b></th>
</tr>
 
<!-- here is where your repeating rows start -->
<?php
foreach ($results as $result){
    $job_numb = $result['job_numb'];
    $job_name = $result['job_name'];
    $comments = $result['comments'];
    $due_date = $result['due_date'];
    $attachment1 = $result['attachment1'];
    $attachment2 = $result['attachment2'];
    $attachment3 = $result['attachment3'];
    $requestor = $result['requestor'];
    $req_email = $result['req_email'];
    $Property = $result['Property'];
    $assignee = $result['assignee'];
    $assign_email = $result['assign_email'];
    $AE = $result['AE'];
?>
                <tr>
				 <td><a href="printable.php?job_numb=<?=$job_numb;?>&job_name=<?=$job_name;?>&comments=<?=$comments;?>&due_date=<?=$due_date;?>&attachment1=<?=$attachment1;?>&requestor=<?=$requestor;?>&req_email=<?=$req_email;?>&Property=<?=$Property;?>&assignee=<?=$assignee;?>&assign_email=<?=$assign_email;?>&AE=<?=$AE;?>" target="new" style="color: #666 !important"><p style="font-size: 18px; font-weight: bold"><?php echo $job_numb;?></p></a></td>
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
        <?php echo "$attachment2";?><br>
        <?php echo "$attachment3";?><br>
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
                                <td><?php echo $assignee;?><br><?php echo $assign_email;?></td>
				 		  <td><?php echo $AE;?></td>
                                <td>
                                	<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit-<?php echo $job_numb;?>">Edit Record</button>

<!-- Modal -->
<div id="edit-<?php echo $job_numb;?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Attachments for <?php echo "$job_name" . "&nbsp;|&nbsp;" . "$job_numb";?></h4>
      </div>
      <div class="modal-body">
		 <form method="post" action="form_action2.php" enctype="multipart/form-data">
	  		<div class="container-fluid">
	  				<div class="form-group">
						<label for="job_name">Job Name</label><br>
						<input type="text" class="form-control" aria-describedby="jobname" id="job_name" name="job_name" value="<? echo $job_name; ?>">
		  			</div>
		  			<div class="form-group">
						<label for="comments">Comments</label><br>
						<textarea class="form-control" rows="5" id="comments" name="comments"><?php echo "$comments";?></textarea>
					</div>
					<div class="form-group">
						<label for="due_date">Due Date</label><br>
						<input type="date" class="form-control" style="max-width: 200px;" id="due_date" name="due_date" value="<?php echo date("n/j/Y", strtotime("$due_date"))?>">
					</div>
					<div class="form-group">
						<label for="property">Which Property</label><br>
						<select class="form-control" id="property" name="property" style="max-width: 300px;">
   							<option value="<? echo $Property;?>" selected><? echo $Property;?></option>
    							<option value="Cannery">Cannery</option>
    							<option value="Eastside Cannery">Eastside Cannery</option>
  						</select>
					</div>
					<div class="form-group">
						<label for="AE">Account Exec</label>
						<select class="form-control" id="AE" name="AE" style="max-width: 300px;">
							<option value="<? echo $AE;?>" selected><? echo $AE;?></option>
							<option value="Michelle Narayan">Michelle Narayan</option>
    							<option value="Janice Mathews">Janice Mathews</option>
						</select>
					</div>
					<div class="form-group">
						<label for="assignee">Assigned to</label>
						<select class="form-control" id="assignee" name="assignee" style="max-width: 300px;">
							<option value="<? echo $assignee;?>" selected><? echo $assignee;?></option>
							<option value="Mimi Waite">Mimi Waite</option>
    							<option value="Marcy Johnson">Marcy Johnson</option>
    							<option value="Paul Nitch">Paul Nitch</option>
    							<option value="Norah Strebel">Norah Strebel</option>
    							<option value="Sean Rawles">Sean Rawles</option>
    							<option value="Kerry McCombe">Kerry McCombe</option>
						</select>
					</div>
					<div class="form-group">
						<label for="assign_email">Assigned to email</label>
						<select class="form-control" id="assign_email" name="assign_email" style="max-width: 300px;">
							<option value="<? echo $assign_email;?>" selected><? echo $assign_email;?></option>
							<option value="mwaite@canneryresorts.com">mwaite@canneryresorts.com</option>
    							<option value="mharper@canneryresorts.com">mharper@canneryresorts.com</option>
    							<option value="pnitch@canneryresorts.com">pnitch@canneryresorts.com</option>
    							<option value="nstrebel@canneryresorts.com">nstrebel@canneryresorts.com</option>
    							<option value="srawles@canneryresorts.com">srawles@canneryresorts.com</option>
    							<option value="kmccombe@canneryresorts.com">kmccombe@canneryresorts.com</option>
						</select>
					</div>
					<input type="hidden" id="<?php echo $job_numb;?>" name="job_numb" value="<? echo $job_numb;?>">
					<div class="form-group">
						<button type="submit" class="btn btn-primary" value="submit" name="submit" id="submit">Update Record</button>
					</div>
			</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
                                	
                                </td>
				 <td><a href ="delete.php?job_numb=<?=$job_numb;?>" style="color: #666"><button type="button" class="btn btn-danger">Mark as Completed</button></a></td>
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
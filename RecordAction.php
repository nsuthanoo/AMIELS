<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login');
	exit;
}
if (!isset($_POST['act'])) {
	header('Location: index.php');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'artsband';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artsband Musical Instrument and Equipment Lending System</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap-4.3.1.css" rel="stylesheet">
    <link href="Style.css" rel="stylesheet" type="text/css">
  </head>
  <body style="background-image: url(images/ins.jpg); background-size: cover;">
	  <div class="container align-content-center" style="color: black; background-color: whitesmoke; padding-left: 7%; padding-right: 7%;margin-top: 5%; margin-bottom: 5%">
		  <br><br>
	  	<?php 
		  $ts=$_POST['Timestamp'];
		  $incre=$_POST['IDIncre'];
		  if ($_POST['act']=='edit'){
			  $q= 'SELECT * FROM record WHERE timestamp='.$ts.' AND id_increment='.$incre.';';
			  echo '<p class="display-4">Edit Record #'.$ts.$incre.'</p>';
			  $result=mysqli_query($con, $q);
			  if (!$result) {
				  trigger_error('Invalid query: ' . $con->error);
			  }
			  $res=mysqli_fetch_assoc($result);
			  $sid=$res["student_id"];
			  $iid=$res["item_id"];
			  $stid=$res['staff_id'];
			  $rd=$res['return_date'];
			  $bd=$res['borrow_date'];
			  $rm=$res['remarks'];
			  echo '<form  method="post" action="#">
				<div class="form-group">
					<div class="row">
						<div class="col">
							<label for="StudentID" style="font-size: 30px">Student ID</label>
							<input type="text" class="form-control" id="StudentID" name="StudentID" required autofocus minlength="10" maxlength="10" pattern="[0-9]{10}" value="'.$sid.'">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label for="ItemID" style="font-size: 30px">Item ID</label>
							<input type="text" class="form-control" id="ItemID" name="ItemID" required minlength="10" maxlength="10" pattern="[0-9]{10}" value="'.$iid.'"><input type="hidden" id="OItemID" name="OItemID" value="'.$iid.'">
							<small id="FindItemID" class="form-text text-muted">Find item ID <a href="ManageItems" style="color: black" target="_blank">here</a></small>
						</div>
					</div><br>
					<div class="row">
						<div class="col">
							<label for="StaffID" style="font-size: 30px">Staff ID</label>
							<input type="text" class="form-control" id="StaffID" name="StaffID" placeholder="xxxxx" required minlength="5" maxlength="5" pattern="[0-9]{5}" value="'.$stid.'">
							<small id="FindStaffID" class="form-text text-muted">Find staff ID <a href="ManageStaffs" style="color: black" target="_blank">here</a></small>
						</div>
						<div class="col" style="font-size: 30px">
							<label for="ReturnDate">Return Date</label>
							<input type="date" class="form-control" id="ReturnDate" name="ReturnDate" value="'.$rd.'">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label for="remarks" style="font-size: 30px">Remarks</label>
							<input type="text" class="form-control" id="remarks" name="remarks" maxlength="255" value="'.$rm.'">
							<small id="remarksDetail" class="form-text text-muted">Max : 255 chars</small>
						</div>
						<div class="col" style="font-size: 30px">
							<label for="ReturnDate">Borrow Date</label>
							<input type="date" class="form-control" id="BorrowDate" name="BorrowDate" value="'.$bd.'">
						</div>
					</div>
					<br>
					<input type="hidden" id="Timestamp" name="Timestamp" value="'.$ts.'">
					<input type="hidden" id="IDIncre" name="IDIncre" value="'.$incre.'">
					<input type="hidden" id="act" name="act" value="do_edit">
					<div class="row">
						<div class="col">
							<button type="submit" class="btn btn-primary btn-lg">Save</button>&nbsp;&nbsp;
							<a href="#" class="btn btn-outline-danger btn-lg" onclick="window.close();return false;">Cancel</a>
						</div>
					</div>
				</div>
			</form>';
			  
		  }
		  if ($_POST['act']=='delete'){
			  $q= 'SELECT * FROM record WHERE timestamp='.$ts.' AND id_increment='.$incre.';';
			  $result=mysqli_query($con, $q);
			  if (!$result) {
				  trigger_error('Invalid query: ' . $con->error);
			  }
			  $res=mysqli_fetch_assoc($result);
			  $iid=$res["item_id"];
			  echo '<div class="container-fluid text-center"><p class="display-3">Delete Record #'.$_POST['Timestamp'].$_POST['IDIncre'].'</p>';
			  echo '<p class="display-4">Are you sure you want to delete this record?</p>';
			  echo '<form  method="post" action="#"><input type="hidden" id="act" name="act" value="do_remove">
			  <input type="hidden" id="Timestamp" name="Timestamp" value="'.$ts.'"><input type="hidden" id="act" name="act" value="do_remove"><input type="hidden" id="ItemID" name="ItemID" value="'.$iid.'"><input type="hidden" id="IDIncre" name="IDIncre" value="'.$incre.'"><button type="submit" class="btn btn-danger btn-lg">Delete</button>&nbsp;&nbsp;<a href="#" class="btn btn-outline-danger btn-lg" onclick="window.close();return false;">Cancel</a></form></div>';
		  }
		   if ($_POST['act']=='do_edit'){
			   $sid=$_POST["StudentID"];
			   $iid=$_POST["ItemID"];
			   $oiid=$_POST["OItemID"];
			   $stid=$_POST['StaffID'];
			   $rd=$_POST['ReturnDate'];
			   $bd=$_POST['BorrowDate'];
			   $rm=$_POST['remarks'];
			   $q="UPDATE record SET borrow_date='$bd', return_date='$rd', remarks='$rm', student_id='$sid', item_id='$iid', staff_id='$stid' WHERE timestamp='$ts' AND id_increment='$incre';";
			   if ($oiid!=$iid){
				   $cq="SELECT record.timestamp, record.item_id FROM record JOIN item ON item.item_id=record.item_id WHERE record.item_id=$oiid ORDER BY record.timestamp DESC LIMIT 1;";
				   $ci=mysqli_query($con,$cq);
				   $res=mysqli_fetch_assoc($ci);
				   if ($res['timestamp']==$ts){
					   $q1="UPDATE item SET borrow_status = 'IN STOCK' WHERE item_id= $oiid;";
					   $cq1=mysqli_query($con,$q1);
					   $result=mysqli_query($con, $q);
					   if (!$result) {
						  trigger_error('Invalid query: ' . $con->error);
					   } else{
						   echo '<div class="container-fluid text-center"><p class="display-3">Record #'.$_POST['Timestamp'].$_POST['IDIncre'].' Updated Successfully</p><a href="#" class="btn btn-outline-danger btn-lg" onclick="window.close();return false;">Close</a>';
					   }
				   }else{
					   $result=mysqli_query($con, $q);
					   if (!$result) {
						    trigger_error('Invalid query: ' . $con->error);
					   } else{
						   echo '<div class="container-fluid text-center"><p class="display-3">Record #'.$_POST['Timestamp'].$_POST['IDIncre'].' Updated Successfully</p><a href="#" class="btn btn-outline-danger btn-lg" onclick="window.close();return false;">Close</a>';
					   }
				   }
				   
			   } else{
				   $result=mysqli_query($con, $q);
				   if (!$result) {
						  trigger_error('Invalid query: ' . $con->error);
				   } else{
					   echo '<div class="container-fluid text-center"><p class="display-3">Record #'.$_POST['Timestamp'].$_POST['IDIncre'].' Updated Successfully</p><a href="#" class="btn btn-outline-danger btn-lg" onclick="window.close();return false;">Close</a>';
				   }
			   }
		   }
		   if ($_POST['act']=='do_remove'){
			   $q="DELETE FROM record WHERE timestamp='$ts' AND id_increment='$incre';";
			   $result=mysqli_query($con, $q);
			   if (!$result) {
				  trigger_error('Invalid query: ' . $con->error);
			   }else{
				   $item_id=$_POST['ItemID'];
				   $qi="UPDATE item SET borrow_status = 'IN STOCK' WHERE item_id= '$item_id';";
				   if (mysqli_query($con, $qi)) {
					   echo '<div class="container-fluid text-center"><p class="display-3">Record #'.$_POST['Timestamp'].$_POST['IDIncre'].' was deleted</p><a href="#" class="btn btn-outline-danger btn-lg" onclick="window.close();return false;">Close</a>';
				   } else{
					   echo '<div class="container-fluid text-center"><p class="display-3">An error occured. Please try again.</p><a href="#" class="btn btn-outline-danger btn-lg" onclick="window.close();return false;">Close</a>';
				   }
			   }
		   }
		?>
		<br><br>
	  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/jquery-3.3.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.3.1.js"></script>
  </body>
</html>
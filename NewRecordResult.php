<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login');
	exit;
}
if (!isset($_POST['ItemID'])) {
	header('Location: Newrecord');
	exit;
}
// Change this to your connection info.
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
  <body style="color: black; background-color: whitesmoke">
	  
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #204051;">
       <a class="navbar-brand" href="index.php">AMIELS</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
       </button>
       <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
             <li class="nav-item">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
             </li>
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Menu
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="Availability">Check Available Items</a>
                   <a class="dropdown-item" href="CheckRecord">Check Record</a>
                   <a class="dropdown-item" href="CheckStock">Check Stock</a>
                </div>
             </li>
          </ul>
		  <ul class="nav navbar-nav navbar-right">
		   	<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Manage
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="ManageRecords">Records</a>
                   <a class="dropdown-item" href="ManageClients">Clients</a>
                   <a class="dropdown-item" href="ManageItems">Items</a>
                   <a class="dropdown-item" href="ManageStaffs">Staffs</a>
                   <a class="dropdown-item" href="ManageOwners">Owners</a>
                </div>
             </li>
			 <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Quick Move
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item active" href="NewRecord">New Record</a>
                   <a class="dropdown-item" href="Return">Return Item</a>
                   <a class="dropdown-item" href="NewClient">Add New Client</a>
                   <a class="dropdown-item" href="NewItem">Add New Item</a>
                   <a class="dropdown-item" href="NewStaff">Add New Staff</a>
                   <a class="dropdown-item" href="NewOwner">Add New Owner</a>
                </div>
             </li>
			</ul>
		   <a href="logout" class="btn btn-outline-danger">Logout</a>
       </div>
    </nav>
	  <div class="container">
		<div class="row">
		<div class="col-md-8" style="color: black; background-color: whitesmoke; padding-top: 8%">
			<?php
			error_reporting(0);
			$return_date = $_POST['ReturnDate'];
			$borrow_date = date('y-m-d');
			$d=date('ymd');
			$cctime=gmdate('his', time());
			$remarks = $_POST['remarks'];
			$student_id = $_POST['StudentID'];
			$item_id = $_POST['ItemID'];
			$staff_id = $_POST['StaffID'];
			$ctimestamp = $d.$cctime;
			$yc=1;
			$increr= mysqli_query($con, 'SELECT timestamp FROM record;');
			if ($increr->num_rows>0){
				while($rr=$increr->fetch_array()){
					if ($rr['timestamp']==$ctimestamp){
						$yc=$yc+1;
					} 
				}
			}
			$incre = $yc;
			if ($incre>=100) {
				$id=$incre;
			} else{
				if ($incre>=10) {
					$id='0'.$incre;
				} else {
					$id='00'.$incre;
				}
			}
			$ma=$_POST['multiadd'];
			$times=$_POST['times'];
			if (isset($ma)){
				echo '<p class="text-dark display-2">Multiple Add Result</p>';
				echo '<p class="text-dark" style="font-weight: bold;">Item#1 Result:</p>';
				$q="INSERT INTO `record` (`timestamp`, `id_increment`, `borrow_date`, `return_date`, `remarks`, `student_id`, `item_id`, `staff_id`) VALUES 
				('$ctimestamp', '$id', '$borrow_date', '$return_date', '$remarks', '$student_id', '$item_id', '$staff_id');";
				$q2="SELECT * FROM item WHERE item_id= '$item_id';";
				$ci=mysqli_query($con, $q2);
				$res=mysqli_fetch_assoc($ci);
				$em="SELECT * FROM client WHERE student_id= '$student_id';";
				$emr=mysqli_query($con, $em);
				$emres=mysqli_fetch_assoc($emr);
				$to_email = $emres['email'];
				$subject = '[Artsband] Records Information';
				$message = '---Artsband Musical Instrument and Equipment Lending System(AMIELS)---
Records Information:
----------------------------------------------------------
';

				$headers = 'From: amielslnwm.noreply@amiels.lnw.mn';
				if ($res["borrow_status"]=="BORROWED"){
					echo '<p class="text-dark">The item is not in stock.</p>';
				} else {
					if (mysqli_query($con, $q)) {
						$q3="UPDATE item SET borrow_status = 'BORROWED' WHERE item_id= '$item_id';";
						mysqli_query($con, $q3);
						echo '<p class="text-dark">Added Successful</p>';
						$message=$message.'Record ID: '.$ctimestamp.$id.'
Item ID: '.$item_id.'
Borrow Date: '.$borrow_date.'
Return Date: '.$return_date.'
-----------------------------------------------------------
';
					} else{
						echo "<p class='text-dark'>Error : " . mysqli_error($con)."</p>";
					}
				}
				for ($x = 2; $x <= $times; $x++) {
					$incre = $yc+1;
					$yc=$incre;
					if ($incre>=100) {
						$id=$incre;
					} else{
						if ($incre>=10) {
							$id='0'.$incre;
						} else {
							$id='00'.$incre;
						}
					}
					$ciid=$_POST['ItemID'.$x];
					$qq="INSERT INTO `record` (`timestamp`, `id_increment`, `borrow_date`, `return_date`, `remarks`, `student_id`, `item_id`, `staff_id`) VALUES 
					('$ctimestamp', '$id', '$borrow_date', '$return_date', '$remarks', '$student_id', '$ciid', '$staff_id');";
					$checkitem="SELECT * FROM item WHERE item_id= '$ciid';";
					$ci=mysqli_query($con, $checkitem);
					$res=mysqli_fetch_assoc($ci);
					echo '<p class="text-dark" style="font-weight: bold;">Item#'.$x.' Result:</p>';
					if ($res["borrow_status"]=="BORROWED"){
						echo '<p class="text-dark">The item is not in stock.</p>';
					} else {
						if (mysqli_query($con, $qq)) {
							$q3="UPDATE item SET borrow_status = 'BORROWED' WHERE item_id= '$ciid';";
							mysqli_query($con, $q3);
							echo '<p class="text-dark">Added Successful</p>';
$message=$message.'Record ID: '.$ctimestamp.$id.'
Item ID: '.$item_id.'
Borrow Date: '.$borrow_date.'
Return Date: '.$return_date.'
-----------------------------------------------------------
';
						} else{
							echo "<p class='text-dark'>Error : " . mysqli_error($con)."</p>";
						}
					}
				}
				$message=$message.'-----------------------------------------------------------
You can find more information about your record at our website.
http://www.amiels.lnw.mn/CheckRecord';
				$headers = 'From: amielslnwm.noreply@amiels.lnw.mn';
				mail($to_email,$subject,$message,$headers);
				echo '<br><a href="NewRecord" class="btn btn-success btn-lg">Create more record</a>&nbsp;';
				echo '<a href="ManageRecords" class="btn btn-warning btn-lg">Check Record Table</a>&nbsp;';
				echo '<a href="StaffPortal" class="btn btn-secondary btn-lg">Back to home</a>';
			} else{
					$q="INSERT INTO `record` (`timestamp`, `id_increment`, `borrow_date`, `return_date`, `remarks`, `student_id`, `item_id`, `staff_id`) VALUES 
					('$ctimestamp', '$id', '$borrow_date', '$return_date', '$remarks', '$student_id', '$item_id', '$staff_id');";
					$q2="SELECT * FROM item WHERE item_id= '$item_id';";
					$ci=mysqli_query($con, $q2);
					$res=mysqli_fetch_assoc($ci);
					if ($res["borrow_status"]=="BORROWED"){
						echo '<p class="text-dark display-2">Opps! Something went wrong.</p>';
						echo '<p class="text-dark display-4">The item is not in stock.</p>';
						echo '<br><a href="NewRecord" class="btn btn-success btn-lg">Try Again</a>&nbsp;';
						echo '<a href="ManageRecords" class="btn btn-warning btn-lg">Check Record Table</a>&nbsp;';
						echo '<a href="StaffPortal" class="btn btn-secondary btn-lg">Back to home</a>';
					} else {
						if (mysqli_query($con, $q)) {
						  $q3="UPDATE item SET borrow_status = 'BORROWED' WHERE item_id= '$item_id';";
						  mysqli_query($con, $q3);
						  $em="SELECT * FROM client WHERE student_id= '$student_id';";
						  $emr=mysqli_query($con, $em);
						  $emres=mysqli_fetch_assoc($emr);
						  echo '<p class="text-dark display-2">New record created successfully!</p>';
						  echo '<br><a href="NewRecord" class="btn btn-success btn-lg">Create more record</a>&nbsp;';
						  echo '<a href="ManageRecords" class="btn btn-warning btn-lg">Check Record Table</a>&nbsp;';
						  echo '<a href="StaffPortal" class="btn btn-secondary btn-lg">Back to home</a>';
							$to_email = $emres['email'];
							$subject = '[Artsband] Record#'.$ctimestamp.$id;
							$message = '---Artsband Musical Instrument and Equipment Lending System(AMIELS)---
Your Record Information:
Record ID: '.$ctimestamp.$id.'
Item ID: '.$item_id.'
Borrow Date: '.$borrow_date.'
Return Date: '.$return_date.'
---------------------------------------------------------------
You can find more information about your record at our website.
http://www.amiels.lnw.mn/CheckRecord';
							$headers = 'From: amielslnwm.noreply@amiels.lnw.mn';
							mail($to_email,$subject,$message,$headers);
						} else {
						  echo '<p class="text-dark display-2">Opps! Something went wrong.</p>';
						  echo '<p class="text-dark display-4">Please check your information again.</p>';
						  echo "<p class='text-dark'>Item ID, Staff ID or Student ID does not exist in the database.</p>";
						  echo '<br><a href="NewRecord" class="btn btn-success btn-lg">Try Again</a>&nbsp;';
						  echo '<a href="ManageRecords" class="btn btn-warning btn-lg">Check Record Table</a>&nbsp;';
						  echo '<a href="StaffPortal" class="btn btn-secondary btn-lg">Back to home</a>';
						}
					}
				}

			?>
		</div>
			<div class="col-md-4" style="background-image: url(images/emptysofa.jpg); background-size: cover; height: 800px; width: 600px"></div>
		</div>
		  <br>
		<div class="row text-dark">
          <div class="text-center col-lg-6 offset-lg-3">
             <p>Copyright &copy; 2020 &middot; All Rights Reserved &middot; <a href="#" style="color: black">AMIELS</a></p>
          </div>
       </div>
       </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/jquery-3.3.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.3.1.js"></script>
  </body>
</html>
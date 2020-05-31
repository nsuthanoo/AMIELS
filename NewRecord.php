<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login');
	exit;
}
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
	<script>
	function showbox() {
		var checkBox = document.getElementById("multi");
		var mulre = document.getElementById("mulre");
		var mulrego=document.getElementById("mulrego");
		if (checkBox.checked == true){
    		mulre.style.display = "block";
			mulrego.style.display = "block";
		} else {
    		mulre.style.display = "none";
			mulrego.style.display = "none";
  		}
	}
	</script>
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
			<p class="text-dark display-2">New record</p>
			<div class="row" style="width: 80%">
				<div class="col-5">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="multi" onclick="showbox()">
						<label class="form-check-label" for="multi">
						  Create Multiple Records
						</label>
					</div>
				</div>
				<form  method="post" action="#">
					<input type="hidden" id="actimulti" name="actimulti" value="1">
					<div class="col" id="mulre" style="display:none">
						<input type="text" class="form-control" id="numre" name="numre" placeholder="How many records?">
					</div>
					<div class="col-5" id="mulrego" style="display:none">
						<button type="submit" class="btn btn-sm btn-outline-success" style="margin-top: 10px">Go</button>
					</div>
				</form>
			</div>
			<form  method="post" action="NewRecordResult">
				<div class="form-group" style="width: 80%">
					<div class="row">
						<div class="col">
							<label for="StudentID" style="font-size: 30px">Student ID</label>
							<input type="text" class="form-control" id="StudentID" name="StudentID" placeholder="xxxxxxxxxx" required autofocus minlength="10" maxlength="10" pattern="[0-9]{10}">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label for="ItemID" style="font-size: 30px">Item ID</label>
							<input type="text" class="form-control" id="ItemID" name="ItemID" placeholder="xxxxxxxxxx" required minlength="10" maxlength="10" pattern="[0-9]{10}">
							<small id="FindItemID" class="form-text text-muted">Find Item ID <a href="ManageItems" style="color: black" target="_blank">here</a></small>
						</div>
					</div>
					<?php 
					error_reporting(0);
					$acti= $_POST['actimulti'];
					$num= $_POST['numre'];
					if (isset($acti)){
						echo '<input type="hidden" id="multiadd" name="multiadd" value="'.$acti.'">';
						echo '<input type="hidden" id="times" name="times" value="'.$num.'">';
						for ($x = 2; $x <= $num; $x++) {
							echo '<br>';
							echo '<div class="row">';
							echo '<div class="col">';
							echo '<label for="ItemID'.$x.'" style="font-size: 30px">Item ID #'.$x.'</label>';
							echo '<input type="text" class="form-control" id="ItemID'.$x.'" name="ItemID'.$x.'" placeholder="xxxxxxxxxx" required minlength="10" maxlength="10" pattern="[0-9]{10}">';
							echo '</div>';
							echo '</div>';
						}
					}
					?>
					<br>
					<div class="row">
						<div class="col">
							<label for="StaffID" style="font-size: 30px">Staff ID</label>
							<input type="text" class="form-control" id="StaffID" name="StaffID" placeholder="xxxxx" required minlength="5" maxlength="5" pattern="[0-9]{5}">
							<small id="FindStaffID" class="form-text text-muted">Find Staff ID <a href="ManageStaffs" style="color: black" target="_blank">here</a></small>
						</div>
						<div class="col" style="font-size: 30px">
							<label for="ReturnDate">Return Date</label>
							<input type="date" class="form-control" id="ReturnDate" name="ReturnDate">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label for="remarks" style="font-size: 30px">Remarks</label>
							<input type="text" class="form-control" id="remarks" name="remarks" maxlength="255">
							<small id="remarksDetail" class="form-text text-muted">Max. 255 characters</small>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<button type="submit" class="btn btn-success btn-lg">Submit</button>
						</div>
					</div>
				</div>
			</form>

		</div>
			<div class="col-md-4" id="multiform">
			<div style="background-image: url(images/emptysofa.jpg); background-size: cover; height: 800px;" ></div>
			</div>
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

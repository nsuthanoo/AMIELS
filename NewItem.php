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
                   <a class="dropdown-item" href="NewRecord">New Record</a>
                   <a class="dropdown-item" href="Return">Return Item</a>
                   <a class="dropdown-item" href="NewClient">Add New Client</a>
                   <a class="dropdown-item active" href="NewItem">Add New Item</a>
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
			<p class="text-dark display-2">New Item</p>
			<form  method="post" action="NewItemResult">
				<div class="form-group" style="width: 80%">
					<div class="row">
						<div class="col">
							<label for="Group" style="font-size: 30px">Group</label>
							<select class="form-control" id="Group" name="Group" required>
								<option disabled selected value> -- select an option -- </option>
  								<option value="001">Drums and Purcusion</option>
								<option value="002">String Instruments</option>
								<option value="003">Keyboard</option>
								<option value="004">Misc. Instruments</option>
								<option value="005">Microphone</option>
								<option value="006">Jacks and Cords</option>
								<option value="007">Amplifiers and Monitors</option>
								<option value="008">Misc. Equipments for Drums and Purcusion</option>
								<option value="009">Misc. Equipments for String Instruments</option>
								<option value="010">Misc. Equipments for Keyboard</option>
								<option value="011">Misc. Misc. Equipments</option>
								<option value="012">Non-Musical Instruments/Equipments</option>
							</select>
						</div>
						<div class="col">
							<label for="7c" style="font-size: 30px">7-Digit Code</label>
							<input type="text" class="form-control" id="7c" name="7c" maxlength="7" placeholder="Ex. 1234567, 000005" required>

						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label for="Type" style="font-size: 30px">Type</label>
							<input type="text" class="form-control" id="Type" name="Type" maxlength="255" placeholder="Ex. electric bass, egg shaker, tambourine">

						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label for="Brand" style="font-size: 30px">Brand</label>
							<input type="text" class="form-control" id="Brand" name="Brand" maxlength="255">
						</div>
						<div class="col">
							<label for="Model" style="font-size: 30px">Model</label>
							<input type="text" class="form-control" id="Model" name="Model" maxlength="255">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label for="Color1" style="font-size: 30px">Color 1</label>
							<input type="text" class="form-control" id="Color1" name="Color1" maxlength="255">
						</div>
						<div class="col">
							<label for="Color2" style="font-size: 30px">Color 2</label>
							<input type="text" class="form-control" id="Color2" name="Color2" maxlength="255">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label for="Conditions" style="font-size: 30px">Condition</label>
							<input type="text" class="form-control" id="Conditions" name="Conditions" maxlength="255">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label for="size" style="font-size: 30px">Size Indicator</label>
							<input type="text" class="form-control" id="size" name="size" maxlength="255" placeholder="Ex. 12 in, 5 str">
						</div>
						<div class="col">
							<label for="OwnerID" style="font-size: 30px">Owner ID</label>
							<input type="text" class="form-control" id="OwnerID" name="OwnerID" required maxlength="10" pattern="[0-9]{10}">
							<small id="FindOwnerID" class="form-text text-muted">Find owner ID <a href="ManageOwners" style="color: black" target="_blank">here</a></small>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="remarks" style="font-size: 30px">Remarks</label>
							<input type="text" class="form-control" id="remarks" name="remarks" maxlength="100">
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
		<div class="col-md-4" style="background-image: url(images/top.jpg); background-size: cover; height: 1100px; width: 600px"></div>
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

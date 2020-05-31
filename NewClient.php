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
                   <a class="dropdown-item active" href="NewClient">Add New Client</a>
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
			<p class="text-dark display-2">New client</p>
			<form  method="post" action="NewClientResult">
				<div class="form-group" style="width: 80%">
					<div class="row">
						<div class="col">
							<label for="StudentID" style="font-size: 30px">Student ID</label>
							<input type="text" class="form-control" id="StudentID" name="StudentID" placeholder="xxxxxxxxxx" required autofocus minlength="10" maxlength="10" pattern="[0-9]{10}">
						</div>
						<div class="col">
							<label for="Nickname" style="font-size: 30px">Nickname</label>
							<input type="text" class="form-control" id="Nickname" name="Nickname" required maxlength="100">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label for="Firstname" style="font-size: 30px">First Name</label>
							<input type="text" class="form-control" id="Firstname" name="Firstname" required maxlength="100">

						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="Surname" style="font-size: 30px">Surname</label>
							<input type="text" class="form-control" id="Surname" name="Surname" required maxlength="100">

						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label for="Year" style="font-size: 30px">Year</label>
							<select class="form-control" id="Year" name="Year" required>
								<option disabled selected value> -- select an option -- </option>
  								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
							</select>
						</div>
						<div class="col">
							<label for="Faculty" style="font-size: 30px">Faculty</label>
							<select class="form-control" id="Faculty" name="Faculty" required>
								<option disabled selected value> -- select an option -- </option>
  								<option value="allied health sciences">Faculty of Allied Health Sciences</option>
								<option value="architecture">Faculty of Architecture</option>
								<option value="arts">Faculty of Arts</option>
								<option value="commerce and accountancy">Faculty of Commerce and Accountancy</option>
								<option value="communication arts">Faculty of Communication Arts</option>
								<option value="dentistry">Faculty of Dentistry</option>
								<option value="economics">Faculty of Economics</option>
								<option value="education">Faculty of Education</option>
								<option value="engineering">Faculty of Engineering</option>
								<option value="fine and applied arts">Faculty of Fine and Applied Arts</option>
								<option value="law">Faculty of Law</option>
								<option value="medicine">Faculty of Medicine</option>
								<option value="nursing">Faculty of Nursing</option>
								<option value="pharmaceutical sciences">Faculty of Pharmaceutical Sciences</option>
								<option value="political sciences">Faculty of Political Science</option>
								<option value="psychology">Faculty of Psychology</option>
								<option value="science">Faculty of Science</option>
								<option value="sports science">Faculty of Sports Science</option>
								<option value="veterinary science">Faculty of Veterinary Science</option>
								<option value="school of integrated innovation">School of Integrated Innovation</option>
								<option value="sar">School of Agricultural Resources</option>
								<option value="graduate school">Graduate School</option>
							</select>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label for="tel" style="font-size: 30px">Phone Number</label>
							<input type="tel" class="form-control" id="tel" name="tel" placeholder="xxx-xxx-xxxx" maxlength="12"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
						</div>
						<div class="col">
							<label for="LineID" style="font-size: 30px">Line ID</label>
							<input type="text" class="form-control" id="LineID" name="LineID" maxlength="100">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label for="email" style="font-size: 30px">E-mail</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="mail@example.com">
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
			<div class="col-md-4" style="background-image: url(images/emptysofa.jpg); background-size: cover; height: 1000px; width: 600px"></div>
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

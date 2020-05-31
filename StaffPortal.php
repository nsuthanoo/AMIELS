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
  <body style="background-color: #84a9ac">
	  
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #204051;">
       <a class="navbar-brand" href="index.php">AMIELS</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
       </button>
       <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
             <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
             </li>
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Menu
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="Availability">Check Available Item</a>
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
			 <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Quick Move
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="NewRecord">New Record</a>
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
	  <hr>
	  <br>
	  <br>
	  <div class="container" style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, 'sans-serif'">
		<div class="row">
		<div class="col-md-6" style="color: white">
			<div class="card text-white bg-info mb-3">
  				<div class="card-header  display-4">Quick Move</div>
  				<div class="card-body" style="font-size: 20px">
					<div class="row">
						<div class="col-md-8">
						<div class="card-title"><strong>New Record</strong></div>
    					<p class="card-text">Create a new record on the record table.</p>
						</div>
						<div class="col-md-4" align="right" style="margin-top: 5%">
						<a href="NewRecord" class="btn btn-outline-light btn-lg">Click</a>
						</div>
					</div><hr>
					<div class="row">
						<div class="col-md-8">
						<div class="card-title"><strong>Return Item</strong></div>
    					<p class="card-text">Return a borrowed item.</p>
						</div>
						<div class="col-md-4" align="right" style="margin-top: 2%">
						<a href="Return" class="btn btn-outline-light btn-lg">Click</a>
						</div>
					</div><hr>
					<div class="row">
						<div class="col-md-8">
						<div class="card-title"><strong>Add New Client</strong></div>
    					<p class="card-text">Add new client for first time user.</p>
						</div>
						<div class="col-md-4" align="right" style="margin-top: 2%">
						<a href="NewClient" class="btn btn-outline-light btn-lg">Click</a>
						</div>
					</div>	<hr>
					<div class="row">
						<div class="col-md-8">
						<div class="card-title"><strong>Add New Item</strong></div>
    					<p class="card-text">Add new item to the stock.</p>
						</div>
						<div class="col-md-4" align="right" style="margin-top: 2%">
						<a href="NewItem" class="btn btn-outline-light btn-lg">Click</a>
						</div>
					</div><hr>
					<div class="row">
						<div class="col-md-8">
						<div class="card-title"><strong>Add New Staff</strong></div>
    					<p class="card-text">Add new staff.</p>
						</div>
						<div class="col-md-4" align="right" style="margin-top: 2%">
						<a href="NewStaff" class="btn btn-outline-light btn-lg">Click</a>
						</div>
					</div><hr>
					<div class="row">
						<div class="col-md-8">
						<div class="card-title"><strong>Add New Owner</strong></div>
    					<p class="card-text">Add new item owner.</p>
						</div>
						<div class="col-md-4" align="right" style="margin-top: 2%">
						<a href="NewOwner" class="btn btn-outline-light btn-lg">Click</a>
						</div>
					</div>
  				</div>
			</div>
		</div>
		<div class="col-md-6" style="color: white">
			<div class="card text-white bg-secondary mb-3">
  				<div class="card-header display-4">Manage</div>
  				<div class="card-body" style="font-size: 20px">
					<div class="row">
						<div class="col-md-8">
						<div class="card-title"><strong>Records</strong></div>
    					<p class="card-text">Remove, edit or search for record(s) in the record table.</p>
						</div>
						<div class="col-md-4" align="right" style="margin-top: 5%">
						<a href="ManageRecords" class="btn btn-outline-light btn-lg">Click</a>
						</div>
					</div><hr>
					<div class="row">
						<div class="col-md-8">
						<div class="card-title"><strong>Clients</strong></div>
    					<p class="card-text">Remove, edit or search for client(s) in the client table.</p>
						</div>
						<div class="col-md-4" align="right" style="margin-top: 5%">
						<a href="ManageClients" class="btn btn-outline-light btn-lg">Click</a>
						</div>
					</div>	<hr>
					<div class="row">
						<div class="col-md-8">
						<div class="card-title"><strong>Items</strong></div>
    					<p class="card-text">Remove, edit or search for item(s) in the item table.</p>
						</div>
						<div class="col-md-4" align="right" style="margin-top: 5%">
						<a href="ManageItems" class="btn btn-outline-light btn-lg">Click</a>
						</div>
					</div><hr>
					<div class="row">
						<div class="col-md-8">
						<div class="card-title"><strong>Staffs</strong></div>
    					<p class="card-text">Remove, edit or search for staff(s) in the staff table.</p>
						</div>
						<div class="col-md-4" align="right" style="margin-top: 5%">
						<a href="ManageStaffs" class="btn btn-outline-light btn-lg">Click</a>
						</div>
					</div><hr>
					<div class="row">
						<div class="col-md-8">
						<div class="card-title"><strong>Owners</strong></div>
    					<p class="card-text">Remove, edit or search for item owner(s) in the owner table.</p>
						</div>
						<div class="col-md-4" align="right" style="margin-top: 5%">
						<a href="ManageOwners" class="btn btn-outline-light btn-lg">Click</a>
						</div>
					</div>
  				</div>
			</div>
		</div>
		</div>
		  <br>
		<div class="row text-light">
          <div class="text-center col-lg-6 offset-lg-3">
             <p>Copyright &copy; 2020 &middot; All Rights Reserved &middot; <a href="#" style="color: whitesmoke">AMIELS</a></p>
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

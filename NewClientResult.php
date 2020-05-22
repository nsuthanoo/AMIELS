<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login');
	exit;
}
if (!isset($_POST['StudentID'])) {
	header('Location: NewClient');
	exit;
}
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'artsband';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
$student_id = $_POST['StudentID'];
$first_name = $_POST['Firstname'];
$surname = $_POST['Surname'];
$nickname = $_POST['Nickname'];
$year = $_POST['Year'];
$faculty = $_POST['Faculty'];
$tel_no = $_POST['tel'];
$line_id = $_POST['LineID'];
$email = $_POST['email'];


$q="INSERT INTO `client` (`student_id`, `first_name`, `surname`, `nickname`, `year`, `faculty`, `tel_no`, `line_id`, `email`) VALUES ($student_id, '$first_name', '$surname', '$nickname', '$year', '$faculty', '$tel_no', '$line_id', '$email');";
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
                   <a class="dropdown-item active" href="NewClient">New Client</a>
                   <a class="dropdown-item" href="NewItem">New Item</a>
                   <a class="dropdown-item" href="NewStaff">New Staff</a>
                   <a class="dropdown-item" href="NewOwner">New Owner</a>
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
			if (mysqli_query($con, $q)) {
			  echo '<p class="text-dark display-2">New client added successfully!</p>';
			  echo '<br><a href="NewClient" class="btn btn-success btn-lg">Add more client</a>&nbsp;';
			  echo '<a href="ManageClients" class="btn btn-warning btn-lg">Check Client Table</a>&nbsp;';
			  echo '<a href="StaffPortal" class="btn btn-secondary btn-lg">Back to home</a>';
			} else {
			  echo '<p class="text-dark display-2">Opps! Something went wrong.</p>';
			  echo '<p class="text-dark display-4">Please check your information again.</p>';
			  echo "<p class='text-dark'>Error Message: " . mysqli_error($con)."</p>";
			  echo '<br><a href="NewClient" class="btn btn-success btn-lg">Try Again</a>&nbsp;';
			  echo '<a href="ManageClients" class="btn btn-warning btn-lg">Check Client Table</a>&nbsp;';
			  echo '<a href="StaffPortal" class="btn btn-secondary btn-lg">Back to home</a>';
			}
			?>

		</div>
			<div class="col-md-4" style="background-image: url(images/tonton.jpg); background-size: cover; height: 1000px; width: 600px"></div>
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

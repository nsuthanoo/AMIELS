<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (isset($_SESSION['loggedin'])) {
	header('Location: StaffPortal');
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
  <body style="background-image: url(images/ins.jpg); background-size: cover; ">
	  
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #204051;">
       <a class="navbar-brand" href="index.php">AMIELS</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
             <li class="nav-item">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
             </li>
             <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Menu
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="Availability">Check Available Items</a>
                   <a class="dropdown-item" href="CheckRecord">Check Record</a>
                   <a class="dropdown-item" href="CheckStock">Check Stock</a>
                   <div class="dropdown-divider"></div>
                   <a class="dropdown-item active" href="login">Staff Login</a>
                </div>
             </li>
          </ul>
       </div>
    </nav>
	  <hr>
	  <div class="container-fluid" id="LOGIN">
		   <div class="row">
		   <div class="col"></div>
          <div class="col-md-6 text-center">
		<br/>
		<br/>
		<br/>
	<br><br><br><br>
		<br/>
             <div class="card">
                <div class="card-body">
                   <h3><strong>Staff Login</strong></h3>
<?php
if (isset($_SESSION['pw'])) {
	echo '<p>You have entered a wrong password.</p>';
	session_destroy();
}
elseif (isset($_SESSION['uw'])) {
	echo '<p>You have entered a wrong username.</p>';
	session_destroy();
}
?>
                   <form method="post" action="Authen.php" style="text-align: left">
					     <div class="form-group">
    						<label>Username</label>
    						<input type="text" class="form-control" id="User" name="User" placeholder="Enter your username" required>
  						</div>
					     <div class="form-group">
    						<label>Password</label>
    						<input type="password" class="form-control" id="Pass" name="Pass" placeholder="Enter your password" required>
  						</div>
					   <button type="submit" class="btn btn-success btn-md">Login</button>
                   </form>
                </div>
             </div>
		<br/>
		<br/>
		<br/>
		<br/><br><br><br><br>
          </div>
		   <div class="col"></div>
		</div>
		         <div class="row">
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

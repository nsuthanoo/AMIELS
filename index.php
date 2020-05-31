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
  <body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #204051;">
       <a class="navbar-brand" href="index.php">AMIELS</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
             <li class="nav-item active">
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
                   <div class="dropdown-divider"></div>
                   <a class="dropdown-item" href="login.php">Staff Login</a>
                </div>
             </li>
          </ul>
       </div>
    </nav>

    <div class="jumbotron jumbotron-fluid text-center" style="background-image: url(images/bg.jpg); background-size: cover; ">
       <h1 class="display-3" style="color: white"><br>Artsband Musical<br>Instrument and Equipment<br>Lending System (AMIELS)</h1>
		<br>
		<p class="lead" style="color: white; font-size: 25px">Are you a user or a staff?</p>
       <p style="color: cornsilk; font-size: 20px">
          <a class="btn btn-primary" href="#UP" role="button">User</a> or
          <a class="btn btn-info" href="#LOGIN" role="button">Staff</a>
       </p>
    </div>
    <div class="container" id="UP">
       <br>
       <hr>
       <div class="row text-center">
          <div class="display-4"><strong>User Portal</strong></div>
       </div>
		<br>
       <div class="row">
          <div class="col-md-4">
             <div class="card">
				 <img class="card-img-top" src="images/Avail.jpg" alt="Card image cap">
                <div class="card-body">
                   <h4 class="card-title">Check Available Items</h4>
                   <p class="card-text">Check all available items for your next musical journey.</p>
                   <a href="Availability" class="btn btn-primary">Click</a>
                </div>
             </div>
          </div>
          <div class="col-md-4">
             <div class="card">
				 <img class="card-img-top" src="images/Recc.jpg" alt="Card image cap">
                <div class="card-body">
                   <h4 class="card-title">Check Record</h4>
                   <p class="card-text">Check your past and present records.</p>
                   <a href="CheckRecord" class="btn btn-primary">Click</a>
                </div>
             </div>
          </div>
          <div class="col-md-4">
             <div class="card">
                <img class="card-img-top" src="images/Sto.jpg" alt="Card image cap">
                <div class="card-body">
                   <h4 class="card-title">Check Stock</h4>
                   <p class="card-text">Check out our entire musical instrument and equipment repository.</p>
                   <a href="CheckStock" class="btn btn-primary">Click</a>
                </div>
             </div>
          </div>
       </div>
       <br/>
       <br/>
		</div><!-- First Container --> 
	  <hr>
	  <div class="container-fluid" id="LOGIN" style="background-image: url(images/ins.jpg); background-size: cover; ">
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
                   <form method="post" action="Authen.php" style="text-align: left">
					     <div class="form-group">
    						<label>Username</label>
    						<input type="text" class="form-control" id="User" name="User" placeholder="Enter your username">
  						</div>
					     <div class="form-group">
    						<label>Password</label>
    						<input type="password" class="form-control" id="Pass" name="Pass" placeholder="Enter your password">
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

<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: login');
	exit;
}
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'artsband';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

$q="SELECT * FROM client;";

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
  <body style="color: black; background-color: grey">
<script>
	function myFunction() {
	var x = document.getElementById("SearchBy").value;
	if (x == "CID"||x=="CLI"){
		document.getElementById("fields").innerHTML ='<div class="row"><div class="col"><label for="query" style="font-size: 30px">ID</label><input type="text" class="form-control" id="query" name="query" required placeholder="Enter ID" ></div><div class="col-md-auto"><button type="submit" class="btn btn-success btn-lg" style="margin-top: 30px">Submit</button></div></div>';
	}else {
		if(x == "CNN"){
			document.getElementById("fields").innerHTML ='<div class="row"><div class="col"><label for="query" style="font-size: 30px">Keyword</label><input type="text" class="form-control" id="query" name="query" required placeholder="Enter Keyword" ></div><div class="col-md-auto"><button type="submit" class="btn btn-success btn-lg" style="margin-top: 30px">Submit</button></div></div>';
		} else {
			if (x == "CFN"){
				document.getElementById("fields").innerHTML ='<div class="row"><div class="col"><div class="row"><div class="col"><label for="FName" style="font-size: 30px">First Name</label><input type="text"  class="form-control" id="FName" name="FName"></div><div class="col"><label for="SName" style="font-size: 30px">Surname</label><input type="text"  class="form-control" id="SName" name="SName"></div></div></div><div class="col-md-auto"><button type="submit" class="btn btn-success btn-lg" style="margin-top: 30px">Submit</button></div></div>';
			} else {
				if (x == "CYF"){
					document.getElementById("fields").innerHTML ='<div class="row"><div class="col"><div class="row"><div class="col"><label for="year" style="font-size: 30px">Year</label><input type="text"  class="form-control" id="year" name="year"></div><div class="col"><label for="fac" style="font-size: 30px">Faculty</label><select class="form-control" id="fac" name="fac" ><option disabled selected value> -- select an option -- </option><option value="allied health sciences">Faculty of Allied Health Sciences</option><option value="architecture">Faculty of Architecture</option><option value="arts">Faculty of Arts</option><option value="commerce and accountancy">Faculty of Commerce and Accountancy</option><option value="communication arts">Faculty of Communication Arts</option><option value="dentistry">Faculty of Dentistry</option><option value="economics">Faculty of Economics</option><option value="education">Faculty of Education</option><option value="engineering">Faculty of Engineering</option><option value="fine and applied arts">Faculty of Fine and Applied Arts</option><option value="law">Faculty of Law</option><option value="medicine">Faculty of Medicine</option><option value="nursing">Faculty of Nursing</option><option value="pharmaceutical sciences">Faculty of Pharmaceutical Sciences</option><option value="political sciences">Faculty of Political Science</option><option value="psychology">Faculty of Psychology</option><option value="science">Faculty of Science</option><option value="sports science">Faculty of Sports Science</option><option value="veterinary science">Faculty of Veterinary Science</option><option value="school of integrated innovation">School of Integrated Innovation</option><option value="sar">School of Agricultural Resources</option><option value="graduate school">Graduate School</option></select></div></div></div><div class="col-md-auto"><button type="submit" class="btn btn-success btn-lg" style="margin-top: 30px">Submit</button></div></div>';
				} else{
					if (x == "CPN") {
						document.getElementById("fields").innerHTML ='<div class="row"><div class="col"><label for="tel" style="font-size: 30px">Phone Number</label><input type="tel" class="form-control"  id="tel" name="tel" placeholder="xxx-xxx-xxxx" required maxlength="12"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"></div><div class="col-md-auto"><button type="submit" class="btn btn-success btn-lg" style="margin-top: 30px">Submit</button></div></div>';
					} else{
						if(x == "CEM"){
							document.getElementById("fields").innerHTML ='<div class="row"><div class="col"><label for="tel" style="font-size: 30px">E-Mail</label><input type="email" class="form-control" id="email" name="email" placeholder="mail@example.com" required ></div><div class="col-md-auto"><button type="submit" class="btn btn-success btn-lg" style="margin-top: 30px">Submit</button></div></div>';
						}
					}
				}
			}
			}
		}
	}
	
</script>
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
		   	<li class="nav-item dropdown  active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Manage
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="ManageRecords">Records</a>
                   <a class="dropdown-item active" href="ManageClients">Clients</a>
                   <a class="dropdown-item" href="ManageItems">Items</a>
                   <a class="dropdown-item" href="ManageStaffs">Staffs</a>
                   <a class="dropdown-item" href="ManageOwners">Owners</a>
                </div>
             </li>
			 <li class="nav-item dropdowns">
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
	  <br><br><br>
	  <div class="container" style="color: white;">
<form>
			<form  method="GET" action="#">
				<div class="row">
					<div class="col text-center">
						<p class="display-4 ">Manage Clients</p>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col col-lg-2">
							<label for="SearchBy" style="font-size: 30px">Search By</label>
							<select class="form-control" id="SearchBy" name="SearchBy" required onchange="myFunction()" >
								<option disabled selected value></option>
								<option value="CID">Student ID</option>
								<option value="CFN">Full Name</option>
								<option value="CNN">Nickname</option>
								<option value="CYF">Year and Faculty</option>
								<option value="CPN">Phone Number</option>
								<option value="CLI">Line ID</option>
								<option value="CEM">E-mail</option>
							</select>
						</div>
						<div class="col" id="fields"></div>
					</div>
				</div>
			</form>
</form>
</div>
	  <br>
	  <div class="container-fluid">
		<div class="row">
			<table class="table table-striped table-dark">
				<thead class="text-center">
					<tr>
						<th scope="col">Student ID</th>
						<th scope="col">Full Name</th>
						<th scope="col">Nickname</th>
						<th scope="col">Year, Faculty</th>
						<th scope="col">Phone Number</th>
						<th scope="col">Line ID</th>
						<th scope="col">E-mail</th>
						<th scope="col"></th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody class="text-center">
				<?php
				error_reporting(0);
				$s_by=$_GET['SearchBy'];
				if ($s_by== "CID"||$s_by=="CLI"){
					$kw=$_GET['query'];
					if ($s_by=="CID"){
						$q="SELECT *FROM client WHERE student_id= '$kw';";
					}
					if ($s_by=="CLI"){
						$q="SELECT *FROM client WHERE line_id= '$kw';";
					}
				}
				if ($s_by == "CNN"){
					$kw=$_GET['query'];
					if ($s_by=="CNN"){
						$q="SELECT *FROM client WHERE nickname= '$kw';";
					}
				}
				if ($s_by== "CFN"){
					$fn=$_GET['FName'];
					$sn=$_GET['SName'];
					if ($s_by=="CFN"){
						if (!$fn==''){
							if (!$sn==''){
								$fsn= "first_name='".$fn."' AND surname='".$sn."'";
							}else{
								$fsn= "first_name='".$fn."'";
							}
						}else{
							$fsn= "surname='".$sn."'";
						}
						$q="SELECT *FROM client WHERE $fsn;";
					}
				}
				if ($s_by== "CYF"){
					$yy=$_GET['year'];
					$ff=$_GET['fac'];
					if (!$yy==''){
						if (!$ff==''){
							$yf= 'year='.$yy.' AND faculty="'.$ff.'"';
						}else{
							$yf= 'year='.$yy;
						}
					}else{
						$yf= 'faculty="'.$ff.'"';
					}
					$q="SELECT *FROM client WHERE $yf;";
				}
				if ($s_by== "CPN"){
					$kw=$_GET['tel'];
					if ($s_by=="CPN"){
						$q="SELECT *FROM client WHERE tel_no= '$kw';";
					}
				}
				if ($s_by== "CEM"){
					$kw=$_GET['email'];
					$q="SELECT *FROM client WHERE email='$kw';";
				}
				$result=mysqli_query($con, $q);

				if (!$result) {
					trigger_error('Invalid query: ' . $con->error);
				}

				if ($result->num_rows>0){
					while($row=$result->fetch_array()){
						echo "<tr>";
						echo "<th scope='row'>".$row["student_id"]."</th>";
						echo "<td>".$row["first_name"]." ".$row["surname"]."</td>";
						echo "<td>".$row["nickname"]."</td>";
						echo "<td>".$row["year"].", ".$row["faculty"]."</td>";
						echo "<td>".$row["tel_no"]."</td>";
						echo "<td>".$row["line_id"]."</td>";
						echo "<td>".$row["email"]."</td>";
						echo '<td><form  method="post" action="ClientAction" target="_blank"><input type="hidden" id="act" name="act" value="edit"><input type="hidden" id="StudentID" name="StudentID" value="'.$row["student_id"].'"><button type="submit" class="btn btn-primary btn-sm">Edit</button></form></td>';
						echo '<td><form  method="post" action="ClientAction" target="_blank"><input type="hidden" id="act" name="act" value="delete"><input type="hidden" id="StudentID" name="StudentID" value="'.$row["student_id"].'"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form></td>';
					}
				}	
				?>
				</tbody>
		</div>
       </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/jquery-3.3.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.3.1.js"></script>
  </body>
</html>

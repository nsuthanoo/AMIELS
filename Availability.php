<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'artsband';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

$q="SELECT * FROM item where borrow_status='IN STOCK';";

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
	if (x == "IID"||x == "OID"){
		document.getElementById("fields").innerHTML ='<div class="row"><div class="col"><label for="query" style="font-size: 30px">ID</label><input type="text" class="form-control" id="query" name="query" required placeholder="Enter ID" ></div><div class="col-md-auto"><button type="submit" class="btn btn-success btn-lg" style="margin-top: 30px">Submit</button></div></div>';
	}else {
		if(x == "CD"||x == "RM"){
			document.getElementById("fields").innerHTML ='<div class="row"><div class="col"><label for="query" style="font-size: 30px">Keyword</label><input type="text" class="form-control" id="query" name="query" required placeholder="Enter Keyword" ></div><div class="col-md-auto"><button type="submit" class="btn btn-success btn-lg" style="margin-top: 30px">Submit</button></div></div>';
		} else {
			if (x == "CS"){
				document.getElementById("fields").innerHTML ='<div class="row"><div class="col"><div class="row"><div class="col"><label for="color1" style="font-size: 30px">Color 1</label><input type="text"  class="form-control" id="color1" name="color1"></div><div class="col"><label for="color2" style="font-size: 30px">Color 2</label><input type="text"  class="form-control" id="color2" name="color2"></div><div class="col"><label for="size" style="font-size: 30px">Size</label><input type="text"  class="form-control" id="size" name="size" placeholder="Ex. 12 in, 5.5 in"></div></div></div><div class="col-md-auto"><button type="submit" class="btn btn-success btn-lg" style="margin-top: 30px">Submit</button></div></div>';
			} else {
				if (x == "TBM"){
					document.getElementById("fields").innerHTML ='<div class="row"><div class="col"><div class="row"><div class="col"><label for="type" style="font-size: 30px">Type</label><input type="text"  class="form-control" id="type" name="type"></div><div class="col"><label for="brand" style="font-size: 30px">Brand</label><input type="text"  class="form-control" id="brand" name="brand"></div><div class="col"><label for="model" style="font-size: 30px">Model</label><input type="text"  class="form-control" id="model" name="model"></div></div></div><div class="col-md-auto"><button type="submit" class="btn btn-success btn-lg" style="margin-top: 30px">Submit</button></div></div>';
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
             <li class="nav-item dropdown  active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Menu
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item active" href="Availability">Check Available Items</a>
                   <a class="dropdown-item" href="CheckRecord">Check Record</a>
                   <a class="dropdown-item" href="CheckStock">Check Stock</a>
					<?php
		  				if (!isset($_SESSION['loggedin'])) {
							echo '<div class="dropdown-divider"></div><a class="dropdown-item" href="login.php">Staff Login</a>';
						}
					?>
                </div>
             </li>
          </ul>
		  <?php
		  if (isset($_SESSION['loggedin'])) {
			  echo '<ul class="nav navbar-nav navbar-right">
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
		   <a href="logout" class="btn btn-outline-danger">Logout</a>';
		  }   
		   ?>
       </div>
    </nav>
	  <br><br><br>
	  <div class="container" style="color: white;">
<form>
			<form  method="GET" action="#">
				<div class="row">
					<div class="col text-center">
						<p class="display-4 ">Check Available Items</p>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col col-lg-2">
							<label for="SearchBy" style="font-size: 30px">Search By</label>
							<select class="form-control" id="SearchBy" name="SearchBy" required onchange="myFunction()" >
								<option disabled selected value></option>
  								<option value="IID">Item ID</option>
								<option value="TBM">Type, Brand, Model</option>
								<option value="CS">Colors, Size</option>
								<option value="CD">Condition</option>
								<option value="RM">Remarks</option>
								<option value="OID">Owner ID</option>
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
						<th scope="col">Item ID</th>
						<th scope="col">Type</th>
						<th scope="col">Brand</th>
						<th scope="col">Model</th>
						<th scope="col">Colors</th>
						<th scope="col">Size</th>
						<th scope="col">Condition</th>
						<th scope="col">Remarks</th>
						<th scope="col">Owner ID</th>
						<th scope="col">Borrow Status</th>
					</tr>
				</thead>
				<tbody class="text-center">
				<?php
				error_reporting(0);
				$s_by=$_GET['SearchBy'];
				if ($s_by=="IID" || $s_by== "OID"){
					$kw=$_GET['query'];
					if ($s_by=="IID"){
						$q="SELECT * FROM item where borrow_status='IN STOCK' AND item_id=$kw;";
					}
					if ($s_by=="OID"){
						$q="SELECT * FROM item where borrow_status='IN STOCK' AND owner_id=$kw;";
					}
				}
				if ($s_by== "RM" || $s_by == "CD"){
					$kw=$_GET['query'];
					if ($s_by=="RM"){
						$q="SELECT * FROM item where borrow_status='IN STOCK' AND remarks='$kw';";
					}
					if ($s_by=="CD"){
						$q="SELECT * FROM item where borrow_status='IN STOCK' AND conditions='$kw';";
					}
				}
				if ($s_by== "CS"){
					$c1=$_GET['color1'];
					$c2=$_GET['color2'];
					$size=$_GET['size'];
					if (!$c1==''){
						if (!$c2==''){
							if (!$size==''){
								$q="SELECT * FROM item where borrow_status='IN STOCK' AND color1='$c1' AND color2='$c2' AND size_indicator='$size';";
							}else{
								$q="SELECT * FROM item where borrow_status='IN STOCK' AND color1='$c1' AND color2='$c2';";
							}
						}else{
							if (!$size==''){
								$q="SELECT * FROM item where borrow_status='IN STOCK' AND color1='$c1' AND size_indicator='$size';";
							}else{
								$q="SELECT * FROM item where borrow_status='IN STOCK' AND color1='$c1';";
							}
						}
					} else{
						if (!$c2==''){
							if (!$size==''){
								$q="SELECT * FROM item where borrow_status='IN STOCK' AND color2='$c2' AND size_indicator='$size';";
							}else{
								$q="SELECT * FROM item where borrow_status='IN STOCK' AND color2='$c2';";
							}
						}else{
							$q="SELECT * FROM item where borrow_status='IN STOCK' AND size_indicator='$size';";
						}
					}
				}
				if ($s_by== "TBM"){
					$c1=$_GET['type'];
					$c2=$_GET['brand'];
					$size=$_GET['model'];
					if (!$c1==''){
						if (!$c2==''){
							if (!$size==''){
								$q="SELECT * FROM item where borrow_status='IN STOCK' AND type='$c1' AND brand='$c2' AND model='$size';";
							}else{
								$q="SELECT * FROM item where borrow_status='IN STOCK' AND type='$c1' AND brand='$c2';";
							}
						}else{
							if (!$size==''){
								$q="SELECT * FROM item where borrow_status='IN STOCK' AND type='$c1' AND model='$size';";
							}else{
								$q="SELECT * FROM item where borrow_status='IN STOCK' AND type='$c1';";
							}
						}
					} else{
						if (!$c2==''){
							if (!$size==''){
								$q="SELECT * FROM item where borrow_status='IN STOCK' AND brand='$c2' AND model='$size';";
							}else{
								$q="SELECT * FROM item where borrow_status='IN STOCK' AND brand='$c2';";
							}
						}else{
							$q="SELECT * FROM item where borrow_status='IN STOCK' AND model='$size';";
						}
					}
				}
				
				
				$result=mysqli_query($con, $q);

				if (!$result) {
					trigger_error('Invalid query: ' . $con->error);
				}

				if ($result->num_rows>0){
					while($row=$result->fetch_array()){
						echo "<tr>";
						echo "<th scope='row'>".$row["item_id"]."</th>";
						echo "<td>".$row["type"]."</td>";
						echo "<td>".$row["brand"]."</td>";
						echo "<td>".$row["model"]."</td>";
						if (strlen($row["color2"])>1){
							echo "<td>".$row["color1"].", ".$row["color2"]."</td>";
						} else{
							echo "<td>".$row["color1"]."</td>";
						}
						echo "<td>".$row["size_indicator"]."</td>";
						echo "<td>".$row["conditions"]."</td>";
						echo "<td>".$row["remarks"]."</td>";
						echo "<td>".$row["owner_id"]."</td>";
						if ($row["borrow_status"]=="IN STOCK"){
							echo "<td>Returned</td>";
						} else {
							echo "<td>Not Returned</td>";
						}
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

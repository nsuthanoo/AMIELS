<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// Change this to your connection info.
if (!isset($_SESSION['loggedin'])) {
	header('Location: login');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'artsband';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

$q="SELECT record.timestamp, record.id_increment,record.borrow_date,record.return_date,record.remarks,record.student_id,client.nickname as cn
,client.year as cy,client.faculty as cf, record.item_id,record.staff_id,staff.nickname as sn,staff.year as sy,item.borrow_status as bs FROM record JOIN staff on 
staff.staff_id=record.staff_id JOIN client on client.student_id=record.student_id JOIN item on item.item_id=record.item_id ORDER BY timestamp;";

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
	if (x == "RID" || x == "CID" || x == "SID"|| x == "CLI" || x == "SLI"|| x == "IID"){
		document.getElementById("fields").innerHTML ='<div class="row"><div class="col"><label for="query" style="font-size: 30px">ID</label><input type="text" class="form-control" id="query" name="query" required placeholder="Enter ID" ></div><div class="col-md-auto"><button type="submit" class="btn btn-success btn-lg" style="margin-top: 30px">Submit</button></div></div>';
	}else {
		if(x == "SNN" || x == "CNN" || x == "REM"){
			document.getElementById("fields").innerHTML ='<div class="row"><div class="col"><label for="query" style="font-size: 30px">Keyword</label><input type="text" class="form-control" id="query" name="query" required placeholder="Enter Keyword" ></div><div class="col-md-auto"><button type="submit" class="btn btn-success btn-lg" style="margin-top: 30px">Submit</button></div></div>';
		} else {
			if (x == "BorD" || x == "ReD"){
				document.getElementById("fields").innerHTML ='<div class="row"><div class="col"><label for="date" style="font-size: 30px">Date</label><input type="date"  class="form-control" id="date" name="date"></div><div class="col-md-auto"><button type="submit" class="btn btn-success btn-lg" style="margin-top: 30px">Submit</button></div></div>';
			} else {
				if (x == "CFN"|| x == "SFN"){
					document.getElementById("fields").innerHTML ='<div class="row"><div class="col"><div class="row"><div class="col"><label for="FName" style="font-size: 30px">First Name</label><input type="text"  class="form-control" id="FName" name="FName"></div><div class="col"><label for="SName" style="font-size: 30px">Surname</label><input type="text"  class="form-control" id="SName" name="SName"></div></div></div><div class="col-md-auto"><button type="submit" class="btn btn-success btn-lg" style="margin-top: 30px">Submit</button></div></div>';
				} else {
					if (x == "CYF"){
						document.getElementById("fields").innerHTML ='<div class="row"><div class="col"><div class="row"><div class="col"><label for="year" style="font-size: 30px">Year</label><input type="text"  class="form-control" id="year" name="year"></div><div class="col"><label for="fac" style="font-size: 30px">Faculty</label><select class="form-control" id="fac" name="fac" ><option disabled selected value> -- select an option -- </option><option value="allied health sciences">Faculty of Allied Health Sciences</option><option value="architecture">Faculty of Architecture</option><option value="arts">Faculty of Arts</option><option value="commerce and accountancy">Faculty of Commerce and Accountancy</option><option value="communication arts">Faculty of Communication Arts</option><option value="dentistry">Faculty of Dentistry</option><option value="economics">Faculty of Economics</option><option value="education">Faculty of Education</option><option value="engineering">Faculty of Engineering</option><option value="fine and applied arts">Faculty of Fine and Applied Arts</option><option value="law">Faculty of Law</option><option value="medicine">Faculty of Medicine</option><option value="nursing">Faculty of Nursing</option><option value="pharmaceutical sciences">Faculty of Pharmaceutical Sciences</option><option value="political sciences">Faculty of Political Science</option><option value="psychology">Faculty of Psychology</option><option value="science">Faculty of Science</option><option value="sports science">Faculty of Sports Science</option><option value="veterinary science">Faculty of Veterinary Science</option><option value="school of integrated innovation">School of Integrated Innovation</option><option value="sar">School of Agricultural Resources</option><option value="graduate school">Graduate School</option></select></div></div></div><div class="col-md-auto"><button type="submit" class="btn btn-success btn-lg" style="margin-top: 30px">Submit</button></div></div>';
					} else{
						if (x == "CPN"|| x == "SPN") {
							document.getElementById("fields").innerHTML ='<div class="row"><div class="col"><label for="tel" style="font-size: 30px">Phone Number</label><input type="tel" class="form-control"  id="tel" name="tel" placeholder="xxx-xxx-xxxx" required maxlength="12"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"></div><div class="col-md-auto"><button type="submit" class="btn btn-success btn-lg" style="margin-top: 30px">Submit</button></div></div>';
						} else{
							if(x == "status"){
								document.getElementById("fields").innerHTML ='<div class="row"><div class="col"><label for="Bstatus" style="font-size: 30px">Borrow Status</label><select class="form-control"  id="Bstatus" name="Bstatus" required><option disabled selected value> -- select an option -- </option><option value="SRR">Returned</option><option value="SRN">Not Returned</option></select></div><div class="col-md-auto"><button type="submit" class="btn btn-success btn-lg" style="margin-top: 30px">Submit</button></div></div>';
							} else{
								if(x == "SY"){
									document.getElementById("fields").innerHTML ='<div class="row"><div class="col"><label for="year" style="font-size: 30px">Year</label><input type="text"  class="form-control" id="year" name="year" placeholder="1-8" required></div><div class="col-md-auto"><button type="submit" class="btn btn-success btn-lg" style="margin-top: 30px">Submit</button></div></div>';
								}
							}
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
                   <a class="dropdown-item active" href="ManageRecords">Records</a>
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
		   <a href="logout" class="btn btn-outline-danger">Logout</a>
       </div>
    </nav>
	  <br><br><br>
	  <div class="container" style="color: white;">
<form>
			<form  method="GET" action="#">
				<div class="row">
					<div class="col text-center">
						<p class="display-4 ">Manage Records</p>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col col-lg-2">
							<label for="SearchBy" style="font-size: 30px">Search By</label>
							<select class="form-control" id="SearchBy" name="SearchBy" required onchange="myFunction()" >
								<option disabled selected value></option>
  								<option value="RID">Record ID</option>
								<option value="CID">Client ID (Student ID)</option>
								<option value="CFN">Client's Full Name</option>
								<option value="CNN">Client's Nickname</option>
								<option value="CYF">Client's Year and Faculty</option>
								<option value="CPN">Client's Phone Number</option>
								<option value="CLI">Client's Line ID</option>
								<option value="SID">Staff ID</option>
								<option value="SFN">Staff's Full Name</option>
								<option value="SNN">Staff's Nickname</option>
								<option value="SY">Staff's Year</option>
								<option value="SPN">Staff's Phone Number</option>
								<option value="SLI">Staff's Line ID</option>
								<option value="IID">Item ID</option>
								<option value="status">Status</option>
								<option value="REM">Remarks</option>
								<option value="BorD">Borrow Date</option>
								<option value="ReD">Return Date</option>
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
						<th scope="col">Record ID</th>
						<th scope="col">Borrow Date</th>
						<th scope="col">Return Date</th>
						<th scope="col">Remarks</th>
						<th scope="col">Client ID</th>
						<th scope="col">Client Name, Year, Faculty</th>
						<th scope="col">Item ID</th>
						<th scope="col">Staff ID</th>
						<th scope="col">Staff Nickname, Year</th>
						<th scope="col">Status</th>
						<th scope="col"></th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody class="text-center">
				<?php
				error_reporting(0);
				$s_by=$_GET['SearchBy'];
				if ($s_by=="RID" || $s_by== "CID" || $s_by== "SID"||$s_by == "CLI" || $s_by== "SLI"|| $s_by== "IID"){
					$kw=$_GET['query'];
					if ($s_by=="RID"){
						$syl = 12;
						list($k1, $k2) = preg_split('/(?<=.{'.$syl.'})/', $kw, 2);
						$q="SELECT record.timestamp, record.id_increment,record.borrow_date,record.return_date,record.remarks,record.student_id,client.nickname as cn
						,client.year as cy,client.faculty as cf, record.item_id,record.staff_id,staff.nickname as sn,staff.year as sy,item.borrow_status as bs FROM record JOIN staff on 
						staff.staff_id=record.staff_id JOIN client on client.student_id=record.student_id JOIN item on item.item_id=record.item_id WHERE record.timestamp= '$k1' AND record.id_increment ='$k2' ;";
					}
					if ($s_by=="CID"){
						$q="SELECT record.timestamp, record.id_increment,record.borrow_date,record.return_date,record.remarks,record.student_id,client.nickname as cn
						,client.year as cy,client.faculty as cf, record.item_id,record.staff_id,staff.nickname as sn,staff.year as sy,item.borrow_status as bs FROM record JOIN staff on 
						staff.staff_id=record.staff_id JOIN client on client.student_id=record.student_id JOIN item on item.item_id=record.item_id WHERE record.student_id= '$kw';";
					}
					if ($s_by=="SID"){
						$q="SELECT record.timestamp, record.id_increment,record.borrow_date,record.return_date,record.remarks,record.student_id,client.nickname as cn
						,client.year as cy,client.faculty as cf, record.item_id,record.staff_id,staff.nickname as sn,staff.year as sy,item.borrow_status as bs FROM record JOIN staff on 
						staff.staff_id=record.staff_id JOIN client on client.student_id=record.student_id JOIN item on item.item_id=record.item_id WHERE record.staff_id= '$kw';";
					}
					if ($s_by=="CLI"){
						$q="SELECT record.timestamp, record.id_increment,record.borrow_date,record.return_date,record.remarks,record.student_id,client.line_id,client.nickname as cn
						,client.year as cy,client.faculty as cf, record.item_id,record.staff_id,staff.nickname as sn,staff.year as sy,item.borrow_status as bs FROM record JOIN staff on 
						staff.staff_id=record.staff_id JOIN client on client.student_id=record.student_id JOIN item on item.item_id=record.item_id WHERE client.line_id= '$kw';";
					}
					if ($s_by=="SLI"){
						$q="SELECT record.timestamp, record.id_increment,record.borrow_date,record.return_date,record.remarks,record.student_id,staff.line_id,client.nickname as cn
						,client.year as cy,client.faculty as cf, record.item_id,record.staff_id,staff.nickname as sn,staff.year as sy,item.borrow_status as bs FROM record JOIN staff on 
						staff.staff_id=record.staff_id JOIN client on client.student_id=record.student_id JOIN item on item.item_id=record.item_id WHERE staff.line_id= '$kw';";
					}
					if ($s_by=="IID"){
						$q="SELECT record.timestamp, record.id_increment,record.borrow_date,record.return_date,record.remarks,record.student_id,client.nickname as cn
						,client.year as cy,client.faculty as cf, record.item_id,record.staff_id,staff.nickname as sn,staff.year as sy,item.borrow_status as bs FROM record JOIN staff on 
						staff.staff_id=record.staff_id JOIN client on client.student_id=record.student_id JOIN item on item.item_id=record.item_id WHERE record.item_id= '$kw';";
					}
				}
				if ($s_by== "SNN" || $s_by == "CNN" || $s_by == "REM"){
					$kw=$_GET['query'];
					if ($s_by=="SNN"){
						$q="SELECT record.timestamp, record.id_increment,record.borrow_date,record.return_date,record.remarks,record.student_id,client.nickname as cn
						,client.year as cy,staff.nickname,client.faculty as cf, record.item_id,record.staff_id,staff.nickname as sn,staff.year as sy,item.borrow_status as bs FROM record JOIN staff on 
						staff.staff_id=record.staff_id JOIN client on client.student_id=record.student_id JOIN item on item.item_id=record.item_id WHERE staff.nickname= '$kw';";
					}
					if ($s_by=="CNN"){
						$q="SELECT record.timestamp, record.id_increment,record.borrow_date,record.return_date,record.remarks,record.student_id,client.nickname as cn
						,client.year as cy,client.nickname,client.faculty as cf, record.item_id,record.staff_id,staff.nickname as sn,staff.year as sy,item.borrow_status as bs FROM record JOIN staff on 
						staff.staff_id=record.staff_id JOIN client on client.student_id=record.student_id JOIN item on item.item_id=record.item_id WHERE client.nickname= '$kw';";
					}
					if ($s_by=="REM"){
						$q="SELECT record.timestamp, record.id_increment,record.borrow_date,record.return_date,record.remarks,record.student_id,client.nickname as cn
						,client.year as cy,client.faculty as cf, record.item_id,record.staff_id,staff.nickname as sn,staff.year as sy,item.borrow_status as bs FROM record JOIN staff on 
						staff.staff_id=record.staff_id JOIN client on client.student_id=record.student_id JOIN item on item.item_id=record.item_id WHERE record.remarks= '$kw';";
					}
				}
				if ($s_by== "BorD" || $s_by== "ReD"){
					$kw=$_GET['date'];
					if ($s_by=="BorD"){
						$q="SELECT record.timestamp, record.id_increment,record.borrow_date,record.return_date,record.remarks,record.student_id,client.nickname as cn
						,client.year as cy,client.faculty as cf, record.item_id,record.staff_id,staff.nickname as sn,staff.year as sy,item.borrow_status as bs FROM record JOIN staff on 
						staff.staff_id=record.staff_id JOIN client on client.student_id=record.student_id JOIN item on item.item_id=record.item_id WHERE record.borrow_date= '$kw';";
					}
					if ($s_by=="ReD"){
						$q="SELECT record.timestamp, record.id_increment,record.borrow_date,record.return_date,record.remarks,record.student_id,client.nickname as cn
						,client.year as cy,client.faculty as cf, record.item_id,record.staff_id,staff.nickname as sn,staff.year as sy,item.borrow_status as bs FROM record JOIN staff on 
						staff.staff_id=record.staff_id JOIN client on client.student_id=record.student_id JOIN item on item.item_id=record.item_id WHERE record.return_date= '$kw';";
					}
				}
				if ($s_by== "CFN"|| $s_by == "SFN"){
					$fn=$_GET['FName'];
					$sn=$_GET['SName'];
					if ($s_by=="CFN"){
						if (!$fn==''){
							if (!$sn==''){
								$fsn= "client.first_name='".$fn."' AND client.surname='".$sn."'";
							}else{
								$fsn= "client.first_name='".$fn."'";
							}
						}else{
							$fsn= "client.surname='".$sn."'";
						}
						$q="SELECT record.timestamp, record.id_increment,record.borrow_date,record.return_date,record.remarks,record.student_id,client.nickname as cn
						,client.year as cy,client.first_name,client.surname,client.faculty as cf, record.item_id,record.staff_id,staff.nickname as sn,staff.year as sy,item.borrow_status as bs FROM record JOIN staff on 
						staff.staff_id=record.staff_id JOIN client on client.student_id=record.student_id JOIN item on item.item_id=record.item_id WHERE $fsn;";
					}
					if ($s_by=="SFN"){
						if (!$fn==''){
							if (!$sn==''){
								$fsn= "staff.first_name='".$fn."' AND staff.surname='".$sn."'";
							}else{
								$fsn= "staff.first_name='".$fn."'";
							}
						}else{
							$fsn= "staff.surname='".$sn."'";
						}
						$q="SELECT record.timestamp, record.id_increment,record.borrow_date,record.return_date,record.remarks,record.student_id,client.nickname as cn
						,client.year as cy,staff.first_name,staff.surname,client.faculty as cf, record.item_id,record.staff_id,staff.nickname as sn,staff.year as sy,item.borrow_status as bs FROM record JOIN staff on 
						staff.staff_id=record.staff_id JOIN client on client.student_id=record.student_id JOIN item on item.item_id=record.item_id WHERE $fsn;";
					}
				}
				if ($s_by== "CYF"){
					$yy=$_GET['year'];
					$ff=$_GET['fac'];
					if (!$yy==''){
						if (!$ff==''){
							$yf= 'client.year='.$yy.' AND client.faculty="'.$ff.'"';
						}else{
							$yf= 'client.year='.$yy;
						}
					}else{
						$yf= 'client.faculty="'.$ff.'"';
					}
					$q="SELECT record.timestamp, record.id_increment,record.borrow_date,record.return_date,record.remarks,record.student_id,client.nickname as cn
					,client.year as cy,client.faculty as cf, record.item_id,record.staff_id,staff.nickname as sn,staff.year as sy,item.borrow_status as bs FROM record JOIN staff on 
					staff.staff_id=record.staff_id JOIN client on client.student_id=record.student_id JOIN item on item.item_id=record.item_id WHERE $yf;";
				}
				if ($s_by== "CPN"|| $s_by == "SPN"){
					$kw=$_GET['tel'];
					if ($s_by=="CPN"){
						$q="SELECT record.timestamp, record.id_increment,record.borrow_date,record.return_date,record.remarks,record.student_id,client.nickname as cn
						,client.year as cy,client.faculty as cf, record.item_id,record.staff_id,staff.nickname as sn,staff.year as sy,item.borrow_status as bs FROM record JOIN staff on 
						staff.staff_id=record.staff_id JOIN client on client.student_id=record.student_id JOIN item on item.item_id=record.item_id WHERE client.tel_no= '$kw';";
					}
					if ($s_by=="SPN"){
						$q="SELECT record.timestamp, record.id_increment,record.borrow_date,record.return_date,record.remarks,record.student_id,client.nickname as cn
						,client.year as cy,client.faculty as cf, record.item_id,record.staff_id,staff.nickname as sn,staff.year as sy,item.borrow_status as bs FROM record JOIN staff on 
						staff.staff_id=record.staff_id JOIN client on client.student_id=record.student_id JOIN item on item.item_id=record.item_id WHERE staff.tel_no= '$kw';";
					}
				}
				if ($s_by== "status"){
					$kw=$_GET['Bstatus'];
					if ($kw=="SRR"){
						$q="(SELECT record.item_id, record.timestamp, record.id_increment,record.borrow_date,record.return_date,record.remarks,record.student_id,client.nickname as cn ,client.year as cy,client.faculty as cf,record.staff_id,staff.nickname as sn,staff.year as sy,item.borrow_status as bs FROM record LEFT JOIN (SELECT record.item_id, MAX(record.timestamp) AS 'latest' FROM record GROUP BY record.item_id) AS x ON record.item_id= x.item_id AND record.timestamp=x.latest JOIN item ON item.item_id=record.item_id JOIN staff on staff.staff_id=record.staff_id JOIN client on client.student_id=record.student_id WHERE x.latest IS null) UNION  DISTINCT
						(SELECT record.item_id, record.timestamp, record.id_increment,record.borrow_date,record.return_date,record.remarks,record.student_id,client.nickname as cn ,client.year as cy,client.faculty as cf,record.staff_id,staff.nickname as sn,staff.year as sy,item.borrow_status as bs FROM record JOIN staff on 
						staff.staff_id=record.staff_id JOIN client on client.student_id=record.student_id JOIN item on item.item_id=record.item_id WHERE item.borrow_status='IN STOCK' ORDER BY record.item_id)";
					}
					if ($kw=="SRN"){
						$q="SELECT DISTINCT record.item_id, record.timestamp, record.id_increment,record.borrow_date,record.return_date,record.remarks,record.student_id,client.nickname as cn ,client.year as cy,client.faculty as cf,record.staff_id,staff.nickname as sn,staff.year as sy,item.borrow_status as bs  FROM record JOIN (SELECT record.item_id,  MAX(record.timestamp) AS 'latest'  FROM record  GROUP BY record.item_id) AS x ON x.item_id = record.item_id  AND x.latest =record.timestamp JOIN item ON item.item_id=record.item_id JOIN staff on staff.staff_id=record.staff_id JOIN client on client.student_id=record.student_id WHERE item.borrow_status='BORROWED' ORDER BY record.item_id;
                        ";
					}
				}
				if ($s_by== "SY"){
					$kw=$_GET['year'];
					$q="SELECT record.timestamp, record.id_increment,record.borrow_date,record.return_date,record.remarks,record.student_id,client.nickname as cn
					,client.year as cy,client.faculty as cf, record.item_id,record.staff_id,staff.nickname as sn,staff.year as sy,item.borrow_status as bs FROM record JOIN staff on 
					staff.staff_id=record.staff_id JOIN client on client.student_id=record.student_id JOIN item on item.item_id=record.item_id WHERE staff.year=$kw;";
				}
				
				$result=mysqli_query($con, $q);

				if (!$result) {
					trigger_error('Invalid query: ' . $con->error);
				}

				if ($result->num_rows>0){
					while($row=$result->fetch_array()){
						echo "<tr>";
						echo "<th scope='row'>".$row["timestamp"].$row["id_increment"]."</th>";
						echo "<td>".$row["borrow_date"]."</td>";
						echo "<td>".$row["return_date"]."</td>";
						echo "<td>".$row["remarks"]."</td>";
						echo "<td>".$row["student_id"]."</td>";
						echo "<td>".$row["cn"].", ".$row["cy"].", ".$row["cf"]."</td>";
						echo "<td>".$row["item_id"]."</td>";
						echo "<td>".$row["staff_id"]."</td>";
						echo "<td>".$row["sn"].", ".$row["sy"]."</td>";
						if ($row["bs"]=="IN STOCK"){
							echo "<td>Returned</td>";
						} elseif ($row["bs"]=="BORROWED") {
							$i=$row["item_id"];
							$cq="SELECT record.timestamp, record.item_id FROM record JOIN item ON item.item_id=record.item_id WHERE record.item_id=$i ORDER BY record.timestamp DESC LIMIT 1;";
							$ci=mysqli_query($con,$cq);
							$res=mysqli_fetch_assoc($ci);
							$ts=$row["timestamp"];
							if ($res['timestamp']==$row["timestamp"]){
								$rtts=strtotime($row["return_date"]);
								$ctts=strtotime("now");
								if ($ctts>$rtts){
									echo "<td>Over Due</td>";
								}else{
									echo "<td>Not Returned</td>";
								}
							} else {
								echo "<td>Returned</td>";
							}
						} else{
							echo "<td>".$row["bs"]."</td>";
						}
						echo '<td><form  method="post" action="RecordAction" target="_blank"><input type="hidden" id="act" name="act" value="edit"><input type="hidden" id="Timestamp" name="Timestamp" value="'.$row["timestamp"].'"><input type="hidden" id="IDIncre" name="IDIncre" value="'.$row["id_increment"].'"><button type="submit" class="btn btn-primary btn-sm">Edit</button></form></td>';
						echo '<td><form  method="post" action="RecordAction" target="_blank"><input type="hidden" id="act" name="act" value="delete"><input type="hidden" id="Timestamp" name="Timestamp" value="'.$row["timestamp"].'"><input type="hidden" id="IDIncre" name="IDIncre" value="'.$row["id_increment"].'"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form></td>';
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

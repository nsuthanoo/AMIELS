<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login');
	exit;
}
if (!isset($_POST['act'])) {
	header('Location: index.php');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'artsband';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
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
  <body style="background-image: url(images/ins.jpg); background-size: cover;">
	  <div class="container align-content-center" style="color: black; background-color: whitesmoke; padding-left: 7%; padding-right: 7%;margin-top: 5%; margin-bottom: 5%">
		  <br><br>
	  	<?php 
		  $sid=$_POST['StudentID'];
		  if ($_POST['act']=='edit'){
			  $q= 'SELECT * FROM client WHERE student_id='.$sid.';';
			  echo '<p class="display-4">Edit Client ID: '.$sid.'</p>';
			  $result=mysqli_query($con, $q);
			  if (!$result) {
				  trigger_error('Invalid query: ' . $con->error);
			  }
			  $res=mysqli_fetch_assoc($result);
			  $first_name = $res['first_name'];
			  $surname = $res['surname'];
			  $nickname = $res['nickname'];
			  $year = $res['year'];
			  $faculty = $res['faculty'];
			  $tel_no = $res['tel_no'];
			  $line_id = $res['line_id'];
			  $email = $res['email'];
			  echo '<form  method="post"  action="#">
				<div class="row">
						<div class="col">
							<label for="StudentID" style="font-size: 30px">Student ID</label>
							<input type="text" class="form-control" id="StudentID" name="StudentID" value="'.$sid.'" minlength="10" maxlength="10" pattern="[0-9]{10}" disabled>
						</div>
						<div class="col">
							<label for="Nickname" style="font-size: 30px">Nickname</label>
							<input type="text" class="form-control" id="Nickname" name="Nickname" required maxlength="100" value="'.$nickname.'">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label for="Firstname" style="font-size: 30px">First Name</label>
							<input type="text" class="form-control" id="Firstname" name="Firstname" required maxlength="100" value="'.$first_name.'">

						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="Surname" style="font-size: 30px">Surname</label>
							<input type="text" class="form-control" id="Surname" name="Surname" required maxlength="100" value="'.$surname.'">

						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label for="Year" style="font-size: 30px">Year</label>
							<select class="form-control" id="Year" name="Year" value="'.$year.'">
								<option selected value="'.$year.'">'.$year.' (No Change)</option>
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
							<select class="form-control" id="Faculty" name="Faculty" value="'.$faculty.'">
								<option selected value="'.$faculty.'">Faculty of '.$faculty.' (No Change)</option>
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
							<input type="tel" class="form-control" id="tel" name="tel" placeholder="xxx-xxx-xxxx" required maxlength="12"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="'.$tel_no.'">
						</div>
						<div class="col">
							<label for="LineID" style="font-size: 30px">Line ID</label>
							<input type="text" class="form-control" id="LineID" name="LineID" maxlength="100"value="'.$line_id.'">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label for="email" style="font-size: 30px">E-mail</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="mail@example.com" value="'.$email.'">
						</div>
					</div>
					<br>
					<input type="hidden" id="StudentID" name="StudentID" value="'.$sid.'">
					<input type="hidden" id="act" name="act" value="do_edit">
					<div class="row">
						<div class="col">
							<button type="submit" class="btn btn-success btn-lg">Submit</button><br><br>
						</div>
					</div>
				</div>
			</form>';
			  
		  }
		  if ($_POST['act']=='delete'){
			  echo '<div class="container-fluid text-center"><p class="display-3">Delete Client ID: '.$sid.'</p>';
			  echo '<p class="display-4">Are you sure you want to delete this item?</p>';
			  echo '<form  method="post" action="#"><input type="hidden" id="act" name="act" value="do_remove">
			  <input type="hidden" id="StudentID" name="StudentID" value="'.$sid.'"><input type="hidden" id="act" name="act" value="do_remove"><button type="submit" class="btn btn-danger btn-lg">Delete</button>&nbsp;&nbsp;<a href="#" class="btn btn-outline-danger btn-lg" onclick="window.close();return false;">Cancel</a></form></div>';
		  }
		   if ($_POST['act']=='do_edit'){
			   $first_name = $_POST['Firstname'];
			   $surname = $_POST['Surname'];
			   $nickname = $_POST['Nickname'];
			   $year = $_POST['Year'];
			   $faculty = $_POST['Faculty'];
			   $tel_no = $_POST['tel'];
			   $line_id = $_POST['LineID'];
			   $email = $_POST['email'];
			   $q="UPDATE client SET first_name='$first_name', surname='$surname', nickname='$nickname', year='$year', faculty='$faculty', tel_no='$tel_no', line_id='$line_id', email='$email' WHERE student_id='$sid'";
			   $result=mysqli_query($con, $q);
			   if (!$result) {
					trigger_error('Invalid query: ' . $con->error);
			   } else{
				   echo '<div class="container-fluid text-center"><p class="display-3">Client ID: '.$sid.' Updated Successfully</p><a href="#" class="btn btn-outline-danger btn-lg" onclick="window.close();return false;">Close</a>';
			   }
				  
		   }
		   if ($_POST['act']=='do_remove'){
			   $q="DELETE FROM client WHERE student_id='$sid';";
			   $result=mysqli_query($con, $q);
			   if (!$result) {
				   echo '<div class="container-fluid text-center"><p class="display-3">An error occured. ClientID might be in some records. Please remove those records before removing the client.</p><a href="#" class="btn btn-outline-danger btn-lg" onclick="window.close();return false;">Close</a>';
			   }else{
					echo '<div class="container-fluid text-center"><p class="display-3">Client ID: '.$sid.' Removed Successfully</p><a href="#" class="btn btn-outline-danger btn-lg" onclick="window.close();return false;">Close</a>';

			   }
		   }
		?>
		<br><br>
	  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/jquery-3.3.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.3.1.js"></script>
  </body>
</html>
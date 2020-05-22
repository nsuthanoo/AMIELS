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
		  $iid=$_POST['ItemID'];
		  if ($_POST['act']=='edit'){
			  $q= 'SELECT * FROM item WHERE item_id='.$iid.';';
			  echo '<p class="display-4">Edit Item ID: '.$iid.'</p>';
			  $result=mysqli_query($con, $q);
			  if (!$result) {
				  trigger_error('Invalid query: ' . $con->error);
			  }
			  $res=mysqli_fetch_assoc($result);
			  $type=$res["type"];
			  $brand=$res["brand"];
			  $model=$res['model'];
			  $c1=$res['color1'];
			  $c2=$res['color2'];
			  $size=$res['size_indicator'];
			  $condi=$res['conditions'];
			  $bs=$res['borrow_status'];
			  $rm=$res['remarks'];
			  $oid=$res['owner_id'];
			  echo '<form  method="post"  action="#">
				<div class="form-group">
					<div class="row">
						<div class="col">
							<label for="BStatus" style="font-size: 30px">Borrow Status</label>
							<input type="text" class="form-control" id="BStatus" name="BStatus" maxlength="255" value="'.$bs.'">
							<small id="dfbs" class="form-text text-muted">Default: "BORROWED"/"IN STOCK"</small>
						</div>
						<div class="col">
							<label for="Type" style="font-size: 30px">Type</label>
							<input type="text" class="form-control" id="Type" name="Type" maxlength="255" value="'.$type.'">

						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label for="Brand" style="font-size: 30px">Brand</label>
							<input type="text" class="form-control" id="Brand" name="Brand" maxlength="255" value="'.$brand.'">
						</div>
						<div class="col">
							<label for="Model" style="font-size: 30px">Model</label>
							<input type="text" class="form-control" id="Model" name="Model" maxlength="255" value="'.$model.'">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label for="Color1" style="font-size: 30px">Color 1</label>
							<input type="text" class="form-control" id="Color1" name="Color1" maxlength="255" value="'.$c1.'">
						</div>
						<div class="col">
							<label for="Color2" style="font-size: 30px">Color 2</label>
							<input type="text" class="form-control" id="Color2" name="Color2" maxlength="255" value="'.$c2.'">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label for="Conditions" style="font-size: 30px">Conditions</label>
							<input type="text" class="form-control" id="Conditions" name="Conditions" maxlength="255" value="'.$condi.'">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label for="size" style="font-size: 30px">Size Indicator</label>
							<input type="text" class="form-control" id="size" name="size" maxlength="255" value="'.$size.'">
						</div>
						<div class="col">
							<label for="OwnerID" style="font-size: 30px">Owner ID</label>
							<input type="text" class="form-control" id="OwnerID" name="OwnerID" required maxlength="10" pattern="[0-9]{10}" value="'.$oid.'">
							<small id="FindOwnerID" class="form-text text-muted">Find owner ID <a href="ManageOwners" style="color: black" target="_blank">here</a></small>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="remarks" style="font-size: 30px">Remarks</label>
							<input type="text" class="form-control" id="remarks" name="remarks" maxlength="100" value="'.$rm.'">
						</div>
					</div>
					<br>
					<input type="hidden" id="ItemID" name="ItemID" value="'.$iid.'">
					<input type="hidden" id="act" name="act" value="do_edit">
					<div class="row">
						<div class="col">
							<button type="submit" class="btn btn-success btn-lg">Submit</button>
						</div>
					</div>
				</div>
			</form>';
			  
		  }
		  if ($_POST['act']=='delete'){
			  echo '<div class="container-fluid text-center"><p class="display-3">Delete Item ID: '.$iid.'</p>';
			  echo '<p class="display-4">Are you sure you want to delete this item?</p>';
			  echo '<form  method="post" action="#"><input type="hidden" id="act" name="act" value="do_remove">
			  <input type="hidden" id="ItemID" name="ItemID" value="'.$iid.'"><input type="hidden" id="act" name="act" value="do_remove"><button type="submit" class="btn btn-danger btn-lg">Delete</button>&nbsp;&nbsp;<a href="#" class="btn btn-outline-danger btn-lg" onclick="window.close();return false;">Cancel</a></form></div>';
		  }
		   if ($_POST['act']=='do_edit'){
			   $type=$_POST["Type"];
			   $brand=$_POST["Brand"];
			   $model=$_POST['Model'];
			   $c1=$_POST['Color1'];
			   $c2=$_POST['Color2'];
			   $size=$_POST['size'];
			   $condi=$_POST['Conditions'];
			   $bs=$_POST['BStatus'];
			   $rm=$_POST['remarks'];
			   $oid=$_POST['OwnerID'];
			   $q="UPDATE item SET type='$type', brand='$brand', remarks='$rm', model='$model',color1='$c1' ,color2='$c2' ,size_indicator='$size',conditions='$condi', borrow_status='$bs',owner_id='$oid' WHERE item_id='$iid';";
			   $result=mysqli_query($con, $q);
			   if (!$result) {
					trigger_error('Invalid query: ' . $con->error);
			   } else{
				   echo '<div class="container-fluid text-center"><p class="display-3">Item ID: '.$iid.' Updated Successfully</p><a href="#" class="btn btn-outline-danger btn-lg" onclick="window.close();return false;">Close</a>';
			   }
				  
		   }
		   if ($_POST['act']=='do_remove'){
			   $q="DELETE FROM item WHERE item_id='$iid';";
			   $result=mysqli_query($con, $q);
			   if (!$result) {
				   echo '<div class="container-fluid text-center"><p class="display-3">An error occured. Item might be in some records. Please remove those records before removing the item.</p><a href="#" class="btn btn-outline-danger btn-lg" onclick="window.close();return false;">Close</a>';
			   }else{
					echo '<div class="container-fluid text-center"><p class="display-3">Item ID: '.$iid.' Removed Successfully</p><a href="#" class="btn btn-outline-danger btn-lg" onclick="window.close();return false;">Close</a>';

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
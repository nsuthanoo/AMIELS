<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'artsband';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME); 
   
$to_email = 'doremonkunh@gmail.com';
$subject = 'Record#000000000 Information';
$message = 'Your Record Information:
Record ID: 000000000
Item ID: 00000
Borrow Date: 000000
Return Date: 000000
You can find more information about your record at our website.
http://www.amiels.lnw.mn/CheckRecord';
$headers = 'From: amielslnwm.noreply@amiels.lnw.mn';
mail($to_email,$subject,$message,$headers);

?>
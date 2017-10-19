<?php 


$DB = mysqli_connect("localhost","root","");
if (!$DB) {
	echo "Connection error";
}
$db_select= mysqli_select_db($DB,'webAs');



   




 ?>
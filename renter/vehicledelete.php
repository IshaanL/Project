<?php
include("config.php");
$rid = $_GET['id'];
$sql = "DELETE FROM vehicles WHERE vid = {$rid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Vehicle Deleted</p>";
	header("Location:viewvehicle.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Vehicle Not Deleted</p>";
	header("Location:viewvehicle.php?msg=$msg");
}
mysqli_close($con);
?>
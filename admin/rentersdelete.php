<?php
include("config.php");

$rid = $_GET['id'];
$sql = "DELETE FROM renter WHERE id = {$rid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Renter Deleted</p>";
	header("Location:rentersview.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Renter Not Deleted</p>";
	header("Location:rentersview.php?msg=$msg");
}
mysqli_close($con);
?>
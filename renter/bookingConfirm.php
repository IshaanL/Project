<?php
session_start();
require("config.php");
////code
 
if(!isset($_SESSION['renter_id']))
{
	header("location:index.php");
}

//// code insert
//// add code
$error="";
$msg="";
if(isset($_POST['add']))
{
	$id = $_GET['id'];
	$status=$_POST['status'];
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	$sql = "UPDATE booking SET status = '{$status}' WHERE bid = {$id}";
	
	$result=mysqli_query($con,$sql);
	if($result == true)
	{
		$msg="<p class='alert alert-success'>Booking Status Updated</p>";
		header("Location:bookingView.php?msg=$msg");
	}
	else{
		$msg="<p class='alert alert-warning'>Booking Status Not Updated</p>";
		header("Location:BookingView.php?msg=$msg");
	}
	$sql="UPDATE vehicles SET status = '1' WHERE vid IN (SELECT vid FROM booking WHERE status = 'accepted')";
	$result=mysqli_query($con,$sql);
	if($result == true)
	{
		$msg="<p class='alert alert-success'>Booking Status Updated</p>";
		header("Location:bookingView.php?msg=$msg");
	}
	else{
		$msg="<p class='alert alert-warning'>Booking Status Not Updated</p>";
		header("Location:BookingView.php?msg=$msg");
	}
	$sql="UPDATE vehicles SET status = '0' WHERE vid IN (SELECT vid FROM booking WHERE status = 'completed')";
	$result=mysqli_query($con,$sql);
	if($result == true)
	{
		$msg="<p class='alert alert-success'>Booking Status Updated</p>";
		header("Location:bookingView.php?msg=$msg");
	}
	else{
		$msg="<p class='alert alert-warning'>Booking Status Not Updated</p>";
		header("Location:BookingView.php?msg=$msg");
	}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Renters</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>

		
			<!-- Header -->
			<?php include("header.php"); ?>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Bookings</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Booking</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Update Booking Status</h4>
									<?php echo $error; ?>
									<?php echo $msg; ?>
								</div>
								<form method="post" enctype="multipart/form-data">
								
								<?php
                                                $id =$_GET['id'];
												$query=mysqli_query($con,"select * from booking where bid=$id");
												
												$cnt=1;
												while($row=mysqli_fetch_array($query))
									{
								?>
												
								<div class="card-body">
									<h5 class="card-title">Booking Detail</h5>
										<div class="row">
											<div class="col-xl-12">
                                            <div class="form-group row">
													<label class="col-lg-2 col-form-label">Vehicle Name</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="name" required value="<?php echo $row['2']; ?>" disabled>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Price</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="price" required placeholder="Enter Price" value="<?php echo $row['3']; ?>" disabled>
													</div>
												</div>
                                                <div class="form-group row">
													<label class="col-lg-2 col-form-label">model</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="model" required placeholder="Enter Model" value="<?php echo $row['4']; ?>" disabled>
													</div>
												</div>
                                                <div class="form-group row">
													<label class="col-lg-2 col-form-label">color</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="color" required placeholder="Enter Color" value="<?php echo $row['5']; ?>" disabled>
													</div>
												</div>
                                                <div class="form-group row">
													<label class="col-lg-2 col-form-label">fuel_type</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="fuel_type" required placeholder="Enter Fuel Type" value="<?php echo $row['6']; ?>" disabled>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Status</label>
													<div class="col-lg-9">
														
														<select name="status" id="">
															<option value="" selected disabled><?php echo $row['10']; ?></option>
															<option value="Pending">Pending</option>
															<option value="Accepted">Accepted</option>
                                                            <option value="Completed">Completed</option>


														</select>
														
													</div>
												</div>
												
											</div>
											  
											
										</div>

										
											</div>
										</div>

										<hr>

										

										
											<input type="submit" value="Submit" class="btn btn-primary"name="add" style="margin-left:200px;">
										
									</div>
								</form>
								
								<?php
									} 
								?>
												
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Main Wrapper -->

		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		<script src="assets/plugins/tinymce/tinymce.min.js"></script>
		<script src="assets/plugins/tinymce/init-tinymce.min.js"></script>
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		
    </body>

</html>
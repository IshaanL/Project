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
	$name=$_POST['name'];
	$price=$_POST['price'];
    $color=$_POST['color'];
    $model=$_POST['model'];
    $fuel_type=$_POST['fuel_type'];
    $id=$_GET['id'];

    $aimage=$_FILES['aimage']['name'];
	
	
	
	
	
	$temp_name  =$_FILES['aimage']['tmp_name'];
	
	
	
	
	
	move_uploaded_file($temp_name,"renters/$aimage");
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	$sql = "UPDATE vehicles SET name = '{$name}' , price = '{$price}' , color = '{$color}', model = '{$model}', fuel_type = '{$fuel_type}' , img = '{$aimage}' WHERE vid = {$id}";
	
	$result=mysqli_query($con,$sql);
	if($result == true)
	{
		$msg="<p class='alert alert-success'>Renters Updated</p>";
		header("Location:viewvehicle.php?msg=$msg");
	}
	else{
		$msg="<p class='alert alert-warning'>Renters Not Updated</p>";
		header("Location:viewvehicle.php?msg=$msg");
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
								<h3 class="page-title">Property</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Vehicles</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Update Vehicles Details</h4>
									<?php echo $error; ?>
									<?php echo $msg; ?>
								</div>
								<form method="post" enctype="multipart/form-data">
								
								<?php
									
									$rid=$_REQUEST['id'];
									$query=mysqli_query($con,"select * from vehicles where vid='$rid'");
									while($row=mysqli_fetch_row($query))
									{
								?>
												
								<div class="card-body">
									<h5 class="card-title"Vehicles Detail</h5>
										<div class="row">
											<div class="col-xl-12">
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Vehicle Name</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="name" required value="<?php echo $row['2']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Price</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="price" required placeholder="Enter Price" value="<?php echo $row['3']; ?>">
													</div>
												</div>
                                                <div class="form-group row">
													<label class="col-lg-2 col-form-label">model</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="model" required placeholder="Enter Model" value="<?php echo $row['4']; ?>">
													</div>
												</div>
                                                <div class="form-group row">
													<label class="col-lg-2 col-form-label">color</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="color" required placeholder="Enter Color" value="<?php echo $row['5']; ?>">
													</div>
												</div>
                                                <div class="form-group row">
													<label class="col-lg-2 col-form-label">fuel_type</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="fuel_type" required placeholder="Enter Fuel Type" value="<?php echo $row['6']; ?>">
													</div>
												</div>
                                                <div class="form-group row">
													<label class="col-lg-2 col-form-label">Image</label>
													<div class="col-lg-9">
														<input type="file" class="form-control" name="aimage" required placeholder="Enter Fuel Type" value="<?php echo $row['7']; ?>">
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
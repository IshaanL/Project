<?php
session_start();
require './admin/config.php';

if(empty($_SESSION['user_id']))
{
	header("location:signin.php");
}

////// code
$error='';
$msg='';
if(isset($_POST['insert']))
{
	$name=$_POST['name'];
	$phone=$_POST['phone'];

	$content=$_POST['content'];
	
	$id=$_SESSION['user_id'];
	
	if(!empty($name) && !empty($phone) && !empty($content))
	{
		
		$sql="INSERT INTO feedback (id,fdescription,status) VALUES ('$id','$content','0')";
		   $result=mysqli_query($con, $sql);
		   if($result){
			   $msg = "<p class='alert alert-success'>Feedback Send Successfully</p> ";
		   }
		   else{
			   $error = "<p class='alert alert-warning'>Feedback Not Send Successfully</p> ";
		   }
	}else{
		$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
	}
}
if(isset($_POST['update'])){
    $id=$_SESSION['user_id'];
	$name=$_POST['name1'];

	$phone=$_POST['mobile'];
    $email=$_POST['email1'];
    $sql = "UPDATE users SET fullname = '{$name}' , mobile = '{$phone}', email = '{$email}' WHERE id = {$id}";
	
	$result=mysqli_query($con,$sql);
	if($result == true)
	{
		$msg="<p class='alert alert-success'>profile Updated</p>";
		header("Location:userprofile.php?msg=$msg");
	}
	else{
		$msg="<p class='alert alert-warning'>profile Not Updated</p>";
		header("Location:userprofile.php?msg=$msg");
	}
    $oldimage=$_POST['oldimage'];
    $aimage=$_FILES['aimage']['name'];
	
	$temp_name  =$_FILES['aimage']['tmp_name'];
	
	move_uploaded_file($temp_name,"images/$aimage");
    if(!empty($aimage)){
        $sql = "UPDATE users SET profile = '{$aimage}' WHERE id = {$id}";
        $result=mysqli_query($con,$sql);
        if($result == true)
        {
            $msg="<p class='alert alert-success'>profile Updated</p>";
            header("Location:userprofile.php?msg=$msg");
        }
        else{
            $msg="<p class='alert alert-warning'>profile Not Updated</p>";
            header("Location:userprofile.php?msg=$msg");
        }

    }
    
    
    $old_pass = $_POST['old_pass'];
    $update_pass = md5($_POST['update_pass']);
    $update_pass = filter_var($update_pass, FILTER_SANITIZE_STRING);
    $new_pass = md5($_POST['new_pass']);
    $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
    $confirm_pass = md5($_POST['confirm_pass']);
    $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);
    if(!empty($update_pass) AND !empty($new_pass) AND !empty($confirm_pass)){
        if($update_pass != $old_pass){
            $msg = 'old password not matched!';
        }elseif($new_pass != $confirm_pass){
            $msg = 'confirm password not matched!';
        }else{
            $sql = "UPDATE users SET password = '{$new_pass}' WHERE id = {$id}";
            $result=mysqli_query($con,$sql);
            if($result == true)
            {
                $msg="<p class='alert alert-success'>password Updated</p>";
                header("Location:userprofile.php?msg=$msg");
            }
            else{
                $msg="<p class='alert alert-warning'>password Not Updated</p>";
                header("Location:userprofile.php?msg=$msg");
            }
        }
     }

}								
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Rent</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@9.1.0/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
<style>
    .mb-1{
        font-size: large;
    }
    .col-lg-6{
        background-color: antiquewhite;
    }
    .row label{
        font-size: large;
    }
    .row1{
        background-color: antiquewhite;
        width: 400px;
        
    }
    .row1 input{
        width: 300px;
    }
</style>
</head>
<body>
<?php include("header.php"); ?>

    

<div id="page-wrapper">
    <div class="row"> 
        
		 
		
        <div class="full-row">
            <div class="container">
                    <div class="row">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">Profile</h2>
                        </div>
					</div>
                <div class="dashboard-personal-info p-5 bg-white">
                    <form action="#" method="post" class="form">
                        <h3 class="text-secondary border-bottom-on-white pb-3 mb-4">Feedback Form</h3>
						<?php echo $msg; ?><?php echo $error; ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="user-id">Full Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Full Name">
                                </div>                
                                
                                <div class="form-group">
                                    <label for="phone">Contact Number</label>
                                    <input type="number" name="phone"  class="form-control" placeholder="Enter Phone" maxlength="10">
                                </div>

                                <div class="form-group">
                                    <label for="about-me">Your Feedback</label>
                                    <textarea class="form-control" name="content" rows="7" placeholder="Enter Text Here...."></textarea>
                                </div>
                                <input type="submit" class="btn btn-info mb-4" name="insert" value="Send Feedback">
                            </div>
							</form>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-5 col-md-12">
								<?php 
									$id=$_SESSION['user_id'];
									$query=mysqli_query($con,"SELECT * FROM `users` WHERE id='$id'");
									while($row=mysqli_fetch_array($query))
									{
								?>
                                <div class="user-info mt-md-50"> 
                                    <div class="mb-4 mt-3">
                                        
                                    </div>
									
                                    <div class="font-18">
                                        <img src="images/<?php echo $row['9'];?>" alt=""></div>
                                        <div class="mb-1 text-capitalize"><b>Name:</b> <?php echo $row['1'];?></div>
                                        <div class="mb-1"><b>Email:</b> <?php echo $row['3'];?></div>
                                        <div class="mb-1"><b>Contact:</b> <?php echo $row['2'];?></div>
                                    </div>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <div>
            <form action="#" method="post" class="form" enctype="multipart/form-data">
                        <h3 class="text-secondary border-bottom-on-white pb-3 mb-4">Update Profile</h3>
						<?php echo $msg; ?><?php echo $error; ?>
                        <div class="row1">
                        <?php 
									$id=$_SESSION['user_id'];
									$query=mysqli_query($con,"SELECT * FROM `users` WHERE id='$id'");
									while($row=mysqli_fetch_array($query))
									{
								?>
                            <span class="col-lg-2 col-md-10">
                                <span class="form-group">
                                    <label for="user-id">Full Name</label>
                                    <input type="text" name="name1" class="form-control" value="<?php echo $row['1'];?>">
                                </span> 
                                <span class="form-group">
                                    <label for="user-id">Email</label>
                                    <input type="text" name="email1" class="form-control" value="<?php echo $row['3'];?>">
                                </span>                
                                
                                <span class="form-group">
                                    <label for="phone">Contact Number</label>
                                    <input type="number" name="mobile"  class="form-control" value="<?php echo $row['2'];?>" maxlength="10">
                                </span>
                                <span class="form-group">
                                    <label for="phone">Profile</label>
                                    <input name="aimage" type="file" class="form-control">
                                    <input type="hidden" name="old_image" value="<?php echo $row['9'];?>">
                                </span>
                                <span class="form-group">
                                
                                    <label for="phone">Old password</label>
                                    <input type="hidden" name="old_pass" value="<?php echo $row['4'];?>">
                                    <input type="password" name="update_pass"  class="form-control" value="">
                                </span>
                                <span class="form-group">
                                    <label for="phone">New Password</label>
                                    <input type="password" name="new_pass"  class="form-control" value="">
                                </span>
                                <span class="form-group">
                                    <label for="phone">Confirm Password</label>
                                    <input type="password" name="confirm_pass"  class="form-control" value="">
                                </span>

                                
                                <input type="submit" class="btn btn-info mb-4" name="update" value="Update Profile">
                                <?php 
											if(isset($_GET['msg']))	
											echo $_GET['msg'];	
										?>
                            </span>
                            <?php } ?>
							</form>
                        
            </div>
                    
                </div>    
                
            </div>
            
        </div>
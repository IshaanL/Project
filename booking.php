<?php
session_start();
require './admin/config.php';

if(isset($_POST['book']))
{
	$name=$_SESSION['fullname'];
	$phone=$_POST['phone'];
    $vehicle=$_POST['vehicle'];
    $pickup=$_POST['pickup'];
    $return=$_POST['return'];
    
    $message=$_POST['message'];
	$id=$_SESSION['user_id'];
    $vid =$_GET['vid'];
    $aimage=$_FILES['aimage']['name'];
	
	$temp_name  =$_FILES['aimage']['tmp_name'];
	
	move_uploaded_file($temp_name,"images/$aimage");
    
    
	
	if(!empty($name) && !empty($phone) && !empty($vehicle) && !empty($pickup) && !empty($return) && !empty($aimage) )
	{
		
		$sql="INSERT INTO booking (uid,vid,name,mobile,vehicle,pick_up,return_up,license,message,status) VALUES ('$id','$vid','$name','$phone','$vehicle','$pickup','$return','$aimage','$message','pending' )";
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Rent</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">

</head>
<body>
    
<!-- header section starts      -->

<header>

<a href=""><img src="./images/logo34.png" alt=""></a>
    <a href="index.php" class="logo">Smart Rent</a>

    <nav class="navbar">
        <a href="index.php">home</a>
        <a href="about.php">about</a>
        <a href="renters.php">Renters</a>
        <a href="reviews.php">review</a>
        <?php 
        if(empty($_SESSION['user_id'])){

        
        ?>
        <?php }else{ ?>
          <a href="bookings.php">Bookings</a>
        <?php } ?>
       
        
        
    </nav>
    <div class="icons">
        <i class="fas fa-bars" id="menu-bars"></i>
        
    </div>

    <?php 
              if(empty($_SESSION['user_id']))
              { ?>
                 <a href="signup.php">Sign In</a>
              
              <?php } else { ?>
                <div class="dropdown">
  <button class="dropbtn fas fa-user"></button>
  <div class="dropdown-content">
    <a href="userprofile.php">Profile</a>
    <a href="logout.php">Logout</a>
    
  </div>
</div>
              <?php } ?>


</header>


<!-- header section ends-->

<!-- search form  -->


<!-- home section starts  -->



<!-- review section ends -->

<!-- order section starts  -->

<section class="order" id="order">
<?php

   $user_id =$_SESSION['user_id'];
   $query=mysqli_query($con,"SELECT * from `users` where id='$user_id'");
            
   while($row=mysqli_fetch_row($query)){

  ?>

    <h3 class="sub-heading"> <br> Book now </h3>
    <h1 class="heading"> Rapid Service </h1>

    <form name="myform" method="post" action="" enctype="multipart/form-data" >

        <div class="inputBox">
            <div class="input">
                <span>Name</span>
                <input type="text" value="<?php echo $row['1'];?>" name="name" id="name" disabled>
            </div>
            <?php
                if(isset($_POST['name'])){
                    $name=$_POST['name'];
                }
            ?>
       
            <div class="input">
                <span>Mobile Number:</span>
                <input type="number" pattern="^(\d{10})$" name="phone" placeholder="Enter your number" required>
            </div>
            
            <?php

$vid =$_GET['vid'];
$query=mysqli_query($con,"SELECT * from `vehicles` where vid='$vid'");
         
while($row=mysqli_fetch_row($query)){

?>


            <div class="input">
                <span>Vehicle:</span>
                <input type="text" name="vehicle" value="<?php echo $row['2'];?>">
                <?php }?>
            </div>
            
            <div class="input">
                <span>Date and Time of Pick Up</span>
                <input type="datetime-local" name="pickup">
            </div>
        </div>
        <div class="inputBox">
            
            
        </div>
        <div class="inputBox">
            <div class="input">
                <span>Date and Time of Return</span>
                <input type="datetime-local" name="return" required>
            </div>
        </div>
        <div class="inputBox">
            <div class="input">
                <span>Licence Picture</span>
                <input name="aimage" type="file" required>
            </div>
            <div class="input">
                <span>Special Request</span>
                <textarea name="message" value="Type and request  e.g. number of helmets required" id="" cols="30" rows="10"></textarea>
            </div>
        </div>

        <input type="submit" value="Book" name="book" class="btn">

    </form>

</section>
<?php }?>


<!-- order section ends -->

<!-- footer section starts  -->

<section class="footer">

<div class="box-container">

<div class="box">
        <h3>quick links</h3>
        <a href="index.php">home</a>
        <a href="renters.php">renters</a>
        <a href="about.php">about</a>
        <a href="reviews.php">reivew</a>
        <a href="booking.php">Book</a>
    </div>
    <div class="box">
        <h3>contact info</h3>
        <a href="#">+91 7066393387</a>
        <a href="#">+91 8408063783</a>
        <a href="#">iamezzzekiel@gmail.com</a>
        <a href="#">wendellfurtado79@gmail.com</a>
        <a href="#">Goa, india - 403708</a>
    </div>

    <div class="box">
        <h3>follow us</h3>
        <a href="#">facebook</a>
        <a href="#">twitter</a>
        <a href="https://www.instagram.com/_smart_rent_/?igshid=YmMyMTA2M2Y=">instagram</a>
        <a href="#">linkedin</a>
    </div>

</div>

    <div class="credit"> copyright @ 2022 by <span><a href="https://instagram.com/craeeez?igshid=YmMyMTA2M2Y=">@craeeez</a></span> </div>

</section>

<!-- footer section ends -->

<!-- loader part  -->






















<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
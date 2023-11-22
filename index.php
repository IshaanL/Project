<?php 


include("./admin/config.php");
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
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css?v=<?php echo time(); ?>">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css?v=<?php echo time(); ?>">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css?v=<?php echo time(); ?>">
<link rel="stylesheet" type="text/css" href="css/layerslider.css?v=<?php echo time(); ?>">
<link rel="stylesheet" type="text/css" href="css/color.css" id="color-change?v=<?php echo time(); ?>">

<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css?v=<?php echo time(); ?>">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css?v=<?php echo time(); ?>">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">

</head>
<body>
    

<!-- <div class="account-form">
    <div class="acc-logo">
 
       <a href="#" class="logo"> <i class="fas fa-car-alt"></i> Smart Rent </a>
    </div>
 
    <div id="close-form" class="fas fa-times"></div>
 
    <div class="buttons">
       <span class="btn active login-btn">Sign in</span>
       <span class="btn register-btn">Sign up</span>
    </div>
 
    <form class="login-form active" action="">
       <h3>login now</h3>
       <input type="email" placeholder="enter your email" class="box">
       <input type="password" placeholder="enter your password" class="box">
       <div class="flex">
          <input type="checkbox" name="" id="remember-me">
          <label for="remember-me">remember me</label>
          <a href="#">forgot password?</a>
       </div>
       <input type="submit" value="login now" class="btn">
    </form>
 
    <form class="register-form" onsubmit="return validate()" method="post" name="signup">
       <h3>register now</h3>
       <input type="text" name="name" placeholder="Enter your full name" class="box">
       <div class="Err"></div>
       <input type="text" name="email" placeholder="Enter your email" class="box">
       <div class="Err" id="emailErr">></div>
       <input type="password" name="password" placeholder="Enter your password" class="box">
       <div class="Err" id="passwordErr"></div>
       <input type="password" name="cpassword" placeholder="Confirm your password" class="box">
       <div class="Err" id="passwordErr"></div>
       <input type="submit" name="Submit" value="register now" class="btn">
       <div class="lol"></div>
    </form>
 
 </div>
-->
<?php include("header.php"); ?>


<!-- header section ends-->

<!-- search form  -->


<!-- home section starts  -->

<section class="home" id="home">

    <div class="swiper-container home-slider">

        <div class="swiper-wrapper wrapper">

            <div class="swiper-slide slide">
                <div class="content">
                    <span>popular Vehicles</span>
                    <h3>Activa 6g</h3>
                    <p>We offer Activa 6G rentals for those looking for a comfortable and reliable mode of transportation in the city. Our Activa 6G rentals are available at affordable rates, and we provide flexible rental options based on your specific needs. Contact us today to rent an Activa 6G.</p>
                    <a href="booking.php" class="btn">Book now</a>
                </div>
                <div class="image">
                    <img src="images/activa.png" alt="">
                </div>
            </div>

            

        </div>

        <div class="swiper-pagination"></div>

    </div>

</section>

<!-- home section ends -->

<!-- dishes section starts  -->

<section class="dishes" id="dishes">

    
    <h1 class="heading"> popular Renters </h1>

    <div class="box-container">
    <?php
            $query=mysqli_query($con,"SELECT * from `renter` where status='activate'");
            
            while($row=mysqli_fetch_row($query)){

            
            ?>

        <div class="box">
          
            
            <a href="Profile.php?rid=<?php echo $row['0']?>" class="fas fa-eye"></a>
            <img src="images/<?php echo $row['9'];?>" alt="">
            <h3><?php echo $row['1'];?></h3>
            <h4>
            <?php echo $row['2'];?>
            </h4>
            
            <a href="Profile.php?rid=<?php echo $row['0']?>" class="btn">Visit</a>
           
        </div>
        <?php }?>
    </div>

        

</section>

<!-- dishes section ends -->
<section class="review" id="review">

    <h3 class="sub-heading"> <br> customer's review </h3>
    <h1 class="heading"> what they say </h1>

    <div class="swiper-container review-slider">
    <?php
													
                                                    $query=mysqli_query($con,"select feedback.*, users.* from feedback,users where feedback.id=users.id and feedback.status='1'");
                                                    while($row=mysqli_fetch_array($query))
                                                        {
                                            ?>

        

            <div class="swiper-slide slide">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="images/<?php echo $row['profile']; ?>" alt="">
                    <div class="user-info">
                        <h3><?php echo $row['fullname']; ?></h3>
                        
                    </div>
                </div>
                <p><?php echo $row['2']; ?>.</p>
            </div>
            <br><br><br>

            <?php }  ?>
            
    </div>
    
</section>

<!-- about section starts  -->


<!-- menu section ends -->

<!-- review section starts  -->



<!-- review section ends -->

<!-- order section starts  -->



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






















<script src="https://unpkg.com/swiper/swiper-bundle.min.js?v=<?php echo time(); ?>"></script>

<!-- custom js file link  -->
<script src="./js/script.js?v=<?php echo time(); ?>"></script>



</body>
</html>
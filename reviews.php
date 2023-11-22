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

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

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
    
<!-- header section starts      -->

<?php include("header.php"); ?>

 

<!-- header section ends-->

<!-- search form  -->


<!-- home section starts  -->



<!-- menu section ends -->

<!-- review section starts  -->
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






















<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
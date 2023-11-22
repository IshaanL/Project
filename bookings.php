<?php
require './admin/config.php';
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
    <link rel="stylesheet" href="./admin//assets//css//bootstrap.min.css?v=<?php echo time(); ?>">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">

</head>
<body>
    
<!-- header section starts      -->

<?php include("header.php"); ?>


<!-- header section ends-->

<!-- search form  -->


<!-- home section starts  -->


<!-- home section ends -->

<!-- dishes section starts  -->



<!-- dishes section ends -->

<!-- about section starts  -->
<br><br><br><br><br><br><br>
<section class="placed-orders" id="about">
    <h1 class="title">placed orders</h1> 
    <div class="box-container"> 
        <?php
        $id=($_SESSION['user_id']);
        $query=mysqli_query($con,"select * from booking WHERE uid=$id ");
        while($row=mysqli_fetch_row($query))
        {
        ?>
        <div class="box">
        <p> booking id : <span><?php echo $row['0'] ?></span> </p>
        <p> Vehicle : <span><?php echo $row['5'] ?></span> </p>
        <p> Pick up : <span><?php echo $row['6'] ?></span> </p>
        <p> Return : <span><?php echo $row['7'] ?></span> </p>
        
        <p> Message : <span><?php echo $row['9'] ?></span> </p>
        <p> Status : <span><?php echo $row['10'] ?></span> </p>
        </div>


<?php
												} 
												?>
    </div>   

    

</section>

<!-- about section ends -->

<!-- menu section starts  -->



<!-- menu section ends -->

<!-- review section starts  -->



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
<script src="js/script.js?v=<?php echo time(); ?>"></script>

</body>
</html>
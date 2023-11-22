<?php
require 'connect.php';
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
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js?v=<?php echo time(); ?>"></script>

<!-- custom js file link  -->
<script src="./js/script.js?v=<?php echo time(); ?>"></script>
<style>
  .img1{
    border-radius: 50%;
  }
</style>
</head>
<body>
    

    
<header>
    <a href=""><img src="./images/logo34.png" alt=""></a>
    <a href="index.php" class="logo">Smart Rent</a>

    
    <nav class="navbar">
        <a href="index.php">home</a>
        <a href="about.php">about</a>
        <a  href="renters.php">Renters</a>
        <a href="reviews.php">review</a>
        <?php 
        if(empty($_SESSION['user_id'])){

        
        ?>
        <?php }else{ ?>
          <a href="bookings.php">Bookings</a>
        <?php } ?>
        
        
        
    </nav>

 
        
        
    
    
    <?php 
              if(empty($_SESSION['user_id']))
              { ?>
                 <a href="signin.php">Sign In</a>
              
              <?php } else { ?>
                <div class="dropdown">
  <button class=""><img class="img1"src="images/<?php echo $_SESSION['profile']; ?>" alt="profile"></button>
  <div class="dropdown-content">
    <a href="userprofile.php">Profile</a>
    <a href="logout.php">Logout</a>
    
  </div>
</div>
              <?php } ?>
  
    

  </header>
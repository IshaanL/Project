<?php


require './admin/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/profstyle.css?v=<?php echo time(); ?>">

   <!-- custom js file link  -->
   <script src="js/profscript.js" defer></script>

</head>
<body>
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
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<!-- header section starts      -->

<?php include("header.php"); ?>
<?php
$rid =$_GET['rid'];

            $query=mysqli_query($con,"SELECT * from `renter` where id=$rid");
            
            while($row=mysqli_fetch_row($query)){
            $vid=$row['0'];

            
            ?>
   <div class="container">
      <div class="profile-main">
          <div class="profile-container">
              <div class="profile-cover">
                  <img src="images/<?php echo $row['10'];?>" width="100%">
              </div>
              <div class="profile-container-inner">
                  <img src="images/<?php echo $row['9'];?>" class="profile-pic">
                  <h1><?php echo $row['1'];?></h1>
                  
                  <p>Address: &middot;<?php echo $row['3'];?></p>
                  <p>Contact Us: &middot;<?php echo $row['2'];?></p>
              </div>
          </div>
      </div>
      <div class="profile-sidebar"></div>
  </div>

  <?php }?>
  
   
<div class="container">
<h3 class="title"> Vehicles On Rent</h3>
<?php
   
   $rid =$_GET['rid'];
   $query=mysqli_query($con,"SELECT * from `vehicles` where rid=$rid");
            
   while($row=mysqli_fetch_row($query)){
      

  ?>
   
   <?php  
   
      if($row['8']==0){?>
      <div class="products-container" style="background-color: #fff;">
      <?php } else { ?>
      <div class="products-container" style="background-color: #DF2E38;">
      <?php } ?>

      <div class="product" data-name="p-1">
         <img src="images/<?php echo $row['7'];?>" alt="">
         <h3><?php echo $row['2'];?></h3>
      
         <div class="price">₹<?php echo $row['3'];?></div>
      </div>

      
   </div>
  <br><br>
   
  <?php }?>
</div>

</div>


<div class="products-preview">
<?php

$rid =$_GET['rid'];
$query=mysqli_query($con,"SELECT * from `vehicles` where rid=$rid && status=0");
         
while($row=mysqli_fetch_row($query)){

?>

   <div class="preview" data-target="p-1">
      <i class="fas fa-times"></i>
      <img src="images/<?php echo $row['7'];?>" alt="">
      <h3><?php echo $row['2'];?></h3>
      <p><b>Fuel Type:</b> <?php echo $row['6'];?> <br> <b>Model:</b> <?php echo $row['4'];?> <br> <b>Colour:</b> <?php echo $row['5'];?></p>
      <div class="price">₹<?php echo $row['3'];?></div>
      
      <div class="buttons">
      <?php
         if($row['8']== 0){?>
             <a href="booking.php?vid=<?php echo $row['0']?>"  class="cart">BOOK</a>
        <?php } else { ?>
        
         
        <?php } 
?> 
        
         
      </div>
   </div>
   

   

  


   
   <?php }?>
</div>



</body>
</html>
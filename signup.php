<?php
require 'connect.php';

      $nameErr="";
      $namecorrect=true;
      $emailcorrect=true;
      $passwordcorrect=true;
      $mobilecorrect=true;
      $emailErr="";
      $mobileErr="";
      
      $errMsg="";
      $passwordErr="";
      $cpasswordErr="";
if(isset($_POST['Submit'])){
  
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];

    $profile=$_FILES['profile']['name'];
	
	$temp_name  =$_FILES['profile']['tmp_name'];
	
	move_uploaded_file($temp_name,"images/$profile");

    if (empty($_POST["fullname"])) {
        $nameErr= "Name is required";
        } 
        else {
        $fullname = filterdata($_POST["fullname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$fullname)) {
        $nameErr = "Only letters and white space allowed";
        }
        else{
            $namecorrect=false;
        }
    
    }
    if (empty($_POST["mobile"])) {
        $mobileErr= "number is required";
        } 
        else {
        $mobile = filterdata($_POST["mobile"]);
        $mobilecorrect=false;
        
    
    }
    if (empty($_POST["email"])) {
        $emailErr= "Email is required" ;
        } else {
        $email = filterdata($_POST["email"]);
        // check if e-mail address is well-formed
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr= "Invalid email format";
        }
        else{
            $emailcorrect=false;
        }
    }
    if(empty($_POST["password"])){
        $passwordErr="Password is required";


    }
    else{
        $password = filterdata($_POST["password"]);
        $cpassword = filterdata($_POST["cpassword"]);

        if (strlen($_POST["password"]) <= 7) {
            $passwordErr = "Your Password Must Contain At Least 8 Characters!";
        }
        elseif(!preg_match("#[0-9]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Number!";
        }
        elseif(!preg_match("#[A-Z]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
        }
        elseif(!preg_match("#[a-z]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
        } 
        elseif($_POST["password"] === $_POST["cpassword"]) {
            $passwordcorrect=false;
         }
         else{
            $passwordErr="Passwords are not matching";
         }
    }
   
    
    

    if(($namecorrect || $emailcorrect || $passwordcorrect || $mobilecorrect)==false){
        try {
            $stmt = $connect->prepare('INSERT INTO users (fullname, mobile, email, password,profile) VALUES (:fullname, :mobile, :email, :password,:profile)');
            $stmt->execute(array(
                ':fullname' => $fullname,
                ':password' => md5($password),
                ':email' => $email,
                ':mobile' => $mobile,
                ':profile' => $profile,
                ));
            header('Location: signup.php?action=joined');
            exit;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }

    }
    
    
    
    

    
}

if(isset($_GET['action']) && $_GET['action'] == 'joined') {
    $errMsg = 'Registration successfull. Now you can login';
}

function filterdata($data){
    $data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
.about-us{
    width: 80%;
    margin: auto;
    padding-top: 80px;
    padding-bottom: 50px;
}

.signup-box{
    width: 360px;
    height: 650px;
    margin: auto;
    background-color:lavender;
    border-radius: 3px;
 }
 .Err{
    color: red;
}
.form-inline label, .form-inline input {
        display: inline-block;
        width: auto;
        padding-right: 15px;
 }
 
 form{
    width: 300px;
    margin-left: 20px;
    }
    form label{
    color: #777;
    display: flex;
    margin-top: 20px;
    font-size: 18px;
    }
    form input {
    width: 100%;
    padding: 7px;
    border: none;
    border: 1px solid gray;
    border-radius: 6px;
    outline: none;
}
input[type="submit"]{

    width: 320px;
    height: 45px;
    margin-top: 20px;
    border: none;
    background-color: #49c1a2;
    color: white;
    font-size: 18px;
}
h1{
    font-size: 36px;
    font-weight: 600;
}

.para-2{
    text-align: center;
    color: white;
    font-size: 15px;
    margin-top: -10px;
    }
    .para-2 a{
    color: #49c1a2;
    }

    </style>

    
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
</head>
<body>

<section class="about-us">
            <div class="signup-box">
            <h1>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php" class="logo"> <i class="fas fa-car-alt"></i> Smart Rent </a></h1>
                <form action="" method="post" name="signup" enctype="multipart/form-data"><br>
                    <label>Name</label>
                    <input type="text" name="fullname" placeholder="">
                    <div class="Err"><?php echo $nameErr; ?></div>
                    <label>Mobile Number</label>
                    <input type="text" pattern="^(\d{10})$" name="mobile" placeholder="">
                    <div class="Err"><?php echo $mobileErr; ?></div>
                    <label>Profile</label>
                    <input name="profile" type="file" required>
                    <label>Email</label>
                    <input type="text" name="email" placeholder="">

                    <div class="Err" id="emailErr"><?php echo $emailErr; ?></div>
                    <label>Password</label>
                    <input type="password" name="password" placeholder="">
                    <div class="Err" id="passwordErr"><?php echo $passwordErr; ?></div>
                    <label>Confirm Password</label>
                    <input type="password" name="cpassword" placeholder="">
                    <div class="Err" id="passwordErr"><?php echo $cpasswordErr; ?></div>
                    
                    <input type="submit" name="Submit" value="Register">
                    
                    <div class="lol"><?php echo $errMsg; ?></div>
                </form><br>
                <p class="para-2">Already have an account? <a href="signin.php"> Login here</a></p>
            </div>
        </div>
        

    </section>
</body>
</html>
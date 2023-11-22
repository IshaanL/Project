<?php
require 'connect.php';
$emailErr="";
$passwordErr="";
$account="";
$account1="";
$emailcorrect=true;
$passwordcorrect=true;
if(isset($_POST['Submit'])){
  
    $email=$_POST['email'];
    $password=$_POST['password'];
    


    
    if(empty($_POST["email"])){
        $emailErr= "Email is required" ;


    }
    else{
        $emailcorrect=false;
    }
    if(empty($_POST["password"])){
        $passwordErr= "Password is required" ;

    }
    else{
        $passwordcorrect=false;
    }
    if(($emailcorrect || $passwordcorrect) == false){
        try {
			$stmt = $connect->prepare('SELECT * FROM users WHERE email = :email');
			$stmt->execute(array(
				':email' => $email
				));
			$data = $stmt->fetch(PDO::FETCH_ASSOC);

			if($data == false){
				$account1="Incorrect Email or Password";
			}
			else {
				if(md5($password) == $data['password']) {
					$_SESSION['user_id'] = $data['id'];
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['mobile'] = $data['mobile'];
                    $_SESSION['password'] = $data['password'];
					$_SESSION['fullname'] = $data['fullname'];
					$_SESSION['role'] = $data['role'];
                    $_SESSION['profile'] = $data['profile'];

					header('Location: index.php');
					exit;
				}
				else
					$account1 = 'Password not match.';
			}
		}
		catch(PDOException $e) {
			$errMsg = $e->getMessage();
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
    height: 580px;
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
<header>

<a href=""><img src="./images/logo34.png" alt=""></a>
    <a href="index.php" class="logo">Smart Rent</a>

<nav class="navbar">
    <a href="index.php">home</a>
    <a href="about.php">about</a>
    <a href="renters.php">Renters</a>
    <a href="reviews.php">review</a>
    <a href="booking.php">Book</a>
    <a class="active">LOGIN</a>

</nav>


</header>
<section class="about-us">
            <div class="signup-box">
            <h1>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php" class="logo"> <i class="fas fa-car-alt"></i> Smart Rent </a></h1>
                <form action="" method="post" name="signin"><br>
                    <label>Email</label>
                    <input type="text" name="email" placeholder="">
                    <div class="Err" id="emailErr"><?php echo $emailErr; ?></div>
                    <label>Password</label>
                    <input type="password" name="password" placeholder="">
                    
                  

                    <div class="Err" id="passwordErr"><?php echo $passwordErr; ?></div>
                    
                    
                    
                    
                    <input type="submit" name="Submit" value="Login">
                    <div class="Err"><?php echo $account1; ?></div>
                    <div><?php echo $account; ?></div>
                </form><br>
                <p class="para-2">New here ->  <a href="signup.php">Sign up here</a></p>
            </div>
        </div>
        

    </section>
</body>
</html>
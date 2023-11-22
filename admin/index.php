<?php
require '../connect.php';
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
					$_SESSION['admin_id'] = $data['id'];
					$_SESSION['fullname'] = $data['fullname'];
					$_SESSION['role'] = $data['role'];
					if($_SESSION['role'] == 'admin'){
						header('Location: dashboard.php');
					exit;

					}
					else{
						$account1="INVALID CREDENTIALS";
					}
					
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
    height: 350px;
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
.head{
	font-size: 30px;
}
header h3{
    padding-left: 1500px;
}
    </style>


    
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
</head>
<body>
<header>

<a href="../index.php" class="logo"><i class=""></i>Smart Rent</a>

<nav class="navbar">
<h3>ADMIN LOGIN</h3>
</nav>




</header>
<br><br>
<section class="about-us">
            <div class="signup-box">
            
                <form action="" method="post" name="signin"><br>
					<h2 class="head">Admin Login Panel</h2>
					<p class="account-subtitle">Access to our dashboard</p>
                    <label>Email</label>
                    <input type="text" name="email" placeholder="">
                    <div class="Err" id="emailErr"><?php echo $emailErr; ?></div>
                    <label>Password</label>
                    <input type="password" name="password" placeholder="">
                    <div class="Err" id="passwordErr"><?php echo $passwordErr; ?></div>
                    
                    
                    <input type="submit" name="Submit" value=LOGIN>
                    <div class="Err"><?php echo $account1; ?></div>
                    <div><?php echo $account; ?></div>
                </form><br>
                
            </div>
        </div>
        

    </section>
</body>
</html>
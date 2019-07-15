<?php
session_start();
$usernameErr = $passwordErr = "";
$adminUserName = $adminPassword = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	include ("connection.php");
	if(empty($_POST["username"]) && empty($_POST["password"]))	echo "<script> alert('Enter UserName and Password')</script>";
	else if(empty($_POST["username"]))	$usernameErr = "UserName is Required";
	else if(empty($_POST["password"]))	$passwordErr = "Password is Required";
	else{
		$adminUserName = ($_POST["username"]);
		$adminPassword = ($_POST["password"]);
	}	

	$query = "SELECT * FROM admin WHERE admin_ID = '$adminUserName' AND pass_ID = '$adminPassword'";
	
	if(mysqli_num_rows(mysqli_query($mysqli , $query)) == 1)	header("location:admin2.php"); 
	else{
		echo "<script> alert('Wrong Admin UserName or ID');</script>";
		ob_end_flush();		
	}
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sumed</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      
    </header>

    <div class="intro-section" id="home-section">
      
      <div class="slide-1" style="background-image: url('images/hero_1.jpg');" data-stellar-background-ratio="0.5" >
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
              

                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500" style="position:relative; right:360px"align="center">
                  <form action="" method="post" class="form-box">
                    <h3 class="h4 text-black mb-4">Admin Login</h3>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="UserName" name="username">
                      <span class = "error"><?php echo $usernameErr;?></span>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="Password" name="password">
                      <span class = "error"><?php echo $passwordErr;?></span>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-pill" value="login">
                    </div>
                  </form>
                  <br>
                  <div align="right">
                   <a href='index.php'><input type="button" class="btn btn-primary btn-pill" value="back"></a>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    

    
  </div> <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>

  
  <script src="js/main.js"></script>
</body>
</html>
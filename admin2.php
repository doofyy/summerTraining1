
<html lang="en">
    <body>

    <?php
		require('connection.php');
		if(isset($_POST['submit'])) 
			{
			$course = $_POST['selectResult'];
			$emp = $_POST['emp'];	

			if (empty($emp)) 
				echo "<font color='red'>Employee field is empty.</font></br>";
			else 
			{
				$check = mysqli_query($mysqli, "Select emp_id from emps where emp_id = $emp");
				$count = mysqli_num_rows($check);
				if($count == 1){
					$generatedCode = rand(1,9999999);
					$result = mysqli_query($mysqli, "INSERT INTO mids (course, emp_id, code) VALUES ('$course','$emp','$generatedCode')");
				}
				else
					echo "<script> alert('PLEASE ENTER A VALID EMPLOYEE ID');</script>";
			}
    }
    
    $query = "SELECT course_Name FROM courses";	
		$result2 = mysqli_query($mysqli , $query);
		?>


  <form  method = "post">
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
      <div class="slide-1" style="background-image: url('images/hero_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500" style="position:relative; right:360px"align="center">
                  
                  <form action="" method="post" class="form-box">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Employee ID" name="emp">
                    </div>
                    <div class="form-row">
                      <br/>
                      <select name = "selectResult" style="height:40; width:440px; position:relative; left:7px;">
                      <?php while($row = mysqli_fetch_array($result2)):;?>
                      <option><?php echo $row['course_Name'];?></option>
                      <?php endwhile;?>
                      </select>
                    </div>
                    &nbsp;
                    &nbsp;
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-pill" value="submit" name="submit">
                      &nbsp;
                      &nbsp;
                      &nbsp;
                      <a href="reports3.php"><input type="button" class="btn btn-primary btn-pill" value="reports" name="reports"></a>
                    </div>
                  </form>
                  <div align="center">
                   <a href='admin.php'><input type="button" class="btn btn-primary btn-pill" value="back"></a>
                     &nbsp;
                      &nbsp;
                      &nbsp;
                   <a href='index.php'><input type="button" class="btn btn-primary btn-pill" value="home"></a>
                  </div>
                  
                  <br>
                  <?php  
                  if(isset($_POST['submit'])) 
                    echo "the code is: " . $generatedCode;
                  ?>

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
    
</html>
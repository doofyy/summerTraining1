<?php
session_start();
error_reporting(E_ALL);
include("connection.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$empID = ($_POST["empID"]);
	$_SESSION['empID']=$empID;
	$verification = ($_POST["verificationCode"]);
	$_SESSION['code']=$verification;
	
	$sql = "SELECT emp_id , code FROM mids WHERE emp_id = $empID AND code =  $verification";
	$result = mysqli_query($mysqli , $sql);
	if($result)
		$count = mysqli_num_rows($result);
	else
		$count=0;
	if($count == 1){
		echo "Successfull";
		header("location:mid.php"); 
	}
	else{
		echo "<script> alert('Please enter valid credentials ');</script>";
		ob_end_flush();	
	}
}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<link href="main.css" rel="stylesheet" type="text/css">
			<style>
			.error{color: #FF0000;}
			</style>
			<nav class="navbar navbar-light bg-light">
				<a class="navbar-brand" href="#">
					<img src="https://www.suezcanal.gov.eg/PublishingImages/Useful%20Links/sumed%20logo.png" width="182" height="86" class="d-inline-block align-top" align = "right" alt="">
				</a>
			</nav>
	</head>
	<body>
		<h2><center>Employee Validation</center></h2>
		<form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
			Enter your ID:
			<input type="text" name="empID" placeholder = "Enter ID">
			<br />
			Enter your Verification code:
			<input type="text" name = "verificationCode" placeholder = "Verify your ID">
			<br />
			<input type="submit" value="validate" name="submit">
		</form>

		<?php
		//link to previous page
		echo "</br><a href='index.php'>Go Back</a>";
		?>

	</body>
</html>
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
<!DOCTYPE HTML>
<html>
<head>
<link href="main.css" rel="stylesheet" type="text/css">
<style>
input {
	font-size: 18px;
}
div, .description {
	width: 100%;
}
#form_container {
	background-image: url(images/lock.png);
	background-repeat: no-repeat;
	background-position: right bottom+50px;
	background-size: 30%;
}
h2 {
	border-bottom: #B8C7D0 dotted 1px;
}
</style>
</head>
<body>
<h2><center>Admin Validation</center></h2>
<div style="width:30%; float:right"></div>
<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<ul style="width:60%;">
<li>
<div>
<center>
Username:
<input type ="text" name = "username" style="font-size:18px; color:#336699>
<span class = "error">* <?php echo $usernameErr;?></span>
</center>
</li>
<br />
<li>
Password:
<input type = "text" name = "password" style="font-size:18px; color:#336699>
<span class = "error">* <?php echo $passwordErr;?></span>
</div>
</li>
<br />
<input type= "submit" name = "submit" value = "submit" style="font-size:15px; padding:5px;  padding-right:200; padding-left:200; background-color:#FF7600; color:#FFF; width:100px;">
</ul>
</form>

<?php
//link to previous page
echo "</br><a href='index.php'>Go Back</a>";
?>

</body>
</html>
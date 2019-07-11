
<html lang="en">
<body>

<?php
require('connection.php');
if(isset($_POST['submit'])) 
	{
	$course = $_POST['selectResult'];
	$emp = $_POST['emp'];	
	}
	
$query = "SELECT course_Name FROM courses";	
$result2 = mysqli_query($mysqli , $query);
?>

<form  method = "post">
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="course">Course</label>
			<br/>
			<select name = "selectResult">
				<?php while($row = mysqli_fetch_array($result2)):;?>
				<option><?php echo $row['course_Name'];?></option>
				<?php endwhile;?>
			</select>
		</div>
		<div class="form-group col-md-6">
			<label for="emp">Employee ID</label>
			<input type="number" class="form-control" name="emp" placeholder="Employee ID" >
		</div>
  	</div>
  <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
</form>


    <?php
	include('connection.php');

	//link to previous page
	echo "</br><a href='admin.php'>Go Back</a></br></br>";	

	if(isset($_POST['submit'])) 
	{
		$course = $_POST['selectResult'];
		$emp = $_POST['emp'];
	
		if (empty($emp)) 
			echo "<font color='red'>Employee field is empty.</font></br>";
		else 
		{
			$check = mysqli_query($mysqli, "Select emp_sumed_id from emps where emp_sumed_id = $emp");
			$count = mysqli_num_rows($check);
			if($count == 1){
				$generatedCode = rand(1,9999999);
				$result = mysqli_query($mysqli, "INSERT INTO mids (course, emp_sumed_id, code) VALUES ('$course','$emp','$generatedCode')");
				echo ("the code is: " . $generatedCode);
			}
			else
				echo "<script> alert('PLEASE ENTER A VALID EMPLOYEE ID');</script>";
		}
		
	}
	?>

</body>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
<?php require('connection.php'); ?>
<!DOCTYPE html>
<html>
<head><title>Reports</title></head>
<body style="background-color:#212529;">
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<h1 class="display-4" align="center" style="color:white;">Search by</h1>
<form action="reports.php" method = "post">
  <div class="form-group" align="center">
  <?php $query = "SELECT course_Name FROM courses";	
$result2 = mysqli_query($mysqli , $query); 
?>
    <td>
	  <label style="color:white;">
          <input type="radio" name="options0" value="emp_id"   > Employee
      </label>
    </td>

    <td>
	  <label style="color:white;">
          <input type="radio" name="options0" value="course" checked> Course
      </label>
    </td>
  <?php
  if(isset($_POST["options0"])){
    if($_POST["options0"] == "course"){?>
    
          <select name = "svar">
          <?php while($row = mysqli_fetch_array($result2)):;?>
          <option><?php echo $row['course_Name'];?></option>
          <?php endwhile;?>
          <option>All</option>
        </select>
        </div>
    <?php
    } 
    else{ ?>
     <td>   
    <br>
	  <label style="color:white;">
          <input type="text" name="svar" value="testtt"  >
      </label>
    </td>
    <?php
    }  ?>
    <td>
    <?php } ?>

    <td>
        <label style="color:white;">
          <input type="radio" name="options" value="list"  > List
      </label>
    </td>

    <td>
	  <label style="color:white;">
          <input type="radio" name="options" value="average" checked  > Average
      </label>
    </td>
	  
    <br>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>

  <br>

  
</form>
<?php



 if(isset($_POST["submit"]) ){
   $print = "";
   $checkquery = "Select course from mids where ". $_POST["options0"] ." = " . '"' . $_POST["svar"] . '"';
   $check = mysqli_num_rows(mysqli_query($mysqli,$checkquery));


    if($check || $_POST["svar"] == "All"){

    
    if($_POST["options" ] == "average" ){
          $query = "Select course,Round(AVG(q_1),1) ";
        for($i=2;$i<30;$i++){
            $query = $query.",Round(AVG(q_$i),1) ";
        }
        $query = $query."from mids";
        
        if($_POST["svar"] != "All" && $check){
          $query = $query. " where " . $_POST["options0"] ." = ". '"' . $_POST["svar"] . '"';
        }

        $query = $query. " group by course";
        $qresult = mysqli_query($mysqli,$query);
        while($result = mysqli_fetch_array($qresult)){
          $print = $print . $result["course"]."  ";
          for($i=1;$i<30;$i++){
            $print = $print ."   ". $result["Round(AVG(q_$i),1)"];
            
          }
          $print = $print."<br>";
        }

    }else if ($_POST["options"] == "list"){
      $query = "Select course,Round(q_1,1) ";
        for($i=2;$i<30;$i++){
            $query = $query.",Round(q_$i,1) ";
        }
        $query = $query."from mids ";
        if($_POST["svar"] != "All"){
          $query = $query. " where " . $_POST["options0"]." = ". '"' . $_POST["svar"] . '"';
        }
        $qresult = mysqli_query($mysqli,$query);

        while($result = mysqli_fetch_array($qresult)){
          $print = $print. $result["course"]."  ";
          for($i=1;$i<30;$i++){
            $print = $print ."   ". $result["Round(q_$i,1)"];
            
          }
          $print = $print. "<br>";
          }
        }

        echo $print;
    }else{
      die("no");
    }
  }    









?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="js/jquery-3.3.1.min.js"></script>

</body>
</html>
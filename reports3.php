<?php require('connection.php'); ?>


<!DOCTYPE html>
<html>
<head> </head>
<body>


<form action="reports3.php" method = "post">
  <div class="form-group">

  <?php $query = "SELECT course_Name FROM courses";	
$result2 = mysqli_query($mysqli , $query); ?>



    <label for="search">Search by </label>
    <td>
	  <label>
          <input type="radio" name="options0" value="emp_id"   > Employee
      </label>
    </td>

    <td>
	  <label>
          <input type="radio" name="options0" value="course" checked    > Course
      </label>
    </td>
  <?php
  if(isset($_POST['options0'])){
    
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
	  <label>
          <input type="text" name="svar" value="testtt"  > <br>
      </label>
    </td>

    <?php
  } } ?>

  
  
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  
  <td>
	  <label>
          <input type="radio" name="options" value="list"  > List
      </label>
    </td>

    <td>
	  <label>
          <input type="radio" name="options" value="average" checked  > Average
      </label>
    </td>
    <br>
</form>



<?php



 if(isset($_POST["submit"]) && isset($_POST["svar"]) && isset($_POST["options0"])){
   $print = "";
   $checkquery = "Select course from mids where ".  $_POST["options0"]  . " = " . '"' . $_POST["svar"] . '"';
   $check =mysqli_num_rows( mysqli_query($mysqli,$checkquery));
   
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

</body>

</html>
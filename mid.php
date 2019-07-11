<?php
session_start();
error_reporting(E_ALL);
ini_set('display_error','1');
$array = array();
$queryTest = "UPDATE mids set ";
function test_input($myData, &$queryTest) {	
  $data = array_key_exists($myData, $_POST) ? $_POST[$myData] : NULL;	

  if($data){			
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
  }
  if($myData != "q_34"){
    if($myData === "q_32" or $myData === "q_33"){
      $data = '"' . $data . '"';
    }
    $array["'$myData'"]=$data;
    
    $queryTest = $queryTest . "$myData = $data , ";
  }else{
    $data = '"' . $data . '"';
    $array["'$myData'"]=$data;
    $queryTest = $queryTest . "$myData = $data  ";
  }
  

}



if(isset($_SESSION['empID'])){


  $emp_id =  $_SESSION['empID'];
  $verification = $_SESSION['code'];
  
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
      include 'connection.php';
      
      $query = "SELECT * from mids where emp_id='$emp_id'";
      $result = mysqli_query($mysqli, $query) or die(mysqli_error());
      $count = mysqli_num_rows($result);
      
      $query = "SELECT emp_id from emps where emp_id = $emp_id ";
      $result = mysqli_query($mysqli, $query);

      if ($result){
          $fields = array( "q_1","q_2","q_3","q_4","q_5","q_6","q_7","q_8","q_9","q_10","q_11","q_12","q_13","q_14","q_15","q_16","q_17","q_18","q_19","q_20","q_21","q_22","q_23","q_24","q_25","q_26","q_27","q_28","q_29","q_30","q_31","q_32","q_33","q_34");

        
         foreach($fields as $index){
           test_input("$index",$queryTest);
         }	 
         $queryTest = $queryTest . " where emp_id = $emp_id and code = $verification ";



          $result = mysqli_query($mysqli,$queryTest);


          if ($result) {
            session_unset(); 
            session_destroy();
            header("location:thanks.html");
          }
          else{
            session_unset(); 
            session_destroy();
            header("location:error.html");
            die('Invalid query: ' . mysqli_error($mysqli));
          }
          mysqli_close($mysqli);
      }
      else {
      echo "Security Error!! Please contact admin. ".$emp_id;
      session_unset(); 
      session_destroy();
      header("location:error.html");
      }
  }
 }

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Emp</title>
<link href="main.css" rel="stylesheet" type="text/css">
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
table#t01 {
    width: 100%;    
    background-color: #f1f1c1;
}
</style>
</head>
<body>
<h1>Training Course Evaluation</h1>
<p>&nbsp;</p>
<div id="form_container">
  <h1>&nbsp;Training Course Evaluation</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="form_description">
      <p><br>
        You are kindly requested to fill out this questionnaire knowing that all information hereby will be taken into consideration by the training department to ensure that all procedures and formalities<br>
        </p>
    </div>
	<?php // "First Table" ?>
    <ul >
	<label>  </label>
	<Table id="t01"class="fixed"cellpadding="2" cellspacing="0">
	<col width="600px"/><col width="80px"/>
	<col width="80px"/>
	<col width="80px"/>
	<col width="80px"/>
	<col width="80px"/>
	<li id="li_1" >
	<th> A) Location </th><th> Very Poor</th><th> Fair</th><th> Good</th><th> Very Good</th><th> Excellent</th>
	<tr>
        <td><label  class="description" for="q_1">1.	Training premises was adequate.</label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_1" value="1" id="q_1_0" >
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_1" value="2" id="q_1_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_1" value="3" id="q_1_2" checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_1" value="4" id="q_1_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_1" value="5" id="q_1_4">
         </label>
	</td> 
	</tr>
	<li id="li_2" >
	<tr>
        <td><label class="description" for="q_2">2. Hygiene in the training premises was good </label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_2" value="1" id="q_2_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_2" value="2" id="q_2_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_2" value="3" id="q_2_2" checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_2" value="4" id="q_2_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_2" value="5" id="q_2_4">
         </label>
	</td> 
	</tr>
	<li id="li_3" >
	<tr>
        <td><label class="description" for="q_3">3.	Seating in the training premises was comfortable and the number of delegates was suitable</label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_3" value="1" id="q_3_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_3" value="2" id="q_3_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_3" value="3" id="q_3_2" checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_3" value="4" id="q_3_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_3" value="5" id="q_3_4">
         </label>
	</td> 
	</tr>
	<li id="li_4" >
	<tr>
        <td><label class="description" for="q_4">4.	Training premises provided a good learning ambience</label>
       </td>
		<td>
	  <label>
          <input type="radio" name="q_4" value="1" id="q_4_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_4" value="2" id="q_4_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_4" value="3" id="q_4_2" checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_4" value="4" id="q_4_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_4" value="5" id="q_4_4">
         </label>
	</td> 
	</tr>
	<li id="li_5" >
	<tr>
        <td><label class="description" for="q_5">5.	Training location was easy to travel to</label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_5" value="1" id="q_5_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_5" value="2" id="q_5_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_5" value="3" id="q_5_2" checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_5" value="4" id="q_5_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_5" value="5" id="q_5_4">
         </label>
	</td> 
	</tr>
	</table>
    </ul>
	<?php //Second Table ?>
    <ul >
	<label> </label>
	<table id="t02" class="fixed">
    <col width="600px" />
    <col width="80px" />
    <col width="80px" />
	<col width="80px" />
	<col width="80px" />
	<col width="80px" />
	<li id="li_6" >
	<th>B) Instructors  </th> <th> Very Poor</th><th> Fair</th><th> Good</th><th> Very Good</th><th> Excellent</th>
	<tr>
        <td><label class="description" for="q_6">1.	Instructors were well prepared.</label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_6" value="1" id="q_6_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_6" value="2" id="q_6_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_6" value="3" id="q_6_2"checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_6" value="4" id="q_6_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_6" value="5" id="q_6_4">
         </label>
	</td> 
	</tr>
	<li id="li_7" >
	<tr>
        <td><label class="description" for="q_7">2. Instructors were receptive to participant comments and questions. </label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_7" value="1" id="q_7_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_7" value="2" id="q_7_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_7" value="3" id="q_7_2"checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_7" value="4" id="q_7_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_7" value="5" id="q_7_4">
         </label>
	</td> 
	</tr>
	<li id="li_8" >
	<tr>
        <td><label class="description" for="q_8">3.	Instructors spoke clearly and loudly enough</label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_8" value="1" id="q_8_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_8" value="2" id="q_8_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_8" value="3" id="q_8_2"checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_8" value="4" id="q_8_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_8" value="5" id="q_8_4">
         </label>
	</td> 
	</tr>
	<li id="li_9" >
	<tr>
        <td><label class="description" for="q_9">4.	Instructors were knowledgeable in their field</label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_9" value="1" id="q_9_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_9" value="2" id="q_9_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_9" value="3" id="q_9_2"checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_9" value="4" id="q_9_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_9" value="5" id="q_9_4">
         </label>
	</td> 
	</tr>
	<li id="li_10" >
	<tr>
        <td><label class="description" for="q_10">5.	How well do you rate the overall quality of the instructors?</label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_10" value="1" id="q_10_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_10" value="2" id="q_10_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_10" value="3" id="q_10_2"checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_10" value="4" id="q_10_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_10" value="5" id="q_10_4">
         </label>
	</td> 
	</tr>
	</table>
    </ul>
	<?php//Third Table ?>
    <ul >
	<label> C) Content </label>
	<table id="t03" class="fixed">
    <col width="600px" />
    <col width="80px" />
    <col width="80px" />
	<col width="80px" />
	<col width="80px" />
	<col width="80px" />
	<li id="li_11" >
	<th> </th> <th> Very Poor</th><th> Fair</th><th> Good</th><th> Very Good</th><th> Excellent</th>
	<tr>
        <td><label class="description" for="q_11">1.	Training objectives for each topic were identified and followed.</label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_11" value="1" id="q_11_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_11" value="2" id="q_11_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_11" value="3" id="q_11_2" checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_11" value="4" id="q_11_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_11" value="5" id="q_11_4">
         </label>
	</td> 
	</tr>
	<li id="li_12" >
	<tr>
        <td><label class="description" for="q_12">2. Pace of the session/activity was suitable for me. </label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_12" value="1" id="q_12_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_12" value="2" id="q_12_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_12" value="3" id="q_12_2"checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_12" value="4" id="q_12_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_12" value="5" id="q_12_4">
         </label>
	</td> 
	</tr>
	<li id="li_13" >
	<tr>
        <td><label class="description" for="q_13">3.	Content was organized and easy to follow.</label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_13" value="1" id="q_13_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_13" value="2" id="q_13_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_13" value="3" id="q_13_2"checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_13" value="4" id="q_13_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_13" value="5" id="q_13_4">
         </label>
	</td> 
	</tr>
	<li id="li_14" >
	<tr>
        <td><label class="description" for="q_14">4.	The course provided appropriate balance between instruction and practice</label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_14" value="1" id="q_14_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_14" value="2" id="q_14_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_14" value="3" id="q_14_2"checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_14" value="4" id="q_14_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_14" value="5" id="q_14_4">
         </label>
	</td> 
	</tr>
	<li id="li_15" >
	<tr>
        <td><label class="description" for="q_15">5.	The course helped me understand concepts more clearly</label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_15" value="1" id="q_15_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_15" value="2" id="q_15_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_15" value="3" id="q_15_2"checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_15" value="4" id="q_15_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_15" value="5" id="q_15_4">
         </label>
	</td> 
	</tr>
	</table>
    </ul>
	<?php//End of Third Table
	//Fourth Table //?>
    <ul >
	<label> D) Printouts/ Training Aids: </label>
	<table id="t04" class="fixed">
    <col width="600px" />
    <col width="80px" />
    <col width="80px" />
	<col width="80px" />
	<col width="80px" />
	<col width="80px" />
	<li id="li_16" >
	<th> </th> <th> Very Poor</th><th> Fair</th><th> Good</th><th> Very Good</th><th> Excellent</th>
	<tr>
        <td><label class="description" for="q_16">1.	The exercises helped me to learn the material.</label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_16" value="1" id="q_16_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_16" value="2" id="q_16_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_16" value="3" id="q_16_2"checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_16" value="4" id="q_16_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_16" value="5" id="q_16_4">
         </label>
	</td> 
	</tr>
	<li id="li_17" >
	<tr>
        <td><label class="description" for="q_17">2. There was enough time to cover all materials. </label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_17" value="1" id="q_17_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_17" value="2" id="q_17_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_17" value="3" id="q_17_2"checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_17" value="4" id="q_17_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_17" value="5" id="q_17_4">
         </label>
	</td> 
	</tr>
	<li id="li_18" >
	<tr>
        <td><label class="description" for="q_18">3.	Materials distributed were relevant and useful.</label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_18" value="1" id="q_18_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_18" value="2" id="q_18_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_18" value="3" id="q_18_2"checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_18" value="4" id="q_18_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_18" value="5" id="q_18_4">
         </label>
	</td> 
	</tr>
	<li id="li_19" >
	<tr>
        <td><label class="description" for="q_19">4.	Material distributed helped clarify the topic and concepts.</label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_19" value="1" id="q_19_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_19" value="2" id="q_19_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_19" value="3" id="q_19_2"checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_19" value="4" id="q_19_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_19" value="5" id="q_19_4">
         </label>
	</td> 
	</tr>
	<li id="li_20" >
	<tr>
        <td><label class="description" for="q_20">5.	Material distributed was easy to understand and follow.</label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_20" value="1" id="q_20_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_20" value="2" id="q_20_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_20" value="3" id="q_20_2"checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_20" value="4" id="q_20_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_20" value="5" id="q_20_4">
         </label>
	</td> 
	</tr>
	</table>
    </ul>
	<?php /*End of Fourth Table
	//Fifth Table */?>
    <ul >
	<label> E) Organization: </label>
	<table id="t05" class="fixed">
    <col width="600px" />
    <col width="80px" />
    <col width="80px" />
	<col width="80px" />
	<col width="80px" />
	<col width="80px" />
	<li id="li_21" >
	<th> </th> <th> Very Poor</th><th> Fair</th><th> Good</th><th> Very Good</th><th> Excellent</th>
	<tr>
        <td><label class="description" for="q_21">1.	The training was well organized.</label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_21" value="1" id="q_21_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_21" value="2" id="q_21_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_21" value="3" id="q_21_2"checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_21" value="4" id="q_21_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_21" value="5" id="q_21_4">
         </label>
	</td> 
	</tr>
	<li id="li_22" >
	<tr>
        <td><label class="description" for="q_22">2. The technical knowledge, background, and field of work for all delegates was well matched. </label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_22" value="1" id="q_22_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_22" value="2" id="q_22_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_22" value="3" id="q_22_2"checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_22" value="4" id="q_22_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_22" value="5" id="q_22_4">
         </label>
	</td> 
	</tr>
	<li id="li_23" >
	<tr>
        <td><label class="description" for="q_23">3.	The catering provided was adequate.</label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_23" value="1" id="q_23_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_23" value="2" id="q_23_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_23" value="3" id="q_23_2"checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_23" value="4" id="q_23_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_23" value="5" id="q_23_4">
         </label>
	</td> 
	</tr>
	<li id="li_24" >
	<tr>
        <td><label class="description" for="q_24">4.	The training and visual aid provided was as required.</label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_24" value="1" id="q_24_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_24" value="2" id="q_24_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_24" value="3" id="q_24_2"checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_24" value="4" id="q_24_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_24" value="5" id="q_24_4">
         </label>
	</td> 
	</tr>
	<li id="li_25" >
	<tr>
        <td><label class="description" for="q_25">5.	The setting was comfortable and suitable for the needed activities.</label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_25" value="1" id="q_25_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_25" value="2" id="q_25_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_25" value="3" id="q_25_2"checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_25" value="4" id="q_25_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_25" value="5" id="q_25_4">
         </label>
	</td> 
	</tr>
	</table>
    </ul>
	<?php /* End of Fifth Table
	//Sixth Table */ ?>
    <ul >
	<label> F) Benefits: </label>
	<table id="t06" class="fixed">
    <col width="600px" />
    <col width="80px" />
    <col width="80px" />
	<col width="80px" />
	<col width="80px" />
	<col width="80px" />
	<li id="li_26" >
	<th> </th> <th> Very Poor</th><th> Fair</th><th> Good</th><th> Very Good</th><th> Excellent</th>
	<tr>
        <td><label class="description" for="q_26">1.	The session/activity satisfied my professional needs in this area.</label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_26" value="1" id="q_26_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_26" value="2" id="q_26_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_26" value="3" id="q_26_2"checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_26" value="4" id="q_26_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_26" value="5" id="q_26_4">
         </label>
	</td> 
	</tr>
	<li id="li_27" >
	<tr>
        <td><label class="description" for="q_27">2. I will be able to apply the knowledge learned. </label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_27" value="1" id="q_27_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_27" value="2" id="q_27_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_27" value="3" id="q_27_2"checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_27" value="4" id="q_27_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_27" value="5" id="q_27_4">
         </label>
	</td> 
	</tr>
	<li id="li_28" >
	<tr>
        <td><label class="description" for="q_28">3.	The training enhanced my knowledge and skills.</label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_28" value="1" id="q_28_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_28" value="2" id="q_28_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_28" value="3" id="q_28_2"checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_28" value="4" id="q_28_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_28" value="5" id="q_28_4">
         </label>
	</td> 
	</tr>
	<li id="li_29" >
	<tr>
        <td><label class="description" for="q_29">4.	I would recommend this training course to a colleague.</label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_29" value="1" id="q_29_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_29" value="2" id="q_29_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_29" value="3" id="q_29_2"checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_29" value="4" id="q_29_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_29" value="5" id="q_29_4">
         </label>
	</td> 
	</tr>
	<li id="li_30" >
	<tr>
        <td><label class="description" for="q_30">5.	The training was relevant to my job requirements.</label>
       </td>
	<td>
	  <label>
          <input type="radio" name="q_30" value="1" id="q_30_0">
      </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_30" value="2" id="q_30_1">
        </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_30" value="3" id="q_30_2"checked>
         </label>
    </td>
	<td>
        <label>
          <input type="radio" name="q_30" value="4" id="q_30_3">
         </label>
    </td>
    <td>    
        <label>
          <input type="radio" name="q_30" value="5" id="q_30_4">
         </label>
	</td> 
	</tr>
	</table>
    </ul>
	<?php //End of Sixth Table ?>
	<li id="li_31" >
        <label class="description" for="q_31">31.	How do you rate the training overall?<br>
		<span class="ar">كيف تقيم التدريب بشكل عام ؟</span></label>
        <label style="padding-right:50px;">
          <input type="radio" name="q_31" value="5" id="q_31_0" >
          Excellent / ممتاز</label>
        <label>
          <input type="radio" name="q_31" value="4" id="q_31_1">
          Very Good / جيد جداَ</label>
		  <label>
          <input type="radio" name="q_31" value="3" id="q_31_2"checked>
          Good / جيد</label><label>
          <input type="radio" name="q_31" value="2" id="q_31_3">
          Average / متوسط</label><label>
          <input type="radio" name="q_31" value="1" id="q_31_4">
          Poor / ضعيف
		  </label>
        <br>
     </li>
	  <li id="li_32" >
	  <label class="description" for="q_32">32.	What part of the training was the most useful for your work?<br>
		<label style="padding-right:50px;">
        <br>
        <textarea name="q_32" cols="70" rows="6" id="q_32" placeholder="Enter the text here...">mosalah</textarea>
      </li>
      <li id="li_33" >
	  <label class="description" for="q_33">33.	What part of the training was the least useful for your work? <br>
		<label style="padding-right:50px;">
        <br>
        <textarea name="q_33" cols="70" rows="6" id="q_33" placeholder="Enter the text here...">mosalah</textarea>
      </li>
	<li id="li_34" >
	  <label class="description" for="q_34">34.	Please list three ideas or lessons that you learned during this training that you will implement in your work. <br>
		<label style="padding-right:50px;">
        <br>
        <textarea name="q_34" cols="70" rows="6" id="q_34" placeholder="Enter the text here...">mosalah</textarea>
      </li>
    <center>
	<span class="ar">برجاء مراجعة إجاباتك قبل الإعتماد لعدم إمكانية التعديل<span><br>
      <input type="submit" style="padding:5px; margin:auto; background-color:#FF7600; color:#FFF; width:120px;">
    </center>
  </form>
</div>
</body>
</html>
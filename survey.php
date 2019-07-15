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

         foreach($fields as $index)
           test_input("$index",$queryTest);

        $queryTest = $queryTest . " where emp_id = $emp_id and code = $verification ";
        $result = mysqli_query($mysqli,$queryTest);

          if ($result) 
            header("location:thanks.html");
          else{
            header("location:error.html");
            die('Invalid query: ' . mysqli_error($mysqli));
          }
          mysqli_close($mysqli);
      }
      else {
      echo "Security Error!! Please contact admin. ".$emp_id;
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
</head>
<body style="background-color:#778899;">
<p>&nbsp;</p>
<div id="form_container"style="background-color:#343a40;">
    <h1 style="background-color:#343a40; color:white;">&nbsp;Training Course Evaluation</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="form_description">
        <p style="color:white;">
          You are kindly requested to fill out this questionnaire knowing that all information hereby will be taken into consideration by the training department to ensure that all procedures and formalities
          </p>
      </div>

      <ul >
    <label>  </label>
    <Table id="t01"class="fixed"cellpadding="2" cellspacing="0">
    <col width="600px"/><col width="80px"/>
    <col width="80px"/>
    <col width="80px"/>
    <col width="80px"/>
    <col width="80px"/>

    <table class="table table-bordered table-dark">
    <thead>
      <tr>
        <th scope="col"><h3><u>A. Location </u></h3></th>
        <th scope="col">Very Poor</th>
        <th scope="col">Fair</th>
        <th scope="col">Good</th>
        <th scope="col">Very Good</th>
        <th scope="col">Excellent</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1.  Training premises was adequate.</th>
        <td><label>
            <input type="radio" name="q_1" value="1" id="q_1_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_1" value="2" id="q_1_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_1" value="3" id="q_1_2" checked>
          </label></td>
        <td><label>
            <input type="radio" name="q_1" value="4" id="q_1_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_1" value="5" id="q_1_4">
          </label></td>
      </tr>

      <tr>
        <th scope="row">2. Hygiene in the training premises was good.</th>
        <td><label>
            <input type="radio" name="q_2" value="1" id="q_2_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_2" value="2" id="q_2_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_2" value="3" id="q_2_2" checked>
          </label></td>
        <td><label>
            <input type="radio" name="q_2" value="4" id="q_2_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_2" value="5" id="q_2_4">
          </label></td>
      </tr>

      <tr>
        <th scope="row">3.	Seating in the training premises was comfortable and the number of delegates was suitable.</th>
        <td><label>
            <input type="radio" name="q_3" value="1" id="q_3_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_3" value="2" id="q_3_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_3" value="3" id="q_3_2" checked>
          </label></td>
        <td><label>
            <input type="radio" name="q_3" value="4" id="q_3_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_3" value="5" id="q_3_4">
          </label></td>
      </tr>

      <tr>
        <th scope="row">4.	Training premises provided a good learning ambience.</th>
        <td><label>
            <input type="radio" name="q_4" value="1" id="q_4_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_4" value="2" id="q_4_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_4" value="3" id="q_4_2" checked>
          </label></td>
        <td><label>
            <input type="radio" name="q_4" value="4" id="q_4_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_4" value="5" id="q_4_4">
          </label></td>
      </tr>

      <tr>
        <th scope="row">5.	Training location was easy to travel to.</th>
        <td><label>
            <input type="radio" name="q_5" value="1" id="q_5_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_5" value="2" id="q_5_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_5" value="3" id="q_5_2" checked>
          </label></td>
        <td><label>
            <input type="radio" name="q_5" value="4" id="q_5_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_5" value="5" id="q_5_4">
          </label></td>
      </tr>
    </tbody>
  </table>


  <table class="table table-bordered table-dark">
    <thead>
      <tr>
        <th scope="col"><h3><u>B. Instructors </u></h3></th>
        <th scope="col">Very Poor</th>
        <th scope="col">Fair</th>
        <th scope="col">Good</th>
        <th scope="col">Very Good</th>
        <th scope="col">Excellent</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1.  Instructors were well prepared.</th>
        <td><label>
            <input type="radio" name="q_6" value="1" id="q_6_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_6" value="2" id="q_6_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_6" value="3" id="q_6_2" checked>
          </label></td>
        <td><label>
            <input type="radio" name="q_6" value="4" id="q_6_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_6" value="5" id="q_6_4">
          </label></td>
      </tr>

      <tr>
        <th scope="row">2. Instructors were receptive to participant comments and questions.</th>
        <td><label>
            <input type="radio" name="q_7" value="1" id="q_7_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_7" value="2" id="q_7_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_7" value="3" id="q_7_2" checked>
          </label></td>
        <td><label>
            <input type="radio" name="q_7" value="4" id="q_7_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_7" value="5" id="q_7_4">
          </label></td>
      </tr>

      <tr>
        <th scope="row">3.	Instructors spoke clearly and loudly enough.</th>
        <td><label>
            <input type="radio" name="q_8" value="1" id="q_8_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_8" value="2" id="q_8_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_8" value="3" id="q_8_2" checked>
          </label></td>
        <td><label>
            <input type="radio" name="q_8" value="4" id="q_8_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_8" value="5" id="q_8_4">
          </label></td>
      </tr>

      <tr>
        <th scope="row">4.Instructors were knowledgeable in their field.</th>
        <td><label>
            <input type="radio" name="q_9" value="1" id="q_9_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_9" value="2" id="q_9_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_9" value="3" id="q_9_2" checked>
          </label></td>
        <td><label>
            <input type="radio" name="q_9" value="4" id="q_9_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_9" value="5" id="q_9_4">
          </label></td>
      </tr>

      <tr>
        <th scope="row">5.How well do you rate the overall quality of the instructors?</th>
        <td><label>
            <input type="radio" name="q_10" value="1" id="q_10_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_10" value="2" id="q_10_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_10" value="3" id="q_10_2" checked>
          </label></td>
        <td><label>
            <input type="radio" name="q_10" value="4" id="q_10_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_10" value="5" id="q_10_4">
          </label></td>
      </tr>
    </tbody>
  </table>

  <table class="table table-bordered table-dark">
    <thead>
      <tr>
        <th scope="col"><h3><u>C. Content </u></h3></th>
        <th scope="col">Very Poor</th>
        <th scope="col">Fair</th>
        <th scope="col">Good</th>
        <th scope="col">Very Good</th>
        <th scope="col">Excellent</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1. Training objectives for each topic were identified and followed.</th>
        <td><label>
            <input type="radio" name="q_11" value="1" id="q_11_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_11" value="2" id="q_11_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_11" value="3" id="q_11_2" checked>
          </label></td>
        <td><label>
            <input type="radio" name="q_11" value="4" id="q_11_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_11" value="5" id="q_11_4">
          </label></td>
      </tr>

      <tr>
        <th scope="row">2. Pace of the session/activity was suitable for me.</th>
        <td><label>
            <input type="radio" name="q_12" value="1" id="q_12_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_12" value="2" id="q_12_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_12" value="3" id="q_12_2" checked>
          </label></td>
        <td><label>
            <input type="radio" name="q_12" value="4" id="q_12_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_12" value="5" id="q_12_4">
          </label></td>
      </tr>

      <tr>
        <th scope="row">3.	Content was organized and easy to follow.</th>
        <td><label>
            <input type="radio" name="q_13" value="1" id="q_13_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_13" value="2" id="q_13_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_13" value="3" id="q_13_2" checked>
          </label></td>
        <td><label>
            <input type="radio" name="q_13" value="4" id="q_13_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_13" value="5" id="q_13_4">
          </label></td>
      </tr>

      <tr>
        <th scope="row">4.  The course provided appropriate balance between instruction and practice.</th>
        <td><label>
            <input type="radio" name="q_14" value="1" id="q_14_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_14" value="2" id="q_14_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_14" value="3" id="q_14_2" checked>
          </label></td>
        <td><label>
            <input type="radio" name="q_14" value="4" id="q_14_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_14" value="5" id="q_14_4">
          </label></td>
      </tr>

      <tr>
        <th scope="row">5.  The course helped me understand concepts more clearly.</th>
        <td><label>
            <input type="radio" name="q_15" value="1" id="q_15_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_15" value="2" id="q_15_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_15" value="3" id="q_15_2" checked>
          </label></td>
        <td><label>
            <input type="radio" name="q_15" value="4" id="q_15_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_15" value="5" id="q_15_4">
          </label></td>
      </tr>
    </tbody>
  </table>

  <table class="table table-bordered table-dark">
    <thead>
      <tr>
        <th scope="col"><h3><u>D. Printouts/ Training Aids  </u></h3></th>
        <th scope="col">Very Poor</th>
        <th scope="col">Fair</th>
        <th scope="col">Good</th>
        <th scope="col">Very Good</th>
        <th scope="col">Excellent</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1. The exercises helped me to learn the material.</th>
        <td><label>
            <input type="radio" name="q_16" value="1" id="q_16_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_16" value="2" id="q_16_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_16" value="3" id="q_16_2" checked>
          </label></td>
        <td><label>
            <input type="radio" name="q_16" value="4" id="q_16_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_16" value="5" id="q_16_4">
          </label></td>
      </tr>

      <tr>
        <th scope="row">2.There was enough time to cover all materials.</th>
        <td><label>
            <input type="radio" name="q_17" value="1" id="q_17_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_17" value="2" id="q_17_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_17" value="3" id="q_17_2" checked>
          </label></td>
        <td><label>
            <input type="radio" name="q_17" value="4" id="q_17_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_17" value="5" id="q_17_4">
          </label></td>
      </tr>

      <tr>
        <th scope="row">3.Materials distributed were relevant and useful.</th>
        <td><label>
            <input type="radio" name="q_18" value="1" id="q_18_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_18" value="2" id="q_18_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_18" value="3" id="q_18_2" checked>
          </label></td>
        <td><label>
            <input type="radio" name="q_18" value="4" id="q_18_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_18" value="5" id="q_18_4">
          </label></td>
      </tr>

      <tr>
        <th scope="row">4.  Material distributed helped clarify the topic and concepts.</th>
        <td><label>
            <input type="radio" name="q_19" value="1" id="q_19_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_19" value="2" id="q_19_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_19" value="3" id="q_19_2" checked>
          </label></td>
        <td><label>
            <input type="radio" name="q_19" value="4" id="q_19_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_19" value="5" id="q_19_4">
          </label></td>
      </tr>

      <tr>
        <th scope="row">5.  Material distributed was easy to understand and follow.</th>
        <td><label>
            <input type="radio" name="q_20" value="1" id="q_20_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_20" value="2" id="q_20_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_20" value="3" id="q_20_2" checked>
          </label></td>
        <td><label>
            <input type="radio" name="q_20" value="4" id="q_20_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_20" value="5" id="q_20_4">
          </label></td>
      </tr>    
    </tbody>
  </table>

  <table class="table table-bordered table-dark">
    <thead>
      <tr>
        <th scope="col"><h3><u>E. Organization  </u></h3></th>
        <th scope="col">Very Poor</th>
        <th scope="col">Fair</th>
        <th scope="col">Good</th>
        <th scope="col">Very Good</th>
        <th scope="col">Excellent</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1. The training was well organized.</th>
        <td><label>
            <input type="radio" name="q_21" value="1" id="q_21_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_21" value="2" id="q_21_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_21" value="3" id="q_21_2" checked>
          </label></td>
        <td><label>
            <input type="radio" name="q_21" value="4" id="q_21_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_21" value="5" id="q_21_4">
          </label></td>
      </tr>

      <tr>
        <th scope="row">2.The technical knowledge, background, and field of work for all delegates was well matched.</th>
        <td><label>
            <input type="radio" name="q_22" value="1" id="q_22_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_22" value="2" id="q_22_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_22" value="3" id="q_22_2" checked>
          </label></td>
        <td><label>
            <input type="radio" name="q_22" value="4" id="q_22_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_22" value="5" id="q_22_4">
          </label></td>
      </tr>

      <tr>
        <th scope="row">3.The catering provided was adequate.</th>
        <td><label>
            <input type="radio" name="q_23" value="1" id="q_23_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_23" value="2" id="q_23_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_23" value="3" id="q_23_2" checked >
          </label></td>
        <td><label>
            <input type="radio" name="q_23" value="4" id="q_23_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_23" value="5" id="q_23_4">
          </label></td>
      </tr>

      <tr>
        <th scope="row">4.  The training and visual aid provided was as required.</th>
        <td><label>
            <input type="radio" name="q_24" value="1" id="q_24_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_24" value="2" id="q_24_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_24" value="3" id="q_24_2" checked >
          </label></td>
        <td><label>
            <input type="radio" name="q_24" value="4" id="q_24_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_24" value="5" id="q_24_4">
          </label></td>
      </tr>

      <tr>
        <th scope="row">5.  The setting was comfortable and suitable for the needed activities.
  </th>
        <td><label>
            <input type="radio" name="q_25" value="1" id="q_25_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_25" value="2" id="q_25_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_25" value="3" id="q_25_2" checked >
          </label></td>
        <td><label>
            <input type="radio" name="q_25" value="4" id="q_25_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_25" value="5" id="q_25_4">
          </label></td>
      </tr>


      
    </tbody>
  </table>

  <table class="table table-bordered table-dark">
    <thead>
      <tr>
        <th scope="col"><h3><u>F. Benefits  </u></h3></th>
        <th scope="col">Very Poor</th>
        <th scope="col">Fair</th>
        <th scope="col">Good</th>
        <th scope="col">Very Good</th>
        <th scope="col">Excellent</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1. The session/activity satisfied my professional needs in this area.</th>
        <td><label>
            <input type="radio" name="q_26" value="1" id="q_26_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_26" value="2" id="q_26_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_26" value="3" id="q_26_2" checked >
          </label></td>
        <td><label>
            <input type="radio" name="q_26" value="4" id="q_26_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_26" value="5" id="q_26_4">
          </label></td>
      </tr>

      <tr>
        <th scope="row">2.I will be able to apply the knowledge learned.</th>
        <td><label>
            <input type="radio" name="q_27" value="1" id="q_27_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_27" value="2" id="q_27_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_27" value="3" id="q_27_2" checked >
          </label></td>
        <td><label>
            <input type="radio" name="q_27" value="4" id="q_27_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_27" value="5" id="q_27_4">
          </label></td>
      </tr>

      <tr>
        <th scope="row">3.The training enhanced my knowledge and skills.</th>
        <td><label>
            <input type="radio" name="q_28" value="1" id="q_28_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_28" value="2" id="q_28_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_28" value="3" id="q_28_2" checked >
          </label></td>
        <td><label>
            <input type="radio" name="q_28" value="4" id="q_28_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_28" value="5" id="q_28_4">
          </label></td>
      </tr>

      <tr>
        <th scope="row">4.I would recommend this training course to a colleague.</th>
        <td><label>
            <input type="radio" name="q_29" value="1" id="q_29_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_29" value="2" id="q_29_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_29" value="3" id="q_29_2" checked >
          </label></td>
        <td><label>
            <input type="radio" name="q_29" value="4" id="q_29_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_29" value="5" id="q_29_4">
          </label></td>
      </tr>

      <tr>
        <th scope="row">5.  The training was relevant to my job requirements.</th>
        <td><label>
            <input type="radio" name="q_30" value="1" id="q_30_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_30" value="2" id="q_30_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_30" value="3" id="q_30_2" checked >
          </label></td>
        <td><label>
            <input type="radio" name="q_30" value="4" id="q_30_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_30" value="5" id="q_30_4">
          </label></td>
      </tr>


      
    </tbody>
  </table>
  <table class="table table-bordered table-dark">
    <thead>
      <tr>
        <th scope="col"><h3><u>G. Satistfaction  </u></h3></th>
        <th scope="col">Very Poor</th>
        <th scope="col">Fair</th>
        <th scope="col">Good</th>
        <th scope="col">Very Good</th>
        <th scope="col">Excellent</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">How do you rate the training overall?</th>
        <td><label>
            <input type="radio" name="q_31" value="1" id="q_31_0">
        </label></td>
        <td><label>
            <input type="radio" name="q_31" value="2" id="q_31_1">
          </label></td>
        <td><label>
            <input type="radio" name="q_31" value="3" id="q_31_2" checked >
          </label></td>
        <td><label>
            <input type="radio" name="q_31" value="4" id="q_31_3">
          </label></td>
        <td><label>
            <input type="radio" name="q_31" value="5" id="q_31_4">
          </label></td>
      </tr>

      
    </tbody>
  </table>
    <li id="li_32" style="background-color:#343a40;">
      <label class="description" for="q_32" style="color:white;">32.	What part of the training was the most useful for your work?<br>
      <label style="padding-right:50px;">
      <br>
      <textarea name="q_32" cols="70" rows="6" id="q_32" placeholder="Enter the text here...">mosalah</textarea>
    </li>
      <li id="li_33" style="background-color:#343a40;">
      <label class="description" for="q_33" style="color:white;">33.	What part of the training was the least useful for your work? <br>
      <label style="padding-right:50px;">
      <br>
      <textarea name="q_33" cols="70" rows="6" id="q_33" placeholder="Enter the text here...">mosalah</textarea>
    </li>
        
    <li id="li_34" style="background-color:#343a40;">
      <label class="description" for="q_34" style="color:white;">34.	Please list three ideas or lessons that you learned during this training that you will implement in your work. <br>
      <label style="padding-right:50px;">
      <br>
      <textarea name="q_34" cols="70" rows="6" id="q_34" placeholder="Enter the text here...">mosalah</textarea>
    </li>
      <center>
        <input type="submit" class="btn btn-primary btn-pill" value="submit">
      </center>
      <div align="right">
        <a href='index.php'><input type="button" class="btn btn-primary btn-pill" value="home"></a>
      </div
  </form>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="css/jquery.fancybox.min.css">
<link rel="stylesheet" href="css/bootstrap-datepicker.css">
<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
<link rel="stylesheet" href="css/aos.css">
<link rel="stylesheet" href="css/style.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
<?php
  session_start();
  $db_host="cs4370.com";
  $db_user="g05web";
  $db_pword="uMc2@Ay{G$.e";
  $db_name="group05db";
  $db_port="3306";

  $conn = mysqli_connect($db_host,$db_user,$db_pword,$db_name,$db_port)or die("cannot connect");

  $sql="SELECT answer_id, COUNT(answer_id) FROM tbl_users_questions_answers WHERE question_id=1 GROUP BY answer_id";
  //$sql="SELECT DISTINCT tbl_surveys.type_id, COUNT(tbl_surveys.type_id) FROM tbl_surveys GROUP BY type_id";
  $getResults=mysqli_query($conn,$sql);
  $numRows=mysqli_num_rows($getResults);

  $gaming=0;
  $videoEdit=0;
  $soundEdit=0;
  $travel=0;
  $homeUse=0;

  for($i=0;$i<$numRows;$i++){
    $result=mysqli_fetch_array($getResults,MYSQLI_NUM);
    if($result[0]=="1"){
      $gaming=$result[1];
    }
    if($result[0]=="2"){
      $travel=$result[1];
    }
    if($result[0]=="5"){
      $videoEdit=$result[1];
    }
    if($result[0]=="4"){
      $homeUse=$result[1];
    }
    if($result[0]=="3"){
      $soundEdit=$result[1];
    }
  }

  mysqli_close($conn);
?>

<div class="panel panel-default" id="resultsByType">
  <div class="panel-heading">
    <h3 class="panel-title">Survey Results</h3>
  </div>
  <div>
    <table class="table">
      <tr>
        <th>Laptop Type</th>
        <th>Results</th>
      </tr>
      <tr>
        <td>Gaming</td>
        <td><?php echo $gaming;?></td>
      </tr>
      <tr>
        <td>Travel</td>
        <td><?php echo $travel;?></td>
      </tr>
      <tr>
        <td>Video Editing</td>
        <td><?php echo $videoEdit;?></td>
      </tr>
      <tr>
        <td>Home Use</td>
        <td><?php echo $homeUse;?></td>
      </tr>
      <tr>
        <td>Sound Editing</td>
        <td><?php echo $soundEdit;?></td>
      </tr>
    </table>
  </div>
</div>

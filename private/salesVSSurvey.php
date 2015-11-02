<?php
  session_start();
  $db_host="cs4370.com";
  $db_user="g05web";
  $db_pword="uMc2@Ay{G$.e";
  $db_name="group05db";
  $db_port="3306";

  $conn = mysqli_connect($db_host,$db_user,$db_pword,$db_name,$db_port)or die("cannot connect");


  $sql="SELECT answer_id, COUNT(answer_id) FROM tbl_users_questions_answers WHERE question_id=1 GROUP BY answer_id";
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

  $sql="SELECT tbl_type.type_id, COUNT(tbl_purchases.purchase_id) FROM tbl_purchases INNER JOIN tbl_laptops
  ON tbl_purchases.laptop_id=tbl_laptops.laptop_id INNER JOIN tbl_laptops_type
  ON tbl_laptops.laptop_id=tbl_laptops_type.laptop_id INNER JOIN tbl_type
  ON tbl_laptops_type.type_id=tbl_type.type_id GROUP BY tbl_type.type_id";

  $purchResults=mysqli_query($conn,$sql);
  $purchRow=mysqli_num_rows($purchResults);


  $gamingP=0;
  $videoEditP=0;
  $soundEditP=0;
  $travelP=0;
  $homeUseP=0;

  for($i=0;$i<$purchRow;$i++){
    $result=mysqli_fetch_array($purchResults,MYSQLI_NUM);
    //echo "hello";
    if($result[0]=="1"){
      $gamingP=$result[1];
    }
    if($result[0]=="2"){
      $travelP=$result[1];
    }
    if($result[0]=="3"){
      $videoEditP=$result[1];
    }
    if($result[0]=="4"){
      $homeUseP=$result[1];
    }
    if($result[0]=="5"){
      $soundEditP=$result[1];
    }
  }

  mysqli_close($conn);
?>

<div class="panel panel-default" id="resultsByType">
  <div class="panel-heading">
    <h3 class="panel-title">Sales and Survey Results</h3>
  </div>
  <div>
    <table class="table">
      <tr>
        <th>Laptop Types</th>
        <th>Survey Results</th>
        <th>Laptop Sales</th>
      </tr>
      <tr>
        <td>Gaming</td>
        <td><?php echo $gaming;?></td>
        <td><?php echo $gamingP;?></td>
      </tr>
      <tr>
        <td>Travel</td>
        <td><?php echo $travel;?></td>
        <td><?php echo $travelP;?></td>
      </tr>
      <tr>
        <td>Video Editing</td>
        <td><?php echo $videoEdit;?></td>
        <td><?php echo $videoEditP;?></td>
      </tr>
      <tr>
        <td>Home Use</td>
        <td><?php echo $homeUse;?></td>
        <td><?php echo $homeUseP;?></td>
      </tr>
      <tr>
        <td>Sound Editing</td>
        <td><?php echo $soundEdit;?></td>
        <td><?php echo $soundEditP;?></td>
      </tr>
    </table>
  </div>
</div>

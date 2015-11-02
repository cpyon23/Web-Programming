<?php

session_start();
$db_host="cs4370.com";
$db_user="g05web";
$db_pword="uMc2@Ay{G$.e";
$db_name="group05db";
$db_port="3306";

$conn = mysqli_connect($db_host,$db_user,$db_pword,$db_name,$db_port)or die("cannot connect");

$id;
$id2;

if($_SERVER['REQUEST_METHOD']=='GET'){
  $query=$_SERVER['QUERY_STRING'];
  //echo $query;
  parse_str($query,$matches);

  foreach ($matches as $values){
    $getSql="SELECT in_use FROM tbl_questions WHERE question_id='$values[0]'";
    $results=mysqli_query($conn,$getSql);
    $row=mysqli_fetch_array($results);
    if($row[0]=='Yes'){
      $sql="UPDATE tbl_questions SET in_use='No' WHERE question_id='$values[0]'";
    }else{
      $sql="UPDATE tbl_questions SET in_use='Yes' WHERE question_id='$values[0]'";
    }
    mysqli_query($conn,$sql);
  }
}

mysqli_close($conn);

?>

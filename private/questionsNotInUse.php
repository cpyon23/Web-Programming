<?php
session_start();
$db_host="cs4370.com";
$db_user="g05web";
$db_pword="uMc2@Ay{G$.e";
$db_name="group05db";
$db_port="3306";

$conn = mysqli_connect($db_host,$db_user,$db_pword,$db_name,$db_port)or die("cannot connect");


$sql="SELECT question_txt, question_id FROM tbl_questions WHERE in_use='No'";
$getResults=mysqli_query($conn,$sql);
$numRows=mysqli_num_rows($getResults);

echo "<table class=\"table table-striped\">";
echo "<tr>";
echo  "<th>Questions Not In Use</th>";
echo "</tr>";

for($i=0;$i<$numRows;$i++){
  $result=mysqli_fetch_row($getResults);
  echo "<tr>";
  echo  "<td>";
  echo    "<label>";
  echo      "<input type=\"checkbox\" name=\"notInUse$i\" value=\"$result[1]\">";
  echo        $result[0];
  echo    "</label>";
  echo  "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($conn);

?>

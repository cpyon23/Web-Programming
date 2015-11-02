<?php
session_start();
$db_host="cs4370.com";
$db_user="g05web";
$db_pword="uMc2@Ay{G$.e";
$db_name="group05db";
$db_port="3306";
$userNm=$_SESSION['user'];

$conn = mysqli_connect($db_host,$db_user,$db_pword,$db_name,$db_port)or die("cannot connect");

$sql= "SELECT tbl_answers.response, tbl_users_questions_answers.date_taken FROM tbl_answers INNER JOIN tbl_users_questions_answers
ON tbl_answers.answer_id=tbl_users_questions_answers.answer_id INNER JOIN tbl_users
ON tbl_users_questions_answers.user_id=tbl_users.user_id WHERE username='$userNm'
AND tbl_users_questions_answers.question_id=1 GROUP BY tbl_users_questions_answers.date_taken DESC";
$getTypes=mysqli_query($conn,$sql);
$numRows=mysqli_num_rows($getTypes);

$sql= "SELECT tbl_answers.response, tbl_users_questions_answers.date_taken FROM tbl_answers INNER JOIN tbl_users_questions_answers
ON tbl_answers.answer_id=tbl_users_questions_answers.answer_id INNER JOIN tbl_users
ON tbl_users_questions_answers.user_id=tbl_users.user_id WHERE username='$userNm'
AND tbl_users_questions_answers.question_id=5 GROUP BY tbl_users_questions_answers.date_taken DESC";

$getPrices = mysqli_query($conn,$sql);


echo "<table class=\"table table-striped\">";
echo "<tr>";
echo  "<th>Date</th><th>Type</th><th>Price</th>";
echo "</tr>";

for($i=0;$i<$numRows;$i++){
  $type=mysqli_fetch_row($getTypes);
  $prices=mysqli_fetch_row($getPrices);
  echo "<tr>";
  echo  "<td>";
  echo    $type[1];
  echo  "</td>";
  echo  "<td>";
  echo    $type[0];
  echo  "</td>";
  echo  "<td>";
  echo    $prices[0];
  echo  "</td>";
  echo "</tr>";
}
echo "</table>";


mysqli_close($conn);
?>

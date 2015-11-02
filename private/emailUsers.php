<?php

session_start();
$db_host="cs4370.com";
$db_user="g05web";
$db_pword="uMc2@Ay{G$.e";
$db_name="group05db";
$db_port="3306";

$conn = mysqli_connect($db_host,$db_user,$db_pword,$db_name,$db_port)or die("cannot connect");

$sql="SELECT * FROM tbl_answers, tbl_user_question_answers, tbl_users, tbl_laptops_type, tbl_laptops
INNER JOIN tbl_user_question_answers ON tbl_users.user_id = tbl_user_question_answers.user_id
INNER JOIN tbl_answers ON tbl_user_question_answers.answer_id = tbl_answers.answer_id
INNER JOIN tbl_laptops_type ON tbl_answers.answer_txt = tbl_laptops_type.type_id
INNER JOIN tbl_laptops ON tbl_laptops_type.laptop_id = tbl_laptops.laptop_id";


$results = $mysqli->query = ("SELECT email FROM tbl_laptops WHERE tbl_laptops.on_sale = 'Yes'");
$subject = "New Laptops On Sale!!";
$body = "We currently have laptops on sale that fit your survey responses.";
$header = "Content-Type: text/plain; charset=utf-8\r\n";
mail($results,$subject,$body,$header);
?>

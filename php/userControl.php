<?php
session_start();

$db_host="cs4370.com";
$db_user="g05web";
$db_pword="uMc2@Ay{G$.e";
$db_name="group05db";
$db_port="3306";

$conn = mysqli_connect($db_host,$db_user,$db_pword,$db_name,$db_port)or die("cannot connect");

if($_SESSION['user']!=null){
  $usernm=$_SESSION['user'];
  $pword1=$_SESSION['pword'];
  $sql="SELECT username, password FROM tbl_users
        WHERE username='$usernm'AND password='$pword1'";
  $checkInfo=mysqli_query($conn,$sql);

  if(mysqli_num_rows($checkInfo)=='1'){
    echo $_SESSION['creds'];
  }
}

/*
$username;
$password;

if(isset($_SESSION['username'])){
  $sql="SELECT username, password FROM tbl_users WHERE username='$_SESSION['username']'
  AND password='$_SESSION['password']'";
  $checkInfo=mysqli_query($conn,$sql);

  if(mysqli_num_rows($checkInfo)=='1'){
    $username=$_SESSION['username'];
    $password=$_SESSION['password'];
  }
}
*/
mysqli_close($conn);
?>

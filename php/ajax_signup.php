<?php
session_start();
$db_host="cs4370.com";
$db_user="g05web";
$db_pword="uMc2@Ay{G$.e";
$db_name="group05db";
$db_port="3306";

$conn = mysqli_connect($db_host,$db_user,$db_pword,$db_name,$db_port)or die("cannot connect");

$useremail="";
$pword="";
$usname="";
if($_SERVER['REQUEST_METHOD']=='POST'){
  $useremail=testInput($_POST['email']);
  $pword=testInput($_POST['password']);
  $usname=testInput($_POST['username']);
}

$emailSQL="SELECT username email FROM tbl_users WHERE email='$useremail'OR username='$usname'";
$checkEmailNumber=mysqli_query($conn,$emailSQL);
$result=mysqli_fetch_array($checkEmailNumber,MYSQLI_NUM);

if(mysqli_num_rows($checkEmailNumber)=='1'){
  if($result[0]==$usname){
    echo "Error: Username Already Taken";
  } else{
      echo "Error: Email Already Taken";
  }
} else{
  $sql="INSERT INTO tbl_users VALUES (NULL,'$usname','$pword','$useremail','user')";

  if(mysqli_query($conn,$sql)){
    $_SESSION['user']=$usname;
    $_SESSION['pword']=$pword;
    $_SESSION['cred']="user";
    echo "Username Added";
  }
  }
  function testInput($info){
    $info=trim($info);
    $info=stripslashes($info);
    $info=htmlspecialchars($info);
    return $info;
  }

mysqli_close($conn);

?>

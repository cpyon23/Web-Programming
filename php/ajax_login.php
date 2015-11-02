<?php
session_start();
$db_host="cs4370.com";
$db_user="g05web";
$db_pword="uMc2@Ay{G$.e";
$db_name="group05db";
$db_port="3306";

$conn = mysqli_connect($db_host,$db_user,$db_pword,$db_name,$db_port)or die("cannot connect");
/*
if($conn){
  echo "HelloWorld";
}
*/
$pword="";
$usname="";
$type="";
if($_SERVER['REQUEST_METHOD']=='POST'){
  $usname=testInput($_POST['username']);
  $pword=testInput($_POST['password']);
}

$sql="SELECT password,adminOruser FROM tbl_users WHERE username='$usname'";
$checkForUser=mysqli_query($conn,$sql);
$result=mysqli_fetch_array($checkForUser,MYSQLI_NUM);

if (mysqli_num_rows($checkForUser)=='0'){
  echo "Error: Username not found";
} else if (mysqli_num_rows($checkForUser)=='1'){
  if($result[0]!=$pword){
    echo "Error: Incorrect Password";
  }else{
    $_SESSION['user']=$usname;
    $_SESSION['pword']=$pword;
    $_SESSION['creds']=$result[1];
    if($_SESSION['creds']=="user"){
      echo "1";
    }
    if($_SESSION['creds']=="admin"){
      echo "2";
    }
  }
}

/*
if(mysqli_num_rows($checkForUser)=='1'){
  if($sql[])
}
*/
function testInput($info){
  $info=trim($info);
  $info=stripslashes($info);
  $info=htmlspecialchars($info);
  return $info;
}
mysqli_close($conn);
?>

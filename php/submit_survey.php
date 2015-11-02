<?php
  session_start();
  $db_host="cs4370.com";
  $db_user="g05web";
  $db_pword="uMc2@Ay{G$.e";
  $db_name="group05db";
  $db_port="3306";

  $conn = mysqli_connect($db_host,$db_user,$db_pword,$db_name,$db_port)or die("cannot connect");
  $num;
  $userName=$_SESSION['user'];
  $sql="SELECT user_id FROM tbl_users WHERE username='$userName'";
  $result=mysqli_query($conn,$sql);
  $userId=mysqli_fetch_array($result);
  $id=$userId[0];
  date_create();
  $date = date_format(date_create(), 'Y-m-d H:i:s');



  if($_SERVER['REQUEST_METHOD']=='GET'){
    echo $_SESSSION['QUERY_STRING'];
    echo $_GET['type'];
    echo $_GET['lightweight'];
    echo $_GET['largeScreen'];
    echo $_GET['smallScreen'];
    echo $_GET['price'];
    echo $_GET['brand'];
    echo $_GET['use'];
    echo $userId[0];
    echo $date;


    if($_GET['type']){ //question 1
      $num=$_GET['type'];
      $sql="INSERT INTO tbl_users_questions_answers VALUES (NULL,'1','$num','$id','$date')";
      mysqli_query($conn,$sql);
    }
    if($_GET['lightweight']){ //question 2
      $num=$_GET['lightweight'];
      $sql="INSERT INTO tbl_users_questions_answers VALUES (NULL,'2','$num','$id','$date')";
      mysqli_query($conn,$sql);
    }
    if($_GET['largeScreen']){ //question 3
      $num=$_GET['largeScreen'];
      $sql="INSERT INTO tbl_users_questions_answers VALUES (NULL,'3','$num','$id','$date')";
      mysqli_query($conn,$sql);
    }
    if($_GET['smallScreen']){ //question 4
      $num=$_GET['smallScreen'];
      $sql="INSERT INTO tbl_users_questions_answers VALUES (NULL,'4','$num','$id','$date')";
      mysqli_query($conn,$sql);
    }
    if($_GET['price']){ //question 5
      $num=$_GET['price'];
      $sql="INSERT INTO tbl_users_questions_answers VALUES (NULL,'5','$num','$id','$date')";
      mysqli_query($conn,$sql);
    }
    if($_GET['brand']){ //question 6
      $num=$_GET['brand'];
      $sql="INSERT INTO tbl_users_questions_answers VALUES (NULL,'6','$num','$id','$date')";
      mysqli_query($conn,$sql);
    }
    if($_GET['use']){ //question 7
      $num=$_GET['use'];
      $sql="INSERT INTO tbl_users_questions_answers VALUES (NULL,'7','$num','$id','$date')";
      mysqli_query($conn,$sql);
    }
  }

  mysqli_close($conn);
?>

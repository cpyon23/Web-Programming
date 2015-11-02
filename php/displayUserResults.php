<?php
session_start();
$db_host="cs4370.com";
$db_user="g05web";
$db_pword="uMc2@Ay{G$.e";
$db_name="group05db";
$db_port="3306";
$userNm=$_SESSION['user'];
//$userNm="tomJefferson";


$conn = mysqli_connect($db_host,$db_user,$db_pword,$db_name,$db_port)or die("cannot connect");

$sql = "SELECT date_taken FROM tbl_users_questions_answers INNER JOIN tbl_users
        ON tbl_users_questions_answers.user_id=tbl_users.user_id WHERE username='$userNm'
        ORDER BY date_taken DESC
        LIMIT 1";

$getDate=mysqli_query($conn,$sql);
$date=mysqli_fetch_array($getDate);
$recentDate=$date[0];

$sql="SELECT question_id, tbl_users_questions_answers.answer_id, response
      FROM tbl_answers INNER JOIN tbl_users_questions_answers ON tbl_answers.answer_id=tbl_users_questions_answers.answer_id
      INNER JOIN tbl_users ON tbl_users_questions_answers.user_id=tbl_users.user_id
      WHERE username='$userNm' AND date_taken='$recentDate'";

$getResults=mysqli_query($conn,$sql);
$numRows=mysqli_num_rows($getResults);

$type="";
$weight="";
$screenSize="";
$price="";
$brand="";
$use="";
$info="";


for($i=0;$i<$numRows;$i++){
  $result=mysqli_fetch_row($getResults);
  //echo $result[1]." ".$result[2]. " ";

  if($result[0]=='1'){ //Type of laptop
    $info=$result[2];
    $type= "tbl_type.type_name='$result[2]'";
  }
  if($result[0]=='2'){//Weight of laptop
    if($result[1]=='6'){
      $weight="tbl_laptops.weight<=5 ";
    }else{
      $weight="tbl_laptops.weight<20 ";
    }
  }
  if($result[0]=='3'){//Large Screen of laptop
    if($result[1]=='8'){//yes for large
      $screenSize="  tbl_laptops.screen_size>15.0 AND ";
    }else{
      $screenSize=" tbl_laptops.screen_size<=15.0 AND ";
    }
  }
  if($result[0]=='4'){//Small Screen of laptop
    if($result[1]=='10'){//yes for small
      $screenSize=" tbl_laptops.screen_size<15.0  ";
    }else{
      $screenSize=" tbl_laptops.screen_size>=15.0 ";
    }
  }
  if($result[0]=='5'){//Price of laptop
    if($result[1]=='12'){
      $price="tbl_laptops.price<=149.99";
    }
    if($result[1]=='13'){
      $price="tbl_laptops.price<=200.00 ";
    }
    if($result[1]=='14'){
      $price="tbl_laptops.price<=250.00";
    }
    if($result[1]=='15'){
      $price="tbl_laptops.price<=500.00";
    }
    if($result[1]=='16'){
      $price="tbl_laptops.price<=750.00";
    }
    if($result[1]=='17'){
      $price="tbl_laptops.price<=1000.00";
    }
    if($result[1]=='18'){
      $price="tbl_laptops.price<=1250.00";
    }
    if($result[1]=='19'){
      $price="tbl_laptops.price<=1500.00";
    }
    if($result[1]=='20'){
      $price="tbl_laptops.price<=2000.00";
    }
    if($result[1]=='21'){
      $price="tbl_laptops.price<20000.00";
    }
  }
  if($result[0]=='6'){//Brand of laptop
    if($result[1]=='31'){
      continue;
    }else{
      $brand=" AND brand_name='$result[2]'";
    }

  }
}

$sql = "SELECT tbl_laptops.laptop_id, tbl_laptops.name, tbl_laptops.price,
tbl_laptops.ram, tbl_laptops.memory,tbl_laptops.screen_size,
tbl_brands.brand_name, tbl_type.type_info_txt, tbl_laptops.img_source FROM tbl_laptops INNER JOIN tbl_laptops_brands ON
tbl_laptops.laptop_id=tbl_laptops_brands.laptop_id INNER JOIN tbl_brands
ON tbl_laptops_brands.brand_id=tbl_brands.brand_id INNER JOIN tbl_laptops_type
ON tbl_laptops.laptop_id=tbl_laptops_type.laptop_id INNER JOIN tbl_type
ON tbl_laptops_type.type_id=tbl_type.type_id WHERE $type AND $price AND
$screenSize $brand $weight ORDER BY tbl_laptops.price DESC LIMIT 4";  //continue building out this script
//echo $sql;
$laptopResults=mysqli_query($conn,$sql);
$laptopRows=mysqli_num_rows($laptopResults);
$sql="SELECT type_info_txt FROM tbl_type WHERE type_name='$info'";
$temp=mysqli_query($conn,$sql);
$infotxt=mysqli_fetch_array($temp);
//echo $laptopRows;






echo "<div class=\"row\">";
if($laptopRows!='0'){
  for($i=0;$i<$laptopRows;$i++){
    $row=mysqli_fetch_row($laptopResults);
    $bname=$row[6];
    $screen=$row[5];
    $lname=$row[1];
    $img=$row[8];
    echo "<a href=\"\">";
    echo "<div class=\"col-xs-3\">";
    echo "<div class=\"row\">";
    echo "<div class=\"col-xs-12\">";
    echo "<img class=\"img-responsive\" src=\"$img\">";
    echo "</div>";
    echo "</div>";
    echo "<div class=\"row\">";
    echo "<div class=\"col-xs-12\">";
    echo  "$bname ";
    echo "$screen ";
    echo "$lname ";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</a>";
  }

  echo    "</div>
        <div class=\"row\">
          <div class=\"col-xs-12\">
          <h4>Buyer's Guide</h4>
            <p>$infotxt[0]</p>
          </div>
          </div>";

}else{
  /*
  $temp=mysqli_fetch_array($laptopResults);
  $sql="SELECT type_info_txt FROM tbl_type WHERE type_name='$info'";
  $temp=mysqli_query($conn,$sql);
  $infotxt=mysqli_fetch_array($temp);
  */
  echo "<div class=\"col-xs-12\">";
  echo "<h4>Sorry No recommended laptops based on you results,
  though you can use the buying guide below</h4>";
  echo "</div>";
  echo "<div class=\"row\">";
  echo  "<div class=\"col-xs-10 col-xs-offset-1\">";
  echo "<h4>Buyer's Guide</h4>";

  echo  "<p>$infotxt[0]</p>
    </div>
    </div>
    </div>";
}
mysqli_close($conn);

?>

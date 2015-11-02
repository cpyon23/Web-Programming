 <?php
session_start();
$db_host="cs4370.com";
$db_user="g05web";
$db_pword="uMc2@Ay{G$.e";
$db_name="group05db";
$db_port="3306";

$conn = mysqli_connect($db_host,$db_user,$db_pword,$db_name,$db_port)or die("cannot connect");

$sql="SELECT question_id, question_txt FROM tbl_questions WHERE in_use='Yes'";
$getResults=mysqli_query($conn,$sql);
$numRows=mysqli_num_rows($getResults);

for($i=0;$i<$numRows;$i++){
  $result=mysqli_fetch_row($getResults);
  if($result[0]=='1'){
    echo "<div class=\"form-group\">
          $result[1]
          <br>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"type\" value=\"1\" required>Gaming
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"type\" value=\"2\">Travel
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"type\" value=\"3\">Sound Editing
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"type\" value=\"4\">Home Use
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"type\" value=\"5\">Video Editing
            </label>
          </div>";
  }
  if($result[0]=='2'){
    echo "<div class=\"form-group\">
          $result[1]
          <br>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"lightweight\" value=\"6\" required>Yes
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"lightweight\" value=\"7\">No
            </label>
          </div>";
  }
  if($result[0]=='3'){
    echo "<div class=\"form-group\">
          $result[1]
          <br>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"largeScreen\" value=\"8\" required>Yes
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"largeScreen\" value=\"9\">No
            </label>
          </div>";
  }
  if($result[0]=='4'){
    echo "<div class=\"form-group\">
          $result[1]
          <br>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"smallScreen\" value=\"10\" required>Yes
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"smallScreen\" value=\"11\">No
            </label>
          </div>";
  }
  if($result[0]=='5'){
    echo "<div class=\"form-group\">
          $result[1]
          <br>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"price\" value=\"12\" required>$100.00 - $149.99
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"price\" value=\"13\">$150.00 - $199.99
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"price\" value=\"14\">$200.00 - $249.99
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"price\" value=\"15\">$250.00 - $499.99
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"price\" value=\"16\">$500.00 - $749.99
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"price\" value=\"17\">$750.00 - $999.99
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"price\" value=\"18\">$1000.00 - $1249.99
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"price\" value=\"19\">$1250.00 - $1499.99
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"price\" value=\"20\">$1500.00 - $1999.99
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"price\" value=\"21\">$2000.00 - $2499.99
            </label>
          </div>";
  }
  if($result[0]=='6'){
    echo "<div class=\"form-group\">
          $result[1]
          <br>
            <label class=\"radio-inline\" required>
              <input type=\"radio\" name=\"brand\" value=\"22\">Apple
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"brand\" value=\"23\">Acer
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"brand\" value=\"24\">HP
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"brand\" value=\"25\">Asus
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"brand\" value=\"26\">Lenovo
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"brand\" value=\"27\">Dell
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"brand\" value=\"28\">MSI
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"brand\" value=\"29\">Cyberpower PC
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"brand\" value=\"30\">Samsung
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"brand\" value=\"31\">All the Above
            </label>
          </div>";
  }
  if($result[0]=='7'){
    echo "<div class=\"form-group\">
          $result[1]
          <br>
            <label class=\"radio-inline\" required>
              <input type=\"radio\" name=\"use\" value=\"32\">Often
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"use\" value=\"33\">Sometimes
            </label>
            <label class=\"radio-inline\">
              <input type=\"radio\" name=\"use\" value=\"34\">Never
            </label>
          </div>";
  }
}

mysqli_close($conn);
?>

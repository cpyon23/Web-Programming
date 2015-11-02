<?php
session_start();
$db_host="cs4370.com";
$db_user="g05web";
$db_pword="uMc2@Ay{G$.e";
$db_name="group05db";
$db_port="3306";

$conn = mysqli_connect($db_host,$db_user,$db_pword,$db_name,$db_port)or die("cannot connect");
$sql = "SELECT tbl_laptops.laptop_id, tbl_laptops.name, tbl_laptops.price,
tbl_laptops.ram, tbl_laptops.memory,tbl_laptops.os, tbl_laptops.screen_size,
tbl_laptops.processor, tbl_brands.brand_name, tbl_laptops.img_source FROM tbl_laptops INNER JOIN tbl_laptops_brands ON tbl_laptops.laptop_id=tbl_laptops_brands.laptop_id
INNER JOIN tbl_brands ON tbl_laptops_brands.brand_id=tbl_brands.brand_id";
$result = $conn->query($sql);

echo "<div class=\"table-responsive\"><table class=\"table table-striped\">
<tr>
<th>Laptops</th>
<th>Name</th>
<th>Ram</th>
<th>Memory</th>
<th>Processor</th>
<th>OS</th>
<th>Price</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
?>

<td><img src="<?php echo $row['img_source'];?>" style="width:100px;height:75px"/>
<?php
echo "<td>" . $row['brand_name'] . " " .$row['screen_size'] ." ".$row['name']. "</td>";
echo "<td>" . $row['ram'] . "</td>";
echo "<td>" . $row['memory'] . "</td>";
echo "<td>" . $row['processor'] . "</td>";
echo "<td>" . $row['os'] ."</td>";
echo "<td>" . $row['price'] . "</td>";
echo "</tr>";
}
echo "</table></div>";

$conn->close();

?>

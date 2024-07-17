<?php
$con=mysqli_connect("localhost","root","","POS");

if(!$con){
   die("Connection failed".mysqli_connect_error());

}

$sql = "SELECT * FROM `tax_types`";
$result = mysqli_query($con, $sql);

$tax_types = array();
while ($row = mysqli_fetch_assoc($result)) {
    $tax_types[] = $row;
}

echo json_encode($tax_types);

mysqli_close($con);
?>
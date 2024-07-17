<?php
$con=mysqli_connect("localhost","root","","POS");
if(!$con){
    die("Could not connect".mysqli_connect_error());
}

$sql = "SELECT * FROM `category`";
$result = mysqli_query($con, $sql);

$categories = array();
while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row;
}

echo json_encode($categories);

mysqli_close($con);
?>
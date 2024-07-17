<?php
$con=mysqli_connect("localhost","root","","POS");

if(!$con){
    die("Connection failed".mysqli_connect_error());
}

$sql= "SELECT * FROM `units`";
$result=mysqli_query($con,$sql);

$units=array();
        while($row=mysqli_fetch_array($result)){
            $units[] = $row;
        }

        echo json_encode($units);

mysqli_close($con);
?>
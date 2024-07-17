<?php
$con = mysqli_connect("localhost", "root", "", "POS");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = mysqli_real_escape_string($con, $_POST['product_name']);
    $category_name = mysqli_real_escape_string($con, $_POST['category_name']);
    $unit_name = mysqli_real_escape_string($con, $_POST['unit_name']);
    $tax_type = mysqli_real_escape_string($con, $_POST['tax_type']);
    $color = mysqli_real_escape_string($con, $_POST['color']);
    $serial = mysqli_real_escape_string($con, $_POST['serial']);
    $reorder_level = mysqli_real_escape_string($con, $_POST['reorder_level']);
    $availability = mysqli_real_escape_string($con, $_POST['availability']);
    $quantity_predefined = mysqli_real_escape_string($con, $_POST['quantity_predefined']);
    $class = mysqli_real_escape_string($con, $_POST['class']);
    $buying_price = mysqli_real_escape_string($con, $_POST['buying_price']);
    $markup_percentage = mysqli_real_escape_string($con, $_POST['markup_percentage']);
    $marked_price = mysqli_real_escape_string($con, $_POST['marked_price']);
    $opening_stock = mysqli_real_escape_string($con, $_POST['opening_stock']);
    $narrative = mysqli_real_escape_string($con, $_POST['narrative']);
    $active = mysqli_real_escape_string($con, $_POST['active']);

    $sql_insert = "INSERT INTO `add_to_inventory`(`product_name`, `category_name`, `unit_name`, `tax_type`, `color`, `serial`, `reorder_level`, `availability`, `quantity_predefined`, `class`, `unit_buying_price`, `markup_percentage`, `marked_price`, `opening_stock`, `narrative`, `active`)
                   VALUES ('$product_name', '$category_name', '$unit_name', '$tax_type', '$color', '$serial', '$reorder_level', '$availability', '$quantity_predefined', '$class', '$buying_price', '$markup_percentage', '$marked_price', '$opening_stock', '$narrative', '$active')";

    if (mysqli_query($con, $sql_insert)) {
        echo "Product added successfully";
    } else {
        echo "Error: " . $sql_insert . "<br>" . mysqli_error($con);
    }
}

mysqli_close($con);
?>

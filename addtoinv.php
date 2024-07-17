<?php
$con = mysqli_connect("localhost", "root", "", "POS");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get all the categories from category table
$sql_categories = "SELECT * FROM category";
$all_categories = mysqli_query($con, $sql_categories);
if (!$all_categories) {
    die("Error fetching categories: " . mysqli_error($con));
}

// Get all the products from product table
$sql_products = "SELECT * FROM product";
$all_products = mysqli_query($con, $sql_products);
if (!$all_products) {
    die("Error fetching products: " . mysqli_error($con));
}

// Get all the brands from brand table
$sql_brands = "SELECT * FROM brand";
$all_brands = mysqli_query($con, $sql_brands);
if (!$all_brands) {
    die("Error fetching brands: " . mysqli_error($con));
}

// Get all the units from unit table
$sql_units = "SELECT * FROM units";
$all_units = mysqli_query($con, $sql_units);
if (!$all_units) {
    die("Error fetching units: " . mysqli_error($con));
}

// Get all the units from unit table
$sql_tax_type = "SELECT * FROM tax type";
$all_tax_type = mysqli_query($con, $sql_tax_type);
if (!$all_tax_type) {
    die("Error fetching units: " . mysqli_error($con));
}

// process form submission
if (isset($_POST['submit'])) {
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

    $sql_insert = "INSERT INTO add_to_inventory(name, category, units, tax_type, color, serial, reorder_level, availability, quantity_predefined, class, buying_price, markup_percentage, marked_price, opening_stock, narrative, active)
                   VALUES ('$product_name', '$category_name', '$unit_name', '$tax_type', '$color', '$serial', '$reorder_level', '$availability', '$quantity_predefined', '$class', '$buying_price', '$markup_percentage', '$marked_price', '$opening_stock', '$narrative', '$active')";

    if (mysqli_query($con, $sql_insert)) {
        echo '<script>alert("Product added successfully")</script>';
    } else {
        echo '<script>alert("Error adding product: ' . mysqli_error($con) . '")</script>';
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
</head>
<body>
    <form method="POST" action="">
        <label for="product_name">Name</label>
        <input type="text" id="product_name" name="product_name" placeholder="Enter name"><br>

        <br>

        <label for="category">Category</label>
        <select id="category" name="category_name">
            <option value="">--Select a Category--</option>
            <?php 
                while ($category = mysqli_fetch_array($all_categories, MYSQLI_ASSOC)): 
            ?>
                <option value="<?php echo $category["category_name"]; ?>">
                    <?php echo $category["category_name"]; ?>
                </option>
            <?php 
                endwhile;
            ?>
        </select>
        <br>

        <label for="unit">Unit</label>
        <select id="unit" name="unit_name">
            <option value="">--Select a Unit--</option>
            <?php 
                while ($unit = mysqli_fetch_array($all_units, MYSQLI_ASSOC)): 
            ?>
                <option value="<?php echo $unit["unit_name"]; ?>">
                    <?php echo $unit["unit_name"]; ?>
                </option>
            <?php 
                endwhile;
            ?>
        </select>
        <br>

        <label for="tax_type">  Tax type</label>
        <select id="tax_type" name="tax_type">
            <option value="">--Select tax type--</option>
            <?php 
                while ($tax_type = mysqli_fetch_array($all_tax_type, MYSQLI_ASSOC)): 
            ?>
                <option value="<?php echo $tax_type["tax_name"]; ?>">
                    <?php echo $tax_type["tax_name"]; ?>
                </option>
            <?php 
                endwhile;
            ?>
        </select>
        <br>


        <label for="color"> Color:</label><br>
        <select name="color" id="color">
            <option value="">--Select Color--</option>
            <option value="red">Red</option>
            <option value="blue">Blue</option>
            <option value="black">Black</option>
            <option value="maroon">Maroon</option>            
        
        </select>
        <br>

        



        <label for="serial">Serial:</label><br>
        <input type="text" id="serial" name="serial" placeholder="SKU/Serial/Barcode etc"><br>

        <label for="reorder_level">Reorder Level:</label><br>
        <input type="text" id="reorder_level" name="reorder_level" placeholder=""><br>

        <label for="availability">Availability:</label><br>
        <input type="text" id="availability" name="availability"><br>

        <label for="quantity_predefined">Quantity Predefined:</label><br>
        <input type="text" id="quantity_predefined" name="quantity_predefined"><br>

        <label for="class">Class:</label><br>
        <input type="text" id="class" name="class"><br>

        <label for="buying_price">Unit Buying Price:</label><br>
        <input type="text" id="buying_price" name="buying_price"><br>

        <label for="markup_percentage">Markup Percentage:</label><br>
        <input type="text" id="markup_percentage" name="markup_percentage"><br>

        <label for="marked_price">Marked Price:</label><br>
        <input type="text" id="marked_price" name="marked_price"><br>

        <label for="opening_stock">Opening Stock:</label><br>
        <input type="text" id="opening_stock" name="opening_stock"><br>

        <label for="narrative">Narrative:</label><br>
        <input type="text" id="narrative" name="narrative"><br>

        <label for="active">Active:</label><br>
        <input type="text" id="active" name="active"><br>

        <input type="submit" value="submit" name="submit">
    </form>
    
  
</body>
</html>
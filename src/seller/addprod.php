<?php
include "../../includes/session.php";
include "../../includes/conn.php";

$sql = "INSERT INTO item (productID,product_name,sellerID, product_category, product_description,product_price,stock_quantity)
        VALUES ('$_POST[productID]','$_POST[product_name]','$_SESSION[sellerID]', '$_POST[product_category]', '$_POST[product_description]', '$_POST[product_price]', '$_POST[stock_quantity]')";

if (!mysqli_query($con, $sql)) {
    die("Error: " . mysqli_error($con));
}

// if (isset($_FILES['imageData'])) {
echo "<script>alert('image!')</script>";
$image = $_FILES["imageData"]["tmp_name"];
$img = file_get_contents($image);
$sql = "INSERT INTO product_images (productID, image_alt_text, imageData)
        VALUES ('$_POST[productID]','$_POST[image_alt_text]', ?)";

$statement = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($statement, "s", $img);

if (!mysqli_stmt_execute($statement)) {
    echo "<script>alert('1 record added but image upload is unsuccessful!');</script>";
    die("Error: " . mysqli_error($con));
}
// }

echo "<script>alert('1 record added!');window.location.href='../index.php';</script>";

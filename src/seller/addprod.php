<?php
session_start();
include "../../includes/conn.php";

$sql = "INSERT INTO item (productID,product_name,sellerID, product_category, product_description,product_price,stock_quantity)
VALUES ('$_POST[productID]','$_POST[product_name]','$_SESSION[sellerID]', '$_POST[product_category]', '$_POST[product_description]', '$_POST[product_price]', '$_POST[stock_quantity]')";

if (!mysqli_query($con, $sql)) {
    die("Error: " . mysqli_error($con));
} else {
    echo "<script>alert('1 record added!');window.location.href='../index.php';</script>";
}

?>
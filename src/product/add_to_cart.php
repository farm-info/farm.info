<?php
include '../../includes/session.php';
include "../../includes/conn.php";

$query =
    "INSERT INTO cart (customerID, productID, quantity)
    VALUES (?, ?, ?)";
$statement = $con->prepare($query);
$statement->bind_param("ssi", $_POST['customerID'], $_POST['productID'], $_POST['quantity']);


if ($statement->execute()) {
    die("Error: " . mysqli_error($con));
} else {
    echo "<script>alert('Added to cart!');window.location.href='farm.info/src/product/index.php';</script>";
}

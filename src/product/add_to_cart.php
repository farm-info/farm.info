<?php
include '../../includes/session.php';
include "../../includes/conn.php";

$query = "INSERT INTO cart (customerID, productID, quantity)
        VALUES (?, ?, ?)
        ON DUPLICATE KEY UPDATE quantity = quantity + VALUES(quantity)";
$statement = $con->prepare($query);
$statement->bind_param("ssi", $_POST['customerID'], $_POST['productID'], $_POST['quantity']);
$statement->execute();

if ($statement->affected_rows > 0) {
    echo "<script>alert('Added to cart!');window.location.href='cart.php';</script>";
} else {
    die("Error: " . mysqli_error($con));
}
exit();

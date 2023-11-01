<?php
include '../../includes/session.php';
include "../../includes/conn.php";

$query =
    "SELECT quantity FROM cart
    WHERE customerID = ? AND productID = ?";
$statement = $con->prepare($query);
$statement->bind_param("ss", $_POST['customerID'], $_POST['productID']);
$statement->execute();
$result = $statement->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // convert both to integer before adding them
    $quantity = (int) $row['quantity'] + (int) $_POST['quantity'];
    $query =
        "UPDATE cart SET quantity = ?
        WHERE customerID = ? AND productID = ?";
    $statement = $con->prepare($query);
    $statement->bind_param("iss", $quantity, $_POST['customerID'], $_POST['productID']);

} else {
    $query =
        "INSERT INTO cart (customerID, productID, quantity)
        VALUES (?, ?, ?)";
    $statement = $con->prepare($query);
    $statement->bind_param("ssi", $_POST['customerID'], $_POST['productID'], $_POST['quantity']);
}

if ($statement->execute()) {
    echo "<script>alert('Added to cart!');</script>";
} else {
    die("Error: " . mysqli_error($con));
}
exit();

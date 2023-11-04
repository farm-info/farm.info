<?php
include "../../includes/conn.php"; 

// Check if the required parameters are set
if (isset($_GET['customerID']) && isset($_GET['productID']) && isset($_GET['quantity']) && isset($_GET['total_price'])) {
    $customerID = $_GET['customerID'];
    $productID = $_GET['productID'];
    $quantity = $_GET['quantity'];
    $total_price = $_GET['total_price'];

    $sql = "DELETE FROM cart WHERE customerID = ? AND productID = ? AND quantity = ? AND total_price = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "iii", $customerID, $productID, $quantity, $total_price); 

        if (mysqli_stmt_execute($stmt)) {
            echo "Item deleted successfully from the cart.";
        } else {
            echo "Failed to delete item from the cart.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error in preparing the statement.";
    }

} else {
    echo "<script>alert('Please provide customerID, productID, and quantity for item deletion.');window.location.href='../index.php';</script>";
}
?>

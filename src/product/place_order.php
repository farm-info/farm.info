<?php
$title = "Place Order";
include "../../includes/top.php";

if (!($loggedIn && !$loggedInAsSeller)) {
    header("Location: ../account/login.php");
    exit();
}

if (!isset($_SESSION["checkout_items"])) {
    header("Location: ../product/cart.php");
    exit();
}


$message = "Thank you for your purchase!";
$customerID = $_SESSION['customerID'];
$checkout_items = $_SESSION['checkout_items'];
$productIDs = array_column($checkout_items, 'productID');


// delete checkout items in cart
if ($_POST['purchase-type'] == 'from-cart') {
    $in = join(',', array_fill(0, count($productIDs), '?'));
    $query =
        "DELETE FROM cart
        WHERE customerID = ? AND productID IN ($in)";
    $statement = $con->prepare($query);
    array_unshift($productIDs, $customerID);
    $statement->bind_param(str_repeat('s', count($productIDs)), ...$productIDs);
    $statement->execute();

    if (!($statement->affected_rows > 0)) {
        $message = "Failed to remove from cart.<br> Error: " . mysqli_error($con) . "<br> Please try again later or contact us at contact@farm.info.";
    }
}


// update stock and product_sold count
$questionMarks = join(',', array_fill(0, count($productIDs), '?'));
$query =
    "UPDATE item
    SET stock_quantity = stock_quantity - 1,
        product_sold = product_sold + 1
    WHERE productID IN ($questionMarks)";
$statement = $con->prepare($query);

$statement->execute($productIDs);
if (!($statement->affected_rows > 0)) {
    $message = "Failed to update stock and product sold count.<br> Error: " . mysqli_error($con) . "<br> Please try again later or contact us at contact@farm.info.";
}


unset($_SESSION['checkout_items']); ?>

<h2>
    <?= $message ?>
</h2>

<?php include "../../includes/bottom.php"; ?>


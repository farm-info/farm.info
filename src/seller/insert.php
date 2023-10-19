<?php
session_start();
include "../../database/conn.php";

$sql = "INSERT INTO seller (sellerID,seller_email, seller_name, SellPassword,seller_phonenumber,seller_address)
VALUES ('$_POST[sellerID]','$_POST[seller_email]','$_POST[seller_name]', '$_POST[SellPassword]', '$_POST[seller_phonenumber]', '$_POST[seller_address]')";

if (!mysqli_query($con, $sql)) {
    die("Error: " . mysqli_error($con));
} else {
    echo "<script>alert('1 record added!');window.location.href='view.php';</script>";
}

?>


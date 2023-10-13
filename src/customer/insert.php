<?php
session_start();
include("database/conn.php");

$sql = "INSERT INTO customer (customerID,customer_name, customer_username, customer_email,customer_phonenumber,customer_password,customer_address)
VALUES ('$_POST[customerID]','$_POST[customer_name]','$_POST[customer_username]', '$_POST[customer_email]', '$_POST[customer_phonenumber]', '$_POST[customer_password]', '$_POST[customer_address]')";

if (!mysqli_query($con, $sql)) {
    die("Error: " . mysqli_error($con));
} else {
    echo "<script>alert('1 record added!');window.location.href='view.php';</script>";
}

?>


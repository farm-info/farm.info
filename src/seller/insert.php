<?php
session_start();
include("../../database/conn.php");


$sqlc ="SELECT * FROM seller WHERE sellerID = '$_POST[sellerID]'";
$resultc = mysqli_query($con, $sqlc);
if (mysqli_num_rows($resultc)==1)
{
    echo '<script>alert("Seller ID already exist");window.location.href="register.php";</script>    ';
}
else {
$sql = "INSERT INTO seller (sellerID,seller_email, seller_name, SellPassword,seller_phonenumber,seller_address)
VALUES ('$_POST[sellerID]','$_POST[seller_email]','$_POST[seller_name]', '$_POST[SellPassword]', '$_POST[seller_phonenumber]', '$_POST[seller_address]')";

if (!mysqli_query($con, $sql)) {
    die("Error: " . mysqli_error($con));
} else {
    echo "<script>alert('1 record added!');window.location.href='view.php';</script>";
}
}

?>

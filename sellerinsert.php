<?php
session_start();
include("conn.php");

$sql = "INSERT INTO seller (seller_name, seller_phonenumber, seller_address) VALUES ('$_POST[seller_name]','$_POST[seller_phonenumber]', '$_POST[seller_address]')";

if (!mysqli_query($con,$sql))
{
    die("Error: ".mysqli_error($con));
}
else {
    echo "<script>alert('1 record added!');window.location.href='sellerview.php';</script>";
}

?>
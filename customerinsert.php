<?php
session_start();
include("conn.php");

$sql = "INSERT INTO contacts (contact_name, contact_phone, contact_email, contact_address, contact_gender, contact_relationship, contact_dob, user_id) VALUES ('$_POST[contact_name]','$_POST[contact_phone]', '$_POST[contact_email]','$_POST[contact_address]', '$_POST[contact_gender]','$_POST[contact_relationship]','$_POST[contact_dob]',$_SESSION[user_id])";

if (!mysqli_query($con,$sql))
{
    die("Error: ".mysqli_error($con));
}
else {
    echo "<script>alert('1 record added!');window.location.href='view.php';</script>";
}

?>
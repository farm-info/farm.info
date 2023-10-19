<?php

include"../../database/conn.php";

$sql = "UPDATE seller SET
    productID='$_POST[contact_name]',
    sellerID='$_POST[contact_phone]',
    contact_email='$_POST[contact_email]',
    contact_address='$_POST[contact_address]',
    contact_gender='$_POST[contact_gender]',
    contact_relationship='$_POST[contact_relationship]',
    contact_dob='$_POST[contact_dob]'
    WHERE
    id=$_POST[id]
    ";

mysqli_query($con, $sql);

header("location:view.php";

?>


<?php

include "../../includes/conn.php";

$sql = "UPDATE item SET
    product_name='$_POST[product_name]',
    product_category='$_POST[contact_category]',
    product_description='$_POST[product_description]',
    prooduct_price='$_POST[prooduct_price]',
    stock_quantity='$_POST[stock_quantity]',

    WHERE
    id=$_POST[productID]
    ";

mysqli_query($con, $sql);

header("location:view.php");

?>


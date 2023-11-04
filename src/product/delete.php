<?php
include "../../includes/conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM cart WHERE id=" . $id;
mysqli_query($con, $sql);
echo "<script>alert('Order Place!');window.location.href='view.php';</script>";
?>


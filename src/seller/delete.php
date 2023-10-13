<?php
include("database/conn.php");
$id = $_GET["id"];
$sql = "DELETE FROM contacts WHERE id=" . $id;
mysqli_query($con, $sql);
echo "<script>alert('Record Deleted!');window.location.href='view.php';</script>";
?>


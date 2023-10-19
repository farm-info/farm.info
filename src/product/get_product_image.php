<?php
include "../../includes/conn.php";

if ($_GET['id'] == 0) {
    $image = file_get_contents("../../images/logo.png");
    header("Content-type: image/jpeg");
    echo $image;
    exit();
}

$query =
    "SELECT imageData FROM product_images
    WHERE imageID = ?
    LIMIT 1";
$statement = $con->prepare($query);
$statement->bind_param("s", $_GET['id']);
$statement->execute();
$result = $statement->get_result();
$image = mysqli_fetch_column($result);

if (empty($image)) {
    $image = file_get_contents("../../images/logo.png");
}

header("Content-type: image/jpeg");
echo $image;

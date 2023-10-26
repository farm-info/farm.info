<?php
include "../../includes/conn.php";

$placeholder_image = file_get_contents("../../images/placeholder.png");

if ($_GET['id'] == 0) {
    $image = $placeholder_image;
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
    $image = $placeholder_image;
}

header("Content-type: image/jpeg");
echo $image;

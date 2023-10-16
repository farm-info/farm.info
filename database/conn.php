<?php
$con = mysqli_connect("localhost", "root", "", "farm_info");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

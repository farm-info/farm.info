<?php
$con = mysqli_connect("localhost", "root", "", "farm_info");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

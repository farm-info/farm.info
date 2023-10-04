<?php

$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'Farm_Info';

// connection
$conn = mysqli_connect($db_host, $db_username, $db_pass, $db_name);

// check connection to DB
if (!$conn){
    die(mysqli_connect_error());
}

?>
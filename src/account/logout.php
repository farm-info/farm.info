<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect the user to the homepage or a logged-out page
header("Location: farm.info/farm.info/src/index.php"); // Change "index.php" to your homepage URL
exit;
?>
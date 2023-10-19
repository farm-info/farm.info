<?php
session_start();

// Unset and destroy the session data
session_unset();
session_destroy();

// Redirect the user to a login page or any other appropriate location
header("Location: ../index.php");
exit();
?>

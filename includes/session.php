<?php
session_start();

if (isset($_SESSION['customerID'])) {
    $loggedIn = true;
    $loggedInAsSeller = false;
} else if (isset($_SESSION['sellerID'])) {
    $loggedIn = true;
    $loggedInAsSeller = true;
} else {
    $loggedIn = false;
    $loggedInAsSeller = false;
}

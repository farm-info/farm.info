<?php
include(dirname(__FILE__) . "/session.php");
include(dirname(__FILE__) . "/../database/conn.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $title ?> | Farm.info
    </title>
    <!-- yeah this only works on my computer unless you also setup your server the same way. sorry. -->
    <link rel="stylesheet" href="/farm.info/src/style.css">
</head>

<body>
    <!-- Header Section -->
    <header>
        <nav>
            <ul>
                <li style="float: left"><a href="index.php">Farm.info</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="product/cart.php">Cart</a></li>
            </ul>
        </nav>
    </header>

    <!-- assigns .active class to the link of current page -->
    <!-- doing it in php would have been better but i couldn't find an elegant way -->
    <script>
        var currentPage = window.location.pathname.split('/').pop();
        var linkToCurrentPage = document.querySelector(`[href="${currentPage}"]`);
        linkToCurrentPage.setAttribute("class", "active");
    </script>

    <!-- Main Content Section -->
    <main>

<?php
include dirname(__FILE__) . "/session.php";
include dirname(__FILE__) . "/../includes/conn.php";
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
    <nav>
        <ul>
            <li style="float: left">
                <a href="index.php" id="logo-text" style="padding: 0">
                    <img src="../images/logo.png" alt="Marketplace Logo" id="logo"></a>
            </li>
            <li style="float: left"><a href="index.php" id="logo-text">Farm.info</a></li>
            <li><a href="/farm.info/src/about.php">About us</a></li>
            <li><a href="/farm.info/src/product/cart.php">Cart</a></li>
            <li><a href="/farm.info/src/seller/login.php">Seller?</a></li>
            <?php if (!$loggedIn) { ?>
                <li><a href="account/login.php">Login</a></li>
                <li><a href="customer/register.php">Register</a></li>
            <?php } else { ?>
                <li><a href="account/logout.php">Log out</a></li>
            <?php } ?>
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
